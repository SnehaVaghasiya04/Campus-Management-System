<?php
session_start();
include("con.php");

if (!isset($_SESSION['faculty_id'])) {
    header("Location: faculty_login.php");
    exit();
}

$faculty_id = $_SESSION['faculty_id'];
$sql = "SELECT * FROM faculty_login WHERE id='$faculty_id'";
$result = $conn->query($sql);
$faculty = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $qualification = $_POST['qualification'];
    $designation = $_POST['designation'];
    $experience = $_POST['experience'];
    $field = $_POST['field'];

    if (!empty($_FILES["image"]["name"])) {
        $image = $_FILES["image"]["name"];
        $target_dir = "image/";
        $target_file = $target_dir . basename($image);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    } else {
        $image = $faculty['image'];
    }

    $sql = "UPDATE faculty_login SET 
            name='$name', 
            phone='$phone', 
            qualification='$qualification', 
            designation='$designation', 
            experience='$experience', 
            field='$field', 
            image='$image' 
            WHERE id='$faculty_id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: faculty_profile.php");
        exit();
    } else {
        $error = "Error updating profile!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        form {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            max-width: 700px;
            width: 100%;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        fieldset {
            border: 2px solid blue;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }

        legend {
            font-weight: bold;
            color: blue;
            font-size: 16px;
            padding: 0 10px;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .input-box {
            flex: 1 1 48%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .input-box[type="file"] {
            padding: 5px;
        }

        .btn {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 18px;
            font-size: 14px;
            border-radius: 5px;
            margin-right: 10px;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }

        @media (max-width: 600px) {
            .input-box {
                flex: 1 1 100%;
            }
        }
    </style>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <h2>Edit Profile</h2>
        <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>

        <fieldset>
            <legend>Faculty Details</legend>
            <div class="row">
                <input type="text" name="name" value="<?php echo $faculty['name']; ?>" class="input-box" placeholder="Name" required>
                <input type="text" name="phone" value="<?php echo $faculty['phone']; ?>" class="input-box" placeholder="Phone" required>
                <input type="text" name="qualification" value="<?php echo $faculty['qualification']; ?>" class="input-box" placeholder="Qualification" required>
                <input type="text" name="designation" value="<?php echo $faculty['designation']; ?>" class="input-box" placeholder="Designation" required>
                <input type="number" name="experience" value="<?php echo $faculty['experience']; ?>" class="input-box" placeholder="Experience" required>
                <input type="text" name="field" value="<?php echo $faculty['field']; ?>" class="input-box" placeholder="Field" required>
                <input type="file" name="image" class="input-box">
            </div>
        </fieldset>

        <div style="text-align:center;">
            <button type="submit" class="btn">Update</button>
            <a href="dashboard.php" class="btn">Back</a>
        </div>
    </form>
</body>
</html>
