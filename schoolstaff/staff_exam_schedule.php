<?php
include 'con.php';



// Get search input for teacher name
$search_teacher = isset($_GET['teacher_name']) ? trim($_GET['teacher_name']) : '';

// Pagination variables
$limit = 5; // Number of records per page
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1;
$offset = ($page - 1) * $limit; // Calculate offset

// Count total records
$count_query = "SELECT COUNT(*) AS total FROM exam_schedule e LEFT JOIN staff s ON e.staff_id = s.id";
if (!empty($search_teacher)) {
    $count_query .= " WHERE s.name LIKE ?";
}

$stmt_count = $conn->prepare($count_query);
if (!empty($search_teacher)) {
    $search_param = "%$search_teacher%";
    $stmt_count->bind_param("s", $search_param);
}
$stmt_count->execute();
$result_count = $stmt_count->get_result();
$total_records = $result_count->fetch_assoc()['total'];
$total_pages = ceil($total_records / $limit);

// Fetch exam schedules, with filtering if a teacher name is entered
$query = "SELECT e.*, s.name AS teacher_name 
          FROM exam_schedule e
          LEFT JOIN staff s ON e.staff_id = s.id";

if (!empty($search_teacher)) {
    $query .= " WHERE s.name LIKE ?";
}

$query .= " ORDER BY e.exam_date, e.exam_time LIMIT ? OFFSET ?";

$stmt = $conn->prepare($query);

if (!empty($search_teacher)) {
    $stmt->bind_param("sii", $search_param, $limit, $offset);
} else {
    $stmt->bind_param("ii", $limit, $offset);
}

$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Exam Schedule - Search by Teacher</title>
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
            width: 80px;
            height: 80px;
            border-radius: 5px;
            object-fit: cover;
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
    <?php include_once('include2/side.php'); ?>
    <div class="container mt-4">
        <div class="container1">
            <fieldset>
                <legend><h1>Exam Schedule</h1></legend>

                <!-- Search Form for Teacher -->
                <div class="search-bar">
                    <form method="GET">
                        <input type="text" name="teacher_name" value="<?php echo htmlspecialchars($search_teacher); ?>" placeholder="Enter teacher name">
                        <button type="submit" class="btn btn-primary btn-sm">Search</button>
                    </form>
                </div>

                <?php if (!empty($search_teacher)) { ?>
                    <h3>Showing exam schedule for: <span style="color: red;"><?php echo htmlspecialchars($search_teacher); ?></span></h3>
                <?php } ?>

                <table border="1">
                    <tr>
                        <th>Exam Name</th>
                        <th>Subject</th>
                        <th>Class</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Supervisor</th>
                    </tr>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $row['exam_name']; ?></td>
                            <td><?= $row['subject']; ?></td>
                            <td><?= $row['class']; ?></td>
                            <td><?= $row['exam_date']; ?></td>
                            <td><?= $row['exam_time']; ?></td>
                            <td><?= $row['teacher_name'] ? $row['teacher_name'] : 'Not Assigned'; ?></td>
                        </tr>
                    <?php } ?>
                </table>

                <!-- Pagination -->
                <div class="pagination">
                    <?php if ($page > 1): ?>
                        <a href="?page=<?php echo $page - 1; ?>&teacher_name=<?php echo urlencode($search_teacher); ?>">Previous</a>
                    <?php else: ?>
                        <span class="disabled">Previous</span>
                    <?php endif; ?>

                    <span>Page <?php echo $page; ?> of <?php echo $total_pages; ?></span>

                    <?php if ($page < $total_pages): ?>
                        <a href="?page=<?php echo $page + 1; ?>&teacher_name=<?php echo urlencode($search_teacher); ?>">Next</a>
                    <?php else: ?>
                        <span class="disabled">Next</span>
                    <?php endif; ?>
                </div>

            </fieldset>
        </div>
    </div>
</body>
</html>
