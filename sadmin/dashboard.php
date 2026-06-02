<?php
// Start session


session_start();
if (!isset($_SESSION['admin_name'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}

include 'con.php';

// Get counts from database
$students = $conn->query("SELECT COUNT(*) AS count FROM student")->fetch_assoc()['count'];
$staff = $conn->query("SELECT COUNT(*) AS count FROM staff")->fetch_assoc()['count'];
$courses = $conn->query("SELECT COUNT(*) AS count FROM courses")->fetch_assoc()['count'];
$exam_schedule = $conn->query("SELECT COUNT(*) AS count FROM exam_schedule")->fetch_assoc()['count'];
$achievements = $conn->query("SELECT COUNT(*) AS count FROM achievements")->fetch_assoc()['count'];

// Get logged-in user
$loggedInUser = isset($_SESSION['admin_name']) ? $_SESSION['admin_name'] : 'Guest';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> school Dashboard</title>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: Arial, sans-serif; }
        body { background: #f4f4f4; padding: 20px; text-align: center; }
        
        .dashboard-cards { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; max-width: 1100px; margin: auto; margin-left:280px; margin-top:30px;  }
        .card { padding: 20px; border-radius: 10px; color: white; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2); transition: transform 0.3s; }
        .card:hover { transform: scale(1.05); }
        .card i { font-size: 35px; }
        .card h3 { margin-bottom: 5px; font-size: 24px; }
        .card span { font-size: 14px; }
        .students { background: #FF6F61; }
        .staff { background: #6A0572; }
        .courses { background: #FFB400; }
        .exams { background: #2196F3; }
        .achievements { background: #009688; }

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

    <?php  include 'include/side.php';   ?> 

 <div class="header">
        <div>Dashboard</div>
        <div>Welcome, <?php echo htmlspecialchars($loggedInUser); ?> 👋</div>
    </div>


      <div class="dashboard-cards">
        <div class="card students"><div><h3><?php echo $students; ?></h3><span>Students</span></div><i class="fas fa-user-graduate"></i></div>
        <div class="card staff"><div><h3><?php echo $staff; ?></h3><span>Staff Members</span></div><i class="fas fa-chalkboard-teacher"></i></div>
        <div class="card courses"><div><h3><?php echo $courses; ?></h3><span>Courses</span></div><i class="fas fa-book"></i></div>
        <div class="card exams"><div><h3><?php echo $exam_schedule; ?></h3><span>Scheduled Exams</span></div><i class="fas fa-file-alt"></i></div>
        <div class="card achievements"><div><h3><?php echo $achievements; ?></h3><span>Achievements</span></div><i class="fas fa-trophy"></i></div>
    </div>
</body>
</html>
<?php $conn->close(); ?>
