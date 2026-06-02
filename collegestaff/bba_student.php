<?php
$limit = 25; // Set the limit per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$start = ($page - 1) * $limit;

include 'con.php';
include 'send_email.php';

date_default_timezone_set('Asia/Kolkata'); // Set timezone
$current_date = date("Y-m-d"); // Get today's date
$formatted_date = date("d-m-Y", strtotime($current_date)); // Format date as DD-MM-YYYY

// Count total students for pagination
$result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM cstudents WHERE course='BBA'");
$row = mysqli_fetch_assoc($result);
$totalRecords = $row['total'];
$totalPages = ceil($totalRecords / $limit);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    $date = $_POST['date'];
    $formatted_input_date = date("d-m-Y", strtotime($date)); // Convert input date to DD-MM-YYYY

    // Backend Validation: Allow only today's date
    if ($date !== $current_date) {
        echo "<script>alert('You can only mark attendance for today ($formatted_date)!'); window.location.href='bca_student.php';</script>";
        exit();
    }

    // Check if attendance is already marked for today
    $checkAttendance = mysqli_query($conn, "SELECT * FROM cattendance WHERE date='$date'");
    if (mysqli_num_rows($checkAttendance) > 0) {
        echo "<script>alert('Attendance for today ($formatted_date) has already been marked!'); window.location.href='bba_student.php';</script>";
        exit();
    }

    if (!isset($_POST['attendance']) || empty($_POST['attendance'])) {
        echo "<script>alert('No students selected. Please mark attendance.'); window.location.href='bba_student.php';</script>";
        exit();
    }

    $attendance = $_POST['attendance'];
    $total_students = count($attendance);
    $present_count = 0;
    $absent_count = 0;

    foreach ($attendance as $student_id => $status) {
        mysqli_query($conn, "INSERT INTO cattendance (student_id, date, status) VALUES ('$student_id', '$date', '$status')");

        if ($status == "Present") {
            $present_count++;
        } else {
            $absent_count++;
            sendAbsentEmail($student_id, $formatted_input_date, $conn);
        }
    }

    // Generate daily report if not already created
    $checkReport = mysqli_query($conn, "SELECT * FROM daily_reports WHERE report_date='$date'");
    if (mysqli_num_rows($checkReport) == 0) {
        mysqli_query($conn, "INSERT INTO daily_reports (report_date, total_students, present_count, absent_count) 
                            VALUES ('$date', '$total_students', '$present_count', '$absent_count')");
    }

    echo "<script>alert('Attendance marked successfully! Report Generated.'); window.location.href='bba_student.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <title>BCA Attendance</title>
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

<?php include ('include/side.php'); ?>
<div class="container mt-4">
    <div class="container1">
        <fieldset>
            <legend><h1>Mark BBA Attendance</h1></legend>

            <form method="post">
                <label>Select Date:</label>
                <input type="date" name="date" required max="<?= date('Y-m-d') ?>" min="<?= date('Y-m-d') ?>">
                <br><br>

                <table>
                    <tr>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Attendance</th>
                    </tr>
                    <?php
                    $students = mysqli_query($conn, "SELECT student_id, name FROM cstudents WHERE course='BBA' LIMIT $start, $limit");
                    while ($row = mysqli_fetch_assoc($students)) {
                        echo "<tr>
                                <td>{$row['student_id']}</td>
                                <td>{$row['name']}</td>
                                <td>
                                    <input type='radio' name='attendance[{$row['student_id']}]' value='Present' required> Present
                                    <input type='radio' name='attendance[{$row['student_id']}]' value='Absent'> Absent
                                </td>
                              </tr>";
                    }
                    ?>
                </table>
                <br>
                <button type="submit" name="submit" class="btn btn-primary btn-sm">Submit Attendance</button>
            </form>

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
