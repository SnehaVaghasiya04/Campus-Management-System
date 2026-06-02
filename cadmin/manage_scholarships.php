<?php

include 'con.php';

session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: login.php");
    exit();
}


$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$start = ($page - 1) * $limit;
$total_result = $conn->query("SELECT COUNT(*) AS total FROM  scholarships");
$total_row = $total_result->fetch_assoc();
$totalRecords = $total_row['total'];
$totalPages = ceil($totalRecords / $limit); 

if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM scholarships WHERE id=$id");
    echo "<script>alert('Scholarship Deleted Successfully!'); window.location.href='manage_scholarships.php';</script>";
}

// Fetch scholarships
$result = mysqli_query($conn, "SELECT * FROM scholarships LIMIT $start , $limit ");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Scholarships</title>

    
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="table.css">

</head>
<body>

<?php include ('include/side.php') ?>
<div class="container mt-4">
        <div class="container1">
            <fieldset>
                <legend><h1>Manage Scholarships</h1></legend>

             


                



    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Amount (₹)</th>
            <th>Course</th>
            <th>Type</th>
            <th>Trending</th>
            <th>Actions</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['title'] ?></td>
                <td><?= $row['description'] ?></td>
                <td>₹<?= number_format($row['amount']); ?></td>
                <td><?= $row['course'] ?></td>
                <td><?= $row['type'] ?></td>
                <td class="<?= $row['trending'] ? 'trending' : '' ?>">
                    <?= $row['trending'] ? 'Trending' : 'No' ?>
                </td>
                <td>
                    <a href="manage_scholarships.php?delete=<?= $row['id'] ?>" class=" btn delete-btn" onclick="return confirm('Are you sure you want to delete this scholarship?')"> Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
     <?php include 'include/pagination.php' ?>
</div>

</body>
</html>
s