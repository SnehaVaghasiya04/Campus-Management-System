<?php
include 'con.php';

// Get total students count
$total_students_query = "SELECT COUNT(*) AS total FROM cstudents";
$total_students_result = mysqli_query($conn, $total_students_query);
$total_students_row = mysqli_fetch_assoc($total_students_result);
$total_students = $total_students_row['total'];

// Get course-wise student count
$course_counts_query = "SELECT course, COUNT(*) AS total FROM cstudents GROUP BY course";
$course_counts_result = mysqli_query($conn, $course_counts_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 70%;
            margin: auto;
            margin-top: 50px;
            margin-left: 260px;
            position: relative;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        .download-container {
            text-align: right;
            margin-bottom: 10px;
        }

        .download-btn {
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background: #28a745;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .download-btn:hover {
            background: #218838;
        }

        fieldset {
            border: 2px solid #007BFF;
            border-radius: 10px;
            padding: 20px;
            background: #ffffff;
        }

        legend {
            font-size: 20px;
            font-weight: bold;
            color: #007BFF;
            padding: 5px 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: #fff;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        th {
            background: #007BFF;
            color: white;
            font-size: 18px;
        }

        td {
            font-size: 16px;
            color: #555;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
<?php include_once('include/side.php'); ?>
<div class="container">
    <h2>Total Students: <?php echo $total_students; ?></h2>

        <fieldset>
            <legend>Course-wise Student Coun</legend>
   
    <table>
        <tr>
            <th>Course</th>
            <th>Total Students</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($course_counts_result)) { ?>
        <tr>
            <td><?php echo $row['course']; ?></td>
            <td><?php echo $row['total']; ?></td>
        </tr>
        <?php } ?>
    </table>
</fieldset>
</div>

</body>
</html>
