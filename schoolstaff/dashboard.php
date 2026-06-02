<?php
// Start session
session_start();


if (!isset($_SESSION['staff_id'])) {
    header("Location: login.php");
    exit();
}
include 'con.php';

// Fetch counts from tables
$students_count = $conn->query("SELECT COUNT(*) AS count FROM student")->fetch_assoc()["count"];
$courses_count = $conn->query("SELECT COUNT(*) AS count FROM courses")->fetch_assoc()["count"];
$staff_count = $conn->query("SELECT COUNT(*) AS count FROM staff")->fetch_assoc()["count"];

// Sample logged-in username (Replace with actual session variable)
$loggedInUser = isset($_SESSION['staff_name']) ? $_SESSION['staff_name'] : 'Guest';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
            text-align: center;
        }
        
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            max-width: 1100px;
            margin: auto;
            margin-left:    260px;
            height:     100px;
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
        .card:hover {
            transform: scale(1.05);
        }
        .card i {
            font-size: 35px;
        }
        .students { background: #FF6F61; }
        .courses { background: #6A0572; }
        .staff { background: #008080; }



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
    <?php  include 'include2/side.php'; ?>
   

    <div class="header">
        <div>Dashboard</div>
        <div>Welcome, <?php echo htmlspecialchars($loggedInUser); ?> 👋</div>
    </div>

    <div class="dashboard-cards">
        <div class="card students">
            <div>
                <h3><?php echo $students_count; ?></h3>
                <span>Students Enrolled</span>
            </div>
            <i class="fas fa-user-graduate"></i>
        </div>
        <div class="card courses">
            <div>
                <h3><?php echo $courses_count; ?></h3>
                <span>Courses Offered</span>
            </div>
            <i class="fas fa-book"></i>
        </div>
        <div class="card staff">
            <div>
                <h3><?php echo $staff_count; ?></h3>
                <span>Total Staff</span>
            </div>
            <i class="fas fa-chalkboard-teacher"></i>
        </div>
    </div>
</body>
</html>
<?php $conn->close(); ?>
