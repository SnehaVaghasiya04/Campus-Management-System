<?php
include 'con.php';


session_start();
if (!isset($_SESSION['admin_name'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $teacher_name = $_POST['teacher_name'];
    $subject_name = $_POST['subject_name'];
    $duration = $_POST['duration'];
    $section = $_POST['section'];

    $sql = "INSERT INTO courses (teacher_name, subject_name, duration, section) 
            VALUES ('$teacher_name', '$subject_name', '$duration', '$section')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<p class='success-msg'>Course added successfully!</p>";
    } else {
        echo "<p class='error-msg'>Error: " . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Course</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .form-container {
            width: 75%;
            background: white;
            padding: 25px;
            margin: 50px auto;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin-top: 90px;
            margin-left: 260px;
        }

        h1 {
            color: #d35400;
            font-size: 22px;
            text-align: center;
        }

        fieldset {
            border: 1px solid #ccc;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        legend {
            font-size: 18px;
            font-weight: bold;
            color: #6c5ce7;
        }

        label {
            font-size: 14px;
            color: #555;
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }

        input, textarea, select {
            width:100%;
            padding: 12px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
           
            font-size: 14px;
        }

         input, textarea {
            width:97%;
            padding: 12px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
           
            font-size: 14px;
        }

        textarea {
            height: 100px;
            resize: none;
        }

        button {
            width: 100%;
            background: #6c5ce7;
            color: white;
            padding: 12px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-transform: uppercase;
            font-weight: bold;
        }

        button:hover {
            background: #4834d4;
        }
    </style>
</head>
<body>
    <?php include_once('include/side.php'); ?>
  <div class="form-container">
    <form method="POST" action="">
        <h1>Add New Course</h1>

        <fieldset>
            <legend>Course Details</legend>
       
       
            <div class="form-group">
                <label>Teacher Name:</label>
                <input type="text" name="teacher_name" required>
            </div>

            <div class="form-group">
                <label>Subject Name:</label>
                <input type="text" name="subject_name" required>
            </div>

            <div class="form-group">
                <label>Duration:</label>
                <input type="text" name="duration" required>
            </div>

            <div class="form-group">
                <label>Section:</label>
                <select name="section" required>
                    <option value="Pre-Primary">Pre-Primary</option>
                    <option value="Primary">Primary</option>
                    <option value="Upper Primary">Upper Primary</option>
                    <option value="Secondary">Secondary</option>
                    <option value="Higher Secondary Science">Higher Secondary Science</option>
                    <option value="Higher Secondary Commerce">Higher Secondary Commerce</option>
                    <option value="Higher Secondary Arts">Higher Secondary Arts</option>
                </select>
            </div>
</fieldset>
            <button type="submit">Add Course</button>
        </form>

        </div>

    </div>
</body>
</html>
