<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
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

        .login-form {
            max-width: 400px;
            width: 100%;
            margin: 20px; /* Added margin for better spacing */
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .login-form h2 {
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        .login-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #555;
        }

        .login-form input[type="text"],
        .login-form input[type="password"],
        .login-form input[type="email"],
        .login-form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px; /* Consistent font size */
            transition: border-color 0.2s; /* Added transition for input fields */
        }

        .login-form input[type="text"]:focus,
        .login-form input[type="password"]:focus,
        .login-form select:focus {
            border-color: #007BFF; /* Change border color on focus */
            outline: none; /* Remove default outline */
        }

        .login-form button {
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

        .login-form button:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .login-form {
                width: 90%; /* Ensure it is responsive on small screens */
            }
        }
    </style>
</head>
<body>
    <?php 
    
    include "config.php";
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $role = $_POST["role"];
        
    
        if($role == "admin"){
            $sql = "SELECT COUNT(*) AS userCount FROM admins WHERE email = ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("s", $email);  
            $stmt->execute();
            $stmt->bind_result($userCount);
            $stmt->fetch();

            // Use if condition to check user existence
            if ($userCount == 1) {
                $_SESSION["username"] = $username;
                $_SESSION["email"] = $email;
                $_SESSION["password"] = $password;
                $_SESSION["role"] = $role;
                header("location: admin.php");
            } else {
                header("location: notfound.php");

            }
            // Close the statement and connection
        }else{
            $sql = "SELECT COUNT(*) AS userCount FROM teams WHERE t_email = ?";

            $stmt = $con->prepare($sql);
            $stmt->bind_param("s", $email);  // Bind the email parameter
            
            $stmt->execute();
            $stmt->bind_result($userCount);
            $stmt->fetch();

            // Use if condition to check user existence
            if ($userCount == 1) {
                $_SESSION["username"] = $username;
                $_SESSION["email"] = $email;
                $_SESSION["password"] = $password;
                $_SESSION["role"] = $role;
                header("location: user.php");
            } else {
                header("location: notfound.php");
            }
        }
        
        $stmt->close();
        $con->close();
        }
    
    ?>
    <div class="login-form" role="form" aria-labelledby="login-heading">
        <h2 id="login-heading">Login</h2>
        <form action="#" method="post" aria-label="Login Form">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required aria-required="true">
            <label for="email">Email</label>
            <input type="email" id="password" name="email" placeholder="Enter your Email" required aria-required="true">

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required aria-required="true">

            <label for="role">Role</label>
            <select id="role" name="role" required aria-required="true">
                <option value="" disabled selected>Select your role</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
            <a style="margin-bottom: 20px;" href="register.php">Create new Account</a>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
