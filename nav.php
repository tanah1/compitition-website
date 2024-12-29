<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Improved Fixed Navbar with Logo</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        /* General styles */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding-top: 70px; /* Prevent content from hiding under the navbar */
        }

        .navbar {
            background-color: #007BFF;
            color: white;
            padding: 15px 100px; /* Adjusted padding */
            position: fixed;
            top: 0;
            width: 100%;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .navbar .logo {
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .navbar ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .navbar li {
            margin-left: 20px; 
        }

        .navbar a {
            color: white;
            text-decoration: none;
            font-weight: 600;
            padding: 8px 15px; /* Increased padding for better touch target */
            transition: background-color 0.3s ease;
        }

        .navbar a:hover {
            background-color: rgba(255, 255, 255, 0.2); /* Subtle hover effect */
            border-radius: 5px; /* Rounded edges on hover */
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .navbar {
                padding: 10px 20px; /* Reduce padding on smaller screens */
            }

            .navbar ul {
                flex-direction: column; /* Stack the menu items vertically */
                align-items: flex-start;
                background-color: #007BFF;
                position: absolute;
                top: 60px;
                right: 0;
                width: 100%;
                display: none; /* Hidden by default on mobile */
            }

            .navbar ul.active {
                display: flex; /* Show the menu when toggled */
            }

            .navbar li {
                margin: 10px 0; /* Space between vertically stacked items */
            }

            .navbar .menu-toggle {
                display: block; /* Show menu toggle button on mobile */
                cursor: pointer;
                font-size: 24px;
            }
        }

        .menu-toggle {
            display: none; /* Hidden by default, shown on smaller screens */
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <div class="logo">Competition</div>
        <div class="menu-toggle" onclick="toggleMenu()">&#9776;</div> <!-- Menu icon for mobile -->
        <ul id="navMenu">
            <li><a href="main.php" aria-label="Home">Home</a></li>
            <li><a href="about.php" aria-label="About">About</a></li>
            <li><a href="admin.php" aria-label="Admin">Admin</a></li>
            <li><a href="user.php" aria-label="User">User</a></li>
            <li><a href="login.php"  aria-label="Login">Login</a></li> <!-- Login link -->
            <li><a href="logout.php" style="margin-right: 120px; background-color:red;" aria-label="Login">Logout</a></li> <!-- Login link -->
        </ul>
    </nav>

    <script>
        function toggleMenu() {
            var menu = document.getElementById('navMenu');
            menu.classList.toggle('active');
        }
    </script>

</body>

</html>
