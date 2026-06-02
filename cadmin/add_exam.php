<?php
include("con.php");

session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: login.php");
    exit();
}

// Fetch faculty for dropdown
$faculty_result = mysqli_query($conn, "SELECT * FROM faculty");

// Add Exam Schedule
if (isset($_POST['add'])) {
    $course = $_POST['course'];
    $semester = $_POST['semester'];
    $subject = $_POST['subject'];
    $exam_date = $_POST['exam_date'];
    $exam_time = $_POST['exam_time'];
    $venue = $_POST['venue'];
    $supervisor_id = $_POST['supervisor_id'];

    $query = "INSERT INTO cexam_schedule (course, semester, subject, exam_date, exam_time, venue, supervisor_id) 
              VALUES ('$course', '$semester', '$subject', '$exam_date', '$exam_time', '$venue', '$supervisor_id')";
    mysqli_query($conn, $query);

    echo "<script>alert('Exam added successfully!'); window.location.href='manage_exam.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Exam Schedule</title>
    <style type="text/css">
    


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
<link rel="stylesheet" href="form.css">
<div class="form-container">
    <form method="POST" action="">
        <h1>Add Exam Schedule</h1>

        

    <form method="post">
        <fieldset>
            <legend>Exam Details</legend>

            <input type="text" name="course" placeholder="Course (BCA / BCom / BBA / MScIT)" required>
            <input type="number" name="semester" placeholder="Semester" required>
            <input type="text" name="subject" placeholder="Subject" required>
            <input type="date" name="exam_date" required>
            <input type="time" name="exam_time" required>
            <input type="text" name="venue" placeholder="Venue" required>

            <select name="supervisor_id" required>
                <option value="">Select Supervisor</option>
                <?php while ($faculty = mysqli_fetch_assoc($faculty_result)) : ?>
                    <option value="<?php echo $faculty['id']; ?>"><?php echo $faculty['name']; ?></option>
                <?php endwhile; ?>
            </select>
</fieldset>
            <button type="submit" name="add">Add Exam</button>
        
    </form>

    <!--a href="manage_exam.php">Go to Manage Exam Schedule</a-->

</body>
</html>
