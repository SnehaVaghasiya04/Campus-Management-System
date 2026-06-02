<?php include 'con.php'; 


// Start the session to check if the user is logged in
session_start();

// Check if the user is logged in

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Timetable</title>
    <style>
       body {
    font-family: Arial, sans-serif;
    background-color: #f4f7fc;
    text-align: center;
}

h2 {
    margin-top: 50px;
    color: #2a4d7f;
    font-size: 2em;
}

/* Standard Links - Fully Rounded Buttons */
.standard-links {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 30px; /* Space between buttons */
    margin: 20px;
    max-width: 1200px;
    margin-left: auto;
    margin-right: auto;
    margin-top: 40px;
}

.standard-links a {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 180px;
    height: 180px;
    background: #003366; /* Updated background color */
    color: white;
    text-decoration: none;
    font-size: 20px;
    font-weight: bold;
    border-radius: 50%;
    text-align: center;
    position: relative;
    transition: 0.3s ease-in-out;
    box-shadow: 0 0 15px rgba(255, 255, 255, 0.5); /* White shadow effect */
}

/* Moving White Border Effect */
.standard-links a::before {
    content: "";
    position: absolute;
    top: -5px;
    left: -5px;
    right: -5px;
    bottom: -5px;
    border-radius: 50%;
    border: 5px solid transparent;
    background: conic-gradient(
        from 0deg, 
        rgba(255, 255, 255, 0.6), rgba(255, 255, 255, 1), rgba(255, 255, 255, 0.6)
    );
    -webkit-mask: linear-gradient(white 0 0) content-box, linear-gradient(white 0 0);
    mask: linear-gradient(white 0 0) content-box, linear-gradient(white 0 0);
    -webkit-mask-composite: xor;
    mask-composite: exclude;
    padding: 5px;
    animation: rotateBorder 3s linear infinite;
}

/* Hover Animation */
.standard-links a:hover {
    background: #002244; /* Slightly darker on hover */
    transform: scale(1.1);
    box-shadow: 0 0 20px rgba(255, 255, 255, 0.8);
}

/* Border Rotation Animation */
@keyframes rotateBorder {
    0% {
        transform: rotate(0deg);
    }
    100% {
        transform: rotate(360deg);
    }
}

/* Bounce Effect */
@keyframes bounce {
    from {
        transform: translateY(0);
    }
    to {
        transform: translateY(-5px);
    }
}

.standard-links a:hover {
    animation: bounce 0.5s ease-in-out infinite alternate;
}

/* Responsive Design */
@media (max-width: 768px) {
    .standard-links {
        gap: 15px;
    }

    .standard-links a {
        width: 140px;
        height: 140px;
        font-size: 18px;
    }
}

@media (max-width: 480px) {
    .standard-links a {
        width: 100px;
        height: 100px;
        font-size: 16px;
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
 <?php include_once('include1\header2.php'); ?>

 <section class="about-header1">
    <div class="about-image1">
        <h1>Time Table</h1>
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="shome.php">Home</a> &gt; Time Table
        </div>
    </div>
</section>

<div class="standard-links">
    
    <a href='tpreprimary.php'>Pre-Primary</a>
   
    <?php
    for ($i = 1; $i <= 12; $i++) {
        echo "<a href='std$i.php'>Standard $i</a>";
    }
    ?>
</div>
<?php  include 'include1/footer.php';?>
</body>
</html>
