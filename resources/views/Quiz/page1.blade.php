<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Quiz Page</title>
   <link rel="stylesheet" href="{{ asset('/page1/style.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script>
  const classId = "{{ $classId }}";
  const subjectName = "{{ $subjectName }}";
  const chapterId = "{{ $chapterId }}"; // Add this
</script>


<script src="{{ asset('/page1/script.js') }}" defer></script>


</head>
<body>
  <div class="quiz-container">

    <div id="quiz-box">
      <div id="question"></div>
      <div id="options"></div>

      <div class="button-row">
        <button id="prev-btn" disabled> <i class="fa fa-arrow-circle-left" aria-hidden="true"></i></button>
        <button id="next-btn" disabled>  <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
        <button id="submit-btn" class="hidden">Submit</button>
      </div>
    </div>

    <div id="result-box" class="hidden">
      <h2>Your Score:</h2>
      <p id="score-text"></p>
      <button id="reset-btn">Reset Quiz</button>
    </div>
  </div>

  <!-- Load Quiz Script -->
  <!-- Reset Logic -->
  <script>
    document.addEventListener("DOMContentLoaded", () => {
  const resetBtn = document.getElementById("reset-btn");
  if (resetBtn) {
    resetBtn.addEventListener("click", () => {
      for (let i = 0; i < 10; i++) {
        localStorage.removeItem(`answer_${i}`);
      }

      // Try clearing iframe localStorage + refresh OMR
      try {
        const omrFrame = parent.document.getElementById("omrFrame");
        if (omrFrame && omrFrame.contentWindow) {
          omrFrame.contentWindow.localStorage.clear();
          omrFrame.contentWindow.renderOMR();
        }
      } catch (e) {
        console.warn("Unable to refresh OMR iframe:", e);
      }

      location.reload();
    });
  }
});

window.addEventListener("message", (event) => {
  if (event.data === "triggerStartClick") {
    document.getElementById("startBtn")?.click(); // Simulate start button click
  }
});


  </script>
</body>
</html>
