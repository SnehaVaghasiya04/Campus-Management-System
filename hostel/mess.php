<?php
include 'con.php';
$schedule = mysqli_query($conn, "SELECT * FROM food_schedule");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Schedule</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
           
            margin: 0;
            padding: 0;
        }

        h1 {
            font-size: 40px;
            text-align: center;
            margin: 40px 0 20px;
            color: #003366;
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .table-container {
            width: 90%;
            margin: 30px auto;
            overflow: hidden;
            border-radius: 20px;
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.25);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 18px;
            text-align: center;
            color: #333;
        }

        th {
            background: rgba(0, 102, 153, 0.8);
            color: white;
            font-size: 18px;
            text-transform: uppercase;
        }

        tr {
            transition: all 0.3s ease;
        }

        tr:nth-child(even) {
            background: rgba(255, 255, 255, 0.6);
        }

        tr:nth-child(odd) {
            background: rgba(255, 255, 255, 0.9);
        }

        tr:hover {
            transform: scale(1.02);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        td {
            font-size: 16px;
            font-weight: 500;
        }

        /* Breadcrumb */
       
          /* Header Section */
        .about-header1 {
            position: relative;
            text-align: center;
            color: black;
        }

        .about-image1 {
            background: url("/campus_management/admin/images/17.jpg")  center center/cover;
            height: 300px;
            display: flex;
            
            align-items: center;
            justify-content: center;
        }

        .about-image1 h1 {
            font-size: 36px;
            font-weight: bold;
            color: #003366;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }

        /* Banner */
        .banner1 {
            background-color: #003366;
            color: white;
            height: 60px;
            display: flex;
            align-items: center;
            padding: 0 20px;
        padding-left:   550px;
        }

        .contain1 {
            font-size: 20px;
        }

        .contain1 a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>

<?php include('include/header1.php'); ?>

<section class="about-header1">
    <div class="about-image1">
        <h1>Weekly Food Schedule</h1>
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="home.php">Home</a> &gt; Mess food
        </div>
    </div>
</section>

<div class="table-container">
    <table>
        <tr>
            <th>Day</th>
            <th>Morning Snacks</th>
            <th>Breakfast</th>
            <th>Lunch</th>
            <th>Evening Snacks</th>
            <th>Dinner</th>
            <th>Late Night Snacks</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($schedule)): ?>
        <tr>
            <td><?php echo $row['day']; ?></td>
            <td><?php echo $row['morning_snacks']; ?></td>
            <td><?php echo $row['breakfast']; ?></td>
            <td><?php echo $row['lunch']; ?></td>
            <td><?php echo $row['evening_snacks']; ?></td>
            <td><?php echo $row['dinner']; ?></td>
            <td><?php echo $row['late_night_snacks']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>

<?php include 'include/footer.php'; ?>

</body>
</html>
