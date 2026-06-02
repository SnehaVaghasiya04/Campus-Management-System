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
$fields = ['BCA', 'BCOM', 'BBA', 'MSC IT'];
$selected_field = isset($_GET['field']) ? $_GET['field'] : $fields[0];

$total_result = $conn->query("SELECT COUNT(*) AS total FROM faculty WHERE field='$selected_field'");
$total_row = $total_result->fetch_assoc();
$totalRecords = $total_row['total'];
$totalPages = ceil($totalRecords / $limit);

$query = "SELECT * FROM faculty WHERE field='$selected_field' LIMIT $start, $limit";
$result = mysqli_query($conn, $query);

// Handle delete request
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $query = "SELECT image FROM faculty WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $imagePath = "image/" . $row['image'];

    $delete_query = "DELETE FROM faculty WHERE id='$id'";
    if (mysqli_query($conn, $delete_query)) {
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        echo "<script>alert('Faculty deleted successfully!'); window.location.href='view_faculty.php?field=$selected_field';</script>";
    } else {
        echo "<script>alert('Error deleting faculty!'); window.location.href='view_faculty.php?field=$selected_field';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Faculty</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8f9fa; }
        .container1 { background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);  margin-left: 200px; margin-top: 90px}
        .faculty-img { width: 80px; height: 80px; border-radius: 5px; object-fit: cover; }
    </style>
</head>
<body>
<?php include_once('include/side.php'); ?>
<div class="container mt-4">
    <div class="container1">
        <fieldset>
            <legend><h1>Manage Faculty</h1></legend>
            <form method="GET" action="">
                <select name="field" onchange="this.form.submit()">
                    <?php foreach ($fields as $field) { ?>
                        <option value="<?= $field ?>" <?= $field == $selected_field ? 'selected' : '' ?>><?= $field ?></option>
                    <?php } ?>
                </select>
            </form>
            <table class="table mt-3">
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Qualification</th>
                    <th>Designation</th>
                    <th>Experience</th>
                    <th>Action</th>
                </tr>
                <?php if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><img src="image/<?= $row['image'] ?>" class="faculty-img"></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td><?= $row['phone'] ?></td>
                            <td><?= $row['qualification'] ?></td>
                            <td><?= $row['designation'] ?></td>
                            <td><?= $row['experience'] ?> years</td>
                            <td>
                                
                                <a href="view_faculty.php?delete_id=<?= $row['id'] ?>&field=<?= $selected_field ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                    <?php } 
                } else { echo "<tr><td colspan='8'>No faculty found.</td></tr>"; } ?>
            </table>
            <div class="pagination">
                <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                    <a href="?page=<?= $i ?>&field=<?= $selected_field ?>" class="btn btn-primary btn-sm <?= ($i == $page) ? 'disabled' : '' ?>"> <?= $i ?> </a>
                <?php } ?>
            </div>
        </fieldset>
    </div>
</div>
</body>
</html>
