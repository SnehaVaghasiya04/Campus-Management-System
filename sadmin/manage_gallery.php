<?php
include 'con.php';



session_start();
if (!isset($_SESSION['admin_name'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}


// Pagination variables
$limit = 3;  // Number of records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);  // Ensure the page number is at least 1
$start = ($page - 1) * $limit;  // Calculate the starting record for SQL query

// Delete Image
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    
    // Get Image Path
    $getImageQuery = "SELECT image FROM gallery WHERE id = $id";
    $imageResult = mysqli_query($conn, $getImageQuery);
    $imageRow = mysqli_fetch_assoc($imageResult);
    $imagePath = $imageRow['image'];

    // Delete from folder
    if(file_exists($imagePath)) {
        unlink($imagePath);
    }

    // Delete from database
    $deleteQuery = "DELETE FROM gallery WHERE id = $id";
    mysqli_query($conn, $deleteQuery);
    echo "<script>alert('Image deleted successfully!'); window.location.href='manage_gallery.php';</script>";
}

// Fetch total records for pagination
$totalQuery = "SELECT COUNT(*) as total FROM gallery";
$totalResult = mysqli_query($conn, $totalQuery);
$totalRow = mysqli_fetch_assoc($totalResult);
$totalRecords = $totalRow['total'];
$totalPages = ceil($totalRecords / $limit);  // Calculate the total pages

// Fetch images with LIMIT and OFFSET for pagination
$query = "SELECT * FROM gallery ORDER BY id DESC LIMIT $start, $limit";
$result = mysqli_query($conn, $query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Gallery</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="table.css">
    <style>
       
    </style>
</head>
<body>
 <?php include_once('include/side.php'); ?>
 

    <div class="container mt-4">
        <div class="container1">
            <fieldset>
                <legend><h1>Manage Gallery</h1></legend>

<table>
    <tr>
        <th>ID</th>
        <th>Category</th>
        <th>Image</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['category']; ?></td>
        <td><img src="<?php echo $row['image']; ?>" width="100"></td>
        <td><?php echo $row['description']; ?></td>
        <td>
            <a href="edit_gallery.php?id=<?php echo $row['id']; ?>" class="action-btn edit">Edit</a>
            <a href="manage_gallery.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?');" class="action-btn delete">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>
 <?php include 'include/pagination.php' ?>

</body>
</html>
