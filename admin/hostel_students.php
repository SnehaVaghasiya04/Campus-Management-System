<?php
include 'con.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}

$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$start = ($page - 1) * $limit;

// Initialize search variable
$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

// Fetch total records
$total_result = $conn->query("SELECT COUNT(*) AS total FROM hostel_student WHERE name LIKE '%$search%'");
$total = $total_result->fetch_assoc()['total'];
$pages = ceil($total / $limit);

// Fetch students with search and pagination
$result = $conn->query("SELECT * FROM hostel_student WHERE name LIKE '%$search%' LIMIT $start, $limit");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Hostel Students</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
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
            background: white;
            color:balck;
            text-align: left;
            padding: 10px;
        }
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
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
    <?php include 'include/header.php'; 
?>
    <div class="container mt-4">
        <div class="container1">
            <fieldset>
                <legend><h2>Hostel Students</h2></legend>
                
                <div class="search-bar">
                    <form method="GET">
                        <input type="text" name="search" placeholder="Search by name" value="<?= htmlspecialchars($search) ?>">
                        <button type="submit" class="btn btn-primary btn-sm">Search</button>
                    </form>
                </div>

                <table>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>School/College</th>
                        <th>Class</th>
                        <th>Room Type</th>
                        <th>Contact</th>
                        <th>Admission ID</th>
                    </tr>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['school_college'] ?></td>
                        <td><?= $row['class'] ?></td>
                        <td><?= $row['room_type'] ?></td>
                        <td><?= $row['contact'] ?></td>
                        <td><?= $row['admission_id'] ?></td>
                    </tr>
                    <?php } ?>
                </table>

                <div class="pagination">
                    <?php if ($page > 1): ?>
                        <a href="?page=<?= $page - 1 ?>&search=<?= urlencode($search) ?>">Previous</a>
                    <?php else: ?>
                        <span class="disabled">Previous</span>
                    <?php endif; ?>

                    <span>Page <?= $page ?> of <?= $pages ?></span>

                    <?php if ($page < $pages): ?>
                        <a href="?page=<?= $page + 1 ?>&search=<?= urlencode($search) ?>">Next</a>
                    <?php else: ?>
                        <span class="disabled">Next</span>
                    <?php endif; ?>
                </div>
            </fieldset>
        </div>
    </div>
</body>
</html>
