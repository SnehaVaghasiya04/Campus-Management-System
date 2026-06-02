<?php
include 'con.php';
$types = ['Merit-Based', 'Need-Based', 'Sports', 'Cultural', 'Special Category'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Scholarships & Financial Aid</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
        /* General Page Styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
          
            text-align: center;
        }

       

       h2 {
    background: linear-gradient(90deg, #003366, #005b96, #007acc);
    color: white;
    padding: 10px;
    display: inline-block;
    border-radius: 5px;
    margin-top: 20px;
    width: 400px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    letter-spacing: 1px;
}

        .scholarships-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
            margin-bottom: 30px;
        }

        /* Individual Scholarship Box */
        .scholarship-box {
            background: white;
            border-radius: 10px;
            padding: 15px;
            width: 500px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
            position: relative;
            text-align: left;
            animation: fadeIn 1s ease-in-out;
        }

        .scholarship-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        h4 {
            margin: 10px 0;
            color: #2c3e50;
        }

        p {
            font-size: 14px;
            color: #555;
            margin: 5px 0;
        }

        /* Trending Badge */
        .trending {
            background: #ff5733;
            color: white;
            padding: 5px 10px;
            font-size: 12px;
            border-radius: 15px;
            position: absolute;
            top: 10px;
            right: 10px;
            font-weight: bold;
        }

        /* Fade-in Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .scholarships-container {
                flex-direction: column;
                align-items: center;
            }

            .scholarship-box {
                width: 90%;
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

  <?php include ('include2/add.php') ?>
<section class="about-header1">
    <div class="about-image1">
        <h1>Scholarships & Financial Aid</h1>
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="chome.php">Home</a> &gt;Scholarships
        </div>
    </div>
</section>
   

    <?php foreach ($types as $type) { 
        $result = mysqli_query($conn, "SELECT * FROM scholarships WHERE type='$type' ORDER BY trending DESC"); 
        if(mysqli_num_rows($result) > 0) { ?>
            
            <h2><?= $type ?> Scholarships</h2>
            
            <div class="scholarships-container">
                <?php while($row = mysqli_fetch_assoc($result)) { ?>
                    <div class="scholarship-box">
                        <h4><?= $row['title'] ?></h4>
                        <p><?= $row['description'] ?></p>
                        <p><strong>Amount:</strong> ₹<?= $row['amount'] ?></p>
                        <p><strong>Course:</strong> <?= $row['course'] ?></p>
                        <?php if($row['trending']) { ?>
                            <span class="trending">Trending</span>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    <?php } ?>
<?php  include 'include2/footer.php';?>

</body>
</html>
