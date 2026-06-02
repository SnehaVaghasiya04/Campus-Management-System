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
$total_result = $conn->query("SELECT COUNT(*) AS total FROM ctimetable");
$total_row = $total_result->fetch_assoc();
$totalRecords = $total_row['total'];
$totalPages = ceil($totalRecords / $limit); 

// Fetch timetable
$result = mysqli_query($conn, "SELECT * FROM ctimetable ORDER BY semester, day, time LIMIT $start , $limit");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Timetable</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="table.css">

</head>
<body>

<?php include_once('include/side.php'); ?>

<div class="container mt-4">
        <div class="container1">
            <fieldset>
                <legend><h1>Manage Time Table</h1></legend>

              


               

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Course</th>
            <th>Semester</th>
            <th>Subject</th>
            <th>Day</th>
            <th>Time</th>
            <th>Faculty</th>
            <th>Room</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['course']; ?></td>
                <td><?php echo $row['semester']; ?></td>
                <td><?php echo $row['subject']; ?></td>
                <td><?php echo $row['day']; ?></td>
                <td><?php echo $row['time']; ?></td>
                <td><?php echo $row['faculty_name']; ?></td>
                <td><?php echo $row['room_number']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
  <?php include 'include/pagination.php' ?>
   
</div>

</body>
</html>
