<?php
session_start();
include 'con.php';

if (!isset($_SESSION['admin_username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['admin_username'];
$message = ""; // To show success or error messages

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Fetch the admin's current password from the college_admin table
    $query = "SELECT password FROM college_admin WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row && password_verify($current_password, $row['password'])) { // Verify current password
        if ($new_password === $confirm_password) { // Check if new passwords match
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT); // Hash the new password
            $update_query = "UPDATE college_admin SET password='$hashed_password' WHERE username='$username'";
            
            if (mysqli_query($conn, $update_query)) {
                $message = "<p class='success'>Password updated successfully!</p>";
            } else {
                $message = "<p class='error'>Error updating password.</p>";
            }
        } else {
            $message = "<p class='error'>New passwords do not match.</p>";
        }
    } else {
        $message = "<p class='error'>Current password is incorrect.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
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
        label {
            font-size: 16px;
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn {
            display: inline-block;
            text-decoration: none;
            color: white;
            background: #4CAF50;
            padding: 10px 15px;
            border-radius: 5px;
            transition: 0.3s;
            text-align: center;
            border: none;
            cursor: pointer;
            margin-top: 15px;
            width: 100%;
        }
        .btn:hover {
            background: #45a049;
        }

        .btn1 {
            display: inline-block;
            text-decoration: none;
            color: white;
            background: #dc3545;
            padding: 10px 15px;
            border-radius: 5px;
            transition: 0.3s;
            text-align: center;
            border: none;
            cursor: pointer;
            margin-top: 15px;
            width: 100%;
        }
        .btn1:hover {
            background: #c82333;
        }
        .error {
            color: red;
            font-weight: bold;
            text-align: center;
        }
        .success {
            color: green;
            font-weight: bold;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <fieldset>
            <legend>Change Password</legend>
            <?php echo $message; ?>
            <form method="POST">
                <label>Current Password:</label>
                <input type="password" name="current_password" required>
                
                <label>New Password:</label>
                <input type="password" name="new_password" required>
                
                <label>Confirm New Password:</label>
                <input type="password" name="confirm_password" required>
                
                <button type="submit" class="btn">Update Password</button>
                <a href="dashboard.php" class="btn1">Back to Dashboard</a>
            </form>
        </fieldset>
    </div>
</body>
</html>
