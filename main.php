<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            line-height: 1.6;
        }

        /* Navbar Styles */
        nav {
            position: fixed;
            top: 0;
            width: 100%;
            background-color: #007BFF;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 30px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        nav .logo {
            font-size: 1.5rem;
            font-weight: 600;
            text-transform: uppercase;
            color: white;
            text-decoration: none;
        }

        nav ul {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            margin-left: 20px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        nav ul li a:hover {
            color: #d3d3d3;
        }

        /* Main content padding to avoid overlap with navbar */
        main {
            padding: 100px 20px; /* Adjust padding to avoid overlap with fixed navbar */
            text-align: center;
        }

        /* Typography */
        h2 {
            color: #007BFF;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        /* Card Section Styles */
        .card-section {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 50px 20px;
        }

        .card {
            background-color: #fff;
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .card-image {
            width: 100%;
            height: auto;
        }

        .card-content {
            padding: 20px;
        }

        .card-content h3 {
            margin: 10px 0;
            font-size: 1.5rem;
            color: #333;
        }

        .card-content p {
            font-size: 1rem;
            color: #666;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .card {
                width: 90%;
            }

            nav ul {
                flex-direction: column;
                align-items: flex-start;
            }

            nav ul li {
                margin-left: 0;
                margin-top: 10px;
            }
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <?php include "nav.php"; ?>

    <main>
        <h2 style="color:  #007BFF;">All Events in Our Compitition</h2>
        <section class="card-section">
            <?php include "card.php"; ?>
        </section>
    </main>

</body>

</html>
