<!DOCTYPE html>
<html>
<head>
    <title>School Website Template</title>
    <style type="text/css">
        /********* Common CSS Starts **********/
        :root {
            /* Primary Colors */
            --primary-color: #003366; /* Dark blue for header background */
            --secondary-color: #289cac; /* Aqua for marquee text */
            --nav-bg-color: #f4f4f4; /* Light grey for navigation bar */
            --nav-link-color: #003452; /* Dark teal for links */
            --nav-hover-bg-color: #289CAC; /* Hover background color */
            --nav-hover-text-color: #ffffff; /* Hover text color */

            /* Font */
            --font-family: "Times New Roman", Times, serif;
            --font-color: #242424; /* Default text color */
        }

        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
            font-family: "Times New Roman", Times, serif; 
        }

        html, body {
            font-family: "Times New Roman", Times, serif;
            color: var(--font-color);
            font-size: 16px;
        }

        .container {
            width: 1000px;
            margin: 0px auto;
        }

        .heading {
            font-size: 28px;
            font-weight: 500;
            border-bottom: 1px solid #46b7c1;
            margin-bottom: 20px;
            color: #46b7c1;
        }

        /********* Common CSS End **********/

        /********* Header HTML CSS Starts **********/
        .headersection {
            position: fixed; /* Keeps the header fixed */
            top: 0;
            left: 0;
            width: 100%; /* Full width */
            z-index: 1000; /* Ensures it stays above other content */
            background: var(--primary-color); /* GATO */
        }

        .header {
            padding: 6px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .header b {
            background: #fff;
            color: red;
            padding: 10px;
            font-size: 20px;
        }

        .header marquee {
            font-size: 20px;
            color: white; /* ACHO */
            width: 80%;
            font-weight: bold;
        }
        /********* Header HTML CSS End **********/

        /********* Navigation Bar CSS Starts **********/
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: var(--nav-bg-color); /* Background color */
            padding: 10px 20px;
            height: 60px;
        }

        .logo {
            display: flex;
            align-items: center;
            font-family: cursive;
        }

        .logo img {
            height: 100px;
            width: 100px; /* Adjust the height of the logo */
            border-radius: 50%;
        }

        .logo a {
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
            color: #003452;
            margin-left: 10px;
        }

        .nav-links {
            list-style-type: none;
            display: flex;
            gap: 20px; /* Spacing between menu items */
        }

        .nav-links li {
            display: inline;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--nav-link-color);
            font-size: 18px;
            font-weight: 500;
            padding: 5px 10px;
            border-radius: 3px; /* Rounded effect for hover */
        }

        .nav-links a:hover {
            background-color: #003366;
            color: var(--nav-hover-text-color);
        }
        /********* Navigation Bar CSS End **********/

        /********* Responsive Design **********/
        @media (max-width: 768px) {
            .container {
                width: 90%; /* Make container responsive */
            }

            .navbar {
                flex-direction: column; /* Stack items vertically */
                align-items: flex-start; /* Align items to the start */
            }

            .nav-links {
                flex-direction: column; /* Stack links vertically */
                gap: 10px; /* Reduce gap between links */
                width: 100%; /* Full width for links */
            }

            .nav-links a {
                padding: 10px; /* Increase padding for touch targets */
                width: 100%; /* Full width for links */
                text-align: center; /* Center text */
            }

            .header marquee {
                font-size: 16px; /* Reduce font size for smaller screens */
            }
        }

        @media (max-width: 480px) {
            .logo img {
                height: 80px; /* Reduce logo size for smaller screens */
                width: 80px; /* Reduce logo size for smaller screens */
            }

            .navbar {
                padding: 5px; /* Reduce padding for smaller screens */
            }

            .nav-links a {
                font-size: 16px; /* Reduce font size for smaller screens */
            }
        }
    </style>
</head>
<body>
    <!------ Header HTML Starts  ------->
    <div class="headersection">
        <div class="header">
            <div class="container">
                <marquee>
                    My campus: "The Path To Your Dreams Starts Here."
                </marquee>
            </div>
        </div>
        <!------ Header HTML Ends ------->

        <!------ Design Logo And Main Menu Section HTML Starts ------->
        <nav class="navbar">
            <div class="logo">
                <img src="\campus_management\admin\images\Picsart_25-01-06_18-46-54-842.png" alt="School Logo">
                <a href="">Sneh Kunj Girls Campus</a>
            </div>
            <ul class="nav-links">
                <li><a href="home.php">Home</a></li>
                <li><a href="school/shome.php">School</a></li>
                <li><a href="college/chome.php">College</a></li>
                <li><a href="hostel/hhome.php">Hostel</a></li>
                <li><a href="tarnsport.php">Transportation</a></li>
                <li><a href="aboutus.php">About us</a></li>
                <li><a href="contact.php">Contact us</a></li>
            </ul>
        </nav>
    </div>
</body>
</html>