<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .container {
            max-width: 1200px;
            padding: 50px 20px;
            margin: auto;
        }

        h2 {
            text-align: center;
            color: #007BFF;
            margin-bottom: 30px;
            font-weight: 600;
        }

        .about-content {
            text-align: center;
            color: #555;
            margin-bottom: 40px;
            font-size: 1.1em;
            line-height: 1.7;
        }

        .team-section {
            text-align: center;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 30px;
        }

        .team-member {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
            padding: 20px;
            max-width: 300px;
            text-align: center;
        }

        .team-member:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        }

        .team-image {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 15px;
            object-fit: cover;
        }

        .team-member h3 {
            font-size: 1.5em;
            margin-bottom: 10px;
            color: #007BFF;
        }

        .team-member p {
            color: #666;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .team-section {
                flex-direction: column;
            }

            .team-member {
                max-width: 100%;
            }
        }
    </style>
</head>

<body>
    <?php include "nav.php"; ?>

    <div class="container">
        <h2>About Us</h2>
        <div class="about-content">
            <p>Welcome to our admin dashboard for managing teams and events! Our platform helps administrators organize events and keep track of the performance of various teams in real-time.</p>
            <p>Our mission is to create an intuitive and efficient system that makes event management a seamless experience. Whether you are adding new events or managing team scores, we’ve got you covered.</p>
        </div>

        <h2>Meet the Team</h2>
        <div class="team-section">
            <div class="team-member">
                <img src="images/member1.jpg" alt="Team Member 1" class="team-image">
                <h3>Mohamed Ibrahim</h3>
                <p>Web Developer</p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
