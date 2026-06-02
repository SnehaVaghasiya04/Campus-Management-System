<?php
include 'con.php';

$limit = 5; // Number of records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$start = ($page - 1) * $limit;

// ✅ Count total records
$totalQuery = mysqli_query($conn, "SELECT COUNT(*) AS total FROM hostel_fees");
$totalRow = mysqli_fetch_assoc($totalQuery);
$totalRecords = $totalRow['total'];
$totalPages = ceil($totalRecords / $limit);

// ✅ Fetch paginated records
$result = mysqli_query($conn, "SELECT * FROM hostel_fees LIMIT $start, $limit");

// ✅ Delete code
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete = mysqli_query($conn, "DELETE FROM hostel_fees WHERE id='$delete_id'");
    if ($delete) {
        echo "<script>alert('Record deleted successfully!'); window.location.href='manage_fees.php';</script>";
        exit;
    } else {
        echo "<script>alert('Failed to delete the record.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Hostel Fees</title>
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
            width: 1000px;
            margin-bottom: 30px;
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
            background: #007bff;
            color: white;
            text-align: left;
            padding: 10px;
        }
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .action-btn {
            padding: 6px 10px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            display: inline-block;
        }
        .edit-btn {
            background: #28a745;
            color: white;
        }
        .delete-btn {
            background: #dc3545;
            color: white;
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
   <?php include('include/side.php'); ?>

<div class="container mt-4">
    <div class="container1">
        <fieldset>
            <legend><h1>Manage Hostel Fees</h1></legend>

            <table>
                <tr>
                    <th>Category</th>
                    <th>Standard/Course</th>
                    <th>Room Type</th>
                    <th>Fees (₹)</th>
                    <th>Actions</th>
                </tr>

                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['category']; ?></td>
                    <td><?php echo $row['standard_course']; ?></td>
                    <td><?php echo $row['room_type']; ?></td>
                    <td><?php echo $row['fees']; ?></td>
                    <td>
                        <a href="edit_fees.php?id=<?php echo $row['id']; ?>" class="edit-btn action-btn">Edit</a>
                        <a href="manage_fees.php?delete_id=<?php echo $row['id']; ?>" class="delete-btn action-btn" onclick="return confirm('Are you sure you want to delete this record?');">Delete</a>
                    </td>
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
