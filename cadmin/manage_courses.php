<?php
include("con.php");

session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: login.php");
    exit();
}

$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$start = ($page - 1) * $limit;
$total_result = $conn->query("SELECT COUNT(*) AS total FROM Ccourses");
$total_row = $total_result->fetch_assoc();
$totalRecords = $total_row['total'];
$totalPages = ceil($totalRecords / $limit); 

// Delete Course
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM Ccourses WHERE id=$id " );
    echo "<script>alert('Course deleted successfully!'); window.location.href='manage_courses.php';</script>";
}

// Fetch Courses
$result = mysqli_query($conn, "SELECT * FROM Ccourses ORDER BY name, semester ASC LIMIT $start , $limit ");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Courses</title>
    

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="table.css">

</head>
<body>
    <?php include_once('include/side.php'); ?>

    <div class="container mt-4">
        <div class="container1">
            <fieldset>
                <legend><h1>Manage Course</h1></legend>

               


                 
 
    <table>
        <tr>
            <th>ID</th>
            <th>Course Name</th>
            <th>Description</th>
            <th>Duration</th>
            <th>Semester</th>
            <th>Action</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><?php echo $row['duration']; ?></td>
                <td><?php echo $row['semester']; ?></td>
                <td>
                    <a class="delete" href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Delete this course?');">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    <?php include 'include/pagination.php' ?>
</body>
</html>
