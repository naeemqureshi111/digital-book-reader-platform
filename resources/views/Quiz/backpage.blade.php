<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Back Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
            width: 100%;
            background: #f0f0f0;
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .content-box {
            background-color: white;
            padding: 40px 30px;
            margin: 0 20px; /* added side spacing */
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 600px;
            width: 100%;
        }

        .logo {
            width: 60px;
            margin-bottom: 15px;
        }

        .company-name {
            font-size: 24px;
            font-weight: bold;
            text-decoration: underline;
            margin-bottom: 15px;
        }

        .contact-info {
            font-size: 16px;
            line-height: 1.6;
        }

        @media (max-width: 500px) {
            .company-name {
                font-size: 18px;
            }

            .contact-info {
                font-size: 14px;
            }

            .content-box {
                padding: 25px 20px;
            }
        }
    </style>
</head>
<body>

    <div class="content-box">
        <img src="{{ asset('img/RohanLogo.png') }}" alt="Logo" class="logo">

        <div class="company-name">ROHAN BOOK COMPANY PVT. LTD.</div>

        <div class="contact-info">
            <b>Phone:</b> +91 (0120) 2988577<br>
            <b>Website:</b> www.rohanbookcompany.com<br>
            <b>E-mail:</b> rohanbooks@rbcpl.in, info@rohanbooks.com
        </div>
    </div>

</body>
</html>
