<?php
include("con.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM cstudy_materials WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $course = $_POST['course'];
    $subject = $_POST['subject'];
    $uploaded_by = $_POST['uploaded_by'];

    // Check if a new file is uploaded
    if (!empty($_FILES['file']['name'])) {
        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_path = "uploads/" . $file_name;
        move_uploaded_file($file_tmp, $file_path);

        // Delete old file
        $query = "SELECT file_path FROM cstudy_materials WHERE id = $id";
        $result = mysqli_query($conn, $query);
        $old_data = mysqli_fetch_assoc($result);
        if (file_exists($old_data['file_path'])) {
            unlink($old_data['file_path']);
        }

        // Update with new file
        $query = "UPDATE cstudy_materials SET course='$course', subject='$subject', material_name='$file_name', file_path='$file_path', uploaded_by='$uploaded_by' WHERE id=$id";
    } else {
        // Update without changing file
        $query = "UPDATE cstudy_materials SET course='$course', subject='$subject', uploaded_by='$uploaded_by' WHERE id=$id";
    }

    mysqli_query($conn, $query);
    header("Location: manage_study_materials.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Study Material</title>
    <style>
         body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .form-container {
            width: 75%;
            background: white;
            padding: 25px;
            margin: 50px auto;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin-top: 90px;
            margin-left: 260px;
        }

        h1 {
            color: #d35400;
            font-size: 22px;
            text-align: center;
        }

        fieldset {
            border: 1px solid #ccc;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        legend {
            font-size: 18px;
            font-weight: bold;
            color: #6c5ce7;
        }

        label {
            font-size: 14px;
            color: #555;
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }

        input, textarea, select{
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
           
            font-size: 14px;
        }

         input, textarea {
            width: 97.5%;
            padding: 12px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
           
            font-size: 14px;
        }


        textarea {
            height: 100px;
            resize: none;
        }

        button {
            width: 100%;
            background: #6c5ce7;
            color: white;
            padding: 12px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-transform: uppercase;
            font-weight: bold;
        }

        button:hover {
            background: #4834d4;
        }
    </style>
</head>
<body>

<?php include_once('include/side.php'); ?>
<div class="form-container">
    <form method="POST" action="" enctype="multipart/form-data">
        <h1>Edit Study Material</h1>

        <fieldset>
            <legend>Notice Details</legend>
   
    
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <select name="course" required>
            <option value="BCA" <?php if($row['course'] == "BCA") echo "selected"; ?>>BCA</option>
            <option value="BCom" <?php if($row['course'] == "BCom") echo "selected"; ?>>BCom</option>
            <option value="BBA" <?php if($row['course'] == "BBA") echo "selected"; ?>>BBA</option>
            <option value="MSc IT" <?php if($row['course'] == "MSc IT") echo "selected"; ?>>MSc IT</option>
        </select>

        <input type="text" name="subject" placeholder="Subject" value="<?php echo $row['subject']; ?>" required>
        <input type="text" name="uploaded_by" placeholder="Uploaded By" value="<?php echo $row['uploaded_by']; ?>" required>
        
        <label>Current File: <?php echo $row['material_name']; ?></label>
        <input type="file" name="file">
</fieldset>
        <button type="submit">Update</button>
    </form>
</div>
</body>
</html>
