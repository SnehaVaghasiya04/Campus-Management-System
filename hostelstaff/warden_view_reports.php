<?php
include 'con.php';

$limit = 5;  // Records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$start = ($page - 1) * $limit;

// Get total records count where status is 'Approved'
$totalResult = mysqli_query($conn, "SELECT COUNT(*) AS total FROM visitors WHERE status = 'Approved'");
$totalRow = mysqli_fetch_assoc($totalResult);
$totalRecords = $totalRow['total'];
$totalPages = ceil($totalRecords / $limit);

// Fetch approved visitor data with pagination
$result = mysqli_query($conn, "SELECT * FROM visitors WHERE status = 'Approved' ORDER BY visit_date DESC LIMIT $start, $limit");
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Visitor Reports</title>
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8f9fa; }
        .container1 { background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); margin-top: 90px; margin-left: 180px; width: 1000px; margin-bottom: 30px; }
        h1 { font-size: 22px; font-weight: 600; color: #333; }
        table { width: 100%; background: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); }
        th { background: #007bff; color: white; text-align: left; padding: 10px; }
        td { padding: 10px; border-bottom: 1px solid #ddd; }
        .pagination { margin-top: 20px; display: flex; justify-content: center; gap: 10px; }
        .pagination a, .pagination span { padding: 8px 12px; border-radius: 5px; text-decoration: none; font-size: 14px; background: #007bff; color: white; }
        .pagination .disabled { background: #ddd; color: #666; pointer-events: none; }
    </style>
</head>
<body>

<?php include('include/side.php'); ?>

<div class="container mt-4">
    <div class="container1">
        <fieldset>
            <legend><h1>Approved Visitor Reports</h1></legend>

            <table>
                <tr>
                    <th>Report ID</th>
                    <th>Visitor Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Purpose</th>
                    <th>Visit Date</th>
                    <th>Status</th>
                   
                </tr>
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['name']; ?></td>
                        <td><?= $row['contact']; ?></td>
                        <td><?= $row['email']; ?></td>
                        <td><?= $row['purpose']; ?></td>
                        <td><?= $row['visit_date']; ?></td>
                        <td><?= $row['status']; ?></td>
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
