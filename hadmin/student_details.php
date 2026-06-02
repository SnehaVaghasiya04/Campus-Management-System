<?php
include 'con.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM hostel_student WHERE id=$id");
$row = mysqli_fetch_assoc($result);
?>
<?php include('include/side.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        h2 {
            text-align: center;
            color: #007bff;
            padding: 20px 0;
        }
        .container {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 90px;
        }
        fieldset {
            border: 2px solid #007bff;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        legend {
            font-weight: bold;
            color: #007bff;
        }
        label {
            font-weight: bold;
            margin-bottom: 10px;
            display: inline-block;
        }
        .detail {
            margin: 10px 0;
        }
        .detail span {
            font-weight: bold;
            color: #007bff;
        }
        .button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .message {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Student Details</h2>

    <fieldset>
        <legend>Student Information</legend>
        <div class="detail"><span>Name:</span> <?= $row['name'] ?></div>
        <div class="detail"><span>School/College:</span> <?= $row['school_college'] ?></div>
        <div class="detail"><span>Class:</span> <?= $row['class'] ?></div>
        <div class="detail"><span>Room Type:</span> <?= $row['room_type'] ?></div>
        <div class="detail"><span>Contact:</span> <?= $row['contact'] ?></div>
        <div class="detail"><span>Guardian Name:</span> <?= $row['guardian_name'] ?></div>
        <div class="detail"><span>Guardian Contact:</span> <?= $row['guardian_contact'] ?></div>
    </fieldset>

    <a href="update_student.php?id=<?= $row['id'] ?>" class="button">Edit Details</a>
    <a href="delete_student.php?id=<?= $row['id'] ?>" class="button" style="background-color: #dc3545; text-decoration: none;">Delete Student</a>
</div>

</body>
</html>
