<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Material Access</title>
    <style>
        /* General Styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            animation: fadeIn 2s ease-out;
        }

        h1 {
            text-align: center;
            color: #003452;
            margin-top: 10px;
            margin-bottom: 20px;
            animation: slideIn 1s ease-out;
        }

        /* Form Styling */
        form {
            width: 50%;
            margin: 40px auto;
            background-color: #fff;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            opacity: 0;
            animation: formFadeIn 1.5s forwards 0.5s;
        }

        label {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
            display: block;
            color: #003452;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            transition: border 0.3s;
        }

        input[type="text"]:focus,
        select:focus {
            border: 1px solid #289cac;
            box-shadow: 0 0 5px rgba(40, 156, 172, 0.8);
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #003366;
            color: white;
            font-size: 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.2s;
        }

        button:hover {
            background-color: #003452;
            transform: scale(1.05);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            form {
                width: 80%;
            }
            h1 {
                font-size: 24px;
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
            animation: zoomIn 2s ease-in-out;
        }

        .about-image1 h1 {
            font-size: 36px;
            font-weight: bold;
            color: #003366;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
            animation: fadeInText 2s ease-out;
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

        /* Animations */
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

        @keyframes slideIn {
            0% {
                transform: translateY(-50px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes formFadeIn {
            0% {
                opacity: 0;
            }
            100% {
                opacity: 1;
            }
        }

       

        @keyframes fadeInText {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

    </style>
</head>
<body>
    <?php include_once('include1/header2.php'); ?>
    <section class="about-header1">
        <div class="about-image1">
            <h1>Study Materials</h1>
        </div>
        <div class="banner1">
            <div class="contain1">
                <a href="shome.php">Home</a> &gt; Study Materials
            </div>
        </div>
    </section>

    <!-- Student ID Form -->
    <form method="GET" action="view_materials.php">
        <h1>Enter Details to View Materials</h1>
        <label>Enter Student ID:</label>
        <input type="text" name="student_id" required>

        <label>Select Standard:</label>
        <select name="standard" required>
            <option value="">Select Standard</option>
            <option value="Nursery">pre-primary</option>
            <option value="KG">primary</option>
            <option value="1">Class 1</option>
            <option value="2">Class 2</option>
            <option value="3">Class 3</option>
            <option value="4">Class 4</option>
            <option value="5">Class 5</option>
            <option value="6">Class 6</option>
            <option value="7">Class 7</option>
            <option value="8">Class 8</option>
            <option value="9">Class 9</option>
            <option value="10">Class 10</option>
            <option value="11">Class 11</option>
            <option value="12">Class 12</option>
        </select>

        <label>Select Stream (For Class 11-12 Only):</label>
        <select name="stream">
            <option value="None">None</option>
            <option value="Science">Science</option>
            <option value="Commerce">Commerce</option>
            <option value="Arts">Arts</option>
        </select>

        <button type="submit">View Materials</button>
    </form>
    <?php  include 'include1/footer.php';?>
</body>
</html>
