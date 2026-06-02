<?php
session_start();
include "con.php";

if (!isset($_SESSION['staff_id'])) {
    header("Location: login.php");
    exit();
}

$id = $_SESSION['staff_id'];
$query = "SELECT * FROM staff_login WHERE id='$id'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .profile-container {
            width: 400px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        fieldset {
            border: 2px solid #007bff;
            border-radius: 8px;
            padding: 15px;
        }
        legend {
            font-weight: bold;
            color: #007bff;
            padding: 5px 10px;
        }
        .profile-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            border: 3px solid #007bff;
            margin-bottom: 15px;
        }
        p {
            font-size: 16px;
            margin: 8px 0;
        }
        .btn {
            display: inline-block;
            margin: 10px;
            padding: 10px 15px;
            text-decoration: none;
            color: #fff;
            background: #007bff;
            border-radius: 5px;
        }
        .btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<div class="profile-container">
    <h2>Staff Profile</h2>
    <img class="profile-img" src="<?php echo $row['image'] ? 'image/'.$row['image'] : 'default.png'; ?>" alt="Profile Image">

    <fieldset>
        <legend>Profile Information</legend>
        <p><strong>Name:</strong> <?php echo $row['name']; ?></p>
        <p><strong>Email:</strong> <?php echo $row['email']; ?></p>
        <p><strong>Contact:</strong> <?php echo $row['contact']; ?></p>
        <p><strong>Qualification:</strong> <?php echo $row['qualification']; ?></p>
        <p><strong>Role:</strong> <?php echo $row['role']; ?></p>
    </fieldset>

    <a href="edit_profile.php" class="btn">Edit Profile</a>
    <a href="dashboard.php" class="btn">Back to Dashboard</a>
</div>

</body>
</html>
