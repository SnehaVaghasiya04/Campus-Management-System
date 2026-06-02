<?php
include 'con.php';

session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: login.php");
    exit();
}


// Get fee details
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM college_fees WHERE id=$id";
    $result = mysqli_query($conn, $query);
    $fee = mysqli_fetch_assoc($result);
}

// Handle form submission
if (isset($_POST['update_fees'])) {
    $id = $_POST['id'];
    $course = $_POST['course'];
    $semester = $_POST['semester'];
    $registration_fee = $_POST['registration_fee'];
    $tuition_fee = $_POST['tuition_fee'];
   

    $query = "UPDATE college_fees SET 
              course='$course', 
              semester='$semester', 
              registration_fee='$registration_fee', 
              tuition_fee='$tuition_fee'
              WHERE id=$id";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Fees Updated Successfully!'); window.location.href='manage_fees.php';</script>";
    } else {
        echo "<p style='color:red;'>Error: " . mysqli_error($conn) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Fees</title>

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

<div class="container">
    <h2>Edit Fees</h2>
<link rel="stylesheet" href="form.css">
<div class="form-container">
    <form method="POST" action="">
        <h1>Edit fees</h1>

        <fieldset>
            <legend> fees detils</legend>
   
        <input type="hidden" name="id" value="<?php echo $fee['id']; ?>">

        <label>Select Course:</label>
        <select name="course" required>
            <option value="BCA" <?php if ($fee['course'] == 'BCA') echo 'selected'; ?>>BCA</option>
            <option value="MSc IT" <?php if ($fee['course'] == 'MSc IT') echo 'selected'; ?>>MSc IT</option>
            <option value="BCom" <?php if ($fee['course'] == 'BCom') echo 'selected'; ?>>BCom</option>
            <option value="BBA" <?php if ($fee['course'] == 'BBA') echo 'selected'; ?>>BBA</option>
        </select>

        <label>Select Semester:</label>
        <select name="semester" required>
            <option value="1" <?php if ($fee['semester'] == 1) echo 'selected'; ?>>Semester 1</option>
            <option value="2" <?php if ($fee['semester'] == 2) echo 'selected'; ?>>Semester 2</option>
            <option value="3" <?php if ($fee['semester'] == 3) echo 'selected'; ?>>Semester 3</option>
            <option value="4" <?php if ($fee['semester'] == 4) echo 'selected'; ?>>Semester 4</option>
            <option value="5" <?php if ($fee['semester'] == 5) echo 'selected'; ?>>Semester 5</option>
            <option value="6" <?php if ($fee['semester'] == 6) echo 'selected'; ?>>Semester 6</option>
        </select>

        <label>Registration Fee (₹):</label>
        <input type="number" name="registration_fee" value="<?php echo $fee['registration_fee']; ?>" required>

        <label>Tuition Fee (₹):</label>
        <input type="number" name="tuition_fee" value="<?php echo $fee['tuition_fee']; ?>" required>

       
</fieldset>
        <button type="submit" name="update_fees" class="update-btn">Update Fees</button>
    </form>

</div>

</body>
</html>
