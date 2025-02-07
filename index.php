<?php
// You can add any necessary code here if you want to manage session or other initializations
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        /* Paste the provided CSS here */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #FF7E5F, #FEB47B); /* Gradient background */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        h1 {
            font-size: 3em;
            color: white;
            margin-bottom: 20px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .btn-container {
            display: flex;
            justify-content: center;
            gap: 30px;
        }

        .btn {
            padding: 15px 30px;
            font-size: 18px;
            cursor: pointer;
            border: none;
            border-radius: 50px;
            background: #fff;
            color: #FF7E5F;
            font-weight: bold;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            text-transform: uppercase;
        }

        .btn:hover {
            background: #FF7E5F;
            color: white;
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        .btn:active {
            transform: translateY(2px);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        a {
            text-decoration: none;
        }

        .btn-container p {
            font-size: 1.2em;
            color: white;
            margin-top: 30px;
        }
        p {
            color: white;
            margin-top: 10%;
        }

        /* Animation for the heading */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(-50px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1 {
            animation: fadeIn 1s ease-out;
        }
    </style>
</head>
<body>

    <div>
        <h1>Welcome </h1>
        <div class="btn-container">
            <a href="signup.php">
                <button class="btn">Sign Up</button>
            </a>
            <a href="login.php">
                <button class="btn">Login</button>
            </a>
        </div>
        <p>Choose an action to proceed.</p>
    </div>

</body>
</html>
