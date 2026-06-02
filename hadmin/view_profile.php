<?php
session_start();
include 'con.php';

if (!isset($_SESSION['admin_name'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['admin_name'];
$sql = "SELECT * FROM hostel_admin WHERE username='$username'";
$result = $conn->query($sql);
$admin = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 400px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        fieldset {
            border: 2px solid #000d6b;
            border-radius: 10px;
            padding: 20px;
        }
        legend {
            font-size: 18px;
            font-weight: bold;
            color: #000d6b;
            padding: 5px 10px;
            border: 2px solid #000d6b;
            border-radius: 5px;
            background: #fff;
        }
        .profile-item {
            font-size: 16px;
            color: #333;
            margin: 10px 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .profile-item i {
            color: #000d6b;
            margin-right: 10px;
            font-size: 18px;
        }
        .btn {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 15px;
            background: #000d6b;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        .btn:hover {
            background: #001f8d;
        }
        .btn-back {
            background: #555;
        }
        .btn-back:hover {
            background: #333;
        }
    </style>
</head>
<body>

    <div class="container">
        <fieldset>
            <legend><i class="fas fa-user"></i> Your Profile</legend>
            <div class="profile-item">
                <i class="fas fa-user"></i> <strong>Username:</strong> <?php echo $admin['username']; ?>
            </div>
            <div class="profile-item">
                <i class="fas fa-envelope"></i> <strong>Email:</strong> <?php echo $admin['email']; ?>
            </div>
            <a href="edit_profile.php" class="btn"><i class="fas fa-edit"></i> Edit Profile</a>
            <a href="dashboard.php" class="btn btn-back"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
        </fieldset>
    </div>

</body>
</html>
