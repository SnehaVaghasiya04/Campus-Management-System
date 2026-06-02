<?php
include 'con.php';

if (isset($_POST['add_about_us'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
   

    // Move uploaded file to the target directory
   
        // Insert data into the `about_us` table
        $sql = mysqli_query($conn, "INSERT INTO about (title, description, image_path) VALUES ('$title', '$description', '$target_file')");

        if ($sql) {
            $message = "About Us information has been added successfully.";
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
    <title>Add About Us</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* Your existing CSS styles */
    </style>
</head>
<body>
<?php include_once('include/dashboard.php'); ?>

<div class="form-container">
    <form method="POST" enctype="multipart/form-data">
        <h1>Add About Us</h1>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required><br>

        <label for="description">Description:</label>
        <textarea name="description" id="description" required></textarea><br>

        <label for="image">Image:</label>
        <input type="file" id="image" name="image" required accept="image/png, image/jpg, image/jpeg"><br>

        <button type="submit" name="add_about_us">Add About Us</button>
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
