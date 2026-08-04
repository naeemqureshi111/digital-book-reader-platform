<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/b0f29e9bfe.js" crossorigin="anonymous"></script>
<link rel="icon" href="{{ asset('assets/images/icon.ico') }}" type="image/x-icon">


    <!-- Custom CSS and JS -->
   <link rel="stylesheet" href="{{ asset('style.css') }}">
<link rel="stylesheet" href="{{ asset('media-quries.css') }}">
<script src="{{ asset('main.js') }}" defer></script>
</head>
<body>
 @if($error)
    <div style="
        position: fixed;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        background-color: #fff3cd;
        color: #856404;
        border: 1px solid #ffeeba;
        padding: 12px 24px;
        border-radius: 8px;
        font-size: 16px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        z-index: 9999;
    ">
        <i class="fa fa-exclamation-triangle" aria-hidden="true" style="margin-right: 8px;"></i>
        <strong>{{ $error }}</strong>
    </div>
@endif


    <!-- Previous Button -->
    <button id="prev-btn">
        <i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
    </button>


    <!-- Flipbook Container -->
        <div id="book" class="book">
            
            <!-- Paper 1 -->
            <div id="p1" class="paper">
                <div class="front">
                    <div id="f1" class="front-content">
                        <div id="dynamicContent" class="front-content">
                           <iframe id="firstPage1"  src="{{ url('/Quiz/first-page/' . $subjectName . '/' . $classId) }}"  width="100%" height="100%" frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
                <div id="b11" class="back">
                    <div id="b1" class="back-content">
                      <iframe src="{{ url('/Quiz/chapters/' . $subjectName . '/' . $classId) }}"  width="100%" height="100%" frameborder="0"></iframe>
                    </div>
                </div>
            </div>

            <!-- Paper 2 -->
            <div id="p2" class="paper">
                <div id="f22" class="front">
                    <div id="f2" class="front-content">
                        <div style="
    padding: 30px;
    background-color: #f8f9fa;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 20px;
">

    <!-- Heading -->
    <h2 style="
        font-size: 32px;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 8px;
        letter-spacing: 0.5px;
        text-align: center;
    ">
        Instructions
    </h2>

    <!-- Line below heading -->
    <hr style="
        border: none;
        height: 3px;
        background-color: #3498db;
        margin: 10px auto 20px;
        width: 80px;
        border-radius: 2px;
    ">

    <!-- Dynamic Instruction -->
   <!-- Scrollable Instruction Content -->
<div style="
    font-size: 17px;
    line-height: 1.8;
    color: #34495e;
    text-align: justify;
    margin-bottom: 0;
    max-height: 300px;         /* limit height */
    overflow-y: auto;          /* scroll when needed */
    padding-right: 10px;       /* space for scrollbar */
">
    {!! $instruction->content ?? 'No instructions available for this subject and class.' !!}
</div>


</div>



                    </div>
                </div>
                <div id="b22" class="back">
                    <div id="b2" class="back-content">
                         <iframe id="quizFrame" src="" width="95%" height="95%" frameborder="0"></iframe>
                    </div>
                </div>
            </div>

            <!-- Paper 3 -->
            <div id="p3" class="paper">
                <div id="f33" class="front">
                    <div id="f3" class="front-content">
                         <iframe id="omrFrame" src="" width="95%" height="95%" frameborder="0"></iframe>
                    </div>
                </div>
                <div class="back">
                    <div id="b3" class="back-content">
                        <iframe src="{{ route('quiz.backpage') }}" width="100%" height="100%" frameborder="0" style="border-radius: 12px;"></iframe>
                    </div>
                </div>
            </div>
            
             
        </div>
    

    <!-- Next Button -->
    <button id="next-btn">
        <i class="fa fa-arrow-circle-right" aria-hidden="true"></i>
    </button>

    <!-- Reset and Login Logic -->
    <script>
        window.addEventListener("DOMContentLoaded", () => {
            try {
                const quizFrame = document.getElementById("quizFrame");
                const omrFrame = document.getElementById("omrFrame");

                setTimeout(() => {
                    for (let i = 0; i < 10; i++) {
                        localStorage.removeItem(`answer_${i}`);
                    }

                    if (quizFrame && quizFrame.contentWindow) {
                        quizFrame.contentWindow.location.reload();
                    }
                    if (omrFrame && omrFrame.contentWindow) {
                        omrFrame.contentWindow.localStorage.clear();
                        if (typeof omrFrame.contentWindow.renderOMR === 'function') {
                            omrFrame.contentWindow.renderOMR();
                        } else {
                            omrFrame.contentWindow.location.reload();
                        }
                    }
                }, 500);
            } catch (e) {
                console.error("Failed to reset quiz and OMR:", e);
            }
        });

        function loadLogin() {
            alert("Login button clicked! Replace this with your login modal or redirect.");
        }
        
//         window.addEventListener("message", (event) => {
//     if (event.data === "startClicked") {
//       console.log("Start button clicked in iframe");
//       goNextPage(); // ✅ Only flip once (from intro to chapters)
//     }
//   });

  function loadQuizAndOMR(subject, classId, chapterId) {
    document.getElementById("next-btn").click();
    document.getElementById("quizFrame").src = `/Quiz/page1/${subject}/${classId}/${chapterId}`;
    document.getElementById("omrFrame").src = `/Quiz/page2/${subject}/${classId}/${chapterId}`;
  }
        
        
    </script>
</body>
</html>
