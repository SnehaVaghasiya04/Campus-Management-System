<?php
include('con.php');
session_start();
if (!isset($_SESSION['warden_contact'])) {
    header('Location: warden_login.php');
    exit();
}

$contact = $_SESSION['warden_contact'];
$result = mysqli_query($conn, "SELECT * FROM warden WHERE contact='$contact'");
$data = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $qualification = $_POST['qualification'];

    if ($_FILES['photo']['name'] != "") {
        $photo = $_FILES['photo']['name'];
        $tmp_name = $_FILES['photo']['tmp_name'];
        move_uploaded_file($tmp_name, "image/" . $photo);
        $update = "UPDATE warden SET name='$name', designation='$designation', qualification='$qualification', photo='$photo' WHERE contact='$contact'";
    } else {
        $update = "UPDATE warden SET name='$name', designation='$designation', qualification='$qualification' WHERE contact='$contact'";
    }

    if (mysqli_query($conn, $update)) {
        echo "<script>alert('Profile Updated Successfully!'); window.location.href='warden_profile.php';</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            text-align: center;
            padding: 20px;
        }
        .profile-container {
            max-width: 450px;
            background: white;
            padding: 25px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            text-align: left;
        }
        fieldset {
            border: 2px solid #007bff;
            border-radius: 10px;
            padding: 15px;
        }
        legend {
            font-size: 1.2em;
            font-weight: bold;
            color: #007bff;
        }
        label {
            font-weight: bold;
            display: block;
            margin: 10px 0 5px;
        }
        input[type="text"], input[type="file"] {
            width: 95%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn-container {
            text-align: center;
            margin-top: 15px;
        }
        .btn {
            display: inline-block;
            padding: 10px 18px;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            margin: 5px;
            transition: 0.3s ease;
            cursor: pointer;
            border: none;
        }
        .update-btn {
            background: #007bff;
            color: white;
        }
        .update-btn:hover {
            background: #0056b3;
        }
        .dashboard-btn {
            background: #28a745;
            color: white;
        }
        .dashboard-btn:hover {
            background: #218838;
        }
    </style>
</head>
<body>

<div class="profile-container">
    <h2 style="text-align: center; color: #333;">Update Profile</h2>

    <form method="post" enctype="multipart/form-data">
        <fieldset>
            <legend>Profile Information</legend>

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($data['name']); ?>" required>

            <label for="designation">Designation:</label>
            <input type="text" id="designation" name="designation" value="<?php echo htmlspecialchars($data['designation']); ?>" required>

            <label for="qualification">Qualification:</label>
            <input type="text" id="qualification" name="qualification" value="<?php echo htmlspecialchars($data['qualification']); ?>" required>

            <label for="photo">Profile Photo:</label>
            <input type="file" id="photo" name="photo">

        </fieldset>

        <div class="btn-container">
            <button type="submit" name="update" class="btn update-btn">Update Profile</button>
            <a href="dashboard.php" class="btn dashboard-btn">Back to Dashboard</a>
        </div>
    </form>
</div>

</body>
</html>
