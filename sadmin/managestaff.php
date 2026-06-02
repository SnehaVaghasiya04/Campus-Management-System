<?php
include 'con.php';


session_start();
if (!isset($_SESSION['admin_name'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}


$limit = 3;  // Limit the number of records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);  // Ensure page is at least 1
$start = ($page - 1) * $limit;  // Calculate the offset

// Handle Delete Request
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $deleteQuery = "DELETE FROM staff WHERE id='$id'";
    if (mysqli_query($conn, $deleteQuery)) {
        echo "<script>alert('Staff member deleted successfully!');</script>";
    } else {
        echo "<script>alert('Failed to delete staff member.');</script>";
    }
}

// Fetch distinct roles
$query_roles = "SELECT DISTINCT role FROM staff ORDER BY role";
$result_roles = mysqli_query($conn, $query_roles);

// Determine selected role
$selected_role = isset($_POST['role']) ? $_POST['role'] : null;

// SQL query to fetch staff data with pagination
if ($selected_role === 'All Roles' || $selected_role === null) {
    $staff_query = "SELECT * FROM staff LIMIT $start, $limit"; // Fetch paginated staff data
} else {
    $staff_query = "SELECT * FROM staff WHERE role = '$selected_role' LIMIT $start, $limit";  // Filtered and paginated
}

$result_staff = mysqli_query($conn, $staff_query);

// Count the total number of records for pagination
$total_query = "SELECT COUNT(*) FROM staff";
if ($selected_role !== 'All Roles' && $selected_role !== null) {
    $total_query = "SELECT COUNT(*) FROM staff WHERE role = '$selected_role'";  // Count based on role
}
$total_result = mysqli_query($conn, $total_query);
$total_rows = mysqli_fetch_array($total_result)[0];  // Get the total number of rows

$total_pages = ceil($total_rows / $limit);  // Calculate total number of pages
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Staff by Role</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="table.css">
</head>
<body>

    <?php include_once('include/side.php'); ?>

    <div class="container mt-4">
        <div class="container1">
            <fieldset>
                <legend><h1>Manage staff</h1></legend>

                <div class="dropdown">
                    <form method="POST">
                        <select name="role" onchange="this.form.submit()">
                            <option value="All Roles" <?php if ($selected_role === 'All Roles' || $selected_role === null) echo 'selected'; ?>>All Roles</option>
                            <?php while ($role_row = mysqli_fetch_assoc($result_roles)): ?>
                                <option value="<?php echo $role_row['role']; ?>" <?php if ($selected_role === $role_row['role']) echo 'selected'; ?>>
                                    <?php echo $role_row['role']; ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </form>
                </div>

                <h3>
                    <?php 
                    echo $selected_role === 'All Roles' || $selected_role === null ? "All Staff Members" : "Showing Staff for Role: $selected_role"; 
                    ?>
                </h3>

                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Qualification</th>
                            <th>Role</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($result_staff) > 0): ?>
                            <?php $counter = 1; ?>
                            <?php while ($staff = mysqli_fetch_assoc($result_staff)): ?>
                                <tr>
                                    <td><?php echo $counter++; ?></td>
                                    <td><?php echo htmlspecialchars($staff['name']); ?></td>
                                    <td><?php echo htmlspecialchars($staff['email']); ?></td>
                                    <td><?php echo htmlspecialchars($staff['contact']); ?></td>
                                    <td><?php echo htmlspecialchars($staff['qualification']); ?></td>
                                    <td><?php echo htmlspecialchars($staff['role']); ?></td>
                                    <td><img src="image/<?php echo htmlspecialchars($staff['image']); ?>" alt="Profile" class="faculty-img"></td>
                                    <td>
                                        <a href="edit_staff.php?id=<?php echo $staff['id']; ?>" class="btn btn-edit">✏️ </a>
                                        <a href="?delete_id=<?php echo $staff['id']; ?>" class="btn btn-delete" onclick="return confirm('Are you sure?')">🗑️ </a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="8">No staff members found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>

                <!-- Pagination links -->
                <div class="pagination">
                    <?php if ($page > 1): ?>
                        <a href="?page=1&role=<?php echo urlencode($selected_role); ?>">First</a>
                        <a href="?page=<?php echo $page - 1; ?>&role=<?php echo urlencode($selected_role); ?>">Prev</a>
                    <?php endif; ?>

                    <span>Page <?php echo $page; ?> of <?php echo $total_pages; ?></span>

                    <?php if ($page < $total_pages): ?>
                        <a href="?page=<?php echo $page + 1; ?>&role=<?php echo urlencode($selected_role); ?>">Next</a>
                        <a href="?page=<?php echo $total_pages; ?>&role=<?php echo urlencode($selected_role); ?>">Last</a>
                    <?php endif; ?>
                </div>
            </fieldset>
        </div>
    </div>

</body>
</html>
