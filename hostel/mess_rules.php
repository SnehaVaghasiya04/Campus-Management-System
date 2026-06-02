<?php
include 'con.php'; // Database Connection

// Fetch Mess Rules
$rules = mysqli_query($conn, "SELECT * FROM mess_rules");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mess Rules</title>
    <style>
       
    body {
        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;
        background-color: #e6f2ff;
        color: #003366;
    }

    /* Header Section */
    .about-header1 {
        position: relative;
        text-align: center;
        color: black;
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
        font-weight: bold;
        color: #003366;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.6);
        animation: fadeIn 1.2s ease-in-out;
    }

    /* Banner */
    .banner1 {
        background-color: #005792;
        color: white;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
    }

    .contain1 a {
        color: white;
        text-decoration: none;
    }

    .contain1 a:hover {
        text-decoration: underline;
    }

    /* Rules Container */
    .rules-container {
        max-width: 1000px;
        margin: 40px auto;
        padding: 0 20px;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
    }

    .rule-card {
        background: linear-gradient(135deg, #0074cc, #005792);
        color: #ffffff;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .rule-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.2);
    }

    .rule-title {
        font-size: 22px;
        font-weight: bold;
        margin-bottom: 10px;
        text-transform: uppercase;
        border-bottom: 2px solid rgba(255, 255, 255, 0.4);
        padding-bottom: 5px;
    }

    .rule-text {
        font-size: 16px;
        line-height: 1.8;
        margin-top: 10px;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
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
<?php include ('include/header1.php');?>
<section class="about-header1">
    <div class="about-image1">
        <h1>Mess Rules & Regulations</h1>
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="home.php">Home</a> &gt; mess rules
        </div>
    </div>
</section>


    
    <div class="rules-container">
        <?php while($row = mysqli_fetch_assoc($rules)): ?>
            <div class="rule-card">
                <div class="rule-title"><?php echo $row['title']; ?></div>
                <div class="rule-text"><?php echo $row['rule_text']; ?></div>
            </div>
        <?php endwhile; ?>
    </div>
<?php  include 'include/footer.php';?>

</body>
</html>
