<?php
include('con.php'); // Database connection


session_start();
if (!isset($_SESSION['admin_name'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}



$limit = 5; // Number of records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$start = ($page - 1) * $limit;

// Get total records count
$total_result = $conn->query("SELECT COUNT(*) AS total FROM fees");
$total_row = $total_result->fetch_assoc();
$totalRecords = $total_row['total'];
$totalPages = ceil($totalRecords / $limit);

// Fetch fees details
$query = "SELECT f.id, f.student_id, f.amount, f.paid, f.due, f.status, f.receipt_number, f.payment_date, s.full_name 
          FROM fees f
          INNER JOIN student s ON f.student_id = s.student_id 
          LIMIT $start, $limit";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paid Fees Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="table.css">
    <style>
        .container1 {
            max-width: 90%;
            margin: auto;
            padding: 20px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-left: 200px;
            margin-top: 90px;
        }
        fieldset {
            border: 2px solid #007bff;
            padding: 20px;
            border-radius: 10px;
        }
        legend {
            font-size: 22px;
            font-weight: bold;
            color: #007bff;
            padding: 8px 15px;
            border-radius: 5px;
            background: #e7f1ff;
            border: 1px solid #007bff;
        }
        .fees-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .fees-table th, .fees-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        .fees-table th {
            background-color: #007bff;
            color: white;
        }
        .generate-btn {
            padding: 6px 12px;
            background: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
        }
        .generate-btn:hover {
            background: #218838;
        }
    </style>
</head>
<body>

<?php include_once('include/side.php'); ?> <!-- Sidebar -->

<div class="container mt-4">
    <div class="container1">
        <fieldset>
            <legend>📄 Paid Fees Details</legend>

            <table class="fees-table">
                <tr>
                    <th>Student Name</th>
                    <th>Amount</th>
                    <th>Paid</th>
                    <th>Due</th>
                    <th>Status</th>
                    <th>Receipt Number</th>
                    <th>Payment Date</th>
                    <th>Action</th>
                </tr>

                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>" . htmlspecialchars($row['full_name']) . "</td>
                                <td>" . htmlspecialchars($row['amount']) . "</td>
                                <td>" . htmlspecialchars($row['paid']) . "</td>
                                <td>" . htmlspecialchars($row['due']) . "</td>
                                <td>" . htmlspecialchars($row['status']) . "</td>
                                <td>" . htmlspecialchars($row['receipt_number']) . "</td>
                                <td>" . htmlspecialchars($row['payment_date']) . "</td>
                                <td><a href='grnrated_recipt.php?receipt_number=" . htmlspecialchars($row['receipt_number']) . "' 
                                    class='generate-btn' target='_blank'>Generate Receipt</a></td>
                            </tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No records found.</td></tr>";
                }
                ?>
            </table>

            <!-- Pagination -->
            <?php include 'include/pagination.php'; ?>

        </fieldset>
    </div>
</div>

</body>
</html>
