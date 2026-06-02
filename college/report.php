<?php
include 'con.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daily Attendance Reports</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; background-color: #f4f4f4; }
        .container { width: 80%; margin: auto; background: white; padding: 20px; border-radius: 8px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #003452; color: white; }
    </style>
</head>
<body>

<div class="container">
    <h2>Daily Attendance Reports</h2>
    <table>
        <tr>
            <th>Report Date</th>
            <th>Total Students</th>
            <th>Present</th>
            <th>Absent</th>
        </tr>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM daily_reports ORDER BY report_date DESC");
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['report_date']}</td>
                    <td>{$row['total_students']}</td>
                    <td>{$row['present_count']}</td>
                    <td>{$row['absent_count']}</td>
                  </tr>";
        }
        ?>
    </table>
</div>

</body>
</html>
