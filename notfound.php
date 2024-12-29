
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Not Found</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        .not-found-container {
            max-width: 600px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h1 {
            font-size: 5rem;
            color: #ff6b6b;
        }

        h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
        }

        p {
            font-size: 1rem;
            margin-bottom: 2rem;
        }

        a.back-home {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }

        a.back-home:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="not-found-container">
        <h1>404</h1>
        <h2>Oops! User not found</h2>
        <p>It seems the page you are looking for doesn't exist.</p>
        <a href="main.php" class="back-home">Back to Home</a>
    </div>
</body>
</html>
