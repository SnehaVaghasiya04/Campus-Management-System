<?php include ('include/header.php'); ?>
<?php include 'con.php'; ?>

session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}

<?php
$limit = 3; // Number of records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$start = ($page - 1) * $limit;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Staff Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .container1 {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 90px;
            margin-left: 180px;
            width:  1000px;
            margin-bottom:  30px;
        }
        h1 {
            font-size: 22px;
            font-weight: 600;
            color: #333;
        }
        .search-bar {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 10px;
        }
        .search-bar input {
            padding: 8px;
            width: 250px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        table {
            width: 100%;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        th {
            background: #007bff;
            color: white;
            text-align: left;
            padding: 10px;
        }
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .faculty-img {
    width: 80px;  /* Adjust width as needed */
    height: 80px; /* Adjust height as needed */
    border-radius: 5px; /* Optional: Rounds corners */
    object-fit: cover; /* Ensures proper scaling */
}

        .action-btn {
            padding: 6px 10px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            display: inline-block;
        }
        .edit-btn {
            background: #28a745;
            color: white;
        }
        .delete-btn {
            background: #dc3545;
            color: white;
        }
        .edit-btn:hover {
            background: #218838;
        }
        .delete-btn:hover {
            background: #c82333;
        }
        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .pagination a, .pagination span {
            padding: 8px 12px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            background: #007bff;
            color: white;
        }
        .pagination .disabled {
            background: #ddd;
            color: #666;
            pointer-events: none;
        }
        .table-container {
        display: none; /* Hide all tables by default */
    }
    .table-container.active {
        display: block; /* Show only the active table */
    }
    .toggle-buttons {
        margin-bottom: 15px;
    }
    .toggle-buttons button {
        margin-right: 10px;
        padding: 8px 15px;
        border: none;
        background-color: #007bff;
        color: white;
        border-radius: 5px;
        cursor: pointer;
    }
    .toggle-buttons button:hover {
        background-color: #0056b3;
    }
</style>
</head>
<body>
<div class="container mt-4">
    <div class="container1">


        <fieldset>
            <legend><h1>All Staff Report</h1></legend>

            <div class="toggle-buttons">
                <button onclick="showTable('facultyTable')">Faculty</button>
                <button onclick="showTable('staffTable')">Staff</button>
                <button onclick="showTable('wardenTable')">Wardens</button>
                <button onclick="showTable('supportTable')">Support Staff</button>
            </div>

            <!-- Faculty Table -->
            <div class="table-container active" id="facultyTable">
                <h3>Faculty</h3>
                <table class="staff-table">
                    <tr><th>Name</th><th>Field</th><th>Designation</th></tr>
                    <?php
                    $totalFaculty = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM faculty"))['total'];
                    $totalPagesFaculty = ceil($totalFaculty / $limit);
                    
                    $faculty = mysqli_query($conn, "SELECT * FROM faculty LIMIT $start, $limit");
                    while ($row = mysqli_fetch_assoc($faculty)) {
                        echo "<tr><td>{$row['name']}</td><td>{$row['field']}</td><td>{$row['designation']}</td></tr>";
                    }
                    ?>
                </table>
                <div class="pagination">
                    <?php if ($page > 1): ?>
                        <a href="?page=<?php echo $page - 1; ?>">Previous</a>
                    <?php endif; ?>
                    <span>Page <?php echo $page; ?></span>
                    <?php if ($page < $totalPagesFaculty): ?>
                        <a href="?page=<?php echo $page + 1; ?>">Next</a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Staff Table -->
            <div class="table-container" id="staffTable">
                <h3>Staff</h3>
                <table class="staff-table">
                    <tr><th>Name</th><th>Role</th></tr>
                    <?php
                    $totalStaff = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM staff"))['total'];
                    $totalPagesStaff = ceil($totalStaff / $limit);

                    $staff = mysqli_query($conn, "SELECT * FROM staff LIMIT $start, $limit");
                    while ($row = mysqli_fetch_assoc($staff)) {
                        echo "<tr><td>{$row['name']}</td><td>{$row['role']}</td></tr>";
                    }
                    ?>
                </table>
                <div class="pagination">
                    <?php if ($page > 1): ?>
                        <a href="?page=<?php echo $page - 1; ?>">Previous</a>
                    <?php endif; ?>
                    <span>Page <?php echo $page; ?></span>
                    <?php if ($page < $totalPagesStaff): ?>
                        <a href="?page=<?php echo $page + 1; ?>">Next</a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Warden Table -->
            <div class="table-container" id="wardenTable">
                <h3>Wardens</h3>
                <table class="staff-table">
                    <tr><th>Name</th><th>Designation</th></tr>
                    <?php
                    $totalWardens = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM warden"))['total'];
                    $totalPagesWardens = ceil($totalWardens / $limit);

                    $warden = mysqli_query($conn, "SELECT * FROM warden LIMIT $start, $limit");
                    while ($row = mysqli_fetch_assoc($warden)) {
                        echo "<tr><td>{$row['name']}</td><td>{$row['designation']}</td></tr>";
                    }
                    ?>
                </table>
                <div class="pagination">
                    <?php if ($page > 1): ?>
                        <a href="?page=<?php echo $page - 1; ?>">Previous</a>
                    <?php endif; ?>
                    <span>Page <?php echo $page; ?></span>
                    <?php if ($page < $totalPagesWardens): ?>
                        <a href="?page=<?php echo $page + 1; ?>">Next</a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Support Staff Table -->
            <div class="table-container" id="supportTable">
                <h3>Support Staff</h3>
                <table class="staff-table">
                    <tr><th>Name</th><th>Duty Role</th></tr>
                    <?php
                    $totalSupport = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM support_staff"))['total'];
                    $totalPagesSupport = ceil($totalSupport / $limit);

                    $support = mysqli_query($conn, "SELECT * FROM support_staff LIMIT $start, $limit");
                    while ($row = mysqli_fetch_assoc($support)) {
                        echo "<tr><td>{$row['name']}</td><td>{$row['duty_role']}</td></tr>";
                    }
                    ?>
                </table>
                <div class="pagination">
                    <?php if ($page > 1): ?>
                        <a href="?page=<?php echo $page - 1; ?>">Previous</a>
                    <?php endif; ?>
                    <span>Page <?php echo $page; ?></span>
                    <?php if ($page < $totalPagesSupport): ?>
                        <a href="?page=<?php echo $page + 1; ?>">Next</a>
                    <?php endif; ?>
                </div>
            </div>
        </fieldset>
         <a href="generate_pdf.php" class="btn btn-danger">Download PDF</a>
    </div>
</div>

<script>
function showTable(tableId) {
    let tables = document.querySelectorAll(".table-container");
    tables.forEach((table) => table.classList.remove("active"));
    document.getElementById(tableId).classList.add("active");
}</script>

<script>
    function showTable(tableId) {
        let tables = document.querySelectorAll(".table-container");
        tables.forEach((table) => table.classList.remove("active")); // Hide all tables
        document.getElementById(tableId).classList.add("active"); // Show selected table
    }

    // Ensure that the first table (Faculty) is visible by default
    document.addEventListener("DOMContentLoaded", function () {
        showTable("facultyTable");
    });
</script>
</script>

</body>
</html>
