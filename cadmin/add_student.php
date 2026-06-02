<?php
include 'con.php';

session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: login.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_id = "STU" . rand(1000, 9999);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];
    $semester = $_POST['semester'];
    $dob = $_POST['dob'];

    $query = "INSERT INTO cstudents (student_id, name, email, phone, course, semester, dob, status) 
              VALUES ('$student_id', '$name', '$email', '$phone', '$course', '$semester', '$dob', 'Approved')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Student Added Successfully!'); window.location.href='manage_student.php';</script>";
    } else {
        echo "<script>alert('Error adding student!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>

    
       
</head>
<body>

<?php include_once('include/side.php'); ?>
<link rel="stylesheet" href="form.css">


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
<div class="form-container">
    <form method="POST" action="">
        <h1>Add New Students</h1>

       

    
        <fieldset>
            <legend>Student Details</legend>

            <label>Full Name:</label>
            <input type="text" name="name" placeholder="Enter full name" required>

            <label>Email Address:</label>
            <input type="email" name="email" placeholder="Enter email address" required>

            <label>Phone Number:</label>
            <input type="text" name="phone" placeholder="Enter phone number" required>

            <label>Course:</label>
            <input type="text" name="course" placeholder="Enter course name" required>

            <label>Semester:</label>
            <input type="number" name="semester" min="1" placeholder="Enter semester number" required>

            <label>Date of Birth:</label>
            <input type="date" name="dob" required>

        </fieldset>

        <button type="submit" class="submit-btn">Add Student</button>
    </form>

</div>

</body>
</html>
