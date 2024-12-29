<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
            text-align: center;
            background-color: #f9f9f9; /* Neutral background */
        }

        h2 {
            font-size: 2rem;
            width: 60%;
            color: #ffffff; /* White text */
            background-color: #007BFF; /* Default blue background */
            padding: 15px 30px;
            border-radius: 12px;
            margin-bottom: 20px;
            letter-spacing: 1.5px;
            display: inline-block; /* Ensure width is based on content */
            transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        /* Hover effect on the <h2> */
        h2:hover {
            background-color: #0056b3; /* Darker blue on hover */
            transform: scale(1.05); /* Slightly enlarge the text on hover */
        }

        .container {
            width: 90%;
            max-width: 400px;
            padding: 30px;
            background-color: #ffffff;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            text-align: center;
            transition: transform 0.3s ease-in-out, background-color 0.3s ease-in-out;
        }

        .container:hover {
            transform: scale(1.05);
            background-color: #f7faff;
        }

        img {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            border: 3px solid #007BFF;
            object-fit: cover;
            margin-bottom: 20px;
            transition: transform 0.3s ease-in-out;
        }

        img:hover {
            transform: scale(1.1);
        }

        h3 {
            font-size: 1.5rem;
            color: #007BFF;
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {
            h2 {
                font-size: 2rem;
            }

            .container {
                padding: 20px;
            }

            img {
                width: 150px;
                height: 150px;
            }
        }
    </style>
</head>

<body>

    <?php
    include "check.php";
    include "nav.php";
    include "config.php";
    
    $name = $_SESSION["username"];
    $sql = "SELECT * FROM teams WHERE t_name = '$name'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $userData = mysqli_fetch_assoc($result);
    ?>
        <h2>User Page</h2>
        <h2><?php echo $userData['t_name']; ?></h2> 

        <div class="container">
            <img src="<?php echo htmlspecialchars($userData['t_image'])?>" alt="User Image">
            <h3>Your Score: <?php echo htmlspecialchars($userData['score']); ?></h3>
        </div>

    <?php
    } else {
        echo "<h2>No user data found.</h2>";
    }
    ?>

</body>

</html>
