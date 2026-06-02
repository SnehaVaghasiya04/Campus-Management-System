<?php
include 'con.php';

session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}

// Step 2: Get existing "Contact Us" data
$sql = "SELECT * FROM contact_us WHERE id = 1"; // Assuming you have only one record with id 1
$result = $conn->query($sql);
$contactData = $result->fetch_assoc();

// Step 3: Handle the form submission to update the data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $working_hours = $_POST['working_hours'];

    // Update the database with the new data
    $updateSql = "UPDATE contact_us SET phone = ?, email = ?, address = ?, working_hours = ? WHERE id = 1";
    $stmt = $conn->prepare($updateSql);
    $stmt->bind_param("ssss", $phone, $email, $address, $working_hours);
    $stmt->execute();

    // Redirect or display a success message
    echo "Contact details updated successfully!";
    header("Location: contact_us.php"); // Optional: Redirect to refresh the page
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        /* Add the styling as required, using the previous CSS provided */
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


        <!-- Step 4: Display the current "Contact Us" details -->

        <form method="POST" action="">
                    <h1>Contact Us</h1>
                     <fieldset>
                        <legend>Update Contact Information</legend>
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($contactData['phone']); ?>" required>
            <br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($contactData['email']); ?>" required>
            <br><br>

            <label for="address">Address:</label>
            <textarea id="address" name="address" rows="4" cols="50" required><?php echo htmlspecialchars($contactData['address']); ?></textarea>
            <br><br>

            <label for="working_hours">Working Hours:</label>
            <input type="text" id="working_hours" name="working_hours" value="<?php echo htmlspecialchars($contactData['working_hours']); ?>" required>
            <br><br>

            <button type="submit">Update</button>
        </form>

        <p><strong>Last Updated:</strong> <?php echo $contactData['last_updated']; ?></p>
    </div>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
