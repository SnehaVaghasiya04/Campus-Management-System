<?php
include 'con.php';

// Fetch distinct roles from the database
$query_roles = "SELECT DISTINCT role FROM staff ORDER BY role";
$result_roles = mysqli_query($conn, $query_roles);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Staff</title>
    <style>
        body {
            font-family: Arial, sans-serif;
          
            background-color: #f4f4f9;
        }
        h1 {
            text-align: center;
            margin-top: 120px;
            margin-bottom: 40px;
        }
        .section {
            margin-top: 10px;
            margin-bottom: 20px;
            border-bottom: 2px solid #ddd;
            padding-bottom: 20px;
        }
        .section h2 {
            color: #333;
           font-size: 28px;
        color: #003452;
        margin-top: 30px;
        margin-bottom: 20px;
        padding: 10px 20px;
        display: inline-block;
        background: #e9f5ff;
        border-left: 5px solid #289cac;
        border-radius: 4px;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
        animation: fadeIn 1.2s ease-in-out;
        }

           @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

        .staff {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .card {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 15px;
            width: 220px;
            background: #fff;
            text-align: center;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
        }
        .card h3 {
            margin: 10px 0 5px;
            font-size: 18px;
            color: #007BFF;
        }
        .card p {
            margin: 5px 0;
            font-size: 14px;
            color: #555;
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
            color:white;
            text-decoration: none;
        }
    </style>
</head>
<body>
     <?php include_once('include1\header2.php'); ?>

     <section class="about-header1">
    <div class="about-image1">
        <h1>Meet Our Staff</h1>
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="shome.php">Home</a> &gt; Staff
        </div>
    </div>
</section>
   
    <?php 
    // Loop through each role and display the corresponding staff members
    while ($role_row = mysqli_fetch_assoc($result_roles)): 
        $role = $role_row['role']; 
    ?>
        <div class="section">
            <h2><?php echo $role; ?></h2>
            <div class="staff">
                <?php
                $query_staff = "SELECT * FROM staff WHERE role = '$role'";
                $result_staff = mysqli_query($conn, $query_staff);

                if (mysqli_num_rows($result_staff) > 0):
                    while ($staff = mysqli_fetch_assoc($result_staff)): 
                ?>
                    <div class="card">
                        <img src="image/<?php echo $staff['image']; ?>" alt="<?php echo $staff['name']; ?>">
                        <h3><?php echo $staff['name']; ?></h3>
                        <p><strong>Qualification:</strong> <?php echo $staff['qualification']; ?></p>
                        <p><strong>Contact:</strong> <?php echo $staff['contact']; ?></p>
                    </div>
                <?php 
                    endwhile;
                else: 
                ?>
                    <p>No staff found in this category.</p>
                <?php endif; ?>
            </div>
        </div>
    <?php endwhile; ?>
    <?php  include 'include1/footer.php';?>
</body>
</html>
