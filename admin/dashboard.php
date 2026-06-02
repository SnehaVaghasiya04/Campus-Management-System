<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}

include 'con.php'; // Include database connection

// Fetch counts from tables
$busCount = $conn->query("SELECT COUNT(*) AS total FROM buses")->fetch_assoc()['total'];
$contactCount = $conn->query("SELECT COUNT(*) AS total FROM contact_us")->fetch_assoc()['total'];
$messageCount = $conn->query("SELECT COUNT(*) AS total FROM message")->fetch_assoc()['total'];
$noticeCount = $conn->query("SELECT COUNT(*) AS total FROM notice")->fetch_assoc()['total'];
$aboutCount = $conn->query("SELECT COUNT(*) AS total FROM about_us")->fetch_assoc()['total'];

// Logged-in user info
$loggedInUser = $_SESSION['admin_name']; // Fetch admin name from session
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            background: #f4f4f4;
            padding: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #4CAF50;
            color: white;
            padding: 15px 20px;
            border-radius: 5px;
            font-size: 20px;
            font-weight: bold;
            margin-top: 60px;
            margin-left: 250px;
        }
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            max-width: 1100px;
            margin: auto;
            margin-top: 20px;
            margin-left: 270px;
        }
        .card {
            padding: 20px;
            border-radius: 10px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card i {
            font-size: 35px;
        }
        .card h3 {
            margin-bottom: 5px;
            font-size: 24px;
        }
        .card span {
            font-size: 14px;
        }

        /* Unique Colors for Each Card */
        .buses { background: #FFB400; }
        .contacts { background: #2196F3; }
        .messages { background: #FF6F61; }
        .notices { background: #6A0572; }
        .about { background: #009688; }

    </style>
</head>
<body>
    <?php include 'include/header.php'; ?>

    <div class="header">
        <div>Dashboard</div>
        <div>Welcome, <?php echo htmlspecialchars($loggedInUser); ?> 👋</div>
    </div>

    <!-- Dashboard Cards -->
    <div class="dashboard-cards">
        <div class="card buses">
            <div>
                <h3><?php echo $busCount; ?></h3>
                <span>Available Buses</span>
            </div>
            <i class="fas fa-bus"></i>
        </div>
        <div class="card contacts">
            <div>
                <h3><?php echo $contactCount; ?></h3>
                <span>Contact Messages</span>
            </div>
            <i class="fas fa-phone"></i>
        </div>
        <div class="card messages">
            <div>
                <h3><?php echo $messageCount; ?></h3>
                <span>Messages Received</span>
            </div>
            <i class="fas fa-envelope"></i>
        </div>
        <div class="card notices">
            <div>
                <h3><?php echo $noticeCount; ?></h3>
                <span>Notices</span>
            </div>
            <i class="fas fa-bell"></i>
        </div>
        <div class="card about">
            <div>
                <h3><?php echo $aboutCount; ?></h3>
                <span>About Us Entries</span>
            </div>
            <i class="fas fa-info-circle"></i>
        </div>
    </div>
</body>
</html>

<?php
// Close database connection
$conn->close();
?>