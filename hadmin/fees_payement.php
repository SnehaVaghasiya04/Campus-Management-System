<?php
include 'con.php';  // Database connection

// Initialize variables
$admission_id = '';
$student = null;
$fees = null;
$error_message = '';
$success_message = '';

// Handle student search
if (isset($_POST['search_student'])) {
    $admission_id = $_POST['admission_id'];

    // Fetch student details
    $student_query = "SELECT * FROM hostel_student WHERE admission_id = '$admission_id'";
    $student_result = mysqli_query($conn, $student_query);
    $student = mysqli_fetch_assoc($student_result);

    if ($student) {
        // Fetch fees based on room type
        $room_type = $student['room_type'];
        $fees_query = "SELECT * FROM hostel_fees WHERE room_type = '$room_type'";
        $fees_result = mysqli_query($conn, $fees_query);
        $fees = mysqli_fetch_assoc($fees_result);
    } else {
        $error_message = "No student found with this Admission ID.";
    }
}

// Handle fees payment
if (isset($_POST['pay_fees'])) {
    $admission_id = $_POST['admission_id'];
    $payment_date = $_POST['payment_date'];
    $amount_paid = $_POST['amount_paid'];

    // Insert payment
    $insert_query = "INSERT INTO fees_payment (admission_id, payment_date, amount_paid) 
                     VALUES ('$admission_id', '$payment_date', '$amount_paid')";

    if (mysqli_query($conn, $insert_query)) {
        $success_message = "Fees paid successfully!";
    } else {
        $error_message = "Failed to process payment.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pay Hostel Fees</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: auto;
            background: white;
            padding: 20px;
            box-shadow: 0px 0px 10px 0px #ccc;
            border-radius: 10px;
            margin-top: 90px;
        }
        fieldset {
            border: 2px solid #007bff;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
        }
        legend {
            font-weight: bold;
            color: #007bff;
            font-size: 18px;
        }
        label {
            font-weight: bold;
            display: block;
            margin: 10px 0 5px;
        }
        input, button {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }


         input, textarea {
            width: 97.5%;
            padding: 12px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
           
            font-size: 14px;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .message {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            text-align: center;
        }
        .error {
            background: #ffcccc;
            color: red;
        }
        .success {
            background: #ccffcc;
            color: green;
        }
    </style>
</head>
<body>

<?php include ('include/side.php'); ?>

<div class="container">
    <h2 style="text-align: center; color: #007bff;">Pay Hostel Fees</h2>

    <?php if ($error_message): ?>
        <div class="message error"><?php echo $error_message; ?></div>
    <?php elseif ($success_message): ?>
        <div class="message success"><?php echo $success_message; ?></div>
    <?php endif; ?>

    <!-- Search Student -->
    <fieldset>
        <legend>Search Student</legend>
        <form method="POST">
            <label>Admission ID</label>
            <input type="text" name="admission_id" value="<?php echo htmlspecialchars($admission_id); ?>" required>
            <button type="submit" name="search_student">Search Student</button>
        </form>
    </fieldset>

    <?php if ($student && $fees): ?>
        <!-- Student Details -->
        <fieldset>
            <legend>Student Details</legend>
            <p><strong>Name:</strong> <?php echo $student['name']; ?></p>
            <p><strong>Class:</strong> <?php echo $student['class']; ?></p>
            <p><strong>Room Type:</strong> <?php echo $student['room_type']; ?></p>
            <p><strong>Guardian Name:</strong> <?php echo $student['guardian_name']; ?></p>
            <p><strong>Guardian Contact:</strong> <?php echo $student['guardian_contact']; ?></p>
        </fieldset>

        <!-- Fees Details -->
        <fieldset>
            <legend>Fees Details</legend>
            <p><strong>Room Type:</strong> <?php echo $fees['room_type']; ?></p>
            <p><strong>Fees Amount:</strong> ₹<?php echo $fees['fees']; ?></p>
        </fieldset>

        <!-- Payment Form -->
        <fieldset>
            <legend>Make Payment</legend>
            <form method="POST">
                <input type="hidden" name="admission_id" value="<?php echo $admission_id; ?>">
                <label>Payment Date</label>
                <input type="date" name="payment_date" required>
                <label>Amount Paid</label>
                <input type="number" name="amount_paid" step="0.01" value="<?php echo $fees['fees']; ?>" required>
                <button type="submit" name="pay_fees">Pay Fees</button>
            </form>
        </fieldset>
    <?php endif; ?>
</div>

</body>
</html>
