<?php
include 'con.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}

// Fetch the specific notice based on the given ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM notice WHERE id = $id");
    $notice = mysqli_fetch_assoc($result);
}

// Handle the notice update
if (isset($_POST['update_notice'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Update the notice in the database
    $query = "UPDATE notice SET title='$title', description='$description' WHERE id=$id";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Notice has been updated.');</script>"; 
        echo "<script>window.location.href = 'view_notice.php'</script>"; 
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
    <title>Update Notice</title>
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
        }    </style>
</head>
<body>
     <?php include_once('include/header.php'); ?>
    <div class="form-container">
        <form method="post">
            <h1>Update Notice</h1>
<fieldset><legend>Notice Details</legend>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required value="<?php echo htmlspecialchars($notice['title']); ?>">

            <label for="description">Description:</label>
            <textarea id="description" name="description" required><?php echo htmlspecialchars($notice['description']); ?></textarea>
</fieldset>
            <button type="submit" name="update_notice">Update Notice</button>
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
