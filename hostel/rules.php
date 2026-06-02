<?php
include 'con.php';
$query = "SELECT * FROM girls_hostel_rules";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Girls' Hostel Rules</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* General Page Styling */
/* General Page Styling */
<style>
/* General Page Styling */
body {
    font-family: Arial, sans-serif;
    background-color: #eef4fb;
    color: #333;
    margin: 0;
    padding: 0;
}

/* Main Container */
.container1 {
    max-width: 1500px;
    margin: 50px auto;
    padding: 20px;
    text-align: center;
    margin-top: 30px;
}

/* Heading */
h2 {
    color: #1e3a8a;
    font-size: 26px;
    margin-bottom: 20px;
}

/* Rules Container */
.rules-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

/* Individual Rule Card */
.rule-card {
    background: #e6f0ff;
    border-left: 5px solid #1e3a8a;
    padding: 15px;
    border-radius: 10px;
    box-shadow: 2px 2px 10px rgba(30, 58, 138, 0.1);
    width: 45%;  /* Two cards per row */
    min-width: 300px;
    text-align: left;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

/* Hover Effect */
.rule-card:hover {
    transform: scale(1.05); /* Slightly enlarge the card */
    box-shadow: 4px 4px 15px rgba(30, 58, 138, 0.3); /* Blue glow effect */
}

/* Rule Title */
.rule-card h3 {
    color: #1d4ed8;
    font-size: 18px;
    margin-bottom: 8px;
}

/* Rule Description */
.rule-card p {
    font-size: 16px;
    color: #555;
    margin: 0;
}

/* Responsive Design */
@media (max-width: 768px) {
    .rule-card {
        width: 100%; /* Full width on small screens */
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
    padding-left: 550px;
}

.contain1 {
    font-size: 20px;
}

.contain1 a {
    color: white;
    text-decoration: none;
}
</style>


    </style>
</head>
<body>
<?php include('include/header1.php'); ?>
<section class="about-header1">
    <div class="about-image1">
        <h1>📜 Girls' Hostel Rules & Regulations</h1>
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="home.php">Home</a> &gt; Rules
        </div>
    </div>
</section>


<div class="container1">
    <h2></h2>
    <div class="rules-container">
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <div class="rule-card">
                <h3><?php echo $row['title']; ?></h3>
                <p><?php echo $row['rule_text']; ?></p>
            </div>
        <?php endwhile; ?>
    </div>
</div>
<?php  include 'include/footer.php';?>

</body>
</html>
