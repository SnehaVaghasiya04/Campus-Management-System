<?php
include 'con.php';



session_start();
if (!isset($_SESSION['admin_name'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}


$limit = 1;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$start = ($page - 1) * $limit;

$total_result = $conn->query("SELECT COUNT(*) AS total FROM  exam_schedule");
$total_row = $total_result->fetch_assoc();
$totalRecords = $total_row['total'];
$totalPages = ceil($totalRecords / $limit); 
// Handle delete request
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM exam_schedule WHERE id=$id");
    echo "<script>alert('Exam deleted successfully!'); window.location='view_exam_schedule.php';</script>";
}

// Fetch Exam Schedule
$result = mysqli_query($conn, 
    "SELECT exam_schedule.*, staff.name AS teacher_name, staff.role AS teacher_role 
    FROM exam_schedule 
    LEFT JOIN staff ON exam_schedule.staff_id = staff.id LIMIT $start , $limit");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Exam Schedule</title>
 
         

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="table.css">

    </style>
</head>
<body>
 <?php include_once('include/side.php'); ?>

 <div class="container mt-4">
        <div class="container1">
            <fieldset>
                <legend><h1>Exam Schedule</h1></legend>
    
       
        
        <?php if (mysqli_num_rows($result) > 0) { ?>
            <table>
                <tr>
                    <th>Exam Name</th>
                    <th>Subject</th>
                    <th>Class</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Assigned Teacher</th>
                    <th>Teacher Role</th>
                    <th>Action</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?= $row['exam_name']; ?></td>
                        <td><?= $row['subject']; ?></td>
                        <td><?= $row['class']; ?></td>
                        <td><?= $row['exam_date']; ?></td>
                        <td><?= $row['exam_time']; ?></td>
                        <td><?= $row['teacher_name'] ?: 'Not Assigned'; ?></td>
                        <td><?= $row['teacher_role'] ?: 'N/A'; ?></td>
                        <td><a href="?delete=<?= $row['id']; ?>" class="btn delete-btn" onclick="return confirm('Are you sure?');">Delete</a></td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <p>No exams scheduled.</p>
        <?php } ?>

        
 <?php include 'include/pagination.php' ?>
</body>
</html>
