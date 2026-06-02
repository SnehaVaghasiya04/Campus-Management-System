<?php
include 'con.php';

$limit = 1; // Number of records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$start = ($page - 1) * $limit;

// Get total records count
$totalResult = mysqli_query($conn, "SELECT COUNT(*) as total FROM fees_payment");
$totalRow = mysqli_fetch_assoc($totalResult);
$totalRecords = $totalRow['total'];
$totalPages = ceil($totalRecords / $limit);

// Fetch paginated records
$result = mysqli_query($conn, "
    SELECT fp.*, hs.name, hs.class, hs.room_type
    FROM fees_payment fp
    JOIN hostel_student hs ON fp.admission_id = hs.admission_id
    ORDER BY fp.payment_date DESC
    LIMIT $start, $limit
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Paid Students List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
       body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        } 
        .container1 {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 90px;
            margin-left: 180px;
            width:  1000px;
            margin-bottom:  30px;
        }
        h1 {
            font-size: 22px;
            font-weight: 600;
            color: #333;
        }
        table {
            width: 100%;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        th {
            background:  #007bff;
            color: white;
            text-align: left;
            padding: 10px;
        }
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .receipt-link {
            display: inline-block;
            padding: 6px 12px;
            background: #007bff;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
        }
        .receipt-link:hover {
            background: #0056b3;
        }
        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .pagination a, .pagination span {
            padding: 8px 12px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            background: #007bff;
            color: white;
        }
        .pagination .disabled {
            background: #ddd;
            color: #666;
            pointer-events: none;
        } 
    </style>
</head>
<body>
<?php include ('include/side.php'); ?>
<div class="container mt-4">
    <div class="container1">
        <fieldset>
            <legend><h1>Paid Students List</h1></legend>
            <table>
                <tr>
                    <th>#</th>
                    <th>Admission ID</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Room Type</th>
                    <th>Payment Date</th>
                    <th>Amount Paid (₹)</th>
                    <th>Receipt</th>
                </tr>

                <?php
                $count = $start + 1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?php echo $count++; ?></td>
                    <td><?php echo $row['admission_id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['class']; ?></td>
                    <td><?php echo $row['room_type']; ?></td>
                    <td><?php echo $row['payment_date']; ?></td>
                    <td>₹<?php echo $row['amount_paid']; ?></td>
                    <td><a href="receipt.php?id=<?php echo $row['id']; ?>" target="_blank" class="receipt-link">View Receipt</a></td>
                </tr>
                <?php } ?>
            </table>

            <!-- Pagination -->
            <div class="pagination">
                <?php if ($page > 1): ?>
                    <a href="?page=<?php echo $page - 1; ?>">Previous</a>
                <?php else: ?>
                    <span class="disabled">Previous</span>
                <?php endif; ?>

                <span><?php echo $page; ?> / <?php echo $totalPages; ?></span>

                <?php if ($page < $totalPages): ?>
                    <a href="?page=<?php echo $page + 1; ?>">Next</a>
                <?php else: ?>
                    <span class="disabled">Next</span>
                <?php endif; ?>
            </div>
        </fieldset>
    </div>
</div>
</body>
</html>
