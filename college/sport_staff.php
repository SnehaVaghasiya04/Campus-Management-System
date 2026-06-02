<?php
include 'con.php';

// Fetch Sports Staff faculty
$query = "SELECT * FROM faculty WHERE field='Sports Staff'";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Staff</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
           
            background-color: #f4f4f4;
        }
        h1 {
            color: #003452;
        }
        .faculty-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
            margin-bottom: 40px;
        }
        .faculty-card {
            background: white;
            padding: 15px;
            border-radius: 8px;
            width: 250px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        .faculty-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 8px;
        }
        .faculty-card h3 {
            color: #003452;
            margin: 10px 0;
        }
        .faculty-card p {
            font-size: 14px;
            color: #555;
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
</head>
<body>
<?php include_once('include2/add.php'); ?>
<section class="about-header1">
    <div class="about-image1">
        <h1>Sports Staff</h1>
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="chome.php">Home</a> &gt; Faculty
        </div>
    </div>
</section>
    
    <div class="faculty-container">
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div class='faculty-card'>
                        <img src='image/" . $row['image'] . "' alt='{$row['name']}'>
                        <h3>{$row['name']}</h3>
                        <p><strong>Email:</strong> {$row['email']}</p>
                        <p><strong>Phone:</strong> {$row['phone']}</p>
                        <p><strong>Qualification:</strong> {$row['qualification']}</p>
                        <p><strong>Designation:</strong> {$row['designation']}</p>
                        <p><strong>Experience:</strong> {$row['experience']} years</p>
                      </div>";
            }
        } else {
            echo "<p>No faculty members found.</p>";
        }
        ?>
    </div>
<?php  include 'include2/footer.php';?>
</body>
</html>
