<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grading System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f9;
        }
        .container {
            text-align: center;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 90%;
        }
        h1 {
            color: #333;
        }
        input[type="number"] {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .result {
            margin-top: 20px;
            font-size: 18px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Grading System</h1>
        <form method="post">
            <label for="grade">Enter the grade:</label><br>
            <input type="number" id="grade" name="grade" min="0" max="100" required><br>
            <input type="submit" value="Submit">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $grade = intval($_POST["grade"]);

            if ($grade < 0 || $grade > 100) {
                echo "<div class='result'>Error: Invalid grade. Please enter a grade between 0 and 100.</div>";
            } else {
                if ($grade >= 96 && $grade <= 100) {
                    $universityGrade = "1.00 (Excellent)";
                } elseif ($grade >= 94 && $grade <= 95) {
                    $universityGrade = "1.25 (Very Good)";
                } elseif ($grade >= 91 && $grade <= 93) {
                    $universityGrade = "1.50 (Very Good)";
                } elseif ($grade >= 88 && $grade <= 90) {
                    $universityGrade = "1.75 (Good)";
                } elseif ($grade >= 85 && $grade <= 87) {
                    $universityGrade = "2.00 (Good)";
                } elseif ($grade >= 83 && $grade <= 84) {
                    $universityGrade = "2.25 (Good)";
                } elseif ($grade >= 80 && $grade <= 82) {
                    $universityGrade = "2.50 (Fair)";
                } elseif ($grade >= 78 && $grade <= 79) {
                    $universityGrade = "2.75 (Fair)";
                } elseif ($grade >= 75 && $grade <= 77) {
                    $universityGrade = "3.00 (Pass)";
                } else {
                    $universityGrade = "5.00 (Fail)";
                }

                // Determine if it's a Fail or not
                if ($grade < 75) {
                    echo "<div class='result'>The grade is $grade, which is a Fail and converts to a university grade of $universityGrade.</div>";
                } else {
                    echo "<div class='result'>The grade is $grade, and the university grade is $universityGrade.</div>";
                }
            }
        }
        ?>
    </div>
</body>
</html>
