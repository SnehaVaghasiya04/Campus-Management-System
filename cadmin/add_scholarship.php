<?php
include 'con.php';

session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: login.php");
    exit();
}


if(isset($_POST['add_scholarship'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $amount = $_POST['amount'];
    $course = $_POST['course'];
    $type = $_POST['type'];
    $trending = isset($_POST['trending']) ? 1 : 0;

    $query = "INSERT INTO scholarships (title, description, amount, course, type, trending) 
              VALUES ('$title', '$description', '$amount', '$course', '$type', '$trending')";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Scholarship Added Successfully!'); window.location.href='manage_scholarships.php';</script>";
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
    <title>Add Scholarship</title>

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

<?php include ('include/side.php'); ?>
<link rel="stylesheet" href="form.css">
<div class="form-container">
    <form method="POST" action="">
        <h1>Add New Scholarship</h1>

       
        <fieldset>
            <legend>Scholarship Details</legend>

            <label for="title">Scholarship Title:</label>
            <input type="text" id="title" name="title" placeholder="Enter Scholarship Title" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" placeholder="Enter Scholarship Description" required></textarea>

            <label for="amount">Amount (₹):</label>
            <input type="number" id="amount" name="amount" placeholder="Enter Amount" required>

            <label for="course">Select Course:</label>
            <select id="course" name="course">
                <option value="BCA">BCA</option>
                <option value="MSc IT">MSc IT</option>
                <option value="BCom">BCom</option>
                <option value="BBA">BBA</option>
            </select>

            <label for="type">Select Type:</label>
            <select id="type" name="type">
                <option value="Merit-Based">Merit-Based</option>
                <option value="Need-Based">Need-Based</option>
                <option value="Sports">Sports</option>
                <option value="Cultural">Cultural</option>
                <option value="Special Category">Special Category</option>
            </select>

            <div class="checkbox-container">
                <input type="checkbox" id="trending" name="trending">
                <label for="trending">Mark as Trending</label>
            </div>

            <button type="submit" name="add_scholarship" class="submit-btn">Add Scholarship</button>
        </fieldset>
    </form>

    <a href="manage_scholarships.php" class="back-link">← Back to Manage Scholarships</a>
</div>

</body>
</html>
