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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_username = $_POST['username'];
    $new_email = $_POST['email'];

    $update_sql = "UPDATE hostel_admin SET username='$new_username', email='$new_email' WHERE username='$username'";
    if ($conn->query($update_sql) === TRUE) {
        $_SESSION['admin_name'] = $new_username;
        echo "<script>alert('Profile updated successfully'); window.location='view_profile.php';</script>";
    } else {
        echo "<script>alert('Error updating profile');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Profile</title>
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
        .input-group {
            display: flex;
            align-items: center;
            background: #f8f8f8;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin: 10px 0;
        }
        .input-group i {
            color: #000d6b;
            margin-right: 10px;
            font-size: 18px;
        }
        .input-group input {
            border: none;
            outline: none;
            background: transparent;
            font-size: 16px;
            flex: 1;
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
            <legend><i class="fas fa-user-edit"></i> Edit Profile</legend>
            <form method="POST">
                <div class="input-group">
                    <i class="fas fa-user"></i>
                    <input type="text" name="username" value="<?php echo $admin['username']; ?>" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-envelope"></i>
                    <input type="email" name="email" value="<?php echo $admin['email']; ?>" required>
                </div>
                <button type="submit" class="btn"><i class="fas fa-save"></i> Update</button>
                <a href="dashboard.php" class="btn btn-back"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
            </form>
        </fieldset>
    </div>

</body>
</html>
