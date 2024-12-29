<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event List</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            margin: 50px 0 20px;
            font-size: 2.5em;
            color: #333;
        }

        .card-section {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
            gap: 30px;
        }

        .card {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            width: 280px;
            text-align: center;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .card-image {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .card-content {
            padding: 20px;
        }

        .card-content h3 {
            margin: 15px 0;
            font-size: 1.8em;
            color: #333;
        }

        .card-content p {
            font-size: 1em;
            color: #555;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .card {
                width: 100%;
            }

            h2 {
                font-size: 2em;
            }
        }
    </style>
</head>
<body>


    <section class="card-section">
        <?php
        include "config.php"; // Include your database configuration file

        // Fetch events from the database
        $sql = "SELECT * FROM events"; // Adjust your query as necessary
        $result = mysqli_query($con, $sql);

        // Check if there are results
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<form method="POST" action="' . htmlspecialchars($row['page']) . '.php">';
                echo '<div class="card" onclick="this.closest(\'form\').submit()">';
                echo '<img src="' . htmlspecialchars($row['image']) . '" alt="' . htmlspecialchars($row['name']) . '" class="card-image">';
                echo '<div class="card-content">';
                echo '<h3>' . htmlspecialchars($row['name']) . '</h3>'; // Display event name
                echo '<p>' . htmlspecialchars($row['desc']) . '</p>'; // Display event description
                echo '<input type="hidden" name="event_id" value="' . htmlspecialchars($row['id']) . '">'; // Store event ID for form submission
                echo '</div>';
                echo '</div>';
                echo '</form>';
            }
        } else {
            echo '<p>No events found.</p>';
        }

        // Close the database connection
        mysqli_close($con);
        ?>
    </section>

</body>
</html>
