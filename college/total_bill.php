<?php
include 'con.php';

if (isset($_GET['course']) && isset($_GET['total'])) {
    $course = $_GET['course'];
    $semester = $_GET['semester'];
    $registrationFee = $_GET['registration'];
    $tuitionFee = $_GET['tuition'];
    $hostelFee = $_GET['hostel'];
    $transportFee = $_GET['transport'];
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
    <title>Fees Structure - <?php echo $course; ?> Semester <?php echo $semester; ?></title>
    <style>
        /* General Page Styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        .fee-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 10px;
        }

        .fee-header h3 {
            font-size: 24px;
            color: #333;
            font-weight: bold;
        }

        .total-fee {
            font-size: 40px;
            font-weight: bold;
            color: #1d5eff;
        }

        .fee-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .fee-table th, .fee-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .fee-table th {
            background-color: #f2f2f2;
        }

        /* Highlighted Fee Section */
        .fee-highlight {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            margin-top: 20px;
        }

        /* Fee Download Button */
        .download-btn {
            background: #ffa726;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-decoration: none;
            margin-top: 15px;
        }

        .download-btn:hover {
            background: #f57c00;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .fee-header {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="fee-header">
        <h3>Fees Structure for <?php echo $course; ?> - Semester <?php echo $semester; ?></h3>
    </div>

    <p>Total fee for this semester:</p>
    <div class="total-fee">₹<?php echo number_format($totalFee); ?>/-</div>

    <table class="fee-table">
        <tr>
            <th>Type</th>
            <th>Frequency</th>
            <th>Amount</th>
        </tr>
        <tr>
            <td>Registration/Application Fee</td>
            <td>One Time</td>
            <td>₹<?php echo number_format($registrationFee); ?></td>
        </tr>
        <tr>
            <td>Tuition Fee</td>
            <td>Yearly</td>
            <td>₹<?php echo number_format($tuitionFee); ?></td>
        </tr>
        <tr>
            <td>Hostel Fee</td>
            <td>Yearly</td>
            <td>₹<?php echo number_format($hostelFee); ?></td>
        </tr>
        <tr>
            <td>Transport Fee</td>
            <td>Yearly</td>
            <td>₹<?php echo number_format($transportFee); ?></td>
        </tr>
    </table>

    <p style="margin-top: 10px; font-size: 14px; color: #777;">
        * The fees provided above are to the best of our knowledge. This information might vary. 
        Please get in touch with the school for proper details.
    </p>

    <a href="download.php" class="download-btn">
        📂 Download Fees Structure
    </a>
</div>

</body>
</html>
