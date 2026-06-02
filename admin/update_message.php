<?php
include 'con.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM message WHERE id = $id");
    $messageData = mysqli_fetch_assoc($result);
}

if (isset($_POST['update_message'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $messageContent = mysqli_real_escape_string($conn, $_POST['message']);
    $image = $_FILES['image']['name'];

    if (!empty($image)) {
        // Handle file upload
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

        // Update query with new image
        $query = "UPDATE message SET name='$name', role='$role', message='$messageContent', image='$image' WHERE id=$id";
    } else {
        // Update query without changing the image
        $query = "UPDATE message SET name='$name', role='$role', message='$messageContent' WHERE id=$id";
    }

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Message has been updated.');</script>"; 
        echo "<script>window.location.href = 'viewmessage.php'</script>"; 
    } else {
        echo "<script>alert('Something went wrong.');</script>";    
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <title>Update Message</title>
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

        input, textarea {
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
     <?php include_once('include/header.php'); ?>
    <div class="form-container">
        <form method="post" enctype="multipart/form-data">

            <h1>Update Message</h1>
             <fieldset>
                <legend>Message details</legend>
            <label for="image">Image:</label>
            <input type="file" id="image" name="image" accept="image/png, image/jpg, image/jpeg">

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required value="<?php echo htmlspecialchars($messageData['name']); ?>">

            <label for="role">Role:</label>
            <input type="text" id="role" name="role" required value="<?php echo htmlspecialchars($messageData['role']); ?>">

            <label for="message">Message:</label>
            <textarea id="message" name="message" required><?php echo htmlspecialchars($messageData['message']); ?></textarea>
</fieldset>
            <button type="submit" name="update_message">Update Message</button>
        </form>
    </div>
</body>
</html>
