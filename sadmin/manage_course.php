<?php
include 'con.php';


session_start();
if (!isset($_SESSION['admin_name'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}




// Pagination variables
$limit = 5;  // Number of records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);  // Ensure the page number is at least 1
$start = ($page - 1) * $limit;  // Calculate the starting record for SQL query

// Total records count
$total_result = $conn->query("SELECT COUNT(*) AS total FROM courses");
$total_row = $total_result->fetch_assoc();
$totalRecords = $total_row['total'];
$totalPages = ceil($totalRecords / $limit);  // Calculate the total pages

// SQL query to fetch courses with LIMIT and OFFSET
$query = "SELECT * FROM courses LIMIT $start, $limit";
$result = $conn->query($query);

// Handle course deletion
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_sql = "DELETE FROM courses WHERE id = $delete_id";
    
    if ($conn->query($delete_sql) === TRUE) {
        echo "<script>alert('Course deleted successfully!'); window.location.href = 'manage_courses.php';</script>";
    } else {
        echo "<script>alert('Error deleting course: " . $conn->error . "'); window.location.href = 'manage_courses.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Courses</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="table.css">
</head>
<body>

<?php include_once('include/side.php'); ?>


    
     <div class="container mt-4">
        <div class="container1">
            <fieldset>
                <legend><h1>Manage Courses</h1></legend>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Teacher Name</th>
                <th>Subject Name</th>
                <th>Duration</th>
                <th>Section</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']); ?></td>
                    <td><?= htmlspecialchars($row['teacher_name']); ?></td>
                    <td><?= htmlspecialchars($row['subject_name']); ?></td>
                    <td><?= htmlspecialchars($row['duration']); ?></td>
                    <td><?= htmlspecialchars($row['section']); ?></td>
                    <td>
                        <a href="edit_course.php?id=<?= $row['id']; ?>" class="btn-edit">✏️ Edit</a>
                        <a href="manage_courses.php?delete_id=<?= $row['id']; ?>" class="btn-delete" onclick="return confirm('Are you sure you want to delete this course?')">🗑️ Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php include 'include/pagination.php' ?>
</div>

</body>
</html>
