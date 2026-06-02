<?php
include("con.php"); // Database Connection

$query = "SELECT * FROM rules";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rules & Regulations</title>
    <style>
        /* General Page Styles */
        body {
            font-family: 'Poppins', sans-serif;
          
            margin: 0;
            background-color: #f8f9fa;
        }
        
        .rules-container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
            text-align: center;
        }
        
        h2 {
            color: #003452;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }
        
        /* Rules Grid */
        .rules-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        /* Rule Cards */
        .rule {
            background: #ffffff;
            flex: 1 1 calc(50% - 20px); /* Two cards per row */
            max-width: 500px;
            padding: 15px;
            border-left: 6px solid #003399;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .rule:hover {
            transform: scale(1.03);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }
        
        .rule h3 {
            color: #003366;
            font-size: 20px;
            margin: 0;
            text-align: left;
        }

        .rule p {
            color: #333;
            font-size: 16px;
            text-align: justify;
            margin-top: 8px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .rule {
                flex: 1 1 100%; /* Full width on smaller screens */
            }
        }
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

    <?php include('include2/add.php') ?>
    <section class="about-header1">
    <div class="about-image1">
        <h1>College Rules & Regulations</h1>
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="home.php">Home</a> &gt; Rules
        </div>
    </div>
</section>
    <div class="rules-container">
       
        <div class="rules-grid">
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <div class="rule">
                    <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                    <p><?php echo nl2br(htmlspecialchars($row['description'])); ?></p>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
    <?php  include 'include2/footer.php';?>
</body>
</html>
