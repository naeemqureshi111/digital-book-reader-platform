<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Start Page</title>
  <style>
   * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html, body {
      height: 100%;
      font-family: Arial, sans-serif;
      background-color: #FAD59A;
      color: white;
      width: 100%;
    }

    .container {
      height: 100%;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: 20px;
      position: relative;
      width: 100%;
    }

    .class-label {
      position: absolute;
      top: 0;
      right: 0;
      background-color: #2DA0A4;
      color: #ffffff;
      width: 250px;
      height: 250px;
      font-size: 140px;
      border-radius: 0 0 0 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      font-weight: bold;
      box-shadow: -2px 2px 0 white;
      text-shadow: 2px 2px 4px #9b0f0f80;
      line-height: 1;
    }

    .logo-top-left {
      position: absolute;
      top: 0;
      left: 0;
      width: 80px;
      height: auto;
      margin: 10px;
    }

    .stack {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      width: 100%;
    }

    .image-wrapper {
        margin-top:5px;
      padding: 0 5px;
    }

    .image {
      height: 500px;
      width: auto;
      display: block;
    }
    .text-two {
  font-size: 75px;
  font-weight: bold;
  text-align: center;
  white-space: nowrap;
  max-width: 90%;
  overflow: hidden;
  text-overflow: ellipsis;
  text-shadow: 2px 2px 4px #9b0f0f80;
  margin-top: 10px; /* Add this line */
}

    .text-one {
      font-size: 24px;
      margin-top: 10px;
      text-shadow: 2px 2px 4px #9b0f0f80;
    }

    .start-btn {
      margin-top: auto;
      margin-bottom: 120px;
      padding: 14px 32px;
      font-size: 20px;
      background-color: #2DA0A4;
      border: 2px solid white;
      color: #ffffff;
      border-radius: 8px;
      cursor: pointer;
    }

    .start-btn:hover {
      background-color: #E9A319;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .logo-top-left {
        width: 70px;
      }

      .class-label {
        font-size: 60px;
        width: 120px;
        height: 120px;
      }

      .text-two {
        font-size: 48px;
        margin-top: 10px;
        max-width: 85%;
      }

      .image {
        height: 400px;
      }

      .start-btn {
        padding: 12px 28px;
        font-size: 18px;
        margin-bottom: 60px;
      }

      .start-btn {
        margin-top: 20px;
      }
    }

    @media (max-width: 480px) {
      .logo-top-left {
        width: 60px;
      }

      .class-label {
        font-size: 40px;
        width: 90px;
        height: 90px;
      }

      .text-two {
        font-size: 36px;
        margin-top: 5px;
        max-width: 90%;
      }

      .image {
        height: 300px;
      }

      .start-btn {
        padding: 10px 24px;
        font-size: 16px;
        margin-bottom: 60px;
        margin-top: 20px;
      }
    }
    @media (max-width: 220px) {

      .text-two {
        font-size: 26px;
        margin-top: 5px;
        max-width: 50%;
      }

      .image {
        height: 100px;
      }

      .start-btn {
        padding: 5px 12px;
        font-size: 12px;
        margin-bottom: 200px;
      }
    }
  </style>
</head>
<body>

  <div class="container">
      
    <!-- Top-left logo -->
    <img src="{{ asset('img/RohanLogo.png') }}" alt="logo" class="logo-top-left">

    <!-- Top-right class label -->
    <div class="class-label">{{ $classId }}</div>

    <!-- Centered content stack -->
    <div class="stack">
      <div class="image-wrapper">
        <img  src="{{ asset('img/image.svg') }}" alt="main image" class="image">
      </div>
      <div class="text-two t1">Rohan's</div>
      <div class="text-two t2">Thinking Lab</div>
      <div class="text-one">{{ $subjectName }}</div>
   </div>

    <!-- Start Button triggers flip -->
    <button class="start-btn" onclick="startQuiz()">Start</button>
  </div>

<script>
  function startQuiz() {
    window.parent.postMessage("startClicked", "*");
  }
</script>

</body>
</html>
