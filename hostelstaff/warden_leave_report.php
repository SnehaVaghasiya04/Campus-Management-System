<?php
include 'con.php';

$limit = 5;  // Number of records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$start = ($page - 1) * $limit;

// Get total records for pagination
$total_query = mysqli_query($conn, "SELECT COUNT(*) as total FROM leave_application");
$total_data = mysqli_fetch_assoc($total_query);
$totalRecords = $total_data['total'];
$totalPages = ceil($totalRecords / $limit);

// Update Leave Status
if (isset($_POST['update_status'])) {
    $leave_id = $_POST['leave_id'];
    $leave_status = $_POST['leave_status'];

    $update_sql = "UPDATE leave_application SET leave_status = '$leave_status' WHERE id = '$leave_id'";
    if (mysqli_query($conn, $update_sql)) {
        echo "<script>alert('Leave status updated to $leave_status');</script>";
    } else {
        echo "<script>alert('Error updating status.');</script>";
    }
}

// Fetch paginated leave applications
$leave_query = mysqli_query($conn, "SELECT la.*, hs.name 
                                    FROM leave_application la 
                                    JOIN hostel_student hs ON la.admission_id = hs.admission_id 
                                    LIMIT $limit OFFSET $start");
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Warden Panel - Leave Approval</title>
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
        .action-form {
            display: flex;
            gap: 5px;
        }
        .form-select {
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .update-btn {
            background: #007bff;
            color: white;
            border: none;
            padding: 6px 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .update-btn:hover {
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
    <?php include_once('include/side.php'); ?>
    <div class="container mt-4">
        <div class="container1">
            <fieldset>
                <legend><h1>Leave Applications</h1></legend>

                <table>
                    <tr>
                        <th>ID</th>
                        <th>Admission ID</th>
                        <th>Student Name</th>
                        <th>Reason</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_assoc($leave_query)): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['admission_id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['reason']; ?></td>
                            <td><?php echo $row['from_date']; ?></td>
                            <td><?php echo $row['to_date']; ?></td>
                            <td><?php echo $row['leave_status']; ?></td>
                            <td>
                                <form method="POST" class="action-form">
                                    <input type="hidden" name="leave_id" value="<?php echo $row['id']; ?>">
                                    <select name="leave_status" class="form-select">
                                        <option value="Approved">Approve</option>
                                        <option value="Rejected">Reject</option>
                                    </select>
                                    <button type="submit" name="update_status" class="update-btn">Update</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
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
