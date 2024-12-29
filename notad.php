<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Not Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        /* General styles */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f8ff;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #ff6347; /* Tomato color */
        }

        p {
            font-size: 18px;
            margin-bottom: 40px;
        }

        .button {
            background-color: #007BFF; /* Bootstrap primary color */
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            font-weight: bold;
        }

        .button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
    </style>
</head>

<body>

    <?php include "nav.php" ?>

    <h1>Access Denied</h1>
    <p>You do not have permission to access this page.</p>
    <a class="button" href="main.php">Return to Home</a>

</body>

</html>
