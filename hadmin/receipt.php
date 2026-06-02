<?php
include 'con.php';

$id = $_GET['id'];
$query = mysqli_query($conn, "
    SELECT fp.*, hs.name, hs.class, hs.room_type, hs.guardian_name, hs.guardian_contact
    FROM fees_payment fp
    JOIN hostel_student hs ON fp.admission_id = hs.admission_id
    WHERE fp.id = '$id'
");
$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Receipt #<?php echo $data['id']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f4f4f4;
            padding: 20px;
        }
        .receipt-container {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 700px;
            margin: auto;
            text-align: center;
        }
        h2 {
            color: #007bff;
            font-weight: 600;
            margin-bottom: 20px;
        }
        fieldset {
            border: 2px solid #007bff;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }
        legend {
            font-weight: bold;
            color: #007bff;
            font-size: 18px;
            padding: 0 10px;
        }
        .receipt-details p {
            font-size: 16px;
            line-height: 1.6;
            color: #333;
            text-align: left;
        }
        .highlight {
            font-weight: bold;
            color: #333;
        }
        .amount {
            font-size: 18px;
            font-weight: bold;
            color: #28a745;
        }
        .print-btn {
            margin-top: 20px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background: #007bff;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }
        .print-btn:hover {
            background: #0056b3;
        }
        @media print {
            .print-btn {
                display: none;
            }
            .receipt-container {
                box-shadow: none;
            }
        }
    </style>
</head>
<body>

<div class="receipt-container">
    <h2>Hostel Fees Payment Receipt</h2>

    <!-- Start of fieldset -->
    <fieldset>
        <legend>Receipt Details</legend>
        <div class="receipt-details">
            <p><span class="highlight">Receipt No:</span> <?php echo $data['id']; ?></p>
            <p><span class="highlight">Admission ID:</span> <?php echo $data['admission_id']; ?></p>
            <p><span class="highlight">Student Name:</span> <?php echo $data['name']; ?></p>
            <p><span class="highlight">Class:</span> <?php echo $data['class']; ?></p>
            <p><span class="highlight">Room Type:</span> <?php echo $data['room_type']; ?></p>
            <p><span class="highlight">Guardian Name:</span> <?php echo $data['guardian_name']; ?></p>
            <p><span class="highlight">Guardian Contact:</span> <?php echo $data['guardian_contact']; ?></p>
            <p><span class="highlight">Payment Date:</span> <?php echo $data['payment_date']; ?></p>
            <p class="amount"><span class="highlight">Amount Paid:</span> ₹<?php echo $data['amount_paid']; ?></p>
        </div>
    </fieldset>
    <!-- End of fieldset -->

    <button class="print-btn" onclick="window.print()">Print Receipt</button>
</div>

</body>
</html>
