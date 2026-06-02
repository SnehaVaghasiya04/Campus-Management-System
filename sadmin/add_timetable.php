<?php
include 'con.php';


session_start();
if (!isset($_SESSION['admin_name'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $teacher_id = $_POST['teacher_id'];
    $standard = $_POST['standard'];
    $day = $_POST['day'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $subject = $_POST['subject'];

    $query = "INSERT INTO class_timetables (teacher_id, standard, day, start_time, end_time, subject)
              VALUES ('$teacher_id', '$standard', '$day', '$start_time', '$end_time', '$subject')";
    
    if ($conn->query($query)) {
        echo "<p class='success-msg'>Timetable added successfully!</p>";
    } else {
        echo "<p class='error-msg'>Error: " . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Timetable</title>
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

        input, textarea , select {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
           
            font-size: 14px;
        }

         input, textarea {
            width: 97.5%;
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
        <h1>Add New Timetable</h1>

        <fieldset>
            <legend>Notice Details</legend>
     <div class="view-link">
            
        <form method="POST">
            <div class="form-group">
                <label>Teacher ID:</label>
                <input type="number" name="teacher_id" required>
            </div>

            <div class="form-group">
                <label>Standard:</label>
                <input type="text" name="standard" required>
            </div>

            <div class="form-group">
                <label>Day:</label>
                <select name="day" required>
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                    <option value="Sunday">Sunday</option>
                </select>
            </div>

            <div class="form-group">
                <label>Start Time:</label>
                <input type="time" name="start_time" required>
            </div>

            <div class="form-group">
                <label>End Time:</label>
                <input type="time" name="end_time" required>
            </div>

            <div class="form-group">
                <label>Subject:</label>
                <input type="text" name="subject" required>
            </div>
</fieldset>
            <button type="submit">Add Timetable</button>
        </form>

        <!-- View Timetable Link -->
       
    </div>
    
</body>
</html>
