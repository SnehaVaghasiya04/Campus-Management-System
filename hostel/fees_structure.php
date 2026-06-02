<?php
include 'con.php';

// Fetch room types
$room_types_result = mysqli_query($conn, "SELECT DISTINCT room_type FROM rooms");
$room_types = [];
while ($row = mysqli_fetch_assoc($room_types_result)) {
    $room_types[] = $row['room_type'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hostel Fees Structure</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            padding: 0;
            margin: 0;
            background-color: #e6f2ff;
        }

        h2, h3 {
            text-align: center;
            color: #003366;
            margin-top: 30px;
        }

        /* Header Section */
        .about-header1 {
            position: relative;
            text-align: center;
            color: white;
        }

        .about-image1 {
            background: url("/campus_management/admin/images/17.jpg") center center/cover;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .about-image1 h1 {
            font-size: 40px;
            font-weight: bold;
            color: #003366;
            text-shadow: 3px 3px 8px rgba(0, 0, 0, 0.7);
        }

        .banner1 {
            background-color: #003366;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: center;
        }

        .contain1 {
            font-size: 18px;
        }

        .contain1 a {
            color: #fff;
            text-decoration: none;
        }

        /* Form Styling */
        form {
            width: 50%;
            margin: 40px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        fieldset {
            border: 2px solid #003366;
            padding: 20px;
            border-radius: 10px;
        }

        legend {
            font-size: 20px;
            padding: 0 10px;
            color: #003366;
            font-weight: bold;
        }

        select, input[type="submit"] {
            width: 90%;
            padding: 12px;
            margin: 15px 0;
            border: 1px solid #003366;
            border-radius: 8px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #00509e;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #003366;
        }

        /* Table Styling */
        table {
            width: 90%;
            margin: 30px auto;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #003366;
            color: white;
            font-size: 18px;
        }

        tr:nth-child(even) {
            background-color: #f0f8ff;
        }

        tr:hover {
            background-color: #d9eaff;
        }

        td {
            font-size: 16px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            form, table {
                width: 95%;
            }

            select, input[type="submit"] {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<?php include('include/header1.php'); ?>

<section class="about-header1">
    <div class="about-image1">
        <h1>📜 Hostel Admission & Fees</h1>
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="home.php">Home</a> &gt; fees
        </div>
    </div>
</section>

<h2>Hostel Fees Structure</h2>

<form method="GET">
    <fieldset>
        <legend>Select Category</legend>
        <select name="category" required>
            <option value="">Choose Category</option>
            <option value="School">School Girls</option>
            <option value="College">College Girls</option>
        </select>
        <input type="submit" value="Show Fees">
    </fieldset>
</form>

<?php
if (isset($_GET['category'])) {
    $category = $_GET['category'];

    echo "<h3>Fees Structure for $category</h3>";

    if ($category == 'School') {
        $standards = ["5", "6", "7", "8", "9", "10", "11", "12"];
    } elseif ($category == 'College') {
        $standards = ["BBA", "BCA", "BCOM", "MSC IT"];
    }

    echo "<table>
    <tr>
        <th>Standard/Course</th>";

    foreach ($room_types as $room_type) {
        echo "<th>$room_type (₹)</th>";
    }

    echo "</tr>";

    foreach ($standards as $std) {
        echo "<tr>
            <td>$std</td>";

        foreach ($room_types as $room_type) {
            $fee_result = mysqli_query($conn, "SELECT fees FROM hostel_fees 
                                               WHERE category='$category' 
                                               AND standard_course='$std' 
                                               AND room_type='$room_type' 
                                               LIMIT 1");
            if ($fee_row = mysqli_fetch_assoc($fee_result)) {
                echo "<td>{$fee_row['fees']}</td>";
            } else {
                echo "<td>-</td>";
            }
        }

        echo "</tr>";
    }

    echo "</table>";
}
?>

<?php include 'include/footer.php'; ?>

</body>
</html>
