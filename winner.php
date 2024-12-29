<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winners of the Competition</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        /* Main Section */
        main {
            padding: 100px 20px 50px;
            text-align: center;
            margin-top: 50px; /* Adjust to avoid overlap with navbar */
        }

        h2 {
            color: #007BFF;
            font-size: 2.5rem;
            margin-bottom: 20px;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 1px;
        }

        h3 {
            margin-top: 30px;
            font-size: 2rem;
            color: #333;
            text-transform: uppercase;
            border-bottom: 2px solid #007BFF;
            padding-bottom: 10px;
            display: inline-block; /* Makes the border only as wide as the text */
        }

        .winner-section {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 30px 0;
            background-color: #ffffff; /* Added background for the winner section */
            border-radius: 10px; /* Rounded corners for the section */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1); /* Soft shadow */
            margin-bottom: 40px; /* Spacing below the winner section */
        }

        .winner-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 280px;
            text-align: center;
            padding: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
            position: relative;
            overflow: hidden; /* Added for better visual effect */
        }

        .winner-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .winner-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 15px;
            object-fit: cover;
            border: 3px solid #007BFF; /* Added border for emphasis */
        }

        .winner-card h3 {
            margin: 10px 0;
            font-size: 1.6rem;
            color: #333;
        }

        .winner-card p {
            font-size: 1rem;
            color: #666;
            margin-bottom: 10px;
        }

        .position {
            font-size: 1.2rem;
            font-weight: bold;
            color: #007BFF;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .winner-card {
                width: 90%;
            }

            h2 {
                font-size: 2rem;
            }

            h3 {
                font-size: 1.5rem;
            }
        }

        /* Custom list style for teams */
        .un-solved-teams {
            list-style: none; /* Remove default list styling */
            padding: 0; /* Remove padding */
            margin-top: 20px; /* Add some spacing above the list */
            text-align: left; /* Align text to the left */
        }

        .un-solved-teams li {
            background-color:#007BFF;
            color: white; /* Light background for list items */
            padding: 10px; /* Padding for list items */
            margin: 5px 0; /* Margin between list items */
            border-radius: 5px; /* Rounded corners for list items */
            transition: background-color 0.3s; /* Smooth transition for hover */
        }

        .un-solved-teams li:hover {
            background-color:#007Bdd; /* Darker background on hover */
        }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <?php include "nav.php"; 
    include "config.php"; 
    ?>

    <main>
        <h2>Winners of the Competition</h2>
        <section class="winner-section">
            <?php
            // Query to get the top 3 scores of teams that have solved
            $sql_top_scores = "SELECT t_name, score FROM `teams` WHERE `solve` = 1 ORDER BY score DESC LIMIT 3";
            $result_top_scores = mysqli_query($con, $sql_top_scores);

            // Check if there are results
            if (mysqli_num_rows($result_top_scores) > 0) {
                $position = 1; // Starting position
                while ($row = mysqli_fetch_assoc($result_top_scores)) {
                    // Display each winner card
                    echo '<div class="winner-card">';
                    echo '<img src="winner' . $position . '.jpg" alt="Winner ' . $position . '" class="winner-image">'; // Assuming you have winner images named winner1.jpg, winner2.jpg, etc.
                    echo '<h3>' . htmlspecialchars($row['t_name']) . '</h3>'; // Team name
                    echo '<p class="position">' . $position . 'st Place</p>'; // Position
                    echo '<p>Score: ' . htmlspecialchars($row['score']) . '</p>'; // Team score
                    echo '</div>';
                    $position++; // Increment position
                }
            } else {
                echo "<p>No teams have solved the competition.</p>";
            }
            ?>
        </section>

        <!-- Display teams that have not solved -->
        <h3>Teams that have not solved:</h3>
        <?php
        // Query to get teams that have not solved
        $sql_unsolved = "SELECT t_name FROM `teams` WHERE `solve` = 0";
        $result_unsolved = mysqli_query($con, $sql_unsolved);

        if (mysqli_num_rows($result_unsolved) > 0) {
            echo "<ul class ='un-solved-teams'>";

            while ($row = mysqli_fetch_assoc($result_unsolved)) {
                echo "<li>" . htmlspecialchars($row['t_name']) . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No teams have not solved.</p>";
        }

        // Query to get teams that have solved
        $sql_solved = "SELECT t_name FROM `teams` WHERE `solve` = 1";
        $result_solved = mysqli_query($con, $sql_solved);

        // Display teams that have solved
        echo "<h3>Teams that have solved:</h3>";
        if (mysqli_num_rows($result_solved) > 0) {
            echo "<ul class='un-solved-teams'>";
            while ($row = mysqli_fetch_assoc($result_solved)) {
                echo "<li>" . htmlspecialchars($row['t_name']) . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No teams have solved.</p>";
        }
        ?>
    </main>

</body>

</html>
