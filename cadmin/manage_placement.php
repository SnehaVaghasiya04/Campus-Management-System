<?php

include 'con.php';

session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: login.php");
    exit();
}


$limit = 1;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$start = ($page - 1) * $limit;
$total_result = $conn->query("SELECT COUNT(*) AS total FROM placements ");
$total_row = $total_result->fetch_assoc();
$totalRecords = $total_row['total'];
$totalPages = ceil($totalRecords / $limit); 

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM placements WHERE id=$id");
    header("Location: manage_placements.php");
    exit();
}

$result = $conn->query("SELECT * FROM placements");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Placements</title>
    


                

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="table.css">

</head>
<body>
    <?php include_once('include/side.php'); ?>
<div class="container mt-4">
        <div class="container1">
            <fieldset>
                <legend><h1>Manage Placements</h1></legend>

             
       
        
        <table>
            <tr>
                <th>Student Name</th>
                <th>Company</th>
                <th>Package</th>
                <th>Year</th>
                <th>Action</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?= $row['student_name'] ?></td>
                    <td><?= $row['company'] ?></td>
                    <td><?= $row['package'] ?></td>
                    <td><?= $row['year'] ?></td>
                    <td><a href="?delete=<?= $row['id'] ?>" class="btn delete-btn">Delete</a></td>
                </tr>
            <?php } ?>
        </table>
        <?php include 'include/pagination.php' ?> 
    </div>
</body>
</html>
