<?php
include 'con.php';

session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: login.php");
    exit();
}


$limit = 3;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$start = ($page - 1) * $limit;
$total_result = $conn->query("SELECT COUNT(*) AS total FROM cstudents");
$total_row = $total_result->fetch_assoc();
$totalRecords = $total_row['total'];
$totalPages = ceil($totalRecords / $limit); 
// Handle Delete Request
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM cstudents WHERE id=$id");
    echo "<script>alert('Student Deleted Successfully!'); window.location.href='manage_student.php';</script>";
}

$result = $conn->query("SELECT * FROM cstudents LIMIT $start , $limit");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Students</title>

    

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="table.css">

</head>
<body>

<?php include_once('include/side.php'); ?>



   <div class="container mt-4">
        <div class="container1">
            <fieldset>
                <legend><h1>Manage Students</h1></legend>

               


                 
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
            <th>Actions</th>
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
            <td>
                
                <a href="manage_student.php?delete=<?= $row['id'] ?>" class="action-btn delete-btn" onclick="return confirm('Are you sure?')"> Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
    <?php include 'include/pagination.php' ?>
</div>

</body>
</html>
