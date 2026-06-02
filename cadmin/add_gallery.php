<?php
include 'con.php';

session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: login.php");
    exit();
}


if(isset($_POST['submit'])) {
    $category = $_POST['category'];
    $description = $_POST['description'];
    $target_dir = "image/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $query = "INSERT INTO cgallery (category, image, description) VALUES ('$category', '$target_file', '$description')";
        if(mysqli_query($conn, $query)) {
            echo "<script>alert('Image uploaded successfully!'); window.location.href='manage_gallery.php';</script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
        }
    } else {
        echo "<script>alert('Failed to upload image.');</script>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Gallery Image</title>
    <style type="text/css">
    


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

        input, textarea , select {
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
 <?php  include 'include/side.php';?>
  
  <link rel="stylesheet" href="form.css">
<div class="form-container">
    <form method="POST" action=""  enctype="multipart/form-data">
        <h1>Add Image to Gallery</h1>

        <fieldset>
            <legend>Gallery details</legend>

        <select name="category" required>
            <option value="Seminar">Seminar</option>
            <option value="Navratri">Navratri</option>
            <option value="Ganesh Chaturthi">Ganesh Chaturthi</option>
            <option value="Day Celebration">Day Celebration</option>
            <option value="Yoga">Yoga</option>
            <option value="Mehandi Competition">Mehandi Competition</option>
            <option value="Tour">Tour</option>
            <option value="Annual Function">Annual Function</option>
            <option value="Janmashtami">Janmashtami</option>
        </select>

        <input type="file" name="image" required>

        <textarea name="description" placeholder="Enter description" required></textarea>

        <button type="submit" name="submit">Upload</button>
    </form>
</div>

</body>
</html>
