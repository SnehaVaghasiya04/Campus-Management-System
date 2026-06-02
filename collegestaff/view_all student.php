<?php
include 'con.php';

// Set limit per page
$limit = 5;

// Get current page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$start = ($page - 1) * $limit;

// Search filter
$search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : "";

// Build query
$whereClause = !empty($search) ? " WHERE name LIKE '%$search%' OR student_id LIKE '%$search%' OR course LIKE '%$search%'" : "";

$query = "SELECT * FROM cstudents $whereClause LIMIT $start, $limit";
$result = $conn->query($query);

// Count total records for pagination
$countQuery = "SELECT COUNT(*) AS total FROM cstudents $whereClause";
$countResult = $conn->query($countQuery);
$totalRecords = $countResult->fetch_assoc()['total'];
$totalPages = ceil($totalRecords / $limit);

// Preserve search query in pagination links
$searchParam = !empty($search) ? "&search=$search" : "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Students</title>
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
            background:  #007bff;
            color: white;
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

    <?php include_once('include/side.php'); ?>

    <div class="container mt-4">
        <div class="container1">
            <fieldset>
                <legend><h1>All Students</h1></legend>
        
                <div class="search-bar">
                    <form method="GET" action="">
                        <input type="text" name="search" placeholder="Search by Name, ID, or Course" value="<?php echo htmlspecialchars($search); ?>">
                        <button type="submit" class="btn btn-primary btn-sm">Search</button>
                    </form>
                </div>

                <table>
                    <tr>
                        <th>ID</th>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Course</th>
                        <th>Semester</th>
                        <th>DOB</th>
                    </tr>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['student_id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['phone'] ?></td>
                        <td><?= $row['course'] ?></td>
                        <td><?= $row['semester'] ?></td>
                        <td><?= $row['dob'] ?></td>
                    </tr>
                    <?php } ?>
                </table>

                <div class="pagination">
                    <?php if ($page > 1): ?>
                        <a href="?page=<?php echo $page - 1 . $searchParam; ?>">Previous</a>
                    <?php else: ?>
                        <span class="disabled">Previous</span>
                    <?php endif; ?>

                    <span><?php echo $page; ?> / <?php echo $totalPages; ?></span>

                    <?php if ($page < $totalPages): ?>
                        <a href="?page=<?php echo $page + 1 . $searchParam; ?>">Next</a>
                    <?php else: ?>
                        <span class="disabled">Next</span>
                    <?php endif; ?>
                </div>
            </fieldset>
        </div>
    </div>
</body>
</html>
