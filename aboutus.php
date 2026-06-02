<?php
include "con.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us</title>
    <style>
        /* Reset and base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: cursive    ;
            background-color: #f8f9fa;
            color: #333;
        }

        /* Header Section */
        .about-header1 {
            position: relative;
            text-align: center;
            color: black;
        }

        .about-image1 {
            background: url("/campus_management/admin/images/17.jpg")  center center/cover;
            height: 350px;
            display: flex;
            
            align-items: center;
            justify-content: center;
        }

        .about-image1 h1 {
            font-size: 36px;
            font-weight: bold;
            color: #003452;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }

        /* Banner */
        .banner1 {
            background-color: #003366;
            color:white ;
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

        /* About Us Section */
        .about-us-container {
            display: flex;
            justify-content: flex-start; /* Align content to the left */
            align-items: center;
            max-width: 1200px;
            margin: 20px auto;
          
           
            
            padding: 20px;
        }

        .about-us-image-left {
            flex: 1;
            min-width: 600px;
            height: 350px;
            background-size: cover;
            background-position: center;
        }

        /* Example image for left side */
        .about-us-image-left {
            background: url('/campus_management/admin/images/13.jpg') no-repeat center center/cover;
            
            
        }



        .about-us-content {
            flex: 2;
            padding: 20px;
        }

        .about-us-title {
            color: #003366;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .about-us-description {
            color: #003452;
            font-size: 18px;
            line-height: 1.6;
        }

        .last-updated {
            margin-top: 20px;
            font-size: 14px;
            color: #888;
            text-align: right;
        }

        .container2 {
            display: flex;
            justify-content: space-around;
            align-items: center;
            padding: 20px;
        }

        .section2 {
            width: 45%;
            color :#003452;
            padding: 0px;
            text-align: center;
        }


        h1 {
            color: #003366;
            font-size: 30px;
        }

 .container2       ul {
            list-style: none;
            padding: 0;
        }

 .container2       li {
            margin-bottom: 10px;
        }

  .container2     img {
            width: 100%;
            height: 400px;
        }
 .container   h2{
        font-size: 40px;
        color: #289cac;
    }

 .container2   p{
        font-size: 20px;

    }

.
    </style>
</head>
<body>

<?php include_once('include/header1.php'); ?>

<!-- Header Section -->
<section class="about-header1">
    <div class="about-image1">
        <h1>About Us</h1>
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="home.php">Home</a> &gt; About Us
        </div>
    </div>
</section>

<!-- About Us Details Section -->

<div class="about-us-container">
    <!-- Left Image Section -->
    <div class="about-us-image-left"></div>

    <!-- Content Section -->
    <div class="about-us-content">
        
        <?php
        // Fetch the latest About Us details from the database
        $sql = "SELECT title, description, last_updated FROM about_us ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Display the fetched record
            $row = $result->fetch_assoc();
            echo "<div class='about-us-title'>" . htmlspecialchars($row['title']) . "</div>";
            echo "<div class='about-us-description'>" . nl2br(htmlspecialchars($row['description'])) . "</div>";
            
        } else {
            // If no record exists
            echo "<p>No About Us details available.</p>";
        }
        ?>
    </div>
</div>

    <main>
        <div class="container2">
            <div class="section2">
                <h1>Our Vision</h1>
                <p>
We envision a future where sneh kunj girls campus is a global leader in education, recognized for our outstanding programs, cutting-edge research, and inclusive campus community. We aim to empower our students to become leaders in their fields, making a positive impact on society.
</p>
            </div>
            <div class="section2">
                <img src="/campus_management/admin/images/12.jpg" alt="More Beauty Products">
            </div>
        </div>
    
</section>
<div class="container2">

            <div class="section2">
                <img src="/campus_management/admin/images/11.jpg" alt="Beauty Products">
            </div>
            <div class="section2">
                <h1>Campus Life</h1>
                <p>Life at sneh kunj girls campus extends beyond the classroom. Our campus is a vibrant community with numerous opportunities for involvement and personal growth. From student organizations and leadership programs to cultural events and athletic teams, there is something for everyone. Our beautiful campus provides a supportive and stimulating environment where students can thrive both academically and personally. </p>
            </div>
        </div>
    </header>

 
<?php include_once('include/footer.php'); ?>

</body>
</html>
