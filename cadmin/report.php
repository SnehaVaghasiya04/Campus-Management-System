<?php
include 'con.php';

session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: login.php");
    exit();
}


// Fetch available courses from the database
$courses = mysqli_query($conn, "SELECT DISTINCT course FROM cstudents");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daily Attendance Reports</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; background-color: #f4f4f4; }
        .container { width: 70%; margin: auto; background: white; padding: 20px; border-radius: 8px; margin-top:    90px;  margin-left:     320px;}
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #003452; color: white; }
        select, button { padding: 10px; font-size: 16px; margin: 10px; }
        .download-btn { background-color: green; color: white; padding: 10px; border: none; cursor: pointer; text-decoration: none; }
        .download-btn:hover { background-color: darkgreen; }
    </style>
</head>
<body>
<?php include ('include/side.php'); ?>
<div class="container">
    <h2>Daily Attendance Reports</h2>

    <!-- Filter Form -->
    <form method="post">
        <label>Select Course:</label>
        <select name="course">
            <option value="">All Courses</option>
            <?php while ($row = mysqli_fetch_assoc($courses)) { ?>
                <option value="<?php echo $row['course']; ?>"><?php echo $row['course']; ?></option>
            <?php } ?>
        </select>

        <button type="submit" name="filter">Filter</button>
    </form>

    <table>
        <tr>
            <th>Report Date</th>
            <th>Course</th>
            <th>Total Students</th>
            <th>Present</th>
            <th>Absent</th>
            <th>Download PDF</th>
        </tr>
        <?php
        // Default query (all courses)
        $query = "SELECT * FROM daily_reports ORDER BY report_date DESC";

        // Apply filters if selected
        if (isset($_POST['filter'])) {
            $selectedCourse = $_POST['course'];

            $query = "SELECT * FROM daily_reports WHERE 1=1";
            if (!empty($selectedCourse)) {
                $query .= " AND course='$selectedCourse'";
            }
            $query .= " ORDER BY report_date DESC";
        }

        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['report_date']}</td>
                    <td>{$row['course']}</td>
                    <td>{$row['total_students']}</td>
                    <td>{$row['present_count']}</td>
                    <td>{$row['absent_count']}</td>
                    <td>
                        <a href='download_report.php?course={$row['course']}' class='download-btn'>Download PDF</a>
                    </td>
                  </tr>";
        }
        ?>
    </table>
</div>

</body>
</html>
