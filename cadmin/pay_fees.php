<?php
include 'con.php';

session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: login.php");
    exit();
}


// Fetch students
$sql_students = "SELECT * FROM cstudents WHERE status='Approved' ORDER BY name ASC";
$result_students = mysqli_query($conn, $sql_students);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay Fees</title>

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

    <link rel="stylesheet" href="form.css">
<div class="form-container">
    <form method="POST"  action="process_payment.php">
        <h1>Pay Fees</h1>

        <fieldset>
            <legend>fess Details</legend>
   
        <label>Select Student:</label>
        <select name="student_id" required>
            <option value="">Select Student</option>
            <?php while ($row = mysqli_fetch_assoc($result_students)) { ?>
                <option value="<?php echo $row['student_id']; ?>">
                    <?php echo $row['name'] . " (" . $row['student_id'] . ")"; ?>
                </option>
            <?php } ?>
        </select>

        <label>Select Course:</label>
        <select name="course" required>
            <option value="BCA">BCA</option>
            <option value="MSc IT">MSc IT</option>
            <option value="BCom">BCom</option>
            <option value="BBA">BBA</option>
        </select>

        <label>Select Semester:</label>
        <select name="semester" required>
            <option value="1">Semester 1</option>
            <option value="2">Semester 2</option>
            <option value="3">Semester 3</option>
            <option value="4">Semester 4</option>
            <option value="5">Semester 5</option>
            <option value="6">Semester 6</option>
        </select>

        <label>Enter Amount (₹):</label>
        <input type="number" name="amount" placeholder="Amount (₹)" required>

        <label>Select Payment Method:</label>
        <select name="payment_method" required>
            <option value="Credit Card">Credit Card</option>
            <option value="Debit Card">Debit Card</option>
            <option value="Net Banking">Net Banking</option>
            <option value="UPI">UPI</option>
            <option value="Cash">Cash</option>
        </select>
</fieldset>
        <button type="submit" name="pay_fees" class="pay-btn">Pay Now</button>
    </form>
</div>

</body>
</html>
