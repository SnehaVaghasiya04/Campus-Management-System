<?php
include 'con.php';

$limit = 5;  // Number of records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$start = ($page - 1) * $limit;

// Count total records for pagination
$result = mysqli_query($conn, "
    SELECT COUNT(*) AS total FROM room_allocation ra
    JOIN hostel_student hs ON ra.admission_id = hs.admission_id
    WHERE hs.school_college LIKE '%School%'
");
$row = mysqli_fetch_assoc($result);
$totalRecords = $row['total'];
$totalPages = ceil($totalRecords / $limit);

// Fetch data with LIMIT for pagination
$allocated = mysqli_query($conn, "
    SELECT ra.admission_id, hs.name, hs.room_type, ra.room_no, ra.allocation_date 
    FROM room_allocation ra 
    JOIN hostel_student hs ON ra.admission_id = hs.admission_id
    WHERE hs.school_college LIKE '%School%'
    LIMIT $start, $limit
");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Allocated School Students List</title>
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
<?php include('include/side.php'); ?>
<div class="container mt-4">
    <div class="container1">
        <fieldset>
            <legend><h1>Allocated School Students List</h1></legend>

            <table>
                <tr>
                    <th>Admission ID</th>
                    <th>Student Name</th>
                    <th>Room Number</th>
                    <th>Room Type</th>
                    <th>Allocation Date</th>
                </tr>
                <?php
                if (mysqli_num_rows($allocated) > 0) {
                    while ($row = mysqli_fetch_assoc($allocated)) {
                        echo "<tr>
                                <td>{$row['admission_id']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['room_no']}</td>
                                <td>{$row['room_type']}</td>
                                <td>{$row['allocation_date']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No allocated school students found.</td></tr>";
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
