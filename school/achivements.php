<?php

include 'con.php';
$result = mysqli_query($conn, "SELECT * FROM achievements ORDER BY date DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Our Achievements</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            margin: 0;
          
        }
        h1 {
            text-align: center;
            margin-bottom: 40px;
            color: #333;
        }
        .achievements-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            max-width: 1200px;
            margin: auto;
            margin-bottom: 40px;
        }
        .achievement-card {
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s;
            margin-top: 40px;

        }
        .achievement-card:hover {
            transform: translateY(-5px);
        }
        .achievement-card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .achievement-content {
            padding: 20px;
        }
        .achievement-content h3 {
            margin: 0 0 10px;
            color: #444;
        }
        .achievement-content p {
            color: #666;
            font-size: 14px;
        }
        .achievement-content small {
            display: block;
            margin-top: 15px;
            color: #999;
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
            color:white;
            text-decoration: none;
        }
    </style>
</head>
<body>
<?php include_once('include1/header2.php'); ?>
<section class="about-header1">
    <div class="about-image1">
        
        <h1>🏆 Our School Achievements 🏆</h1>

    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="shome.php">Home</a> &gt; Achivements
        </div>
    </div>
</section>

<div class="achievements-container">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <div class="achievement-card">
            <img src="image/<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>">
            <div class="achievement-content">
                <h3><?php echo $row['title']; ?></h3>
                <p><?php echo $row['description']; ?></p>
                <small><?php echo date('d M, Y', strtotime($row['date'])); ?></small>
            </div>
        </div>
    <?php } ?>
</div>
<?php  include 'include1/footer.php';?>
</body>
</html>
