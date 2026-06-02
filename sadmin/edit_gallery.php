<?php
include 'con.php';


session_start();
if (!isset($_SESSION['admin_name'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}


// Get Image Details
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM gallery WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
}

// Update Image Details
if(isset($_POST['update'])) {
    $category = $_POST['category'];
    $description = $_POST['description'];

    $updateQuery = "UPDATE gallery SET category='$category', description='$description' WHERE id = $id";
    mysqli_query($conn, $updateQuery);

    echo "<script>alert('Image details updated successfully!'); window.location.href='manage_gallery.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Gallery</title>
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

        input, textarea ,select{
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
    <form method="POST" action="">
        <h1>Edit Gallery</h1>

        <fieldset>
            <legend>Gallery Details</legend>

        <label>Category:</label>
        <select name="category" required>
            <option value="Seminar" <?php if($row['category'] == 'Seminar') echo 'selected'; ?>>Seminar</option>
            <option value="Navratri" <?php if($row['category'] == 'Navratri') echo 'selected'; ?>>Navratri</option>
            <option value="Ganesh Chaturthi" <?php if($row['category'] == 'Ganesh Chaturthi') echo 'selected'; ?>>Ganesh Chaturthi</option>
            <option value="Day Celebration" <?php if($row['category'] == 'Day Celebration') echo 'selected'; ?>>Day Celebration</option>
            <option value="Yoga" <?php if($row['category'] == 'Yoga') echo 'selected'; ?>>Yoga</option>
            <option value="Mehandi Competition" <?php if($row['category'] == 'Mehandi Competition') echo 'selected'; ?>>Mehandi Competition</option>
            <option value="Tour" <?php if($row['category'] == 'Tour') echo 'selected'; ?>>Tour</option>
            <option value="Annual Function" <?php if($row['category'] == 'Annual Function') echo 'selected'; ?>>Annual Function</option>
            <option value="Janmashtami" <?php if($row['category'] == 'Janmashtami') echo 'selected'; ?>>Janmashtami</option>
        </select>

        <label>Description:</label>
        <textarea name="description" required><?php echo $row['description']; ?></textarea>
</fieldset>
        <button type="submit" name="update">Update</button>
    </form>
</div>

</body>
</html>
