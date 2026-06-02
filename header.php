<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        .banner {
            width: 100%;
            height: 400px;
            background: url('banner.jpg') no-repeat center center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            position: relative;
        }

        .banner::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }

        .banner-content {
            position: relative;
            z-index: 1;
        }

        .banner h1 {
            font-size: 3rem;
            margin-bottom: 10px;
        }

        .banner p {
            font-size: 1.2rem;
            margin-bottom: 20px;
        }

        .banner a {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1.2rem;
            color: white;
            background: #ff6600;
            text-decoration: none;
            border-radius: 5px;
        }

        .banner a:hover {
            background: #cc5500;
        }

        nav {
            background: #333;
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            font-size: 1rem;
            display: inline-block;
        }

        nav a:hover {
            background: #ff6600;
        }

    </style>
</head>
<body>

    <nav>
        <a href="home.php">Home</a>
        <a href="branch1.php">Branch 1</a>
        <a href="branch2.php">Branch 2</a>
        <a href="branch3.php">Branch 3</a>
    </nav>

    <div class="banner">
        <div class="banner-content">
            <h1>Welcome to Our Website</h1>
            <p>Explore our different branches!</p>
            <a href="#">Get Started</a>
        </div>
    </div>
