<?php
include("con.php"); // Include database connection

session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: login.php");
    exit();
}


$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM rules WHERE id=$id");
$row = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    mysqli_query($conn, "UPDATE rules SET title='$title', description='$description' WHERE id=$id");
    echo "<script>alert('Rule Updated Successfully'); window.location='manage_rules.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="form.css">
    <title>Edit Rule</title>
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
    <?php include_once('include/side.php'); ?>

<div class="form-container">
    <form method="POST" action="">
        <h1>Edit Rule</h1>

        <fieldset>
            <legend> Rules Details</legend>
    
    
        <label>Title:</label>
        <input type="text" name="title" value="<?php echo $row['title']; ?>" required>
      
        <label>Description:</label>
        <textarea name="description" required><?php echo $row['description']; ?></textarea>
        </fieldset>
        <button type="submit" name="update">Update Rule</button>
    </form>
</body>
</html>
