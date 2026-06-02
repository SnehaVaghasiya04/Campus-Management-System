<?php
include("con.php");
$limit = 5; // Set how many records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$start = ($page - 1) * $limit;

// Count total records
$totalQuery = mysqli_query($conn, "SELECT COUNT(*) as total FROM cstudy_materials");
$totalResult = mysqli_fetch_assoc($totalQuery);
$totalRecords = $totalResult['total'];
$totalPages = ceil($totalRecords / $limit);

// Handle Delete Request
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $query = "SELECT file_path FROM cstudy_materials WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if (file_exists($row['file_path'])) {
        unlink($row['file_path']); // Delete file from folder
    }

    mysqli_query($conn, "DELETE FROM cstudy_materials WHERE id = $id");
    header("Location: manage_study_materials.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Manage Study Materials</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
       body {
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
        table {
            width: 100%;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        th {
            background:  #007bff;
            color: white;
            text-align: left;
            padding: 10px;
        }
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
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
    </style>
</head>
<body>

<?php include_once('include/side.php'); ?>
<div class="container mt-4">
    <div class="container1">
        <fieldset>
            <legend><h1>Manage Study Materials</h1></legend>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Course</th>
                    <th>Subject</th>
                    <th>Material Name</th>
                    <th>Uploaded By</th>
                    <th>Actions</th>
                </tr>
                <?php
                $result = mysqli_query($conn, "SELECT * FROM cstudy_materials ORDER BY upload_date DESC LIMIT $start, $limit");
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['course']}</td>
                        <td>{$row['subject']}</td>
                        <td>{$row['material_name']}</td>
                        <td>{$row['uploaded_by']}</td>
                        <td>
                            <a class='btn btn-primary' href='{$row['file_path']}' download>Download</a>
                            <a class='btn btn-success' href='edit_study_material.php?id={$row['id']}'>Edit</a>
                            <a class='btn btn-danger' href='?delete={$row['id']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                        </td>
                    </tr>";
                }
                ?>
            </table>

            <!-- Pagination -->
            <div class="pagination">
                <?php if ($page > 1): ?>
                    <a href="?page=<?php echo $page - 1; ?>">Previous</a>
                <?php else: ?>
                    <span class="disabled">Previous</span>
                <?php endif; ?>

                <span><?php echo $page; ?> / <?php echo $totalPages; ?></span>

                <?php if ($page < $totalPages): ?>
                    <a href="?page=<?php echo $page + 1; ?>">Next</a>
                <?php else: ?>
                    <span class="disabled">Next</span>
                <?php endif; ?>
            </div>

        </fieldset>
    </div>
</div>

</body>
</html>
