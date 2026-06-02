<?php
include("con.php");

session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $duration = $_POST['duration'];
    $semester = $_POST['semester'];

    $query = "INSERT INTO Ccourses (name, description, duration, semester) VALUES ('$name', '$description', '$duration', '$semester')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Course added successfully!'); window.location.href='manage_courses.php';</script>";
    } else {
        echo "<script>alert('Error adding course!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Course</title>
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
    
</head>
<body>
    <?php include_once('include/side.php'); ?>

    

   

        <div class="form-container">
    <form method="POST" action="">
        <h1>Add New Course</h1>

        
        <fieldset>
            <legend>Course Details</legend>
            <input type="text" name="name" placeholder="Course Name" required>
            <input type="text" name="description" placeholder="Description" required>
            <input type="text" name="duration" placeholder="Duration" required>
            <input type="number" name="semester" placeholder="Semester" required>
            </fieldset>
            <button type="submit" name="add">Add Course</button>
        
    </form>

   

</body>
</html>
