<?php
session_start();
include "con.php";



if (!isset($_SESSION['staff_id'])) {
    header("Location: login.php");
    exit();
}

$id = $_SESSION['staff_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $qualification = $_POST['qualification'];
    $image = $_FILES['image']['name'];

    // File Upload Handling
    if (!empty($image)) {
        $target_dir = "image/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

        $query = "UPDATE staff_login SET name='$name', contact='$contact', qualification='$qualification', image='$image' WHERE id='$id'";
    } else {
        $query = "UPDATE staff_login SET name='$name', contact='$contact', qualification='$qualification' WHERE id='$id'";
    }

    if ($conn->query($query) === TRUE) {
        $_SESSION['staff_name'] = $name; // Update session name
        echo "<p class='success'>Profile updated successfully!</p>";
    } else {
        echo "<p class='error'>Error updating profile: " . $conn->error . "</p>";
    }
}

$query = "SELECT * FROM staff_login WHERE id='$id'";
$result = $conn->query($query);
$row = $result->fetch_assoc();
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
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .profile-container {
            width: 500px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
          
            margin-top: 150px;
        }
        fieldset {
            border: 2px solid #007bff;
            border-radius: 8px;
            padding: 15px;
        }
        legend {
            font-weight: bold;
            color: #007bff;
            padding: 5px 10px;
        }
        .profile-img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 3px solid #007bff;
            margin-bottom: 15px;
        }
        input, button {
            width: 95%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            background: #007bff;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        .success {
            color: green;
            font-weight: bold;
        }
        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="profile-container">
    <h2>Edit Profile</h2>
    <img class="profile-img" src="<?php echo $row['image'] ? 'image/'.$row['image'] : 'default.png'; ?>" alt="Profile Image">

    <form method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Profile Information</legend>
            <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
            <input type="text" name="contact" value="<?php echo $row['contact']; ?>" required>
            <input type="text" name="qualification" value="<?php echo $row['qualification']; ?>" required>
            <input type="file" name="image">
            <button type="submit">Update Profile</button>
        </fieldset>
    </form>

    <a href="dashboard.php" class="btn">Back to Dashboard</a>
</div>

</body>
</html>
