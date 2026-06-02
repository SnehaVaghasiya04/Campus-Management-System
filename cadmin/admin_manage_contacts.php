<?php
include("con.php");// Start the session to check if the admin is logged in


session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: login.php");
    exit();
}

$limit = 1;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$start = ($page - 1) * $limit;

$total_result = $conn->query("SELECT COUNT(*) AS total FROM contact_messages");
$total_row = $total_result->fetch_assoc();
$totalRecords = $total_row['total'];
$totalPages = ceil($totalRecords / $limit); 
// Redirect to login page if admin is not logged in
/*if (!isset($_SESSION['admin_logged_in'])) {
   / header("Location: admin_login.php");
    exit();
}*/

// Include database connection file


// Check if a delete request is sent
if (isset($_GET['delete_id'])) {
    // Get the message ID from the URL
    $delete_id = $_GET['delete_id'];

    // Prepare SQL query to delete the message
    $delete_query = "DELETE FROM contact_messages WHERE id = $delete_id";

    // Execute the delete query
    mysqli_query($conn, $delete_query);

    // Show alert message and reload the page
    echo "<script>alert('Message deleted successfully!');</script>";
    header("Location: admin_manage_contacts.php");
}

// Fetch all contact messages from the database
$query = "SELECT * FROM contact_messages LIMIT $start , $limit ";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Manage Contact Messages</title>
    <link rel="stylesheet" href="admin_styles.css"> <!-- Link to Admin CSS -->
   
      
                

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="table.css">
    </style>
</head>

<body>

<?php include_once('include/side.php'); ?>
 <div class="container mt-4">
        <div class="container1">
            <fieldset>
                <legend><h1>Manage Contact Messages</h1></legend>


    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
           
            <th>Action</th>
        </tr>

        <!-- Loop through the fetched messages and display them in the table -->
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['subject']; ?></td>
            <td><?php echo substr($row['message'], 0, 50) . "..."; ?></td>
           
            <td>
                <a href="view_contact.php?id=<?php echo $row['id']; ?>" class="btn edit-btn"> View</a> 
                <a href="admin_manage_contacts.php?delete_id=<?php echo $row['id']; ?>" 
                   onclick="return confirm('Are you sure you want to delete this message?')" class="btn delete-btn">
                    Delete
                </a>
            </td>
        </tr>
        <?php } ?>
    </table>
 <?php include 'include/pagination.php' ?>
</div>

</body>
</html>
