<?php
include 'con.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $date = date("Y-m-d");

    $insert = mysqli_query($conn, "INSERT INTO hostel_contact (name, email, phone, message, date ) VALUES ('$name', '$email', '$phone', '$message', '$date')");

    if ($insert) {
        echo "<script>alert('Your message has been sent successfully!'); window.location.href='contact.php';</script>";
    } else {
        echo "<script>alert('Something went wrong, please try again.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us - Hostel</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #e9f5ff;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            max-width: 1000px;
            margin: 50px auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        h2 {
            color: #003366;
            text-align: center;
            margin-bottom: 30px;
        }

        fieldset {
            border: 2px solid #003366;
            padding: 20px;
            border-radius: 10px;
        }

        legend {
            padding: 0 15px;
            font-size: 20px;
            font-weight: bold;
            color: #003366;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .form-group {
            flex: 1;
            min-width: 48%;
        }

        label {
            display: block;
            margin: 15px 0 5px;
            font-weight: bold;
            color: #003366;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-bottom: 10px;
            font-size: 15px;
        }

        textarea {
            resize: none;
        }

        button {
            width: 100%;
            padding: 14px;
            background: #003366;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 20px;
        }

        button:hover {
            background: #005b99;
        }

        @media (max-width: 768px) {
            .form-group {
                min-width: 100%;
            }
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
</head>
<body>

<?php include('include/header1.php'); ?>

<section class="about-header1">
    <div class="about-image1">
        <h1>Contact us</h1>
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="home.php">Home</a> &gt;Contact 
        </div>
    </div>
</section>

<div class="container">
    
    <form method="post">
        <fieldset>
            <legend>Send Us a Message</legend>

            <div class="form-row">
                <div class="form-group">
                    <label for="name">Your Name:</label>
                    <input type="text" id="name" name="name" required placeholder="Enter your full name">
                </div>

                <div class="form-group">
                    <label for="email">Your Email:</label>
                    <input type="email" id="email" name="email" required placeholder="Enter your email address">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="phone">Your Phone:</label>
                    <input type="text" id="phone" name="phone" required placeholder="Enter your phone number">
                </div>

                <div class="form-group">
                    <label for="message">Your Message:</label>
                    <textarea id="message" name="message" rows="5" required placeholder="Write your message here..."></textarea>
                </div>
            </div>

            <button type="submit" name="submit">Send Message</button>
        </fieldset>
    </form>
</div>

<?php include 'include/footer.php'; ?>

</body>
</html>
