<?php
include("con.php");

$limit = 5; // Set the number of results per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$start = ($page - 1) * $limit;

$search = isset($_GET['search']) ? mysqli_real_escape_string($conn, $_GET['search']) : "";
$searchQuery = "";
if (!empty($search)) {
    $searchQuery = "WHERE e.course LIKE '%$search%' OR e.subject LIKE '%$search%' OR e.semester LIKE '%$search%' OR f.name LIKE '%$search%'";
}

// Count total records
$totalResultsQuery = "SELECT COUNT(*) as total FROM cexam_schedule e JOIN faculty f ON e.supervisor_id = f.id $searchQuery";
$totalResults = mysqli_fetch_assoc(mysqli_query($conn, $totalResultsQuery))['total'];
$totalPages = ceil($totalResults / $limit);

// Fetch paginated exam schedule data with supervisor names
$query = "SELECT e.course, e.semester, e.subject, e.exam_date, e.exam_time, e.venue, f.name AS supervisor_name 
          FROM cexam_schedule e
          JOIN faculty f ON e.supervisor_id = f.id
          $searchQuery
          ORDER BY e.exam_date ASC
          LIMIT $start, $limit";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Staff - Exam Schedule</title>
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
            width: 1000px;
            margin-bottom: 30px;
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
            background: #007bff;
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
        .search-box {
            margin-bottom: 15px;
            display: flex;
            justify-content: flex-end;
        }
        .search-box input {
            padding: 8px;
            width: 250px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .search-box button {
            margin-left: 5px;
            padding: 8px 12px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php include_once('include/side.php'); ?>

    <div class="container mt-4">
        <div class="container1">
            <fieldset>
                <legend><h1>Exam Schedule</h1></legend>

                <!-- Search Bar -->
                <form method="GET" class="search-box">
                    <input type="text" name="search" placeholder="Search by course, subject, semester, supervisor" value="<?php echo htmlspecialchars($search); ?>">
                    <button type="submit">Search</button>
                </form>
                
                <table>
                    <tr>
                        <th>Supervisor</th>
                        <th>Course</th>
                        <th>Semester</th>
                        <th>Subject</th>
                        <th>Exam Date</th>
                        <th>Exam Time</th>
                        <th>Venue</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                            <td><?php echo $row['supervisor_name']; ?></td>
                            <td><?php echo $row['course']; ?></td>
                            <td><?php echo $row['semester']; ?></td>
                            <td><?php echo $row['subject']; ?></td>
                            <td><?php echo $row['exam_date']; ?></td>
                            <td><?php echo $row['exam_time']; ?></td>
                            <td><?php echo $row['venue']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </table>

                <!-- Pagination -->
                <div class="pagination">
                    <?php if ($page > 1): ?>
                        <a href="?page=<?php echo $page - 1; ?>&search=<?php echo urlencode($search); ?>">Previous</a>
                    <?php else: ?>
                        <span class="disabled">Previous</span>
                    <?php endif; ?>

                    <span><?php echo $page; ?> / <?php echo $totalPages; ?></span>

                    <?php if ($page < $totalPages): ?>
                        <a href="?page=<?php echo $page + 1; ?>&search=<?php echo urlencode($search); ?>">Next</a>
                    <?php else: ?>
                        <span class="disabled">Next</span>
                    <?php endif; ?>
                </div>
            </fieldset>
        </div>
    </div>
</body>
</html>