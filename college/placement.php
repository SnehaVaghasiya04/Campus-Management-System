<?php
// Database connection
include 'con.php';
// Create table if not exists
$table_query = "CREATE TABLE IF NOT EXISTS placements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_name VARCHAR(255) NOT NULL,
    company VARCHAR(255) NOT NULL,
    package DECIMAL(5,2) NOT NULL,
    year YEAR NOT NULL
)";
$conn->query($table_query);

// Fetch data for table
$query = "SELECT student_name, company, package, year FROM placements ORDER BY year DESC LIMIT 10";
$result = mysqli_query($conn, $query);

// Fetch data for Chart
$chart_query = "SELECT year, COUNT(*) as count FROM placements GROUP BY year ORDER BY year ASC";
$chart_result = mysqli_query($conn, $chart_query);
$years = [];
$counts = [];

while ($row = mysqli_fetch_assoc($chart_result)) {
    $years[] = $row['year'];
    $counts[] = $row['count'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Placement - Girls College Management</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
       <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f0f4f8;
    }

    .container {
        width: 90%;
        max-width: 1200px;
        margin: 40px auto;
        background: #fff;
        padding: 30px;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        animation: fadeIn 1s ease-in-out;
    }

    h2 {
        text-align: center;
        color: #003366;
        font-size: 28px;
        margin-bottom: 30px;
        position: relative;
    }

    h2::after {
        content: '';
        width: 80px;
        height: 4px;
        background: #f4b400;
        display: block;
        margin: 10px auto 0;
        border-radius: 2px;
    }

    .content-wrapper {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }

    .chart-container, .table-container {
        flex: 1 1 480px;
        background: #eaf2f8;
        padding: 20px;
        border-radius: 10px;
        box-shadow: inset 0 2px 6px rgba(0, 0, 0, 0.05);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
        font-size: 16px;
    }

    th, td {
        padding: 12px 15px;
        text-align: center;
    }

    th {
        background-color: #003366;
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        border-bottom: 2px solid #f4b400;
    }

    tr:nth-child(even) {
        background-color: #f8f9fa;
    }

    tr:hover {
        background-color: #dbe9f4;
        transition: 0.3s ease;
    }

    td {
        color: #333;
    }

    canvas {
        width: 100% !important;
        height: auto !important;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .content-wrapper {
            flex-direction: column;
        }
    }
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


    </style>
</head>
<body>
    <?php include ('include2/add.php') ?>
    <section class="about-header1">
    <div class="about-image1">
        <h1>Placement Statistics</h1>
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="home.php">Home</a> &gt; Placement
        </div>
    </div>
</section>
    <div class="container">
        
        <div class="content-wrapper">
            <div class="chart-container">
                <canvas id="placementChart"></canvas>
            </div>
            <div class="table-container">
                <h2>Recent Placements</h2>
                <table>
                    <tr>
                        <th>Student Name</th>
                        <th>Company</th>
                        <th>Package (LPA)</th>
                        <th>Year</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?= htmlspecialchars($row['student_name']) ?></td>
                            <td><?= htmlspecialchars($row['company']) ?></td>
                            <td><?= htmlspecialchars($row['package']) ?></td>
                            <td><?= htmlspecialchars($row['year']) ?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>

    <script>
        var ctx = document.getElementById('placementChart').getContext('2d');
        var placementChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?= json_encode($years) ?>,
                datasets: [{
                    label: 'Students Placed',
                    data: <?= json_encode($counts) ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
    <?php  include 'include2/footer.php';?>
</body>
</html>
