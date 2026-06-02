<?php
include 'include/header1.php';
include('con.php');
?>

<style>
    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
       
        background: #f9f9f9;
    }

    h2 {
        text-align: center;
        font-size: 2.5rem;
        color: #333;
        margin-bottom: 50px;
        position: relative;
    }

    h2::after {
        content: '';
        width: 80px;
        height: 4px;
        background: #007BFF;
        display: block;
        margin: 10px auto 0;
        border-radius: 2px;
    }

    .warden-container {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
        max-width: 1200px;
        margin: 0 auto;
        padding: 10px;
    }

    .warden-card {
        background: #fff;
        border-radius: 20px;
        padding: 30px 20px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        text-align: center;
        transition: transform 0.3s, box-shadow 0.3s;
        position: relative;
        overflow: hidden;
    }

    .warden-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }

    .warden-card img {
        width: 130px;
        height: 130px;
        border-radius: 50%;
        object-fit: cover;
        border: 5px solid #007BFF;
        margin-bottom: 20px;
    }

    .warden-card h3 {
        margin: 10px 0 5px;
        font-size: 1.4rem;
        color: #222;
    }

    .warden-card p {
        margin: 5px 0;
        color: #666;
        font-size: 0.95rem;
        line-height: 1.6;
    }

    .warden-card .designation {
        background: #007BFF;
        color: #fff;
        padding: 5px 10px;
        display: inline-block;
        border-radius: 12px;
        font-size: 0.85rem;
        margin-top: 10px;
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
        <h1>Meet Our Warden
</h1>
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="home.php">Home</a> &gt; staff
        </div>
    </div>
</section>


<div class="warden-container">
<?php
$result = mysqli_query($conn, "SELECT * FROM warden");
while($row = mysqli_fetch_assoc($result)){
    echo "<div class='warden-card'>";
    echo "<img src='image/".$row['photo']."' alt='Warden Photo'>";
    echo "<h3>".$row['name']."</h3>";
    echo "<p><strong>Contact:</strong> ".$row['contact']."</p>";
    echo "<p class='designation'>".$row['designation']."</p>";
    echo "<p><strong>Qualification:</strong> ".$row['qualification']."</p>";
    echo "</div>";
}
?>
</div>
<?php  include 'include/footer.php';?>
