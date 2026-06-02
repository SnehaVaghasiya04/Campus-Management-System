<?php
include("con.php"); // Include database connection

session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: login.php");
    exit();
}


// DELETE RULE
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM rules WHERE id=$id");
    echo "<script>alert('Rule Deleted Successfully'); window.location='manage_rules.php';</script>";
}

$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$start = ($page - 1) * $limit;
$total_result = $conn->query("SELECT COUNT(*) AS total FROM rules");
$total_row = $total_result->fetch_assoc();
$totalRecords = $total_row['total'];
$totalPages = ceil($totalRecords / $limit); 

// FETCH RULES
$result = mysqli_query($conn, "SELECT * FROM rules ORDER BY id DESC LIMIT $start , $limit");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Rules & Regulations</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="table.css">

</head>
<body>

<?php include_once('include/side.php'); ?>

 <div class="container mt-4">
        <div class="container1">
            <fieldset>
                <legend><h1>Manage Rules & Regulations</h1></legend>

               


                 

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td>
                    <a href="edit_rules.php?id=<?php echo $row['id']; ?>" class=" btn edit-btn">Edit</a>
                    <a href="manage_rules.php?delete=<?php echo $row['id']; ?>" class=" btn delete-btn" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
<?php include 'include/pagination.php' ?>    
    
</div>

</body>
</html>
