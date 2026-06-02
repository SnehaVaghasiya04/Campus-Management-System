<?php
include("con.php");

session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: login.php");
    exit();
}


$limit = 3;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$start = ($page - 1) * $limit;
$total_result = $conn->query("SELECT COUNT(*) AS total FROM cexam_schedule");
$total_row = $total_result->fetch_assoc();
$totalRecords = $total_row['total'];
$totalPages = ceil($totalRecords / $limit); 

// Fetch Exam Schedules
$result = mysqli_query($conn, 
    "SELECT e.id, e.course, e.semester, e.subject, e.exam_date, e.exam_time, e.venue, f.name AS supervisor_name 
    FROM cexam_schedule e 
    JOIN faculty f ON e.supervisor_id = f.id 
    ORDER BY e.exam_date ASC LIMIT $start , $limit"
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Exam Schedule</title>
   
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="table.css">

</head>
<body>
    <?php include_once('include/side.php'); ?>

    <div class="container mt-4">
        <div class="container1">
            <fieldset>
                <legend><h1>Manage Exam Schedule</h1></legend>



               
    <table>
        <tr>
            <th>ID</th>
            <th>Course</th>
            <th>Semester</th>
            <th>Subject</th>
            <th>Exam Date</th>
            <th>Exam Time</th>
            <th>Venue</th>
            <th>Supervisor</th>
            <th>Action</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['course']; ?></td>
                <td><?php echo $row['semester']; ?></td>
                <td><?php echo $row['subject']; ?></td>
                <td><?php echo $row['exam_date']; ?></td>
                <td><?php echo $row['exam_time']; ?></td>
                <td><?php echo $row['venue']; ?></td>
                <td><?php echo $row['supervisor_name']; ?></td>
                <td>
                    <a href="edit_exam.php?id=<?php echo $row['id']; ?>" class="btn edit-btn">Edit</a>
                    <a href="delete_exam.php?id=<?php echo $row['id']; ?>" class="btn delete-btn" onclick="return confirm('Are you sure you want to delete this exam?');">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
      <?php include 'include/pagination.php' ?>

</body>
</html>
