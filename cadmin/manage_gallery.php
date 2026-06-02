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
$total_result = $conn->query("SELECT COUNT(*) AS total FROM  cgallery");
$total_row = $total_result->fetch_assoc();
$totalRecords = $total_row['total'];
$totalPages = ceil($totalRecords / $limit); 

// Delete Image
if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    
    // Get Image Path
    $getImageQuery = "SELECT image FROM cgallery WHERE id = $id";
    $imageResult = mysqli_query($conn, $getImageQuery);
    $imageRow = mysqli_fetch_assoc($imageResult);
    $imagePath = $imageRow['image'];

    // Delete from folder
    if(file_exists($imagePath)) {
        unlink($imagePath);
    }

    // Delete from database
    $deleteQuery = "DELETE FROM cgallery WHERE id = $id ";
    mysqli_query($conn, $deleteQuery);
    echo "<script>alert('Image deleted successfully!'); window.location.href='manage_gallery.php';</script>";
}

// Fetch Images
$query = "SELECT * FROM cgallery ORDER BY id DESC LIMIT $start , $limit";
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


    
</head>
<body>
 <?php include_once('include/side.php'); ?>
  <div class="container mt-4">
  <div class="container1">
            <fieldset>
                <legend><h1>Manage Messages</h1></legend>

               

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
