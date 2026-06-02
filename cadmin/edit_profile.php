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

// Handle Username & Email Update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_username = $_POST['username'];
    $new_email = $_POST['email'];

    // Check if the new username is already taken
    $check_sql = "SELECT * FROM college_admin WHERE username='$new_username' AND username!='$username'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        echo "<script>alert('Username already taken. Please choose a different one.');</script>";
    } else {
        $update_sql = "UPDATE college_admin SET username='$new_username', email='$new_email' WHERE username='$username'";

        if ($conn->query($update_sql) === TRUE) {
            $_SESSION['admin_username'] = $new_username; // Update session with new username
            echo "<script>alert('Profile updated successfully'); window.location='edit_profile.php';</script>";
        } else {
            echo "<script>alert('Error updating profile');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit College Admin Profile</title>
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
        .form-group {
            text-align: left;
            margin-top: 15px;
        }
        label {
            font-size: 16px;
            font-weight: bold;
            display: flex;
            align-items: center;
        }
        label i {
            margin-right: 10px;
            color: #007bff;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
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
            border: none;
            cursor: pointer;
        }
        .btn:hover {
            background: #0056b3;
        }
        .back-btn {
            display: block;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
            font-size: 14px;
        }
        .back-btn i {
            margin-right: 5px;
        }
    </style>
</head>
<body>

    <div class="profile-container">
        <fieldset>
            <legend>Edit Admin Profile</legend>
            <form method="POST">
                <div class="form-group">
                    <label for="username"><i class="fas fa-user"></i> Username:</label>
                    <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($row['username']); ?>" required>
                </div>

                <div class="form-group">
                    <label for="email"><i class="fas fa-envelope"></i> Email:</label>
                    <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
                </div>

                <button type="submit" class="btn"><i class="fas fa-save"></i> Update Profile</button>
            </form>
        </fieldset>

        <a href="dashboard.php" class="back-btn"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
    </div>

</body>
</html>
