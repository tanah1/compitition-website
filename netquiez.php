<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Network Quiz</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            box-sizing: border-box;
        }

        .quiz-container {
            background-color: #fff;
            width: 100%;
            max-width: 800px;
            padding: 50px 40px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            text-align: left;
            margin: 20px auto;
            border-radius: 10px;
            border-top: 5px solid #007BFF;
        }

        h1 {
            font-size: 32px;
            color: #007BFF;
            margin-bottom: 10px;
            text-align: center;
        }

        h2 {
            font-size: 28px;
            color: #333;
            margin-bottom: 20px;
            font-weight: 600;
            text-align: center;
        }

        .quiz-item {
            margin-bottom: 20px; 
            padding: 10px; 
        }

        .quiz-item label {
            display: block;
            background-color: #e8f0fe;
            border: 1px solid #c8dafc;
            border-radius: 5px;
            padding: 15px;
            margin: 10px 0;
            transition: background-color 0.3s ease, border-color 0.3s ease;
            cursor: pointer;
        }

        .quiz-item label:hover {
            background-color: #d1e1fb;
            border-color: #9cbef7;
        }

        input[type="radio"]:checked + label {
            background-color: #a6c8f0;
            border-color: #007BFF;
            font-weight: bold;
            color: #0056b3;
        }

        button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 15px 30px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 18px;
            transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.2s ease;
            margin-top: 30px;
            width: 100%;
            box-shadow: 0 4px 8px rgba(0, 123, 255, 0.2);
        }

        button:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        button:active {
            background-color: #004085;
            transform: translateY(0);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        #result {
            display: none; 
            text-align: center; 
        }
    </style>
</head>
<body>
    <?php
    
    include "config.php";
    include "check.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['score'])) {
            $score = $_POST['score']; // Get the score from POST
            
            $pass = $_SESSION["password"]; 
            $score = intval($score); // Ensure score is an integer

            // Update query to fix SQL issue
            $query = "UPDATE `teams` SET `score` = $score, `solve` = 1 WHERE `t_password` = '$pass'";
            mysqli_query($con, $query);
        }
    }
    ?>

    <div class="quiz-container">
        <h1>Network Quiz!</h1>
        <h2>Please answer the following questions:</h2>
        <form id="quiz-form">
    <!-- Question 1 -->
    <div class="quiz-item">
        <h2>Question 1: What is the purpose of a subnet mask?</h2>
        <input type="radio" name="question1" id="q1-option1" value="To identify the network portion of an IP address">
        <label for="q1-option1">To identify the network portion of an IP address</label>
        <input type="radio" name="question1" id="q1-option2" value="To encrypt data for secure transmission">
        <label for="q1-option2">To encrypt data for secure transmission</label>
        <input type="radio" name="question1" id="q1-option3" value="To assign a unique address to each device on a network">
        <label for="q1-option3">To assign a unique address to each device on a network</label>
        <input type="radio" name="question1" id="q1-option4" value="To determine the best path for data transmission">
        <label for="q1-option4">To determine the best path for data transmission</label>
    </div>

    <!-- Question 2 -->
    <div class="quiz-item">
        <h2>Question 2: Which protocol is used to send data over the internet?</h2>
        <input type="radio" name="question2" id="q2-option1" value="TCP">
        <label for="q2-option1">TCP</label>
        <input type="radio" name="question2" id="q2-option2" value="FTP">
        <label for="q2-option2">FTP</label>
        <input type="radio" name="question2" id="q2-option3" value="SMTP">
        <label for="q2-option3">SMTP</label>
        <input type="radio" name="question2" id="q2-option4" value="SNMP">
        <label for="q2-option4">SNMP</label>
    </div>

    <!-- Question 3 -->
    <div class="quiz-item">
        <h2>Question 3: What does DHCP stand for?</h2>
        <input type="radio" name="question3" id="q3-option1" value="Dynamic Host Configuration Protocol">
        <label for="q3-option1">Dynamic Host Configuration Protocol</label>
        <input type="radio" name="question3" id="q3-option2" value="Data Host Control Protocol">
        <label for="q3-option2">Data Host Control Protocol</label>
        <input type="radio" name="question3" id="q3-option3" value="Domain Host Configuration Protocol">
        <label for="q3-option3">Domain Host Configuration Protocol</label>
        <input type="radio" name="question3" id="q3-option4" value="Digital Host Communication Protocol">
        <label for="q3-option4">Digital Host Communication Protocol</label>
    </div>

    <!-- Question 4 -->
    <div class="quiz-item">
        <h2>Question 4: What layer of the OSI model does the IP protocol operate at?</h2>
        <input type="radio" name="question4" id="q4-option1" value="Network layer">
        <label for="q4-option1">Network layer</label>
        <input type="radio" name="question4" id="q4-option2" value="Transport layer">
        <label for="q4-option2">Transport layer</label>
        <input type="radio" name="question4" id="q4-option3" value="Application layer">
        <label for="q4-option3">Application layer</label>
        <input type="radio" name="question4" id="q4-option4" value="Data link layer">
        <label for="q4-option4">Data link layer</label>
    </div>

    <!-- Question 5 -->
    <div class="quiz-item">
        <h2>Question 5: What is the main function of a firewall?</h2>
        <input type="radio" name="question5" id="q5-option1" value="To filter incoming and outgoing traffic">
        <label for="q5-option1">To filter incoming and outgoing traffic</label>
        <input type="radio" name="question5" id="q5-option2" value="To store user data">
        <label for="q5-option2">To store user data</label>
        <input type="radio" name="question5" id="q5-option3" value="To manage network addresses">
        <label for="q5-option3">To manage network addresses</label>
        <input type="radio" name="question5" id="q5-option4" value="To route data packets">
        <label for="q5-option4">To route data packets</label>
    </div>

    <button type="submit" name="solve">Submit Quiz</button>
</form>


        <!-- Result Section -->
        <div id="result">
            <h2>Your Score:</h2>
            <p id="score"></p>
            <button onclick="location.reload()">Take Quiz Again</button>
        </div>
    </div>

    <script>
        document.getElementById("quiz-form").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent the default form submission

            const correctAnswers = {
    question1: "To identify the network portion of an IP address",
    question2: "TCP",
    question3: "Dynamic Host Configuration Protocol",
    question4: "Network layer",
    question5: "To filter incoming and outgoing traffic"
};


            let score = 0; // Initialize score
            let isValid = true; // Validation flag

            // Check answers for each question
            for (const question in correctAnswers) {
                const selectedOption = document.querySelector(`input[name="${question}"]:checked`);

                // Reset background color for all questions
                const quizItem = document.querySelector(`.quiz-item:nth-of-type(${Object.keys(correctAnswers).indexOf(question) + 1})`);
                quizItem.style.backgroundColor = ""; // Reset to default

                if (selectedOption) {
                    // Check if answer is correct
                    if (selectedOption.value === correctAnswers[question]) {
                        score++; // Increment score if answer is correct
                    }
                } else {
                    // Highlight unanswered questions in light red
                    quizItem.style.backgroundColor = "#f8d7da"; // Light red background
                    isValid = false; // Mark as invalid
                }
            }

            if (!isValid) {
                alert("Please answer all questions before submitting!"); // Alert user if there are unanswered questions
                return; // Stop submission
            }

            // Hide the quiz and show the result
            document.getElementById("quiz-form").style.display = "none"; // Hide the quiz
            document.getElementById("result").style.display = "block"; // Show result section
            document.getElementById("score").textContent = `${score} out of ${Object.keys(correctAnswers).length}`; // Display score

            // Send score to the server via AJAX
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "netquiez.php", true); // Adjust the URL to your PHP script
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    console.log(xhr.responseText); // Handle the response from the server (optional)
                }
            };
            xhr.send(`score=${encodeURIComponent(score)}`); // Send the score to the server properly
        });
    </script>
</body>
</html>
