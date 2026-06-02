<?php
include 'con.php';

$limit = 5; // Change limit as needed
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$start = ($page - 1) * $limit;

$filter_date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');

// Get total records count
$totalResult = mysqli_query($conn, "
    SELECT COUNT(*) as total FROM hostel_attendance a 
    JOIN hostel_student s ON a.admission_id = s.admission_id 
    WHERE a.date = '$filter_date'
");
$totalRow = mysqli_fetch_assoc($totalResult);
$totalRecords = $totalRow['total'];
$totalPages = ceil($totalRecords / $limit);

// Fetch paginated records
$result = mysqli_query($conn, "
    SELECT a.date, s.admission_id, s.name, s.school_college, a.status 
    FROM hostel_attendance a 
    JOIN hostel_student s ON a.admission_id = s.admission_id 
    WHERE a.date = '$filter_date'
    LIMIT $start, $limit
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Attendance Report</title>
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
        .button-container {
            margin-bottom: 15px;
        }
        button, .btn {
            padding: 8px 12px;
            border-radius: 5px;
            border: none;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
            margin: 5px;
        }
        button {
            background-color: #007bff;
            color: white;
            transition: 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }
        .btn-download {
            background-color: #28a745;
            color: white;
            display: inline-block;
        }
        .btn-download:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<?php include ('include/side.php'); ?>

<div class="container mt-4">
    <div class="container1">
        <fieldset>
            <legend><h1>Attendance Report</h1></legend>

            <form method="get">
                <label>Select Date:</label>
                <input type="date" name="date" value="<?= $filter_date ?>" required>
                <button type="submit">Filter</button>
            </form>

            <div class="button-container">
                <a href="download_excel.php?date=<?= $filter_date ?>" class="btn btn-download">Download Excel</a>
                <a href="download_pdf.php?date=<?= $filter_date ?>" class="btn btn-download">Download PDF</a>
            </div>

            <table>
                <tr>
                    <th>Date</th>
                    <th>Admission ID</th>
                    <th>Name</th>
                    <th>School/College</th>
                    <th>Status</th>
                </tr>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                            <td>{$row['date']}</td>
                            <td>{$row['admission_id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['school_college']}</td>
                            <td>{$row['status']}</td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>No attendance found for selected date.</td></tr>";
                }
                ?>
            </table>

            <!-- Pagination -->
            <div class="pagination">
                <?php if ($page > 1): ?>
                    <a href="?page=<?= $page - 1 ?>&date=<?= $filter_date ?>">Previous</a>
                <?php else: ?>
                    <span class="disabled">Previous</span>
                <?php endif; ?>

                <span>Page <?= $page ?> of <?= $totalPages ?></span>

                <?php if ($page < $totalPages): ?>
                    <a href="?page=<?= $page + 1 ?>&date=<?= $filter_date ?>">Next</a>
                <?php else: ?>
                    <span class="disabled">Next</span>
                <?php endif; ?>
            </div>

        </fieldset>
    </div>
</div>

</body>
</html>
