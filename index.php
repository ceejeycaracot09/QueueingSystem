<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website</title>
    <style>
        body {
            position: relative;
            height: 100vh;
            margin: 0;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-image: url('image/uc-logo-bg-160x83.c24343b851e5b064daf9.png');
            background-size: auto 400px; /* Fixed height of 500px, width adjusted proportionally */
            background-position: center center;
            background-repeat: no-repeat;
            opacity: 0.3; /* Adjust opacity here */
        }
        .button-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            position: relative;
            z-index: 1;
        }

        .action-button {
            display: block;
            width: 200px;
            padding: 10px;
            margin: 10px;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border: 1px solid #007bff;
            border-radius: 5px;
            cursor: pointer;
        }

        .action-button:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="button-container">
    <a href="form/queue-home.php" class="action-button">STUDENT FORM</a>
    <a href="login/desktop.html" class="action-button">LOGIN PAGE</a>
    <a href="Monitor/edp-queue.php" class="action-button">MONITOR</a>
</div>

</body>
</html>
