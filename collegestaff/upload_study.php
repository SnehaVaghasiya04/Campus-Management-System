<?php
include("con.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course = $_POST['course'];
    $subject = $_POST['subject'];
    $uploaded_by = $_POST['uploaded_by'];

    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_path = "image/" . $file_name;

    move_uploaded_file($file_tmp, $file_path);

    $query = "INSERT INTO cstudy_materials (course, subject, material_name, file_path, uploaded_by) 
              VALUES ('$course', '$subject', '$file_name', '$file_path', '$uploaded_by')";
    mysqli_query($conn, $query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Upload Study Materials</title>
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

        input, textarea , select{
            width: 95%;
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
<div class="form-container" >
    <form method="POST" action="" enctype="multipart/form-data">
        <h1>Upload Study Materials</h1>

        <fieldset>
            <legend>Study material Details</legend>

   
    <label>select course</label>
        <select name="course" required>
            <option value="">Select Course</option>
            <option value="BCA">BCA</option>
            <option value="BCom">BCom</option>
            <option value="BBA">BBA</option>
            <option value="MSc IT">MSc IT</option>
        </select>
        <label>Subject</label>
        <input type="text" name="subject" placeholder="Subject" required>
        <label>Uploaded_by</label>
        <input type="text" name="uploaded_by" placeholder="Uploaded By" required>
        <label>choose file</label>
        <input type="file" name="file" required>
    </fieldset>
        <button type="submit">Upload</button>
    </form>
</div>
</body>
</html>
