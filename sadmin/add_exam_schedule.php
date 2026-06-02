<?php
include 'con.php';


session_start();
if (!isset($_SESSION['admin_name'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}


// Fetch all staff members for the dropdown
$staffs = mysqli_query($conn, "SELECT * FROM staff");

// Handle form submission
if (isset($_POST['add_exam'])) {
    $exam_name = $_POST['exam_name'];
    $subject = $_POST['subject'];
    $class = $_POST['class'];
    $exam_date = $_POST['exam_date'];
    $exam_time = $_POST['exam_time'];
    $staff_id = $_POST['staff_id']; // Assign teacher

    $sql = "INSERT INTO exam_schedule (exam_name, subject, class, exam_date, exam_time, staff_id) 
            VALUES ('$exam_name', '$subject', '$class', '$exam_date', '$exam_time', '$staff_id')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Exam added successfully!');</script>";
    } else {
        echo "<script>alert('Error adding exam!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Exam Schedule</title>
    <style>
        /* General Styles */
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


         input, textarea  {
            width: 97%;
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
        <h1>Add Exam Schedule</h1>

        <fieldset>
            <legend>Exam  Details</legend>
       

        <form method="POST">
            <div class="form-group">
                <label for="exam_name">Exam Name:</label>
                <input type="text" id="exam_name" name="exam_name" placeholder="Enter Exam Name" required>
            </div>

            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" id="subject" name="subject" placeholder="Enter Subject" required>
            </div>

            <div class="form-group">
                <label for="class">Class:</label>
                <select id="class" name="class" required>
                    <option value="">Select Class</option>
                    <option value="Pre-Primary">Pre-Primary</option>
                    <?php for ($i = 1; $i <= 10; $i++) echo "<option value='Grade $i'>Grade $i</option>"; ?>
                    <option value="11 Arts">11 Arts</option>
                    <option value="11 Commerce">11 Commerce</option>
                    <option value="11 Science">11 Science</option>
                    <option value="12 Arts">12 Arts</option>
                    <option value="12 Commerce">12 Commerce</option>
                    <option value="12 Science">12 Science</option>
                </select>
            </div>

            <div class="form-group">
                <label for="exam_date">Exam Date:</label>
                <input type="date" id="exam_date" name="exam_date" required>
            </div>

            <div class="form-group">
                <label for="exam_time">Exam Time:</label>
                <input type="time" id="exam_time" name="exam_time" required>
            </div>

            <div class="form-group">
                <label for="staff_id">Assign Teacher:</label>
                <select id="staff_id" name="staff_id" required>
                    <option value="">Select Teacher</option>
                    <?php while ($staff = mysqli_fetch_assoc($staffs)) { ?>
                        <option value="<?= $staff['id']; ?>"><?= $staff['name']; ?> (<?= $staff['role']; ?>)</option>
                    <?php } ?>
                </select>
            </div>

            <button type="submit" name="add_exam" class="btn">Add Exam</button>
        </form>

        
    </div>

</body>
</html>
