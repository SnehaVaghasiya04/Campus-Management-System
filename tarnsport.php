<?php
include 'con.php';

// Fetch bus details
$result = $conn->query("SELECT * FROM buses ORDER BY CAST(bus_number AS UNSIGNED) ASC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Available Buses</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f0f2f5;
            margin: 0;
            padding: 0;
        }

        header {
            background: linear-gradient(90deg, #007bff, #00c6ff);
            color: white;
            padding: 1rem 0;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        h2 {
            text-align: center;
            color: #007bff;
            margin-top: 30px;
            font-size: 28px;
        }

        .bus-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
            padding: 30px;
        }

        
        .bus-card {
    width: 320px;
    background: #ffffff;
    border-radius: 15px;
    text-align: center;
    padding: 20px;
    border: 5px solid transparent;
    background-clip: padding-box;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease-in-out;
    border-image: linear-gradient(120deg, #001f4d, #003366, #0055a5) 1;
}

       .bus-card:hover {
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3), 0 0 15px rgba(0, 51, 102, 0.6);
}
.bus-number {
    width: 90px;
    height: 90px;
    border-radius: 50%;
    background: #003366; /* Changed here */
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 22px;
    font-weight: bold;
    margin: 0 auto 15px;
    box-shadow: 0 0 10px rgba(0, 51, 102, 0.8); /* Optional: adjust the shadow to match the theme */
    animation: glow 1.5s infinite alternate;
}


       @keyframes glow {
    0% { box-shadow: 0 0 10px rgba(0, 51, 102, 0.8); }
    100% { box-shadow: 0 0 20px rgba(0, 51, 102, 1); }
}


        .bus-card h3 {
            font-size: 20px;
            font-weight: 600;
            color: #333;
            margin: 10px 0;
        }

        .bus-card p {
            font-size: 16px;
            color: #555;
            margin: 8px 0;
        }

        .bus-card button {
            background: linear-gradient(45deg, #007bff, #00c6ff);
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            margin-top: 10px;
            transition: background 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
        }

        .bus-card button:hover {
            background: linear-gradient(45deg, #0056b3, #008cff);
            transform: translateY(-3px);
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 768px) {
            .bus-container {
                flex-direction: column;
                align-items: center;
            }
        }

        /* Header Section */
        .about-header1 {
            text-align: center;
            color: black;
        }

        .about-image1 {
            background: url("/campus_management/admin/images/17.jpg") center center/cover;
            height: 350px;
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

        .banner1 {
            background-color: #003366;
            color: white;
            height: 60px;
            display: flex;
            align-items: center;
            padding-left: 550px;
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
<?php include_once('include/header1.php'); ?> 

<!-- Header Section -->
<section class="about-header1">
    <div class="about-image1">
        <h1>Available Buses</h1>
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="home.php">Home</a> &gt; Transportation
        </div>
    </div>
</section>

<!-- Bus Cards -->
<div class="bus-container">
    <?php while ($row = $result->fetch_assoc()) { ?>
        <div class="bus-card">
            <div class="bus-number"><?= $row['bus_number'] ?></div>
            <h3><?= $row['route'] ?></h3>
            <p><strong>Pickup Points:</strong> <?= $row['pickup_points'] ?></p>
            <p><strong>Timings:</strong> <?= $row['timings'] ?></p>
            <p><strong>Fees:</strong> ₹<?= $row['fees'] ?></p>
            <a href="from.php?bus_number=<?= $row['bus_number'] ?>&route=<?= $row['route'] ?>&pickup_points=<?= $row['pickup_points'] ?>&timings=<?= $row['timings'] ?>&fees=<?= $row['fees'] ?>">
                <button>View Details</button>
            </a>
        </div>
    <?php } ?>
</div>

<?php include_once('include/footer.php'); ?>
</body>
</html>
