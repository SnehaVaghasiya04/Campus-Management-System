<?php
include 'con.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}

// Pagination settings
$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$start = ($page - 1) * $limit;

// Fetch total records
$resultCount = mysqli_query($conn, "SELECT COUNT(*) AS total FROM student");
$totalRows = mysqli_fetch_assoc($resultCount)['total'];
$totalPages = ceil($totalRows / $limit);

// Search functionality
$search = isset($_GET['search']) ? $_GET['search'] : '';
$whereClause = $search ? "WHERE full_name LIKE '%$search%' OR student_id LIKE '%$search%'" : "";

// Fetch limited records
$query = "SELECT * FROM student $whereClause LIMIT $start, $limit";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Teacher Report</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
   
    <style>
  <style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
        font-size: 20px; /* Reduced font size */
    }
    .container1 {
        background: #fff;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        margin-top: 90px;
        margin-left: 240px;
        margin-right: auto;
        width: 900px; /* Reduced width */
        margin-bottom: 20px;

    }
    h1 {
        font-size: 20px; /* Reduced heading size */
        font-weight: 600;
        color: #333;
    }
    .search-bar {
        display: flex;
        justify-content: flex-end;
        margin-bottom: 8px;
    }
    .search-bar input {
        padding: 6px;
        width: 200px; /* Smaller input field */
        border-radius: 4px;
        border: 1px solid #ddd;
        font-size: 12px;
    }
    table {
        width: 100%;
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        font-size: 14px; /* Smaller table font */
    }
    th, td {
        padding: 6px; /* Reduced padding */
        border-bottom: 1px solid #ddd;
        text-align: left;
    }
    th {
        background: #007bff;
        color: white;
    }
    .pagination {
        margin-top: 15px;
        display: flex;
        justify-content: center;
        gap: 5px;
    }
    .pagination a, .pagination span {
        padding: 6px 10px;
        border-radius: 4px;
        text-decoration: none;
        font-size: 12px; /* Smaller pagination */
        background: #007bff;
        color: white;
    }
    .pagination .disabled {
        background: #ddd;
        color: #666;
        pointer-events: none;
    }
</style>


    </style>
</head>
<body>
    <?php include ('include/header.php'); ?>
    <div class="    container mt-4">
    <div class="container1">
        <fieldset>
   <legend>     <h1>school Student Report</h1></legend>
   <div class="search-bar">
        <form method="GET" >
            <input type="text" name="search" placeholder="Search by Name or Email" value="<?php echo $search; ?>">
            <button type="submit" class="btn btn-primary btn-sm">Search</button>
        </form>
    </div>
        <table class="table">
            <tr>
                <th>Student ID</th>
        <th>Full Name</th>
        <th>DOB</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Address</th>
        <th>Standard</th>
        <th>Stream</th>
               
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
               <td><?= $row['student_id'] ?></td>
        <td><?= $row['full_name'] ?></td>
        <td><?= $row['dob'] ?></td>
        <td><?= $row['contact'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['address'] ?></td>
        <td><?= $row['standard'] ?></td>
        <td><?= $row['stream'] ?></td>
                
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
        </fieldset>
    </div>
    </div>
</body>
</html>
