<?php
session_start();
include 'con.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['admin'];
$query = "SELECT * FROM admin WHERE username='$username'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
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
        }
        .profile-container {
            width: 400px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        fieldset {
            border: 2px solid #4CAF50;
            border-radius: 10px;
            padding: 20px;
        }
        legend {
            font-size: 20px;
            font-weight: bold;
            color: #4CAF50;
            padding: 5px 10px;
        }
        p {
            font-size: 16px;
            margin: 10px 0;
        }
        .btn {
            display: inline-block;
            text-decoration: none;
            color: white;
            background: #4CAF50;
            padding: 10px 15px;
            border-radius: 5px;
            transition: 0.3s;
        }
        .btn:hover {
            background: #45a049;
        }
        .btn-back {
            background: #007BFF;
        }
        .btn-back:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <fieldset>
            <legend>Profile Details</legend>
            <p><strong>Name:</strong> <?php echo htmlspecialchars($row['name']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($row['email']); ?></p>
        </fieldset>
        
        <br>
        <a href="edit_profile.php" class="btn">Edit Profile</a>
        <a href="dashboard.php" class="btn btn-back">Back to Dashboard</a>
    </div>
</body>
</html>
