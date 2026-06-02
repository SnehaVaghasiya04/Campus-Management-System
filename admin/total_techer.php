<?php
include 'con.php';


session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}

// Total School Teachers
$school_query = mysqli_query($conn, "SELECT COUNT(*) AS total_school FROM staff");
$school_data = mysqli_fetch_assoc($school_query);

// Total College Teachers
$college_query = mysqli_query($conn, "SELECT COUNT(*) AS total_college FROM faculty ");
$college_data = mysqli_fetch_assoc($college_query);

// Total Wardens
$warden_query = mysqli_query($conn, "SELECT COUNT(*) AS total_wardens FROM warden");
$warden_data = mysqli_fetch_assoc($warden_query);

// Total Support Staff
$support_query = mysqli_query($conn, "SELECT COUNT(*) AS total_support FROM support_staff");
$support_data = mysqli_fetch_assoc($support_query);
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
          
            text-align: center;
        }

        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 70%;
            margin: auto;
            margin-top: 90px;
            margin-left: 300px;
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
 <?php   include ('include/header.php'); ?>

    <div class="container">
        <h1>School, College, and Hostel Staff Total Report</h1>

        <!-- Download Button Positioned on Top Right -->
        <div class="download-container">
            <a href="download_satff.php" class="download-btn">Download Report (PDF)</a>
        </div>

        <fieldset>
            <legend>Staff Count Overview</legend>
            
            <table>
                <tr>
                    <th>Category</th>
                    <th>Total Count</th>
                </tr>
                <tr>
                    <td>School Teachers</td>
                    <td><?php echo $school_data['total_school']; ?></td>
                </tr>
                <tr>
                    <td>College Teachers</td>
                    <td><?php echo $college_data['total_college']; ?></td>
                </tr>
                <tr>
                    <td>Wardens</td>
                    <td><?php echo $warden_data['total_wardens']; ?></td>
                </tr>
                <tr>
                    <td>Support Staff</td>
                    <td><?php echo $support_data['total_support']; ?></td>
                </tr>
            </table>

        </fieldset>

    </div>

</body>
</html>
