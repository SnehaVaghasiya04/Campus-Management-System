<?php
session_start();
include 'con.php'; // Ensure database connection

if (!isset($_SESSION['admin_name'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $current_password = mysqli_real_escape_string($conn, $_POST['current_password']);
    $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    $admin_name = $_SESSION['admin_name'];

    // Fetch the current password from the database
    $query = "SELECT password FROM school_admin WHERE username='$admin_name'";
    $result = mysqli_query($conn, $query);
    
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $stored_password = $row['password']; 

        // Check if the stored password is hashed
        if (password_verify($current_password, $stored_password) || $current_password === $stored_password) {
            if ($new_password === $confirm_password) {
                $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
                $update_query = "UPDATE school_admin SET password='$hashed_password' WHERE username='$admin_name'";
                if (mysqli_query($conn, $update_query)) {
                    echo "<script>alert('Password changed successfully!'); window.location='profile.php';</script>";
                } else {
                    echo "<script>alert('Error updating password.');</script>";
                }
            } else {
                echo "<script>alert('New passwords do not match!');</script>";
            }
        } else {
            echo "<script>alert('Current password is incorrect!');</script>";
        }
    } else {
        echo "<script>alert('User not found!');</script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Change Password</title>
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
            background: #f5f5f5;
        }
        .change-password-container {
            width: 400px;
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
        }
        legend {
            font-size: 18px;
            font-weight: bold;
            color: #000d6b;
            padding: 5px 10px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            font-weight: bold;
            color: #333;
            display: block;
            margin-bottom: 5px;
        }
        input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }
        button {
            width: 100%;
            padding: 10px;
            background: #000d6b;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }
        button:hover {
            background: #001f8d;
        }
        .cancel-link {
            display: inline-block;
            margin-top: 10px;
            text-decoration: none;
            color: #000d6b;
            font-weight: bold;
        }
        .cancel-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="change-password-container">
        <h2><i class="fas fa-lock"></i> Change Password</h2>
        <fieldset>
            <legend><i class="fas fa-key"></i> Password Details</legend>
            <form method="POST">
                <div class="form-group">
                    <label><i class="fas fa-unlock"></i> Current Password:</label>
                    <input type="password" name="current_password" required>
                </div>
                <div class="form-group">
                    <label><i class="fas fa-lock"></i> New Password:</label>
                    <input type="password" name="new_password" required>
                </div>
                <div class="form-group">
                    <label><i class="fas fa-lock"></i> Confirm New Password:</label>
                    <input type="password" name="confirm_password" required>
                </div>
                <button type="submit"><i class="fas fa-save"></i> Change Password</button>
            </form>
        </fieldset>
        <a href="profile.php" class="cancel-link"><i class="fas fa-arrow-left"></i> Cancel</a>
    </div>
</body>
</html>
