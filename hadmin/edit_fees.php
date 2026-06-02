<?php
include 'con.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM hostel_fees WHERE id='$id'");
$data = mysqli_fetch_assoc($result);

if (!$data) {
    die("Record not found.");
}

if (isset($_POST['update'])) {
    $fees = $_POST['fees'];
    mysqli_query($conn, "UPDATE hostel_fees SET fees='$fees' WHERE id='$id'");
    echo "<div class='message'>Fees updated successfully!</div>";
    // Refresh data after update
    $result = mysqli_query($conn, "SELECT * FROM hostel_fees WHERE id='$id'");
    $data = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Fees</title>
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
     <?php  include ('include/side.php');?>
<div class="form-container">
    <form method="POST" action="">
        <h1>Edit Fees</h1>

        <fieldset>
            <legend>Fees Details</legend>


    <label>Category:</label>
    <input type="text" value="<?php echo $data['category']; ?>" disabled>

    <label>Standard/Course:</label>
    <input type="text" value="<?php echo $data['standard_course']; ?>" disabled>

    <label>Room Type:</label>
    <input type="text" value="<?php echo $data['room_type']; ?>" disabled>

    <label>Fees (₹):</label>
    <input type="text" name="fees" value="<?php echo $data['fees']; ?>" required>
</fieldset>
<button type="submit" name="update"> Update Fees</button>
    
</form>

</body>
</html>
