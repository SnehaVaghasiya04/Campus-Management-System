<?php
include 'con.php';


session_start();
if (!isset($_SESSION['admin_name'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}



$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$start = ($page - 1) * $limit;

$total_result = $conn->query("SELECT COUNT(*) AS total FROM fees_structure");
$total_row = $total_result->fetch_assoc();
$totalRecords = $total_row['total'];
$totalPages = ceil($totalRecords / $limit); 
// Delete Fee Structure
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql = "DELETE FROM fees_structure WHERE id = $delete_id";

    if ($conn->query($sql) === TRUE) {
        echo "Fee structure deleted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

// Fetch Fee Structures
$sql = "SELECT * FROM fees_structure LIMIT $start, $limit";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Manage Fees</title>
    
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="table.css">
</head>
<body>
    <?php  include 'include/side.php';?>
 <div class="container mt-4">
        <div class="container1">
            <fieldset>
                <legend><h1>Manage Fees Structure</h1></legend>
    
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Standard</th>
                <th>Registration Fee</th>
                <th>Composite Fee</th>
                <th>Frequency</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row['id'] . "</td>
                            <td>" . $row['standard'] . "</td>
                            <td>" . $row['registration_fee'] . "</td>
                            <td>" . $row['composite_fee'] . "</td>
                            <td>" . $row['frequency'] . "</td>
                            <td>
                                <a href='edit_fees.php?id=" . $row['id'] . "'>Edit</a> | 
                                <a href='manage_fees.php?delete_id=" . $row['id'] . "' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No fee structures found</td></tr>";
            }
            ?>
        </tbody>
    </table>
     <?php include 'include/pagination.php' ?>

</fieldset>
</body>
</html>
