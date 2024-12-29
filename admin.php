<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            padding: 40px 20px;
        }

        h2 {
            text-align: center;
            color: #007BFF;
            margin-bottom: 30px;
            font-weight: 600;
        }

        .card-section {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .card {
            background-color: #ffffff;
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            overflow: hidden;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        }

        .card-image {
            width: 100%;
            height: auto;
        }

        .card-content {
            padding: 15px;
        }

        h3 {
            margin: 10px 0;
            font-size: 1.5em;
            font-weight: 500;
        }

        p {
            font-size: 1em;
            color: #666;
        }

        table {
            width: 100%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        th,
        td {
            padding: 15px;
            text-align: left;
            background-color: #ffffff;
            border: 1px solid #ccc;
        }

        th {
            background-color: #007BFF;
            color: white;
            font-weight: 600;
        }

        tr:nth-child(even) {
            background-color: #f8f8f8;
        }

        tr:hover {
            background-color: #e8f0fe;
        }

        .back-button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            text-align: center;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #0056b3;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: 600;
            color: #333;
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 5px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="file"]:focus {
            border-color: #007BFF;
            outline: none;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .text-center {
            text-align: center;
        }

        #winner {
            display: block;
            font-size: 24px;
            text-decoration: none;
            color: white;
            background-color: #007BFF;
            padding: 15px 20px;
            border-radius: 5px;
            margin: 20px auto;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        #winner:hover {
            background-color: #0056b3;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .card {
                width: 90%;
            }

            .container {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <?php
    // Start the PHP block at the very top of the file

    include "config.php";
    if (!isset($_SESSION['role']) or $_SESSION['role'] != "admin" ){
        include "notad.php";
        return;
    }
    $sql = "SELECT * FROM teams ORDER BY score DESC";
    $result = mysqli_query($con, $sql);

    include "nav.php";
    ?>
    <a id="winner"  href="winner.php">Show Winner</a>
    <div class="container">
        <h2>All Teams</h2>
        <?php
        // Check if there are results
        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr><th>Team Name</th><th>Email</th><th>Password</th><th>Score</th><th>Solve</th></tr>"; // Adjust columns as necessary
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['t_name']) . "</td>"; // Escape output
                echo "<td>" . htmlspecialchars($row['t_email']) . "</td>"; // Escape output
                echo "<td>" . htmlspecialchars($row['t_password']) . "</td>"; // Escape output
                echo "<td>" . htmlspecialchars($row['score']) . "</td>"; // Escape output
                echo "<td>" . htmlspecialchars($row['solve'] ? "True" : "False") . "</td>"; // Escape output
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p class='text-center'>No teams found.</p>";
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["add"])) {
                $name = $_POST["name"];
                $desc = $_POST["desc"];
                $page = $_POST["page"];
                $image = $_FILES['image'];
                $image_location = $_FILES['image']['tmp_name'];
                $image_name = $_FILES['image']['name'];
                $image_up = "images/" . $image_name;

                // Use backticks around desc
                $sql = "INSERT INTO events (name, `desc`, image, page) VALUES ('$name','$desc','$image_up','$page')";
                mysqli_query($con, $sql);

                if (move_uploaded_file($image_location, "images/" . $image_name)) {
                    echo "<script>alert('Product added successfully')</script>";
                } else {
                    echo "<script>alert('Failed to upload Product')</script>";
                }
            }

            if (isset($_POST["del"])) {
                $name = $_POST["namedel"];
                $sql = "DELETE FROM events WHERE name = '$name'";
                mysqli_query($con, $sql);
                echo "<script>alert('Product $name Deleted successfully')</script>";
            }

            // Close the database connection
        }
        $con->close();
        ?>

        <h2>Add New Event</h2>
        <form action="admin.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
                <label for="desc">Description:</label>
                <input type="text" name="desc" required>
            </div>
            <div class="form-group">
                <label for="page">Page:</label>
                <input type="text" name="page" required>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" name="image" accept="image/*" required>
            </div>
            <input type="submit" value="Add" name="add">
        </form>

        <h2 style="margin-top: 30px;">Delete Event</h2>
        <form action="admin.php" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="namedel" required>
            </div>
            <input style="background-color: red; border-radius: 5px;" type="submit" value="Delete" name="del">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>