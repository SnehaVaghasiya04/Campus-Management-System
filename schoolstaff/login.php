<?php
session_start();
include "con.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM staff_login WHERE email='$email' AND password='$password'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['staff_id'] = $row['id'];
        $_SESSION['staff_name'] = $row['name'];
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid Email or Password!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <style> body {
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
            background: url('/campus_management/admin/images/login.jpg') no-repeat center center;
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
        }</style>
</head>
<body>

 <div class="container">
        <div class="left"></div> <!-- Side Image -->
        <div class="right">
<h2> School Staff panel </h2>
<form method="post">
    <label> email </label>
    <input type="email" name="email" placeholder="Enter Email" required>
    <label> password </label>
    <input type="password" name="password" placeholder="Enter Password" required>
    <button type="submit" class="btn">Login</button>
<a href="\campus_management\sadmin\login.php" class="admin-link">Go to School  Admin Panel</a>
</form>
</div>
</div>
</body>
</html>
