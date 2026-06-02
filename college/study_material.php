<!DOCTYPE html>
<html lang="en">
<head>
    <title>Study Materials</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        form { width: 50%; margin: auto; padding: 20px; border: 1px solid #ddd; background: #f9f9f9; margin:40px auto; }
        input, select, button { width: 100%; padding: 10px; margin: 10px 0; }
        button { background: #003452; color: white; border: none; cursor: pointer; }
        button:hover { background: #005580; }
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
<?php include('include2/add.php'); ?>

<section class="about-header1">
    <div class="about-image1">
        <h1>Enter Details to View Study Materials</h1>
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="home.php">Home</a> &gt; Study materials
        </div>
    </div>
</section>
    <h2></h2>
    <form method="POST" action="view_study_materials.php">
        <input type="text" name="student_id" placeholder="Enter Student ID" required>
        <select name="course" required>
            <option value="">Select Course</option>
            <option value="BCA">BCA</option>
            <option value="BCom">BCom</option>
            <option value="BBA">BBA</option>
            <option value="MSc IT">MSc IT</option>
        </select>
        <button type="submit">View Materials</button>
    </form>
<?php  include 'include2/footer.php';?>
</body>
</html>
