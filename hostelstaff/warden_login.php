<?php
include 'con.php';

session_start();

if (isset($_POST['login'])) {
    $contact = $_POST['contact'];
    $password = $_POST['password'];

    $query = "SELECT * FROM warden WHERE contact='$contact' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $warden = mysqli_fetch_assoc($result);
        $_SESSION['warden_name'] = $warden['name'];
        $_SESSION['warden_contact'] = $warden['contact'];
        header("Location: dashboard.php");
    } else {
        $error = "Invalid Contact or Password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Warden Login</title>
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
        <div class="right">    <h2> Hostel Warden Login</h2>
    <?php if (isset($error)) echo '<p class="error">'.$error.'</p>'; ?>
    <form method="POST">
        <label> Contact </label>
        <input type="text" name="contact" placeholder="Enter Contact" required>
        <label>password</label>
        <input type="password" name="password" placeholder="Enter Password" required>

        <button type="submit" class="btn" name="login" value="Login">Login</button>
      
         <a href="\campus_management\hadmin\login.php" class="admin-link">Go to  Hostel Admin Panel</a>
    </form>
</div>
</div>

</body>
</html>
