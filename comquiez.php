<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programming Quiz</title>
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
    <h1>Communication Quiz!</h1>
    <h2>Please answer the following questions:</h2>
    <form id="quiz-form">
        

        <!-- Question 4 -->
        <div class="quiz-item">
            <h2>Question 1: What does "feedback" refer to in the communication process?</h2>
            <input type="radio" name="question4" id="q4-option1" value="The sender's message">
            <label for="q4-option1">The sender's message</label>
            <input type="radio" name="question4" id="q4-option2" value="The receiver's response to the message">
            <label for="q4-option2">The receiver's response to the message</label>
            <input type="radio" name="question4" id="q4-option3" value="The medium used for communication">
            <label for="q4-option3">The medium used for communication</label>
        </div>

        <!-- Question 5 -->
        <div class="quiz-item">
            <h2>Question 2: What is a barrier to effective communication?</h2>
            <input type="radio" name="question5" id="q5-option1" value="Clear messages">
            <label for="q5-option1">Clear messages</label>
            <input type="radio" name="question5" id="q5-option2" value="Language differences">
            <label for="q5-option2">Language differences</label>
            <input type="radio" name="question5" id="q5-option3" value="Active listening">
            <label for="q5-option3">Active listening</label>
        </div>

        <!-- Question 6 -->
        <div class="quiz-item">
            <h2>Question 3: What is nonverbal communication?</h2>
            <input type="radio" name="question6" id="q6-option1" value="Communication through words only">
            <label for="q6-option1">Communication through words only</label>
            <input type="radio" name="question6" id="q6-option2" value="Communication through body language, gestures, and facial expressions">
            <label for="q6-option2">Communication through body language, gestures, and facial expressions</label>
            <input type="radio" name="question6" id="q6-option3" value="Communication through written text only">
            <label for="q6-option3">Communication through written text only</label>
        </div>

        <!-- Question 7 -->
        <div class="quiz-item">
            <h2>Question 4: Which of the following is an example of a formal communication channel?</h2>
            <input type="radio" name="question7" id="q7-option1" value="Casual conversations between friends">
            <label for="q7-option1">Casual conversations between friends</label>
            <input type="radio" name="question7" id="q7-option2" value="Company-wide emails and memos">
            <label for="q7-option2">Company-wide emails and memos</label>
            <input type="radio" name="question7" id="q7-option3" value="Social media interactions">
            <label for="q7-option3">Social media interactions</label>
        </div>

        <!-- Question 8 -->
        <div class="quiz-item">
            <h2>Question 5: What is active listening?</h2>
            <input type="radio" name="question8" id="q8-option1" value="Hearing the words spoken without understanding">
            <label for="q8-option1">Hearing the words spoken without understanding</label>
            <input type="radio" name="question8" id="q8-option2" value="Listening attentively and responding appropriately">
            <label for="q8-option2">Listening attentively and responding appropriately</label>
            <input type="radio" name="question8" id="q8-option3" value="Ignoring the speaker and thinking about your own response">
            <label for="q8-option3">Ignoring the speaker and thinking about your own response</label>
        </div>

        <button type="submit" name="solve">Submit Quiz</button>
    </form>

    <!-- Result Section -->
    <div id="result" style="display: none;">
        <h2>Your Score:</h2>
        <p id="score"></p>
        <button onclick="location.reload()">Take Quiz Again</button>
    </div>
</div>

<script>
    document.getElementById("quiz-form").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent the default form submission

        const correctAnswers = {

            question4: "The receiver's response to the message", // Correct answer for Question 4
            question5: "Language differences", // Correct answer for Question 5
            question6: "Communication through body language, gestures, and facial expressions", // Correct answer for Question 6
            question7: "Company-wide emails and memos", // Correct answer for Question 7
            question8: "Listening attentively and responding appropriately" // Correct answer for Question 8
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
        xhr.open("POST", "comquiez.php", true); // Adjust the URL to your PHP script
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
