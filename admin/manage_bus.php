<?php
include 'con.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}

$limit = 3;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$start = ($page - 1) * $limit;

// Delete Bus Record
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql = "DELETE FROM buses WHERE id = $delete_id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Bus deleted successfully!'); window.location.href='manage_buses.php';</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
$resultCount = mysqli_query($conn, "SELECT COUNT(*) AS total FROM buses");
$totalRows = mysqli_fetch_assoc($resultCount)['total'];
$totalPages = ceil($totalRows / $limit);

// Search functionality
$searchQuery = "";
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $conn->real_escape_string($_GET['search']);
    $searchQuery = "WHERE bus_number LIKE '%$search%' OR route LIKE '%$search%' OR pickup_points LIKE '%$search%'";
}

// Fetch Bus Records
$sql = "SELECT * FROM buses $searchQuery LIMIT $start, $limit";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Buses</title>
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
        .faculty-img {
    width: 80px;  /* Adjust width as needed */
    height: 80px; /* Adjust height as needed */
    border-radius: 5px; /* Optional: Rounds corners */
    object-fit: cover; /* Ensures proper scaling */
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
        .edit-btn:hover {
            background: #218838;
        }
        .delete-btn:hover {
            background: #c82333;
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
    <?php include 'include/header.php'; ?>
     <div class="    container mt-4">
    <div class="container1">
        <fielsdet>
      <legend>  <h1>Manage Buses</h1></legend>
        
        <!-- Search Bar -->
        <div class="search-bar">
            <form method="GET">
                <input type="text" name="search" placeholder="Search by Bus Number, Route, or Pickup Points" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                <button type="submit" class="btn btn-primary btn-sm">Search</button>
            </form>
        </div>
        
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Bus Number</th>
                <th>Route</th>
                <th>Pickup Points</th>
                <th>Timings</th>
                <th>Fees</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['bus_number']; ?></td>
                <td><?php echo $row['route']; ?></td>
                <td><?php echo $row['pickup_points']; ?></td>
                <td><?php echo $row['timings']; ?></td>
                <td><?php echo $row['fees']; ?></td>
                <td>
                    <a href="edit_bus.php?id=<?php echo $row['id']; ?>" class="action-btn edit-btn">Edit</a>
                    <a href="manage_buses.php?delete_id=<?php echo $row['id']; ?>" class="action-btn delete-btn" onclick="return confirm('Are you sure?');">Delete</a>
                </td>
            </tr>
            <?php } ?>
        </table>
        <div class="pagination">
            <?php if ($page > 1): ?>
                <a href="?page=<?php echo $page - 1; ?>&search=<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
Previous</a>
            <?php else: ?>
                <span class="disabled">Previous</span>
            <?php endif; ?>

            <span><?php echo $page; ?></span>

            <?php if ($page < $totalPages): ?>
                <a href="?page=<?php echo $page + 1; ?>&search=<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">Next</a>

            <?php else: ?>
                <span class="disabled">Next</span>
            <?php endif; ?>
        </div>
        </fieldset>
    </div>
    </div>
    </div>
</body>
</html>
