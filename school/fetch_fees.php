<?php
if (isset($_GET['data']) && isset($_GET['grandTotal'])) {
    $fees_data = json_decode($_GET['data'], true);
    $grandTotal = $_GET['grandTotal'];
} else {
    die("Invalid access.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Fees Bill</title>
</head>
<body>
    <h2>Total Fees Bill</h2>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Standard</th>
                <th>Total Fees (₹)</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fees_data as $fee) { ?>
                <tr>
                    <td><?php echo $fee["standard"]; ?></td>
                    <td>₹<?php echo $fee["totalFee"]; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <h3>Grand Total: ₹<?php echo $grandTotal; ?></h3>
</body>
</html>
