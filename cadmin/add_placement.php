
<?php
include 'con.php';

session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: login.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['student_name'];
    $company = $_POST['company'];
    $package = $_POST['package'];
    $year = $_POST['year'];

    $sql = "INSERT INTO placements (student_name, company, package, year) VALUES ('$name', '$company', '$package', '$year')";
    $conn->query($sql);

    header("Location: manage_placements.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Placement</title>
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
    </style>
</head>
<body>
    <?php include_once('include/side.php'); ?>
<link rel="stylesheet" href="form.css">
<div class="form-container">
    <form method="POST" action="">
        <h1>Add Placement</h1>

        <fieldset>
            <legend>Placement details</legend>
    
            <input type="text" name="student_name" placeholder="Student Name" required>
            <input type="text" name="company" placeholder="Company" required>
            <input type="number" step="0.1" name="package" placeholder="Package (LPA)" required>
            <input type="number" name="year" placeholder="Year" required>
        </fieldset>
            <button type="submit">Add Placement</button>
        </form>
       
    </div>
</body>
</html>