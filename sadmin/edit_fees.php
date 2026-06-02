<?php
include 'con.php';


session_start();
if (!isset($_SESSION['admin_name'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}


// Fetch Fee Structure
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM fees_structure WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

// Update Fee Structure
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $standard = $_POST["standard"];
    $registration_fee = $_POST["registration_fee"];
    $composite_fee = $_POST["composite_fee"];
    $frequency = $_POST["frequency"];

    $sql = "UPDATE fees_structure SET standard='$standard', registration_fee='$registration_fee', composite_fee='$composite_fee', frequency='$frequency' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Fee structure updated successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Edit Fee</title>
    <style> body {
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

        input, textarea  , select{
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
        }</style>
</head>
<body>
<?php  include 'include/side.php';?>
    <div class="form-container">
    <form method="POST" action="">
        <h1>Edit Fee Structure</h1>

        <fieldset>
            <legend>Fees Details</legend>
    
   
        <label>Standard:</label>
        <select name="standard" required>
            <option value="Pre-Primary" <?php echo ($row['standard'] == 'Pre-Primary') ? 'selected' : ''; ?>>Pre-Primary</option>
            <option value="Primary" <?php echo ($row['standard'] == 'Primary') ? 'selected' : ''; ?>>Primary</option>
            <?php for ($i = 1; $i <= 10; $i++) echo "<option value='Grade $i' " . (($row['standard'] == 'Grade ' . $i) ? 'selected' : '') . ">Grade $i</option>"; ?>
            <option value="Grade 11 Science" <?php echo ($row['standard'] == 'Grade 11 Science') ? 'selected' : ''; ?>>Grade 11 Science</option>
            <option value="Grade 11 Commerce" <?php echo ($row['standard'] == 'Grade 11 Commerce') ? 'selected' : ''; ?>>Grade 11 Commerce</option>
            <option value="Grade 11 Arts" <?php echo ($row['standard'] == 'Grade 11 Arts') ? 'selected' : ''; ?>>Grade 11 Arts</option>
            <option value="Grade 12 Science" <?php echo ($row['standard'] == 'Grade 12 Science') ? 'selected' : ''; ?>>Grade 12 Science</option>
            <option value="Grade 12 Commerce" <?php echo ($row['standard'] == 'Grade 12 Commerce') ? 'selected' : ''; ?>>Grade 12 Commerce</option>
            <option value="Grade 12 Arts" <?php echo ($row['standard'] == 'Grade 12 Arts') ? 'selected' : ''; ?>>Grade 12 Arts</option>
        </select>
        <br><br>
        
        <label>Registration Fee:</label>
        <input type="number" name="registration_fee" value="<?php echo $row['registration_fee']; ?>" required>
        <br><br>
        
        <label>Composite Fee:</label>
        <input type="number" name="composite_fee" value="<?php echo $row['composite_fee']; ?>" required>
        <br><br>
        
        <label>Frequency:</label>
        <select name="frequency" required>
            <option value="One Time" <?php echo ($row['frequency'] == 'One Time') ? 'selected' : ''; ?>>One Time</option>
            <option value="Yearly" <?php echo ($row['frequency'] == 'Yearly') ? 'selected' : ''; ?>>Yearly</option>
            <option value="Monthly" <?php echo ($row['frequency'] == 'Monthly') ? 'selected' : ''; ?>>Monthly</option>
        </select>
       </fieldset>
        
        <button type="submit">Update Fee</button>
    </form>
</body>
</html>
