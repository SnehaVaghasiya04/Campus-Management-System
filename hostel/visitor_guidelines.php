<?php
include('con.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Visitor Guidelines</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f4f8;
            
            margin: 0;
        }
        h2 {
            text-align: center;
            margin-top: 20px;
            color: #333;
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        .visitor-form-btn {
            display: block;
            width: fit-content;
            margin: 20px auto 40px;
            padding: 12px 30px;
            font-size: 1rem;
            color: #fff;
            background-color: #003366;
            border: none;
            border-radius: 50px;
            text-decoration: none;
            transition: 0.3s ease;
        }
        .visitor-form-btn:hover {
            background-color: #003366;
            transform: translateY(-2px);
        }
        .guidelines-container {
            max-width: 1100px;
            margin: auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        .guideline-card {
            background: #fff;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            transition: 0.3s ease-in-out;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .guideline-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }
        .guideline-card i {
            font-size: 50px;
            color: #003366;
            margin-bottom: 20px;
        }
        .guideline-card p {
            font-size: 1.1rem;
            color: #555;
            line-height: 1.6;
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
    <?php include('include/header1.php'); ?>
<section class="about-header1">
    <div class="about-image1">
        <h1> Visitor Guidelines</h1>
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="home.php">Home</a> &gt; visitor Guidelines
        </div>
    </div>
</section>


   

    <!-- Visitor Form Button -->
    <a href="visitor_form.php" class="visitor-form-btn">
        <i class="fa-solid fa-user-plus"></i> Fill Visitor Form
    </a>

    <div class="guidelines-container">
        <?php
        $result = mysqli_query($conn, "SELECT * FROM visitor_guidelines");
        while($row = mysqli_fetch_assoc($result)){
            echo "<div class='guideline-card'>";
            echo "<i class='".$row['icon']."'></i>";
            echo "<p>".$row['guideline']."</p>";
            echo "</div>";
        }
        ?>
    </div>
<?php  include 'include/footer.php';?>
</body>
</html>
