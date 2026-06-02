<?php
session_start();
if (!isset($_SESSION['admin_name'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Profile</title>
    <!-- Font Awesome CDN -->
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
            height: 100vh;
            justify-content: center;
            align-items: center;
            background: #f5f5f5;
        }
        .profile-container {
            width: 500px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
            text-align: center;
        }
        fieldset {
            border: 2px solid #000d6b;
            border-radius: 8px;
            padding: 20px;
            text-align: left;
            margin-top: 10px;
        }
        legend {
            font-size: 18px;
            font-weight: bold;
            color: #000d6b;
            padding: 5px 10px;
        }
        .profile-icon {
            font-size: 50px;
            color: #000d6b;
        }
        .profile-details {
            margin-top: 10px;
            font-size: 16px;
            color: #333;
        }
        .profile-actions {
            margin-top: 15px;
        }
        .profile-actions a {
            text-decoration: none;
            color: white;
            background: #000d6b;
            padding: 8px 15px;
            border-radius: 5px;
            margin: 5px;
            display: inline-block;
            font-size: 14px;
        }
        .profile-actions a:hover {
            background: #001f8d;
        }
        .profile-actions i {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="profile-container">
        <div class="profile-icon">
            <i class="fas fa-user-circle"></i>
        </div>
        <fieldset>
            <legend>Admin Profile</legend>
            <div class="profile-details">
                <p><b>Name:</b> <?php echo $_SESSION['admin_name']; ?></p>
                <p><b>Email:</b> <?php echo $_SESSION['admin_email']; ?></p>
            </div>
        </fieldset>
        <div class="profile-actions">
            <a href="edit_profile.php"><i class="fas fa-edit"></i> Edit Profile</a>
            <a href="dashboard.php"><i class="fas fa-home"></i> Back to Dashboard</a>
        </div>
    </div>
</body>
</html>
