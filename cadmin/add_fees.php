<?php
include 'con.php';

session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: login.php");
    exit();
}


if (isset($_POST['add_fees'])) {
    $course = $_POST['course'];
    $semester = $_POST['semester'];
    $registration_fee = $_POST['registration_fee'];
    $tuition_fee = $_POST['tuition_fee'];

    $query = "INSERT INTO college_fees (course, semester, registration_fee, tuition_fee) 
              VALUES ('$course', '$semester', '$registration_fee', '$tuition_fee')";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Fees added successfully!'); window.location.href='manage_fees.php';</script>";
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
    <title>Add Fees</title>
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

<link rel="stylesheet" href="form.css">
<div class="form-container">
    <form method="POST" action="">
        <h1>Add Fees</h1>

        <fieldset>
            <legend></legend>
   

    
        <div>
            <label>Select Course:</label>
            <select name="course" required>
                <option value="BCA">BCA</option>
                <option value="MSc IT">MSc IT</option>
                <option value="BCom">BCom</option>
                <option value="BBA">BBA</option>
            </select>
        </div>

        <div>
            <label>Select Semester:</label>
            <select name="semester" required>
                <option value="1">Semester 1</option>
                <option value="2">Semester 2</option>
                <option value="3">Semester 3</option>
                <option value="4">Semester 4</option>
                <option value="5">Semester 5</option>
                <option value="6">Semester 6</option>
            </select>
        </div>

        <div>
            <label>Registration Fee (₹):</label>
            <input type="number" name="registration_fee" placeholder="Enter Registration Fee" required>
        </div>

        <div>
            <label>Tuition Fee (₹):</label>
            <input type="number" name="tuition_fee" placeholder="Enter Tuition Fee" required>
        </div>
</fieldset>
        <button type="submit" name="add_fees" class="submit-btn">Add Fees</button>
    </form>

  
</body>
</html>
