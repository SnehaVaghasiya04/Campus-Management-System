<?php
// Start session
session_start();


if (!isset($_SESSION['warden_name'])) {
    // Redirect to the login page
    header("Location: warden_login.php");
    exit();
}

include 'con.php'; // Include database connection

// Check if user is logged in
$loggedInUser = isset($_SESSION['warden_name']) ? $_SESSION['warden_name'] : 'Guest';


// Fetch data from new tables
$rooms_count = $conn->query("SELECT COUNT(*) FROM rooms")->fetch_row()[0];
$room_allocation_count = $conn->query("SELECT COUNT(*) FROM room_allocation")->fetch_row()[0];
$hostel_student_count = $conn->query("SELECT COUNT(*) FROM hostel_student")->fetch_row()[0];
$warden_count = $conn->query("SELECT COUNT(*) FROM warden")->fetch_row()[0];
$support_staff_count = $conn->query("SELECT COUNT(*) FROM support_staff")->fetch_row()[0];
$visitors_count = $conn->query("SELECT COUNT(*) FROM visitors")->fetch_row()[0];
$hostel_contact_count = $conn->query("SELECT COUNT(*) FROM hostel_contact")->fetch_row()[0];

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
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, sans-serif; }
        body { background: #f4f4f4; padding: 20px; text-align: center; }
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            max-width: 1100px;
            margin: auto;
            margin-left: 280px;
            margin-top: 30px;
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
        .card:hover { transform: scale(1.05); }
        .card i { font-size: 35px; }
        .card h3 { margin-bottom: 5px; font-size: 24px; }
        .card span { font-size: 14px; }

        .rooms { background: #FF6F61; }
        .room_allocation { background: #6A0572; }
        .hostel_student { background: #FFB400; }
        .warden { background: #2196F3; }
        .support_staff { background: #009688; }
        .visitors { background: #FF4081; }
        .hostel_contact { background: #4CAF50; }

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
    </style>
</head>
<body>
<?php include 'include/side.php'; ?>
    <div class="header">
        <div>Dashboard</div>
        <div>Welcome, <?php echo htmlspecialchars($loggedInUser); ?> 👋</div>
    </div>
    <div class="dashboard-cards">
        <div class="card rooms">
            <div>
                <h3><?php echo $rooms_count; ?></h3>
                <span>Rooms</span>
            </div>
            <i class="fas fa-bed"></i>
        </div>
        <div class="card room_allocation">
            <div>
                <h3><?php echo $room_allocation_count; ?></h3>
                <span>Room Allocation</span>
            </div>
            <i class="fas fa-key"></i>
        </div>
        <div class="card hostel_student">
            <div>
                <h3><?php echo $hostel_student_count; ?></h3>
                <span>Hostel Students</span>
            </div>
            <i class="fas fa-user-graduate"></i>
        </div>
        <div class="card warden">
            <div>
                <h3><?php echo $warden_count; ?></h3>
                <span>Wardens</span>
            </div>
            <i class="fas fa-user-shield"></i>
        </div>
        <div class="card support_staff">
            <div>
                <h3><?php echo $support_staff_count; ?></h3>
                <span>Support Staff</span>
            </div>
            <i class="fas fa-users"></i>
        </div>
        <div class="card visitors">
            <div>
                <h3><?php echo $visitors_count; ?></h3>
                <span>Visitors</span>
            </div>
            <i class="fas fa-user-friends"></i>
        </div>
        <div class="card hostel_contact">
            <div>
                <h3><?php echo $hostel_contact_count; ?></h3>
                <span>Hostel Contacts</span>
            </div>
            <i class="fas fa-address-book"></i>
        </div>
    </div>
</body>
</html>