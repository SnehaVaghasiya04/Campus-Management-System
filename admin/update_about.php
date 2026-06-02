<?php
include 'con.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}

// Step 2: Get existing "About Us" data
$sql = "SELECT * FROM about_us "; // Assuming you have only one record with id 1
$result = $conn->query($sql);
$aboutUsData = $result->fetch_assoc();

// Step 3: Handle the form submission to update the data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Update the database with the new data
    $updateSql = "UPDATE about_us SET title = ?, description = ? WHERE id = 1";
    $stmt = $conn->prepare($updateSql);
    $stmt->bind_param("ss", $title, $description);
    $stmt->execute();

    // Redirect or display a success message
    echo "About Us details updated successfully!";
    header("Location: about_us.php"); // Optional: Redirect to refresh the page
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
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
    <h1>About Us</h1>
<fieldset><legend>About Details</legend>
    <!-- Step 4: Display the current "About Us" details -->
    <form method="POST" action="">
         

        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($aboutUsData['title']); ?>" required>
        <br><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" cols="50" required><?php echo htmlspecialchars($aboutUsData['description']); ?></textarea>
        <br><br>
</form>
        <button type="submit">Update</button>
    </form>

    <p><strong>Last Updated:</strong> <?php echo $aboutUsData['last_updated']; ?></p>
</div>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
