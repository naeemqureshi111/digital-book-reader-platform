<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>OMR Sheet</title>
  <style>
    html, body {
      margin: 0;
      padding: 0;
      height: 100vh;
      width: 100vw;
      font-family: Arial, sans-serif;
      background-size: cover;
      background-position: center;
      display: flex;
      justify-content: center;
      align-items: center;
      box-sizing: border-box;
      position: relative;
    }

    .omr-container {
      background-image: url('img/omr.jpg');
      background-size: cover;
      background-position: center;
      border: 1px solid rgb(194, 178, 166);
      height: 100%;
      width: 100%;
      padding: 30px;
      border-radius: 10px;
      box-sizing: border-box;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      position: relative;
      overflow: hidden;
      justify-content: center;
      align-items: center;
    }

    .omr-layer {
      margin-top: 40px;
      position: absolute;
      overflow-y: auto;
    }

    .omr-question {
      text-align: center;
      margin-bottom: 10px;
      margin-left: 80px;
      color: #333;
      position: relative;
    }

    .bubble {
      width: 25px;
      height: 25px;
      margin: 0 10px;
      border: 2px solid #333;
      border-radius: 50%;
      text-align: center;
      line-height: 25px;
      font-weight: bold;
      font-size: 12px;
      display: inline-block;
      transform: translate(-60px);
      pointer-events: auto;
      cursor: pointer;
    }

    .bubble.selected {
      background-color: black !important;
      color: transparent !important;
    }

    .bubble.correct-answer {
      background-color: green !important;
      color: white;
    }

    .serial {
      font-size: 16px;
      font-weight: bold;
      transform: translate(-50px);
      display: inline-block;
      width: 50px;
    }

    .status-icon {
      position: absolute;
      left: 0;
      top: 4px;
      font-size: 18px;
      transform: translate(200px);
    }

    .status-icon.correct {
      color: green !important;
    }
/*    .bubble.disabled {*/
/*  pointer-events: none;*/
/*  opacity: 0.4;*/
/*  background: #ccc;*/
/*  cursor: not-allowed;*/
/*}*/


    .status-icon img {
      width: 24px;
      height: 24px;
      vertical-align: middle;
    }

    .status-icon.wrong {
      color: red !important;
    }

    .bubble.now-selected {
      animation-name: animate;
      animation-duration: 0.1s;
      animation-direction: reverse;
      animation-timing-function: ease-in-out;
    }

    @keyframes animate {
      from {}
      to {
        transform: translate(50px);
      }
    }
  </style>
</head>
<body>
  <div class="omr-container">
    <div id="omr" class="omr-layer"></div>
  </div>

 <script>
function renderOMR() {
  const omrContainer = document.getElementById("omr");
  omrContainer.innerHTML = "";

  const lastChanged = localStorage.getItem("last_changed_question");
  const isSubmitted = localStorage.getItem("quiz_submitted") === "true";
  const currentQ = localStorage.getItem("current_question") || "0";

  for (let i = 0; i < 10; i++) {
    const saved = localStorage.getItem(`answer_${i}`) || "";
    const correct = localStorage.getItem(`correct_${i}`) || "";

    const qDiv = document.createElement("div");
    qDiv.className = "omr-question";

     let icon = "";
    if (isSubmitted && saved) {
      icon = saved === correct
        ? `<span class="status-icon correct"><img src="{{ asset('img/correct.svg') }}" alt="Correct" /></span>`
        : `<span class="status-icon wrong"><img src="{{ asset('img/wrong.svg') }}" alt="Wrong" /></span>`;
    }

    qDiv.innerHTML = icon + `<span class="serial">${i + 1}:</span>` +
      ["A", "B", "C", "D"].map(opt => {
        let cls = "bubble";
        if (saved === opt) {
          const key = `animated_${i}`;
          if (lastChanged == i.toString() && !localStorage.getItem(key)) {
            cls += " selected now-selected";
            localStorage.setItem(key, "1");
          } else {
            cls += " selected";
          }
        }
        if (isSubmitted && correct === opt && saved !== opt) {
          cls += " correct-answer";
        }
        if (!isSubmitted && currentQ !== i.toString()) {
          cls += " disabled";
        }
        return `<span class="${cls}" data-q="${i}" data-opt="${opt}">${opt}</span>`;
      }).join(" ");

    omrContainer.appendChild(qDiv);
  }

  if (!isSubmitted) {
    document.querySelectorAll(`.bubble[data-q="${currentQ}"]`).forEach(bubble => {
      bubble.addEventListener("click", () => {
        const q = bubble.dataset.q;
        const opt = bubble.dataset.opt;

        localStorage.setItem(`answer_${q}`, opt);
        localStorage.setItem("last_changed_question", q);
        localStorage.setItem("current_question", q);

        try {
          const quizFrame = parent.document.getElementById("quizFrame");
          if (quizFrame && quizFrame.contentWindow) {
          quizFrame.contentWindow.selectOptionFromOMR(Number(q), opt);

          }
        } catch (err) {
          console.warn("Quiz frame access failed", err);
        }
      });
    });
  }
}

window.renderOMR = renderOMR;
renderOMR();
</script>

</body>
</html> 