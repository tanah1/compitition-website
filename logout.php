<?php
session_start();

if (isset($_POST["logout"])) {
    session_unset();
    session_destroy();
    header("Location: main.php"); // Redirect to login page after logout
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout Page</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .logout-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        h2 {
            color: #555;
            margin-bottom: 30px;
        }

        .logout {
            background-color: #ff4c4c;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .logout:hover {
            background-color: #e43b3b;
        }

        .logout:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(255, 76, 76, 0.7);
        }
    </style>
</head>
<body>
    <div class="logout-container">
        <h1>You are already logged in</h1>
        <h2>Do you want to log out?</h2>
        <form action="logout.php" method="post">
            <input class="logout" type="submit" name="logout" value="Log Out">
        </form>
    </div>
</body>
</html>
