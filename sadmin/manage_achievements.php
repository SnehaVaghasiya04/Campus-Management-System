<?php
include 'con.php';



session_start();
if (!isset($_SESSION['admin_name'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}


$limit = 3;  // Items per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);  // Ensure that the page number is at least 1
$start = ($page - 1) * $limit;

// Delete Achievement
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    // Delete image from uploads folder
    $get_image = mysqli_query($conn, "SELECT image FROM achievements WHERE id=$id");
    $row = mysqli_fetch_assoc($get_image);
    unlink("uploads/" . $row['image']);

    mysqli_query($conn, "DELETE FROM achievements WHERE id=$id");
    echo "Achievement deleted successfully!";
}

// Total records
$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM achievements");
$row = mysqli_fetch_assoc($result);
$totalRecords = $row['total'];

// Calculate total pages
$totalPages = ceil($totalRecords / $limit);

// Fetch the records for the current page
$query = "SELECT * FROM achievements ORDER BY date DESC LIMIT $start, $limit";
$result = mysqli_query($conn, $query);
?>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="table.css">
</head>
<?php include 'include/side.php'; ?>

<div class="container mt-4">
    <div class="container1">
        <fieldset>
            <legend><h1>Manage Achievements</h1></legend>
            <table border="1" cellpadding="10">
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>

                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                        <td><img src='image/{$row['image']}' width='100'></td>
                        <td>{$row['title']}</td>
                        <td>{$row['description']}</td>
                        <td>{$row['date']}</td>
                        <td>
                            <a href='edit_achievements.php?id={$row['id']}' class='btn edit-btn'>Edit</a> |
                            <a href='manage_achievements.php?delete={$row['id']}' onclick='return confirm(\"Are you sure?\")' class='btn delete-btn'>Delete</a>
                        </td>
                    </tr>";
                }
                ?>
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
