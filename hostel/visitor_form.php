<?php
include('con.php');

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $purpose = $_POST['purpose'];

    $insert = mysqli_query($conn, "INSERT INTO visitors (name, contact, email, purpose) VALUES ('$name', '$contact', '$email', '$purpose')");

    if($insert){
        echo "<script>alert('Visitor Request Submitted'); window.location='visitor_form.php';</script>";
    } else {
        echo "<script>alert('Error');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Visitor Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background: #E6F0FF;
           
            min-height: 100vh;
        }
        .form-container {
            background: #fff;
            padding: 40px 50px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 51, 102, 0.2);
            width: 100%;
            max-width: 550px;
            margin: 50px auto;
            border: 2px solid #0066CC;
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #003366;
        }
        form fieldset {
            border: 2px solid #0066CC;
            padding: 20px;
            border-radius: 12px;
        }
        form legend {
            font-size: 20px;
            font-weight: bold;
            color: #003366;
            padding: 0 10px;
        }
        form input, form textarea, form button {
            width: 100%;
            padding: 12px 15px;
            margin: 12px 0;
            border-radius: 8px;
            border: 1px solid #0066CC;
            font-size: 16px;
            transition: 0.3s;
        }
        form input:focus, form textarea:focus {
            border-color: #003366;
            outline: none;
            box-shadow: 0 0 8px rgba(0, 51, 102, 0.5);
        }
        form textarea {
            resize: none;
            height: 130px;
        }
        form button {
            background: #003366;
            color: #fff;
            font-weight: 600;
            border: none;
            cursor: pointer;
            margin-top: 20px;
            font-size: 18px;
            letter-spacing: 1px;
        }
        form button:hover {
            background: #0059B3;
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
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }

        /* Banner */
        .banner1 {
            background-color: #003366;
            color: white;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .banner1 a {
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <?php include('include/header1.php'); ?>
    
    <section class="about-header1">
        <div class="about-image1">
            <h1>Visitor Request Form</h1>
        </div>
        <div class="banner1">
            <a href="home.php">Home</a> &gt; visitor Form
        </div>
    </section>

    <div class="form-container">
     
        <form method="POST">
            <fieldset>
                <legend>Visitor Details</legend>
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="text" name="contact" placeholder="Your Contact Number" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="purpose" placeholder="Purpose of Visit" required></textarea>
                <button type="submit" name="submit">Submit Request</button>
            </fieldset>
        </form>
    </div>

    <?php include 'include/footer.php'; ?>
</body>
</html>
