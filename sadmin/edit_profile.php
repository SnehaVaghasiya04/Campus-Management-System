<?php
session_start();
include 'con.php'; // Database connection

if (!isset($_SESSION['admin_name'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_username = mysqli_real_escape_string($conn, $_POST['username']);
    $new_email = mysqli_real_escape_string($conn, $_POST['email']);
    $current_admin = $_SESSION['admin_name'];

    // Corrected UPDATE query
    $query = "UPDATE school_admin SET username='$new_username', email='$new_email' WHERE username='$current_admin'";

    if (mysqli_query($conn, $query)) {
        $_SESSION['admin_name'] = $new_username; // Update session
        $_SESSION['admin_email'] = $new_email;
        echo "<script>alert('Profile updated successfully!'); window.location='profile.php';</script>";
    } else {
        echo "<script>alert('Error updating profile: " . mysqli_error($conn) . "');</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Profile</title>
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
        .edit-profile-container {
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
    <div class="edit-profile-container">
        <h2><i class="fas fa-user-edit"></i> Edit Profile</h2>
        <fieldset>
            <legend><i class="fas fa-user"></i> Admin Details</legend>
            <form method="POST">
                <div class="form-group">
                    <label><i class="fas fa-user"></i> New Username:</label>
                    <input type="text" name="username" value="<?php echo $_SESSION['admin_name']; ?>" required>
                </div>
                <div class="form-group">
                    <label><i class="fas fa-envelope"></i> New Email:</label>
                    <input type="email" name="email" value="<?php echo $_SESSION['admin_email']; ?>" required>
                </div>
                <button type="submit"><i class="fas fa-save"></i> Update Profile</button>
            </form>
        </fieldset>
        <a href="profile.php" class="cancel-link"><i class="fas fa-arrow-left"></i> Cancel</a>
    </div>
</body>
</html>
