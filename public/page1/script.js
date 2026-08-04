const questionEl = document.getElementById("question");
const optionsEl = document.getElementById("options");
const nextBtn = document.getElementById("next-btn");
const prevBtn = document.getElementById("prev-btn");
const resultBox = document.getElementById("result-box");
const scoreText = document.getElementById("score-text");

let quizData = [];
let currentQuestion = 0;
let selectedAnswers = [];

async function fetchQuiz() {
  try {
    const response = await fetch(`/quiz-data/${classId}/${subjectName}/${chapterId}`);
    quizData = await response.json();
    selectedAnswers = new Array(quizData.length).fill(null);
    loadQuestion(currentQuestion);
  } catch (error) {
    console.error("Quiz load failed:", error);
    questionEl.innerHTML = "Quiz data not found.";
  }
}

function escapeHTML(str) {
  return str.replace(/</g, "&lt;").replace(/>/g, "&gt;");
}

function loadQuestion(index) {
  currentQuestion = index;
  localStorage.setItem("current_question", currentQuestion.toString());

  const data = quizData[index];
  const optionLabels = ["A", "B", "C", "D"];
  let html = `<div><strong>${index + 1}.</strong> ${escapeHTML(data.question)}</div>`;
  html += `<div class="question-image">${data.image ? `<img src="${data.image}" alt="Question Image" class="question-img" onerror="this.style.display='none'">` : ""}</div>`;
  questionEl.innerHTML = html;

 // Render options
optionsEl.innerHTML = "";
const savedAnswer = localStorage.getItem(`answer_${index}`); // ✅ Sync from localStorage

data.options.forEach((opt, i) => {
  const label = optionLabels[i];
  const btn = document.createElement("button");
  btn.className = "option";
  btn.innerHTML = `<strong>${label}.</strong> ${escapeHTML(opt)}`;
  btn.onclick = () => selectOption(btn, label);

  if (savedAnswer === label) {
    btn.classList.add("selected");
  }

  optionsEl.appendChild(btn);
});

nextBtn.disabled = selectedAnswers[index] === null;



  prevBtn.style.display = index === 0 ? "none" : "inline-block";
  prevBtn.disabled = index === 0;
  nextBtn.innerHTML = index === quizData.length - 1 ? "Submit" : '<i class="fa fa-arrow-circle-right"></i>';
  nextBtn.style.fontSize = index === quizData.length - 1 ? "20px" : "30px";
  nextBtn.classList.toggle("submit-btn", index === quizData.length - 1);
  nextBtn.style.transform = index === 0 ? "translateX(245px)" : "none";
  nextBtn.disabled = !selectedAnswers[index];

  try {
    const omrFrame = parent.document.getElementById("omrFrame");
    if (omrFrame?.contentWindow?.renderOMR) {
      omrFrame.contentWindow.renderOMR();
    }
  } catch (e) {
    console.warn("OMR sync failed", e);
  }
}

function selectOption(button, selectedLabel) {
  document.querySelectorAll(".option").forEach(opt => opt.classList.remove("selected"));
  button.classList.add("selected");

  const isFirstTime = !selectedAnswers[currentQuestion];
  selectedAnswers[currentQuestion] = selectedLabel;

  localStorage.setItem(`answer_${currentQuestion}`, selectedLabel);
  localStorage.setItem("last_changed_question", currentQuestion);

  nextBtn.disabled = false;

  try {
    const omrFrame = parent.document.getElementById("omrFrame");
    if (omrFrame?.contentWindow?.renderOMR) omrFrame.contentWindow.renderOMR();
    if (isFirstTime && omrFrame?.contentWindow?.animateBubble) {
      omrFrame.contentWindow.animateBubble(currentQuestion, selectedLabel);
    }
  } catch (e) {
    console.warn("OMR sync error", e);
  }
}

nextBtn.addEventListener("click", () => {
  if (currentQuestion === quizData.length - 1) {
    showResult();
  } else {
    currentQuestion++;
    loadQuestion(currentQuestion);
  }
});

prevBtn.addEventListener("click", () => {
  if (currentQuestion > 0) {
    currentQuestion--;
    loadQuestion(currentQuestion);
  }
});

function showResult() {
  let score = 0;
  quizData.forEach((q, i) => {
    if (selectedAnswers[i] === q.answer) score++;
    localStorage.setItem(`correct_${i}`, q.answer);
  });
  localStorage.setItem("quiz_submitted", "true");

  try {
    const omrFrame = parent.document.getElementById("omrFrame");
    if (omrFrame?.contentWindow?.renderOMR) {
      omrFrame.contentWindow.renderOMR();
    }
  } catch (e) {
    console.warn("Final OMR sync failed", e);
  }

  const percentage = (score / quizData.length) * 100;
  const grade = getGradeInfo(percentage);

  document.getElementById("quiz-box").classList.add("hidden");
  resultBox.classList.remove("hidden");
  scoreText.innerHTML = `
    <div class="result-container">
      <div class="score-box">You scored <span class="score">${score}</span> out of <span class="total">${quizData.length}</span></div>
      <div class="percentage-box">Percentage: <span class="percentage">${percentage.toFixed(2)}%</span></div>
      <div class="comment-box">Comment: <span class="comment">${grade.comment}</span></div>
    </div>`;
}

function getGradeInfo(p) {
  if (p >= 90) return { grade: "A+", comment: "Outstanding" };
  if (p >= 80) return { grade: "A", comment: "Very good" };
  if (p >= 70) return { grade: "B", comment: "Good" };
  if (p >= 60) return { grade: "C", comment: "Satisfactory" };
  if (p >= 50) return { grade: "D", comment: "Needs improvement" };
  if (p >= 40) return { grade: "E", comment: "Below average" };
  return { grade: "F", comment: "Very poor" };
}

window.selectedAnswers = selectedAnswers;
window.loadQuestion = loadQuestion;
window.currentQuestion = currentQuestion;
window.selectOptionFromOMR = function (qIndex, selectedLabel) {
  selectedAnswers[qIndex] = selectedLabel;
  localStorage.setItem(`answer_${qIndex}`, selectedLabel);
  localStorage.setItem("last_changed_question", qIndex);
  localStorage.setItem("current_question", qIndex);
  currentQuestion = qIndex;

  loadQuestion(qIndex);

  // ✅ Force enable next button
  nextBtn.disabled = false;
};



fetchQuiz();
