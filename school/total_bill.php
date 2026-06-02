<?php
if (isset($_GET['standard']) && isset($_GET['total'])) {
    $standard = $_GET['standard'];
    $registrationFee = $_GET['registration'];
    $compositeFee = $_GET['composite'];
    $hostelFee = $_GET['hostel'];
       $transportFee = $_GET['transport'];
    $frequency = $_GET['frequency'];
    $totalFee = $_GET['total'];
} else {
    die("Invalid access.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fees Structure - <?php echo $standard; ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            margin: 40px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .fees-header {
            font-size: 20px;
            font-weight: bold;
        }
        .total-amount {
            font-size: 36px;
            font-weight: bold;
            color: #1d5eff;
        }
        .info-text {
            font-size: 14px;
            color: #6c757d;
        }
        .download-btn {
            background-color: #ffaf00;
            color: #fff;
            font-weight: bold;
            border-radius: 5px;
            padding: 10px 20px;
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }
        .download-btn:hover {
            background-color: #e69900;
        }
    </style>
</head>
<body>

<div class="container">
    <h3 class="text-center fees-header">Fees Structure for <?php echo $standard; ?></h3>
    <p class="text-center">Total fee for new admissions</p>

    <div class="text-center total-amount">₹<?php echo number_format($totalFee); ?>/-</div>

    <table class="table table-bordered mt-4">
        <thead class="table-light">
            <tr>
                <th>Type</th>
                <th>Frequency</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Registration/Application Fee</td>
                <td>One Time</td>
                <td>₹<?php echo number_format($registrationFee); ?></td>
            </tr>
            <tr>
                <td>Composite Fee</td>
                <td><?php echo ucfirst($frequency); ?></td>
                <td>₹<?php echo number_format($compositeFee); ?></td>
            </tr>
            <?php if ($hostelFee > 0) { ?>
            <tr>
                <td>Hostel Fee</td>
                <td><?php echo ucfirst($frequency); ?></td>
                <td>₹<?php echo number_format($hostelFee); ?></td>
            </tr>
            <?php } ?>

            <tr>
            <td>Transport Fee</td>
            <td>Yearly</td>
            <td>₹<?php echo number_format($transportFee); ?></td>
        </tr>
        </tbody>
    </table>

    <p class="info-text">* The fees provided above are to the best of our knowledge. This information might vary, please get in touch with the school for proper details.</p>

    <div class="text-center">
        <a href="fees.php" class="btn btn-primary">Back to Fees</a>
        <a href="download.php?standard=<?php echo $standard; ?>&total=<?php echo $totalFee; ?>" class="download-btn">📥 Fees Structure</a>
    </div>
</div>

</body>
</html>
