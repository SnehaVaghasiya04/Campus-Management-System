<?php
session_start();
include("con.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = ($_POST['password']); // Encrypt password

    $sql = "SELECT * FROM faculty_login WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $faculty = $result->fetch_assoc();
        $_SESSION['faculty_id'] = $faculty['id'];
        $_SESSION['faculty_name'] = $faculty['name'];
        header("Location: dashboard.php"); // Redirect to dashboard
        exit();
    } else {
        $error = "Invalid Email or Password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Login</title>
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
        }
       
    </style>
</head>
<body>
    <div class="container">
        <div class="left"></div> <!-- Side Image -->
        <div class="right">
        <h2> college Faculty  Login</h2>
        <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
        <form method="POST">
            <label>Email</label>
            <input type="email" name="email" placeholder="Enter Email" class="input-box" required>
            <label> Password </label>
            <input type="password" name="password" placeholder="Enter Password" class="input-box" required>
           <button type="submit" class="btn">Login</button>
             <a href="\campus_management\cadmin\login.php" class="admin-link">Go to college Admin Panel</a>
        </form>
       
    </div>
</div>

</body>
</html>
