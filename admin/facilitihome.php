<?php
include 'con.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}

if (isset($_POST['add_facility'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];

    $sql = mysqli_query($conn, "INSERT INTO facility (title, description, image) VALUES ('$title', '$description', '$image' )");

    if ($sql) {
        $message = "Facility has been added.";
        $message_type = "success";
    } else {
        $message = "Something went wrong. Please try again.";
        $message_type = "error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Facility</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
       body {
            font-family: 'Poppins', sans-serif;
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
            margin-left: 270px;
        }

        h1 {
            color: #6c5ce7;
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
            border-radius: 4px;
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

        .alert {
            width: 60%;
            margin: 20px auto;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
        }

        .success {
            background: #2ecc71;
            color: white;
        }

        .error {
            background: #e74c3c;
            color: white;
        }

        .alert button {
            background: transparent;
            border: none;
            color: white;
            font-weight: bold;
            cursor: pointer;
            margin-left: 20px;
        }
</style>
</head>
<body>

      <?php include_once('include/header.php'); ?>

    <div class="form-container">
        <form method="POST" enctype="multipart/form-data">
            <h1>Add Facility</h1>
             <fieldset>
                <legend>Facility Details</legend>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required><br>

            <label for="description">Description:</label>
            <textarea name="description" id="description" required></textarea><br>

            <div class="file-input-container">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image" required accept="image/png, image/jpg, image/jpeg"><br>
            </div>
</fieldset>
            <button type="submit" name="add_facility">Add Facility</button>
        </form>
    </div>


    <?php if (isset($message)): ?>
    <div class="alert <?php echo $message_type; ?>" id="alert">
        <div class="icon <?php echo $message_type; ?>">
            <?php if ($message_type === "success"): ?>
                &#10004;
            <?php else: ?>
                &#10006;
            <?php endif; ?>
        </div>
        <span><?php echo $message; ?></span>
        <button onclick="closeAlert()">Close</button>
    </div>
<?php endif; ?>


    <script>
        // Show the alert if a message is set
<?php if (isset($message)): ?>
    document.getElementById('alert').style.display = 'block';
<?php endif; ?>

// Function to close the alert box
function closeAlert() {
    document.getElementById('alert').style.display = 'none';
}
    </script>

</body>
</html>
