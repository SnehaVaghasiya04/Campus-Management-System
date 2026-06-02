<?php
include 'con.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us - Hostel</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #003452;
            margin-bottom: 40px;
        }
        .section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 50px;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        .section img {
            width: 100%;
            max-width: 500px;
            height: 300px;
            object-fit: cover;
            border-radius: 10px;
        }
        .section .text {
            flex: 1;
            font-size: 18px;
            line-height: 1.8;
            color: #444;
            text-align: justify;
        }
        @media (max-width: 900px) {
            .section {
                flex-direction: column;
            }
            .section img {
                max-width: 100%;
                height: auto;
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
</head>
<body>
<?php  include ('include/header1.php');?>
<section class="about-header1">
    <div class="about-image1">
        <h1>About Our Hostel</h1>
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="home.php">Home</a> &gt; Aboutus
        </div>
    </div>
</section>
<div class="container">
    

    <!-- First Part: Left Text, Right Image -->
    <div class="section">
        <div class="text">
            <p>
                Welcome to our hostel! We are dedicated to providing a comfortable and secure environment for students and professionals. Our modern rooms, friendly staff, and vibrant community make us the ideal choice for your stay.
            </p>
            <p>
                Located in a prime area with easy access to schools and workplaces, we ensure your daily commute is hassle-free while offering a peaceful space to relax and focus.
            </p>
        </div>
        <img src="image/HOSTEL1.jpg" alt="Hostel Building">
    </div>

    <!-- Second Part: Left Image, Right Text -->
    <div class="section">
        <img src="image/HOSTE2.jpg" alt="Hostel Room">
        <div class="text">
            <p>
                Our rooms are designed with comfort in mind. From spacious layouts to cozy furnishings, you'll find everything you need to feel at home. We maintain strict hygiene standards and provide regular housekeeping for a worry-free stay.
            </p>
            <p>
                Enjoy access to common areas, dining facilities, and recreational zones where you can unwind, connect with others, and make lasting memories.
            </p>
        </div>
    </div>

    <!-- Third Part: Left Text, Right Image -->
    <div class="section">
        <div class="text">
            <p>
                Our dining area offers a variety of freshly prepared, nutritious meals every day. We focus on providing a balanced diet to keep you energized and healthy throughout your stay.
            </p>
            <p>
                Special care is taken to cater to different dietary needs, ensuring that everyone has delicious and suitable meal options.
            </p>
        </div>
        <img src="image/HOSTEL4.jpg" alt="Hostel Dining">
    </div>

</div>
<?php  include 'include/footer.php';?>
</body>
</html>
