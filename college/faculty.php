<?php
include 'con.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Faculty List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            
        }
        .faculty-description {
            width: 80%;
            margin: 0 auto 20px;
            text-align: justify;
            font-size: 16px;
            line-height: 1.6;
            margin-top: 30px;
        }
        .faculty-buttons {
            margin-top: 20px;
        }
       .faculty-buttons a {
    padding: 15px 30px;
    margin: 10px;
    text-decoration: none;
    background: #003366;
    color: white;
    font-size: 18px;
    border-radius: 50px;
    display: inline-block;
    width: 250px;
    height: 70px;
    line-height: 40px;
    box-shadow: 0 6px 12px rgba(0, 51, 102, 0.5); /* Shadow color based on #003366 */
    transition: all 0.3s ease;
    letter-spacing: 1px;
    font-weight: bold;
    text-transform: uppercase;
}

.faculty-buttons a:hover {
    background: #003366;
    color: #ffffff;
    box-shadow: 0 10px 20px rgba(0, 51, 102, 0.7); /* Darker blue shadow on hover */
    transform: translateY(-5px);
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
        <h1>Faculty</h1>
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="home.php">Home</a> &gt; Faculty
        </div>
    </div>
</section>
    

    <!-- Faculty Description -->
    <div class="faculty-description">
       <p> Our faculty members are the backbone of our institution, dedicated to providing high-quality education and mentorship. 
        With extensive academic backgrounds and industry experience, they bring a wealth of knowledge to the classroom, 
        ensuring students receive a comprehensive and practical learning experience. Their passion for teaching and research 
        fosters an engaging and stimulating environment that prepares students for their future careers.</p>

        <p>Each faculty member specializes in different disciplines, offering expertise in areas such as Computer Applications, 
        Business Management, Commerce, and Information Technology. Through their guidance, students gain insights into 
        real-world challenges, industry trends, and cutting-edge research. They not only teach theoretical concepts 
        but also focus on practical applications, equipping students with the skills necessary to excel in their respective fields.</p>
    </div>

    <!-- Faculty Buttons -->
    <div class="faculty-buttons">
        <a href="bca_faculty.php">BCA Faculty</a>
        <a href="bcom_faculty.php">BCOM Faculty</a>
        <a href="bba_faculty.php">BBA Faculty</a>
        <a href="mscit_faculty.php">MSC IT Faculty</a>
        <a href="lab_assistance.php">Lab Assistance</a>
        <a href="sports_staff.php">Sports Staff</a>
        <a href="admin_staff.php">Admin Staff</a>
    </div>

<br>
    <div class="faculty-description">
        <br>
        <p>Our faculty takes a student-centered approach, encouraging interactive learning, discussions, and project-based 
        assignments. They actively engage with students, mentoring them through research projects, internships, 
        and career planning. Their dedication extends beyond the classroom, as they are always available to support 
        and guide students in their academic and professional journeys.</p>

        <p>We take immense pride in our faculty's commitment to excellence and innovation in education. Their contributions 
        play a vital role in shaping the future of our students, instilling in them a passion for lifelong learning and success. 
        Explore the faculty members of your respective program below and get to know the mentors who will help you 
        achieve your academic and career aspirations.</p>
    </div>
<?php  include 'include2/footer.php';?>
</body>
</html>
