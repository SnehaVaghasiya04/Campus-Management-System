<?php
session_start();
include 'con.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['admin'];
$query = "SELECT * FROM admin WHERE username='$username'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_name = mysqli_real_escape_string($conn, $_POST['name']);
    $new_email = mysqli_real_escape_string($conn, $_POST['email']);

    $update_query = "UPDATE admin SET name='$new_name', email='$new_email' WHERE username='$username'";
    if (mysqli_query($conn, $update_query)) {
        $_SESSION['admin_name'] = $new_name; // Update session
        header("Location: view_profile.php"); // Redirect after update
        exit();
    } else {
        echo "Error updating profile.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .edit-container {
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
            background:red;
            padding: 10px 15px;
            border-radius: 5px;
            transition: 0.3s;
            text-align: center;
            border: none;
            cursor: pointer;
            margin-top: 15px;
            width: 320px;
        };
        
        .btn1:hover {
            background: #c82333;
        }
    </style>
</head>
<body>
    <div class="edit-container">
        <fieldset>
            <legend>Edit Profile</legend>
            <form method="POST">
                <label>Name:</label>
                <input type="text" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required>
                
                <label>Email:</label>
                <input type="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
                
                <button type="submit" class="btn">Update</button>
                <a href="view_profile.php" class=" btn1">Cancel</a>
            </form>
        </fieldset>
    </div>
</body>
</html>
