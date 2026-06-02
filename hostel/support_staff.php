<?php
include 'include/header1.php';
include('con.php');
?>

<style>
    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
       
        background: #f0f4f8;
    }

    h2 {
        text-align: center;
        font-size: 2.5rem;
        color: #333;
        margin-bottom: 30px;
        position: relative;
    }

    h2::after {
        content: '';
        display: block;
        width: 80px;
        height: 4px;
        background-color: #007BFF;
        margin: 10px auto 0;
        border-radius: 2px;
    }

    .staff-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 20px;
        padding: 20px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .staff-card {
        background-color: #fff;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        text-align: center;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .staff-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .staff-card img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 50%;
        border: 3px solid #007BFF;
        margin-bottom: 15px;
    }

    .staff-card h3 {
        margin: 10px 0 5px;
        font-size: 1.4rem;
        color: #333;
    }

    .staff-card p {
        margin: 5px 0;
        color: #555;
        font-size: 1rem;
    }

    @media (max-width: 600px) {
        h2 {
            font-size: 2rem;
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

<section class="about-header1">
    <div class="about-image1">
        <h1>support staff</h1>
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="home.php">Home</a> &gt; support staff
        </div>
    </div>
</section>



<div class="staff-container">
    <?php
    $result = mysqli_query($conn, "SELECT * FROM support_staff");
    while($row = mysqli_fetch_assoc($result)){
        echo "<div class='staff-card'>";
        echo "<img src='image/".$row['photo']."' alt='Staff Photo'>";
        echo "<h3>".$row['name']."</h3>";
        echo "<p><strong>Role:</strong> ".$row['duty_role']."</p>";
        echo "<p><strong>Shift:</strong> ".$row['shift_time']."</p>";
        echo "<p><strong>Contact:</strong> ".$row['contact']."</p>";
        echo "</div>";
    }
    ?>
</div>
<?php  include 'include/footer.php';?>
