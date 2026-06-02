<?php
include 'con.php';


session_start();
if (!isset($_SESSION['admin_name'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $standard = $_POST["standard"];
    $registration_fee = $_POST["registration_fee"];
    $composite_fee = $_POST["composite_fee"];
   
    $frequency = $_POST["frequency"];

    $sql = "INSERT INTO fees_structure (standard, registration_fee, composite_fee, frequency) 
            VALUES ('$standard', '$registration_fee', '$composite_fee', '$frequency')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Fee structure added successfully!";
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
    <title>Admin Panel - Add Fees</title>
    <style type="text/css">body {
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

        input, textarea ,select {
            width: 100%;
            padding: 8px;
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
        <h1>Add Fee Structure</h1>

        <fieldset>
            <legend>Fees Details</legend>
    
    <form method="POST">
        <label>Standard:</label>
        <select name="standard" required>
            <option value="Pre-Primary">Pre-Primary</option>
            <option value="Primary">Primary</option>
            <?php for ($i = 1; $i <= 10; $i++) echo "<option value='Grade $i'>Grade $i</option>"; ?>
            <option value="Grade 11 Science">Grade 11 Science</option>
            <option value="Grade 11 Commerce">Grade 11 Commerce</option>
            <option value="Grade 11 Arts">Grade 11 Arts</option>
            <option value="Grade 12 Science">Grade 12 Science</option>
            <option value="Grade 12 Commerce">Grade 12 Commerce</option>
            <option value="Grade 12 Arts">Grade 12 Arts</option>
        </select>
       
        <label>Registration Fee:</label>
        <input type="number" name="registration_fee" required>
        
        <label>Composite Fee:</label>
        <input type="number" name="composite_fee" required>
        
        <label>Frequency:</label>
        <select name="frequency" required>
            <option value="One Time">One Time</option>
            <option value="Yearly">Yearly</option>
            <option value="Monthly">Monthly</option>
        </select>
        <br><br>
        <button type="submit">Add Fee</button>
    </form>
</body>
</html>
