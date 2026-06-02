<?php
include 'con.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Portal - Hostel</title>
    <style>
    /* General Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body {
        background-color: #f0f4f8;
        color: #333;
    }

    /* Header Section */
    .about-header1 {
        position: relative;
        text-align: center;
    }

    .about-image1 {
        background: url("/campus_management/admin/images/17.jpg") center center/cover no-repeat;
        height: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .about-image1 h1 {
        font-size: 48px;
        font-weight: 700;
        color: #003366;
        text-shadow: 4px 4px 12px rgba(0, 0, 0, 0.8);
        animation: fadeInDown 1s ease;
        letter-spacing: 1.5px;
       
    }

    /* Banner */
    .banner1 {
        background-color: #003366;
        color: white;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .contain1 {
        font-size: 20px;
    }

    .contain1 a {
        color: white;
        text-decoration: none;
        transition: color 0.3s;
    }

    .contain1 a:hover {
        color: #ffcc00;
    }

    /* Container */
    .container {
        max-width: 600px;
        margin: 60px auto;
        background: #ffffff;
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
        text-align: center;
        animation: fadeInUp 1s ease;
    }

    .container h2 {
        margin-bottom: 30px;
        font-size: 28px;
        color: #003366;
        font-weight: 600;
        text-transform: uppercase;
    }

    form input[type="text"] {
        width: 100%;
        padding: 15px;
        font-size: 16px;
        border: 2px solid #d0d7de;
        border-radius: 10px;
        margin-bottom: 20px;
        transition: border-color 0.3s;
    }

    form input[type="text"]:focus {
        border-color: #003366;
        outline: none;
    }

    form button {
        padding: 14px 40px;
        font-size: 18px;
        background: linear-gradient(135deg, #0077b6, #003366);
        color: white;
        border: none;
        border-radius: 50px;
        cursor: pointer;
        font-weight: 600;
        transition: background 0.4s, transform 0.2s;
    }

    form button:hover {
        background: linear-gradient(135deg, #005f99, #002244);
        transform: translateY(-2px);
    }

    form button:active {
        transform: translateY(1px);
    }

    /* Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .about-image1 h1 {
            font-size: 32px;
        }

        .container {
            padding: 30px 20px;
        }
    }
    </style>
</head>
<body>

<?php include ('include/header1.php');?>

<section class="about-header1">
    <div class="about-image1">
        <h1>Students</h1>
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="home.php">Home</a> &gt; Students
        </div>
    </div>
</section>

<div class="container">
    <h2>Enter Admission ID to View Details</h2>
    <form method="POST" action="student_dashboard.php">
        <input type="text" name="admission_id" placeholder="Enter Admission ID" required>
        <button type="submit">View Details</button>
    </form>
</div>

<?php include 'include/footer.php';?>

</body>
</html>
