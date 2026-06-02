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
$total_result = $conn->query("SELECT COUNT(*) AS total FROM college_fees");
$total_row = $total_result->fetch_assoc();
$totalRecords = $total_row['total'];
$totalPages = ceil($totalRecords / $limit); 

// Handle delete request
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM college_fees WHERE id=$id");
    echo "<script>alert('Fee record deleted successfully!'); window.location.href='manage_fees.php';</script>";
}

// Fetch all fees
$result = mysqli_query($conn, "SELECT * FROM college_fees ORDER BY course, semester LIMIT $start ,$limit");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Fees</title>

    

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="table.css">

       
</head>
<body>

<?php include_once('include/side.php'); ?>

<<div class="container mt-4">
        <div class="container1">
            <fieldset>
                <legend><h1>Manage Fees</h1></legend>

                


                

    <table>
        <tr>
            <th>ID</th>
            <th>Course</th>
            <th>Semester</th>
            <th>Registration Fee (₹)</th>
            <th>Tuition Fee (₹)</th>
            
            <th>Actions</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['course']; ?></td>
                <td><?= $row['semester']; ?></td>
                <td>₹<?= number_format($row['registration_fee']); ?></td>
                <td>₹<?= number_format($row['tuition_fee']); ?></td>
                
                <td>
                    <a href="edit_fees.php?id=<?= $row['id']; ?>" class="action-btn edit-btn">✏️ Edit</a>
                    <a href="manage_fees.php?delete=<?= $row['id']; ?>" class="action-btn delete-btn" onclick="return confirm('Are you sure you want to delete this record?')">❌ Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
 <?php include 'include/pagination.php' ?>
   
</div>

</body>
</html>
