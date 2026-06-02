<?php
session_start();
include 'con.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Hash password for security

    // Fetch user from hostel_admin table
    $query = "SELECT * FROM hostel_admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['admin_name'] = $row['username'];
        $_SESSION['admin_email'] = $row['email'];
        header("Location: dashboard.php"); // Redirect to Dashboard
        exit();
    } else {
        echo "<script>alert('Invalid Username or Password');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hostel Admin Login</title>
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
        .login-container {
            display: flex;
            width: 800px;
            background: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        .left-image {
            width: 50%;
            background: url('/campus_management/hadmin/image/login.jpg') no-repeat center;
            background-size: cover;
        }
        .login-form {
            width: 50%;
            padding: 40px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        label {
            display: block;
            text-align: left;
            font-size: 14px;
            color: #444;
            font-weight: bold;
            margin: 8px 0 4px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
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
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
            transition: background 0.3s;
        }
        button:hover {
            background: #001f8d;
        }
        .admin-link {
            margin-top: 10px;
            display: block;
            color: red;
            text-decoration: none;
            font-size: 14px;
            font-weight: bold;
        }
        .admin-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="left-image"></div>
        <div class="login-form">
            <h2>Hostel Admin Login</h2>
            <form method="POST">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Enter your username" required>

                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password" required>

                <button type="submit">Login</button>
            </form>
            <a href="\campus_management\hostelstaff\warden_login.php" class="admin-link">Go to Hostel Staff Panel</a>
        </div>
    </div>
</body>
</html>
