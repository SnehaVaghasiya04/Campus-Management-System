<?php
include 'con.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
$bus_result = $conn->query("SELECT id, bus_number, pickup_points FROM buses");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request Transportation Facility</title>
    <link rel="stylesheet" href="style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
        }

        .c1 {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
           
            padding: 50px 0;
        }

        .container1 {
            display: flex;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 15px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(10px);
            overflow: hidden;
            width: 1000px;
            animation: slideIn 1s ease-in-out;
        }

        .info-box {
            width: 50%;
            padding: 40px;
            color: white;
            text-align: center;
            background: rgba(0, 0, 0, 0.3);
             background: linear-gradient(135deg, #003366, #005580);
        }

        .info-box h2 {
            margin-bottom: 10px;
        }

        .info-box img {
            width: 400px;
            height: 300px;
            border-radius: 10px;
            margin-top: 15px;
             background: linear-gradient(135deg, #003366, #005580);
        }

        .form-box {
            width: 50%;
            padding: 40px;
            text-align: center;
            background: rgba(255, 255, 255, 0.3);

        }

        .form-box h2 {
            color: #003366;
            margin-bottom: 20px;
        }

        .input-box {
            position: relative;
            margin-bottom: 25px;

        }

        .input-box input,
        .input-box select {
            width: 100%;
            padding: 12px;
            background: transparent;
            border: none;
            border-bottom: 2px solid #003366;
            color: #003366;
            outline: none;
            font-size: 16px;
        }

        .input-box label {
            position: absolute;
            left: 0;
            bottom: 10px;
            color: #003366;
            transition: 0.3s;
            font-size: 16px;
            pointer-events: none;
        }

        .input-box input:focus ~ label,
        .input-box input:valid ~ label {
            bottom: 35px;
            font-size: 14px;
            color: #ffcc00;
        }

        .input-box input:focus {
            border-bottom: 2px solid #ffcc00;
        }

        .btn {
            background: #003366;
            border: none;
            padding: 12px 20px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            border-radius: 5px;
            transition: 0.3s;
        }

        .btn:hover {
            background: #002244;
            transform: scale(1.05);
        }

        @media (max-width: 768px) {
            .container1 {
                flex-direction: column;
                width: 90%;
            }
            .info-box, .form-box {
                width: 100%;
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .about-header1 {
            text-align: center;
            color: white;
        }

        .about-image1 {
            background: url("/campus_management/admin/images/17.jpg") center center/cover;
            height: 420px;
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

        .banner1 {
            background-color: #003366;
            color: white;
            height: 60px;
            display: flex;
            align-items: center;
            padding-left: 550px;
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

<?php include_once('include/header1.php'); ?> 

<section class="about-header1">
    <div class="about-image1">
        <h1>Available Buses</h1>
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="home.php">Home</a> &gt; Transportation
        </div>
    </div>
</section>

<div class="c1">
    <div class="container1">
        <div class="info-box">
            <h2>Request Transportation Facility</h2>
            <p>Fill in the details to request your pickup service.</p>
            <img src="\campus_management\admin\images\313187-P8KOCH-10.jpg" alt="Bus Image">
        </div>

        <div class="form-box">
            <h2>Sign Up</h2>
            <form method="post" action="submit_request.php">
                <div class="input-box">
                    <input type="text" name="name" id="name" required>
                    <label>Name</label>
                </div>
                <div class="input-box">
                    <input type="email" name="email" id="email" required>
                    <label>Email</label>
                </div>
                <div class="input-box">
                    <input type="text" name="phone" id="phone" required>
                    <label>Phone</label>
                </div>
                <div class="input-box">
                    <select id="busDropdown" onchange="updateFields()" required>
                        <option value="" disabled selected>Select a Pickup Point</option>
                        <?php while ($row = $bus_result->fetch_assoc()) { ?>
                            <option value="<?= $row['pickup_points']; ?>" data-id="<?= $row['id']; ?>" data-number="<?= $row['bus_number']; ?>">
                                <?= $row['pickup_points']; ?> - (Bus No: <?= $row['bus_number']; ?>)
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <input type="hidden" name="bus_id" id="bus_id">
                <input type="hidden" name="bus_number" id="bus_number">
                <input type="hidden" name="pickup_point" id="pickup_point">

                <button type="submit" class="btn">Submit</button>
            </form>
        </div>
    </div>
</div>

<script>
    function updateFields() {
        const busDropdown = document.getElementById('busDropdown');
        const selectedOption = busDropdown.options[busDropdown.selectedIndex];

        if (selectedOption.value !== "") {
            document.getElementById('bus_id').value = selectedOption.getAttribute('data-id');
            document.getElementById('bus_number').value = selectedOption.getAttribute('data-number');
            document.getElementById('pickup_point').value = selectedOption.value;
        }
    }
</script>

<?php include_once('include/footer.php'); ?>
</body>
</html>
