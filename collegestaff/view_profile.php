<?php
session_start();
include("con.php");

if (!isset($_SESSION['faculty_id'])) {
    header("Location: faculty_login.php");
    exit();
}

$faculty_id = $_SESSION['faculty_id'];

$sql = "SELECT * FROM faculty_login WHERE id='$faculty_id'";
$result = $conn->query($sql);
$faculty = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .profile-container {
            width: 600px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .profile-img {
            display: block;
            margin: 0 auto 15px;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 3px solid #28a745;
        }
        .details-container {
            display: flex;
            justify-content: space-between;
            gap: 10px;
        }
        fieldset {
            border: 2px solid #28a745;
            border-radius: 10px;
            padding: 15px;
            width: 48%;
        }
        legend {
            font-size: 18px;
            font-weight: bold;
            color: #28a745;
            padding: 5px 10px;
        }
        p {
            font-size: 16px;
            margin: 5px 0;
            text-align: left;
        }
        .btn-container {
            margin-top: 15px;
            display: flex;
            justify-content: space-between;
        }
        .btn {
            display: inline-block;
            width: 48%;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            transition: 0.3s;
        }
        .btn-edit {
            background-color: #ffc107;
            color: black;
        }
        .btn-edit:hover {
            background-color: #e0a800;
        }
        .btn-back {
            background-color: #007bff;
            color: white;
        }
        .btn-back:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <h2>Faculty Profile</h2>
        <img src="image/<?php echo $faculty['image']; ?>" alt="Profile Picture" class="profile-img">
        
        <div class="details-container">
            <fieldset>
                <legend>Personal Details</legend>
                <p><strong>Name:</strong> <?php echo $faculty['name']; ?></p>
                <p><strong>Email:</strong> <?php echo $faculty['email']; ?></p>
                <p><strong>Phone:</strong> <?php echo $faculty['phone']; ?></p>
            </fieldset>

            <fieldset>
                <legend>Professional Details</legend>
                <p><strong>Qualification:</strong> <?php echo $faculty['qualification']; ?></p>
                <p><strong>Designation:</strong> <?php echo $faculty['designation']; ?></p>
                <p><strong>Experience:</strong> <?php echo $faculty['experience']; ?> years</p>
                <p><strong>Field:</strong> <?php echo $faculty['field']; ?></p>
            </fieldset>
        </div>

        <div class="btn-container">
            <a href="edit_profile.php" class="btn btn-edit">Edit Profile</a>
            <a href="dashboard.php" class="btn btn-back">Back</a>
        </div>
    </div>
</body>
</html>
