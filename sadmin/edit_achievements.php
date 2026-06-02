<?php
include 'con.php';


session_start();
if (!isset($_SESSION['admin_name'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}


$id = $_GET['id'];

if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];

    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $temp = $_FILES['image']['tmp_name'];
        move_uploaded_file($temp, "uploads/" . $image);

        // Delete old image
        $get_image = mysqli_query($conn, "SELECT image FROM achievements WHERE id=$id");
        $row = mysqli_fetch_assoc($get_image);
        unlink("uploads/" . $row['image']);

        mysqli_query($conn, "UPDATE achievements SET title='$title', description='$description', image='$image', date='$date' WHERE id=$id");
    } else {
        mysqli_query($conn, "UPDATE achievements SET title='$title', description='$description', date='$date' WHERE id=$id");
    }

    echo "Achievement updated successfully!";
}

$get = mysqli_query($conn, "SELECT * FROM achievements WHERE id=$id");
$data = mysqli_fetch_assoc($get);
?>
<?php  include 'include/side.php';?>
<div class="form-container">
    <form method="POST" action="">
        <h1>Edit Achievement</h1>

        <fieldset>
            <legend> Achievement Details</legend>

    <input type="text" name="title" value="<?php echo $data['title']; ?>" required>
    <textarea name="description" required><?php echo $data['description']; ?></textarea>
    <input type="date" name="date" value="<?php echo $data['date']; ?>" required>
    <p>Current Image:</p>
    <img src="image/<?php echo $data['image']; ?>" width="150"><br><br>
    <input type="file" name="image">
</fieldset>
    <button type="submit" name="update">Update Achievement</button>
</form>

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

