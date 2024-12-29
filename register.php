<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .register-form {
            max-width: 400px;
            width: 100%;
            margin: 20px; /* Added margin for better spacing */
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .register-form h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        .register-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #555;
        }

        .register-form input[type="text"],
        .register-form input[type="email"],
        .register-form input[type="password"],
        .register-form input[type="file"],
        .register-form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px; /* Consistent font size */
            transition: border-color 0.2s; /* Added transition for input fields */
        }

        .register-form input[type="text"]:focus,
        .register-form input[type="email"]:focus,
        .register-form input[type="password"]:focus,
        .register-form input[type="file"]:focus,
        .register-form select:focus {
            border-color: #007BFF; /* Change border color on focus */
            outline: none; /* Remove default outline */
        }

        .register-form button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.2s;
        }

        .register-form button:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .register-form {
                width: 90%; /* Ensure it is responsive on small screens */
            }
        }
    </style>
</head>
<body>
    <?php 
    include "config.php";
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST["username"];
        $email = $_POST["email"];
        $pass = $_POST["password"];
        $role = $_POST["role"];
        $image = $_FILES['image'];
        $image_location = $_FILES['image']['tmp_name'];
        $image_name = $_FILES['image']['name'];
        $image_up = "images/" . $image_name;
        
        // Check for duplicate username, email, or password
        if ($role == "user") {
            $check_user = "SELECT * FROM teams WHERE t_name='$username' OR t_email='$email' OR t_password='$pass'";
        } else {
            $check_user = "SELECT * FROM admins WHERE name='$username' OR email='$email' OR password='$pass'";
        }
        
        $result = mysqli_query($con, $check_user);
        
        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('Username, email, or password already exists. Please choose a different one.');</script>";
        } else {
            $_SESSION["username"] = $username;
            $_SESSION["email"] = $email;
            $_SESSION["password"] = $pass;
            $_SESSION["image"] = $image_up;
            $_SESSION["role"]= $role;

            if($role == "user"){
                $sql = "INSERT INTO teams (t_name, t_email, t_password, t_image) VALUES ('$username','$email','$pass','$image_up')";
                mysqli_query($con, $sql);
                header("location: user.php");
            } else {
                $sql = "INSERT INTO admins (name, email, password) VALUES ('$username','$email','$pass')";
                mysqli_query($con, $sql);
                header("location: admin.php");
            }
        }
    }
    ?>
    <div class="register-form" role="form" aria-labelledby="register-heading">
        <h2 id="register-heading">Register</h2>
        <form action="#" method="post" aria-label="Registration Form" enctype="multipart/form-data">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required aria-required="true">

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required aria-required="true">

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Create a password" required aria-required="true">
            
            <label for="Image">Image</label>
            <input type="file" id="image" name="image">

            <label for="role">Role</label>
            <select id="role" name="role" required aria-required="true">
                <option value="" disabled selected>Select your role</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
