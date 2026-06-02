<?php
include 'con.php';


session_start();
if (!isset($_SESSION['admin_name'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}



$limit = 1;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$start = ($page - 1) * $limit;

// Delete timetable
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $conn->query("DELETE FROM class_timetables WHERE id = $delete_id");
    header("Location: manage_timetable.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Timetable</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
     

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="table.css">
</head>
<body>

<?php include_once('include/side.php'); ?>

<div class="container mt-4">
        <div class="container1">
            <fieldset>
                <legend><h1>Manage Time table</h1></legend>
    
    

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Teacher ID</th>
                <th>Standard</th>
                <th>Day</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Subject</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $conn->query("SELECT * FROM class_timetables ORDER BY id DESC");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['teacher_id']}</td>
                        <td>{$row['standard']}</td>
                        <td>{$row['day']}</td>
                        <td>{$row['start_time']}</td>
                        <td>{$row['end_time']}</td>
                        <td>{$row['subject']}</td>
                        <td>
                            <a href='edit_timetable.php?id={$row['id']}' class='btn-edit'>✏ </a>
                            <a href='manage_timetable.php?delete_id={$row['id']}' class='btn-delete' onclick='return confirm(\"Are you sure?\")'>🗑️ </a>
                        </td>
                    </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
