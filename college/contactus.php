<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact Us</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            
           
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 20px;
            backdrop-filter: blur(10px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
            display: flex;
            overflow: hidden;
            animation: fadeIn 1s ease-in-out;
            margin: 40px auto;
        }

        /* Contact Form */
        .contact-form {
            flex: 1;
            padding: 50px 40px;
        }

        .contact-form h2 {
            margin-bottom: 30px;
            color: #333;
            font-size: 36px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        input, textarea {
            padding: 16px;
            font-size: 16px;
            border: none;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.6);
            box-shadow: inset 2px 2px 6px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        input:focus, textarea:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 0 12px rgba(0, 123, 255, 0.4);
        }

        textarea {
            resize: none;
            min-height: 140px;
        }

        button {
            padding: 16px;
            font-size: 18px;
            font-weight: bold;
            color: #fff;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            background: linear-gradient(135deg, #667eea, #764ba2);
            transition: all 0.4s ease;
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }

        button:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.5);
        }

        /* Map */
        .map {
            flex: 1;
            position: relative;
            min-height: 500px;
        }

        iframe {
            width: 100%;
            height: 100%;
            border: none;
            filter: grayscale(0.2) contrast(1.2);
        }

        .map::before {
            content: "Find Us Here!";
            position: absolute;
            top: 20px;
            left: 20px;
            background: rgba(0, 0, 0, 0.6);
            color: #fff;
            padding: 10px 20px;
            border-radius: 30px;
            font-size: 20px;
            letter-spacing: 1px;
        }

        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Responsive */
        @media (max-width: 992px) {
            .container {
                flex-direction: column;
            }

            .map {
                height: 350px;
            }
        }

        @media (max-width: 576px) {
            body {
                padding: 20px;
            }

            .contact-form {
                padding: 30px 20px;
            }

            .contact-form h2 {
                font-size: 28px;
            }

            .map::before {
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
<?php include('include2/add.php') ?>
<section class="about-header1">
    <div class="about-image1">
        <h1>Contact us</h1>
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="chome.php">Home</a> &gt; Contact us
        </div>
    </div>
</section>
    <div class="container">
        <div class="contact-form">
            <h2>Enquiry</h2>
            <form method="POST">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <input type="text" name="subject" placeholder="Subject" required>
                <textarea name="message" placeholder="Your Message" required></textarea>
                <button type="submit">Send Message</button>
            </form>
        </div>

        <div class="map">
            <iframe src="https://www.google.com/maps/embed?..." allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
<?php  include 'include2/footer.php';?>
</body>
</html>
