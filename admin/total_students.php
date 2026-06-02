<?php

include 'con.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}

// Fetching Total Students Count
$school_count = $conn->query("SELECT COUNT(*) as total FROM student")->fetch_assoc()['total'];
$college_count = $conn->query("SELECT COUNT(*) as total FROM cstudents")->fetch_assoc()['total'];
$hostel_count = $conn->query("SELECT COUNT(*) as total FROM hostel_student")->fetch_assoc()['total'];

$total = $school_count + $college_count + $hostel_count;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Staff Total Report</title>
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
    <?php
include ('include/header.php'); ?>
    <div class="container">
        <h1>School, College, and Hostel Student Total Report</h1>

        <!-- Download Button Positioned on Top Right -->
        <div class="download-container">
            <a href="download_student.php" class="download-btn">Download Report (PDF)</a>
        </div>

        <fieldset>
            <legend>Student Count Overview</legend>
            
            <table>
                <tr>
                    <th>Category</th>
                    <th>Total Count</th>
                </tr>
                <tr>
                    <td>School Students</td>
                    <td><?php echo $school_count; ?></td>
                </tr>
                <tr>
                    <td>College Students</td>
                    <td><?php echo $college_count; ?></td>
                </tr>
                <tr>
                    <td>Hostel Students</td>
                    <td><?php echo $hostel_count; ?></td>
                </tr>
            </table>

        </fieldset>

    </div>

</body>
</html>
