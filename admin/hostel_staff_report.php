<?php
include 'con.php'; // Database connection
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}

// Pagination settings
$limit = 3;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$start = ($page - 1) * $limit;

// Search functionality
$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : '';
$whereClause = $search ? "WHERE name LIKE '%$search%'" : "";

// Fetch total records for wardens
$resultCount = mysqli_query($conn, "SELECT COUNT(*) AS total FROM warden $whereClause");
$totalRows = mysqli_fetch_assoc($resultCount)['total'];
$totalPages = ceil($totalRows / $limit);

// Fetch paginated records for wardens
$wardens = mysqli_query($conn, "SELECT * FROM warden $whereClause LIMIT $start, $limit");

// Fetch total records for support staff
$resultCountStaff = mysqli_query($conn, "SELECT COUNT(*) AS total FROM support_staff $whereClause");
$totalRowsStaff = mysqli_fetch_assoc($resultCountStaff)['total'];
$totalPagesStaff = ceil($totalRowsStaff / $limit);

// Fetch paginated records for support staff
$support_staff = mysqli_query($conn, "SELECT * FROM support_staff $whereClause LIMIT $start, $limit");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Staff Report</title>
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
            margin-top: 50px;
            width: 90%;
            margin-top: 90px;
            margin-left: 200px;
        }
        h1 {
            font-size: 22px;
            font-weight: 600;
            color: #333;
            text-align: center;
        }
        .search-bar {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 10px;
        }
        .search-bar input {
            padding: 8px;
            width: 250px;
            border-radius: 5px;
            border: 1px solid #ddd;
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
        img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
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
    <?php include ('include/header.php'); ?>
    <div class="container mt-4">
        <div class="container1">
            <h1>Hostel Staff Report</h1>
            <div class="search-bar">
                <form method="GET">
                    <input type="text" name="search" placeholder="Search by Name" value="<?php echo $search; ?>">
                    <button type="submit" class="btn btn-primary btn-sm">Search</button>
                </form>
            </div>

            <h2>Wardens</h2>
            <table class="table">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Qualification</th>
                    <th>Contact</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($wardens)): ?>
                <tr>
                    <td><img src="images/<?php echo $row['photo']; ?>" alt="Warden Image"></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['designation']; ?></td>
                    <td><?php echo $row['qualification']; ?></td>
                    <td><?php echo $row['contact']; ?></td>
                </tr>
                <?php endwhile; ?>
            </table>

            <div class="pagination">
                <?php if ($page > 1): ?>
                    <a href="?page=<?php echo $page - 1; ?>&search=<?php echo $search; ?>">Previous</a>
                <?php else: ?>
                    <span class="disabled">Previous</span>
                <?php endif; ?>

                <span><?php echo $page; ?></span>

                <?php if ($page < $totalPages): ?>
                    <a href="?page=<?php echo $page + 1; ?>&search=<?php echo $search; ?>">Next</a>
                <?php else: ?>
                    <span class="disabled">Next</span>
                <?php endif; ?>
            </div>

            <h2>Support Staff</h2>
            <table class="table">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Duty</th>
                    <th>Shift Time</th>
                    <th>Contact</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($support_staff)): ?>
                <tr>
                    <td><img src="images/<?php echo $row['photo']; ?>" alt="Support Staff Image"></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['duty_role']; ?></td>
                    <td><?php echo $row['shift_time']; ?></td>
                    <td><?php echo $row['contact']; ?></td>
                </tr>
                <?php endwhile; ?>
            </table>

            <div class="pagination">
                <?php if ($page > 1): ?>
                    <a href="?page=<?php echo $page - 1; ?>&search=<?php echo $search; ?>">Previous</a>
                <?php else: ?>
                    <span class="disabled">Previous</span>
                <?php endif; ?>

                <span><?php echo $page; ?></span>

                <?php if ($page < $totalPagesStaff): ?>
                    <a href="?page=<?php echo $page + 1; ?>&search=<?php echo $search; ?>">Next</a>
                <?php else: ?>
                    <span class="disabled">Next</span>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
