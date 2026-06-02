<?php
session_start();
include 'con.php';

if (!isset($_SESSION['admin_username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['admin_username'];
$sql = "SELECT * FROM college_admin WHERE username='$username'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .profile-container {
            width: 400px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        fieldset {
            border: 2px solid #007bff;
            border-radius: 10px;
            padding: 20px;
        }
        legend {
            font-size: 20px;
            font-weight: bold;
            color: #007bff;
            padding: 5px 10px;
            border-radius: 5px;
        }
        .profile-info {
            text-align: left;
            margin-top: 10px;
        }
        .profile-info p {
            font-size: 16px;
            margin: 10px 0;
        }
        .profile-info i {
            color: #007bff;
            margin-right: 10px;
        }
        .btn {
            display: inline-block;
            margin-top: 15px;
            background: #007bff;
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 16px;
            transition: 0.3s;
        }
        .btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

    <div class="profile-container">
        <fieldset>
            <legend>Admin Profile</legend>
            <div class="profile-info">
                <p><i class="fas fa-user"></i> <strong>Username:</strong> <?php echo $row['username']; ?></p>
                <p><i class="fas fa-envelope"></i> <strong>Email:</strong> <?php echo $row['email']; ?></p>
            </div>
        </fieldset>
        <a href="dashboard.php" class="btn"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
    </div>

</body>
</html>
