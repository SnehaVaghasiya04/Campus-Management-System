<?php
include('con.php'); // Database connection



session_start();
if (!isset($_SESSION['admin_name'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];
    $amount = $_POST['amount'];
    $paid = $_POST['paid'];
    $due = $amount - $paid;
    $status = ($paid >= $amount) ? 'Paid' : 'Pending';
    $receipt_number = 'REC' . rand(1000, 9999); // Generating a random receipt number

    // Insert the fee payment details into the database
    $query = "INSERT INTO fees (student_id, amount, paid, due, status, receipt_number) 
              VALUES ('$student_id', '$amount', '$paid', '$due', '$status', '$receipt_number')";
    
    if (mysqli_query($conn, $query)) {
        echo "Fee payment recorded successfully. Receipt Number: $receipt_number";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<?php include_once('include/side.php'); ?>
<div class="form-container">
    <form method="POST" action="">
        <h1>pay fees</h1>

        <fieldset>
            <legend>Notice Details</legend>

   
    <label for="student_id">Student ID:</label>
    <input type="text" name="student_id" id="student_id" required><br>
    
    <label for="amount">Total Fee Amount:</label>
    <input type="number" name="amount" id="amount" required><br>
    
    <label for="paid">Amount Paid:</label>
    <input type="number" name="paid" id="paid" required><br>
    </fieldset>
    <button type="submit" value="pay fee" class="submit-btn">Pay Fee </button>
    
</form>

<style>
    /* General Styling */
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
