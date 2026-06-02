<?php
include 'con.php';

$limit = 5; // Set limit per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$start = ($page - 1) * $limit;

// Delete Food Schedule
if (isset($_GET['delete_food'])) {
    $id = $_GET['delete_food'];
    mysqli_query($conn, "DELETE FROM food_schedule WHERE id=$id");
    header("Location: view_food.php");
    exit();
}

// Count total records
$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM food_schedule");
$row = mysqli_fetch_assoc($result);
$totalRecords = $row['total'];
$totalPages = ceil($totalRecords / $limit);

// Fetch limited food schedule
$schedule = mysqli_query($conn, "SELECT * FROM food_schedule LIMIT $start, $limit");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Food Schedule</title>
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
<?php include('include/side.php'); ?>

<div class="container mt-4">
    <div class="container1">
        <fieldset>
            <legend><h1>Weekly Food Schedule</h1></legend>

            <table>
                <tr>
                    <th>Day</th>
                    <th>Morning Snacks</th>
                    <th>Breakfast</th>
                    <th>Lunch</th>
                    <th>Evening Snacks</th>
                    <th>Dinner</th>
                    <th>Late Night Snacks</th>
                    <th>Action</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($schedule)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['day']); ?></td>
                    <td><?php echo htmlspecialchars($row['morning_snacks']); ?></td>
                    <td><?php echo htmlspecialchars($row['breakfast']); ?></td>
                    <td><?php echo htmlspecialchars($row['lunch']); ?></td>
                    <td><?php echo htmlspecialchars($row['evening_snacks']); ?></td>
                    <td><?php echo htmlspecialchars($row['dinner']); ?></td>
                    <td><?php echo htmlspecialchars($row['late_night_snacks']); ?></td>
                    <td>
                        <a href="edit_food.php?id=<?php echo $row['id']; ?>" class="btn edit-btn">Edit</a>
                        <a href="?delete_food=<?php echo $row['id']; ?>" class="btn delete-btn" 
                           onclick="return confirm('Are you sure you want to delete this food item?');">Delete</a>
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
