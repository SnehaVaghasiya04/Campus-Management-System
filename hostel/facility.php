<?php
include 'include/header1.php';
include('con.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Girls Hostel Facilities</title>
    
    <!-- Latest FontAwesome CDN -->
    <!-- Latest FontAwesome Free CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script src="https://kit.fontawesome.com/your_kit_code.js" crossorigin="anonymous"></script>
    
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f5f8fc;

        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
            font-size: 2.5rem;
            margin-top: 120px;
        }
        .facilities-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            max-width: 1200px;
            margin-top: 30px;
            margin-bottom: 40px;
        }
        .facility-card {
            background: #fff;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: 0.3s;
        }
        .facility-card:hover {
            transform: translateY(-8px);
        }
        .facility-card i {
            font-size: 50px;
            color: #003366;
            margin-bottom: 15px;
        }
        .facility-card h3 {
            font-size: 1.5rem;
            color: #222;
            margin-bottom: 10px;
        }
        .facility-card p {
            color: #555;
            font-size: 1rem;
        }
        /* Header Section */
        .about-header1 {
        text-align: center;
    }

    .about-image1 {
        background: url("/campus_management/admin/images/17.jpg") center center/cover;
        height: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .about-image1 h1 {
        font-size: 42px;
        color: #003366;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.6);
    }

    .banner1 {
        background-color: #003366;
        color: white;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .contain1 a {
        color: white;
        text-decoration: none;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    </style>
</head>
<body>
<section class="about-header1">
    <div class="about-image1">
        <h1>Our Girls Hostel Facilities</h1>
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="home.php">Home</a> &gt; Facilty
        </div>
    </div>
</section>


<div class="facilities-container">
    <?php
    $result = mysqli_query($conn, "SELECT * FROM hostel_facilities");
    while($row = mysqli_fetch_assoc($result)){
        echo "<div class='facility-card'>";
        echo "<i class='".$row['icon']."'></i>";
        echo "<h3>".$row['title']."</h3>";
        echo "<p>".$row['description']."</p>";
        echo "</div>";
    }
    ?>
</div>
<?php  include 'include/footer.php';?>
</body>
</html>
