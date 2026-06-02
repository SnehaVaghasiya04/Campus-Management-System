<?php
// Database connection
include 'con.php';




$limit = 3;  // Number of records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$start = ($page - 1) * $limit;

// Search query handling
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Fetch total records count for pagination
$totalQuery = "SELECT COUNT(*) AS total FROM student_materials WHERE material_name LIKE '%$search%'";
$totalResult = $conn->query($totalQuery);
$totalRow = $totalResult->fetch_assoc();
$totalPages = ceil($totalRow['total'] / $limit);

// Fetch filtered materials with pagination
$query = "SELECT * FROM student_materials WHERE material_name LIKE '%$search%' LIMIT $start, $limit";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Study Materials</title>
    <link rel="stylesheet" href="styles.css">
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
            margin-right: 5px;
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
<?php include_once('include2/side.php'); ?>

<div class="container mt-4">
    <div class="container1">
        <fieldset>
            <legend><h1>Existing Study Materials</h1></legend>

            <!-- Search Bar with Button -->
            <div class="search-bar">
                <form method="GET">
                    <input type="text" name="search" id="searchInput" placeholder="🔍 Search materials..." value="<?= htmlspecialchars($search) ?>">
                    <button type="submit" class="btn btn-primary btn-sm">Search</button>
                </form>
            </div>

            <a href="add_material.php" class="btn btn-success mb-3">➕ Add New Material</a>

            <?php if ($result->num_rows > 0): ?>
                <table id="materialsTable">
                    <thead>
                        <tr>
                            <th>Standard</th>
                            <th>Stream</th>
                            <th>Material Name</th>
                            <th>Download</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['standard']) ?></td>
                                <td><?= htmlspecialchars($row['stream']) ?></td>
                                <td><?= htmlspecialchars($row['material_name']) ?></td>
                                <td><a href="<?= htmlspecialchars($row['material_link']) ?>" target="_blank" class="btn btn-primary btn-sm">📥 Download</a></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="text-danger">No materials available.</p>
            <?php endif; ?>

            <!-- Pagination -->
            <div class="pagination">
                <?php if ($page > 1): ?>
                    <a href="?page=<?= $page - 1 ?>&search=<?= htmlspecialchars($search) ?>">Previous</a>
                <?php else: ?>
                    <span class="disabled">Previous</span>
                <?php endif; ?>

                <span><?= $page ?></span>

                <?php if ($page < $totalPages): ?>
                    <a href="?page=<?= $page + 1 ?>&search=<?= htmlspecialchars($search) ?>">Next</a>
                <?php else: ?>
                    <span class="disabled">Next</span>
                <?php endif; ?>
            </div>
        </fieldset>
    </div>
</div>
</body>
</html>
