<?php
// Start session
session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: login.php");
    exit();
}


include 'con.php'; // Include database connection

// Check if user is logged in
$loggedInUser = isset($_SESSION['admin_username']) ? $_SESSION['admin_username'] : 'Guest';

// Fetch data from database
$students_count = $conn->query("SELECT COUNT(*) FROM cstudents")->fetch_row()[0];
$faculty_count = $conn->query("SELECT COUNT(*) FROM faculty")->fetch_row()[0];
$reports_count = $conn->query("SELECT COUNT(*) FROM daily_reports")->fetch_row()[0];
$scholarships_count = $conn->query("SELECT COUNT(*) FROM scholarships")->fetch_row()[0];
$courses_count = $conn->query("SELECT COUNT(*) FROM ccourses")->fetch_row()[0];
$placements_count = $conn->query("SELECT COUNT(*) FROM placements")->fetch_row()[0];

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
            text-align: center;
        }
      
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
        .students { background: #FF6F61; }
        .faculty { background: #6A0572; }
        .reports { background: #FFB400; }
        .scholarships { background: #2196F3; }
        .courses { background: #009688; }
        .placements { background: #FF4081; }


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

<?php  include 'include/side.php'; ?>
    <!-- Logged-in User Info -->
      <div class="header">
        <div>Dashboard</div>
        <div>Welcome, <?php echo htmlspecialchars($loggedInUser); ?> 👋</div>
    </div>

    <!-- Dashboard Cards -->
    <div class="dashboard-cards">
        <div class="card students">
            <div>
                <h3><?php echo $students_count; ?></h3>
                <span>Students</span>
            </div>
            <i class="fas fa-user-graduate"></i>
        </div>
        <div class="card faculty">
            <div>
                <h3><?php echo $faculty_count; ?></h3>
                <span>Faculty</span>
            </div>
            <i class="fas fa-chalkboard-teacher"></i>
        </div>
        <div class="card reports">
            <div>
                <h3><?php echo $reports_count; ?></h3>
                <span>Reports</span>
            </div>
            <i class="fas fa-file-alt"></i>
        </div>
        <div class="card scholarships">
            <div>
                <h3><?php echo $scholarships_count; ?></h3>
                <span>Scholarships</span>
            </div>
            <i class="fas fa-hand-holding-usd"></i>
        </div>
        <div class="card courses">
            <div>
                <h3><?php echo $courses_count; ?></h3>
                <span>Courses</span>
            </div>
            <i class="fas fa-book-open"></i>
        </div>
        <div class="card placements">
            <div>
                <h3><?php echo $placements_count; ?></h3>
                <span>Placements</span>
            </div>
            <i class="fas fa-briefcase"></i>
        </div>
    </div>

</body>
</html>
