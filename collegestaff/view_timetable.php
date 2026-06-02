<?php
include("con.php");

$limit = 1; // Number of teachers to display per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$start = ($page - 1) * $limit;

// Fetch distinct teacher names for dropdown
$teacherQuery = "SELECT DISTINCT faculty_name FROM ctimetable ORDER BY faculty_name";
$teacherResult = mysqli_query($conn, $teacherQuery);

$staff_name = isset($_GET['staff_name']) ? mysqli_real_escape_string($conn, $_GET['staff_name']) : '';

// Count total number of teachers for pagination
$totalQuery = "SELECT COUNT(DISTINCT faculty_name) AS total FROM ctimetable";
if (!empty($staff_name)) {
    $totalQuery = "SELECT COUNT(DISTINCT faculty_name) AS total FROM ctimetable WHERE faculty_name='$staff_name'";
}
$totalResult = mysqli_query($conn, $totalQuery);
$totalRow = mysqli_fetch_assoc($totalResult);
$totalTeachers = $totalRow['total'];
$totalPages = ceil($totalTeachers / $limit);

// Fetch timetable data with pagination
$query = "SELECT * FROM ctimetable ORDER BY faculty_name, FIELD(day, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'), time LIMIT $start, $limit";
if (!empty($staff_name)) {
    $query = "SELECT * FROM ctimetable WHERE faculty_name='$staff_name' ORDER BY FIELD(day, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'), time";
}

$result = mysqli_query($conn, $query);

$timetable = [];
while ($row = mysqli_fetch_assoc($result)) {
    $timetable[$row['faculty_name']][$row['day']][] = $row;
}

$days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>College Timetable</title>
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
  <?php include_once('include/side.php'); ?>

    <div class="container mt-4">
        <div class="container1">
            <fieldset>
                <legend><h1>College Timetable</h1></legend>

                <div class="search-bar">
                    <form method="GET">
                        <label for="staff_name">Select Teacher:</label>
                        <select name="staff_name" id="staff_name">
                            <option value="">All Teachers</option>
                            <?php while ($row = mysqli_fetch_assoc($teacherResult)): ?>
                                <option value="<?php echo $row['faculty_name']; ?>" <?php if ($staff_name == $row['faculty_name']) echo 'selected'; ?>>
                                    <?php echo $row['faculty_name']; ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                        <button type="submit" class="btn btn-primary btn-sm">Search</button>
                    </form>
                </div>

                <?php if (!empty($staff_name) && empty($timetable)): ?>
                    <p style="color: red;">No timetable found for "<?php echo htmlspecialchars($staff_name); ?>".</p>
                <?php endif; ?>

                <?php foreach ($timetable as $teacher => $schedule): ?>
                    <h2>Timetable for <?php echo $teacher; ?></h2>
                    <table>
                        <tr>
                            <th>Time</th>
                            <?php foreach ($days as $day): ?>
                                <th><?php echo $day; ?></th>
                            <?php endforeach; ?>
                        </tr>

                        <?php
                        $timeSlots = [];
                        foreach ($schedule as $day => $lectures) {
                            foreach ($lectures as $lecture) {
                                $timeSlots[$lecture['time']] = true;
                            }
                        }
                        ksort($timeSlots);

                        foreach (array_keys($timeSlots) as $time): ?>
                            <tr>
                                <td><?php echo $time; ?></td>
                                <?php foreach ($days as $day): ?>
                                    <td>
                                        <?php
                                        if (isset($schedule[$day])) {
                                            $found = false;
                                            foreach ($schedule[$day] as $lecture) {
                                                if ($lecture['time'] == $time) {
                                                    echo "<strong>{$lecture['subject']}</strong><br>Room: {$lecture['room_number']}";
                                                    $found = true;
                                                }
                                            }
                                            if (!$found) echo "<span class='no-lectures'>No Lecture</span>";
                                        } else {
                                            echo "<span class='no-lectures'>No Lecture</span>";
                                        }
                                        ?>
                                    </td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endforeach; ?>

                <!-- Pagination -->
                <div class="pagination">
                    <?php if ($page > 1): ?>
                        <a href="?page=<?php echo $page - 1; ?>&staff_name=<?php echo urlencode($staff_name); ?>">Previous</a>
                    <?php else: ?>
                        <span class="disabled">Previous</span>
                    <?php endif; ?>

                    <span><?php echo $page; ?> / <?php echo $totalPages; ?></span>

                    <?php if ($page < $totalPages): ?>
                        <a href="?page=<?php echo $page + 1; ?>&staff_name=<?php echo urlencode($staff_name); ?>">Next</a>
                    <?php else: ?>
                        <span class="disabled">Next</span>
                    <?php endif; ?>
                </div>
            </fieldset>
        </div>
    </div>
</body>
</html>
