<?php
include 'con.php';

session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: login.php");
    exit();
}


$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$start = ($page - 1) * $limit;
$total_result = $conn->query("SELECT COUNT(*) AS total FROM  payments");
$total_row = $total_result->fetch_assoc();
$totalRecords = $total_row['total'];
$totalPages = ceil($totalRecords / $limit); 

$result = mysqli_query($conn, "SELECT * FROM payments ORDER BY payment_date DESC LIMIT $start , $limit");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paid Fees</title>

   

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="table.css">
</head>
<body>

<?php include_once('include/side.php'); ?>
<div class="container mt-4">
        <div class="container1">
            <fieldset>
                <legend><h1>paid Fees</h1></legend>

               


                

    <table>
        <tr>
            <th>Student ID</th>
            <th>Student Name</th>
            <th>Course</th>
            <th>Semester</th>
            <th>Amount (₹)</th>
            <th>Receipt</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['student_id']; ?></td>
                <td><?php echo $row['student_name']; ?></td>
                <td><?php echo $row['course']; ?></td>
                <td><?php echo $row['semester']; ?></td>
                <td>₹<?php echo number_format($row['amount']); ?></td>
                <td><a href="generate_receipt.php?id=<?php echo $row['id']; ?>" class="receipt-btn">📜 Generate Receipt</a></td>
            </tr>
        <?php } ?>
    </table>
     <?php include 'include/pagination.php' ?>

</div>

</body>
</html>
