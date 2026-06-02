<?php
session_start();
include 'con.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM college_admin WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['admin_username'] = $row['username'];
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<script>alert('User Not Found!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }
        .container {
            display: flex;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 800px;
        }
        .left {
            width: 50%;
            background: url('/campus_management/cadmin/image/login.jpg') no-repeat center center;
            background-size: cover;
        }
        .right {
            width: 50%;
            padding: 40px;
            text-align: center;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            display: block;
            text-align: left;
            margin-top: 10px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn {
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            border: none;
            border-radius: 5px;
            background: #000;
            color: white;
            cursor: pointer;
            font-size: 16px;
        }
        .btn:hover {
            background: #333;
        }
        .admin-link {
            display: block;
            margin-top: 15px;
            color: red;
            text-decoration: none;
        }
        .admin-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

     <div class="container">
        <div class="left"></div> <!-- Side Image -->
        <div class="right">
        <h2> college    Admin Login</h2>
        <form method="POST">
            <label>Username</label>
            <input type="text" name="username" placeholder="Username" required>
            <label>Password</label>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="btn">Login</button>
       
        <a href="\campus_management\collegestaff\faculty_login.php" class="admin-link">Go to College staff Login</a>
    </form>
</div>
    </div>

</body>
</html>
