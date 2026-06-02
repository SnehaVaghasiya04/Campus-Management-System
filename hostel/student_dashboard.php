<?php
include 'con.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Full Details</title>
    <style>
        <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        }

    .container {
        background: #fff;
        padding: 40px 50px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        max-width: 850px;
        margin: 50px auto;
    }

    fieldset {
        border: none;
        padding: 30px;
        margin-bottom: 30px;
        border-radius: 15px;
        background: linear-gradient(145deg, #e3f2fd, #bbdefb);
        box-shadow: 3px 3px 8px rgba(0, 0, 0, 0.1);
        position: relative;
    }

    legend {
        font-size: 22px;
        font-weight: bold;
        color: #fff;
        background: #0d47a1;
        padding: 10px 20px;
        border-radius: 20px;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
        position: absolute;
        top: -18px;
        left: 20px;
    }

    p {
        margin-bottom: 15px;
        font-size: 17px;
        color: #0d47a1;
    }

    strong {
        color: #0d47a1;
    }

    .status {
        display: inline-block;
        padding: 8px 16px;
        background-color: #e1f5fe;
        color: #01579b;
        border-radius: 8px;
        margin-top: 12px;
        font-weight: bold;
    }

    .not-found {
        padding: 25px;
        background: #ffcdd2;
        color: #b71c1c;
        border-radius: 12px;
        text-align: center;
        font-size: 18px;
        font-weight: bold;
    }

    .button-container {
        text-align: center;
        margin-top: 30px;
    }

    .button-container form {
        display: inline-block;
        margin: 0 12px;
    }

    .button-container button {
        padding: 12px 25px;
        background: #0d47a1;
        color: white;
        border: none;
        border-radius: 50px;
        cursor: pointer;
        font-size: 17px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition: all 0.3s ease;
    }

    .button-container button:hover {
        background: #1565c0;
        transform: translateY(-3px);
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
    }

    .about-image1 h1 {
        font-size: 38px;
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
        padding-left: 550px;
    }

    .contain1 {
        font-size: 20px;
    }

    .contain1 a {
        color: white;
        text-decoration: none;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .container {
            padding: 20px;
        }

        .about-image1 h1 {
            font-size: 28px;
        }

        .banner1 {
            padding-left: 20px;
            justify-content: center;
        }
    }
</style>

    </style>
</head>
<body>
<?php include ('include/header1.php'); ?>
<section class="about-header1">
    <div class="about-image1">
        <h1>View Student Details</h1>
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="home.php">Home</a> &gt; student
        </div>
    </div>
</section>


<div class="container">

<?php

if (isset($_POST['admission_id'])) {
    $admission_id = $_POST['admission_id'];

    $sql = "SELECT * FROM hostel_student WHERE admission_id='$admission_id'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        echo "<fieldset>";
        echo "<legend>Student Information</legend>";
        echo "<p><strong>Name:</strong> " . $row['name'] . "</p>";
        echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
        echo "<p><strong>School/College:</strong> " . $row['school_college'] . "</p>";
        echo "<p><strong>Class:</strong> " . $row['class'] . "</p>";
        echo "<p><strong>Contact:</strong> " . $row['contact'] . "</p>";
        echo "</fieldset>";

        echo "<fieldset>";
        echo "<legend>Guardian Details</legend>";
        echo "<p><strong>Guardian Name:</strong> " . $row['guardian_name'] . "</p>";
        echo "<p><strong>Guardian Contact:</strong> " . $row['guardian_contact'] . "</p>";
        echo "</fieldset>";

        echo "<fieldset>";
        echo "<legend>Room Information</legend>";
        echo "<p><strong>Room Type:</strong> " . $row['room_type'] . "</p>";
        $room_sql = "SELECT room_no FROM room_allocation WHERE admission_id='$admission_id'";
        $room_result = mysqli_query($conn, $room_sql);
        if (mysqli_num_rows($room_result) > 0) {
            $room_row = mysqli_fetch_assoc($room_result);
            echo "<p class='status'>Room No: " . $room_row['room_no'] . "</p>";
        } else {
            echo "<p class='status'>Not Assigned</p>";
        }
        echo "</fieldset>";

        echo "<fieldset>";
        echo "<legend>Fee Status</legend>";
        $fee_sql = "SELECT SUM(amount_paid) AS total_paid FROM fees_payment WHERE admission_id='$admission_id'";
        $fee_result = mysqli_query($conn, $fee_sql);
        $fee_row = mysqli_fetch_assoc($fee_result);
        $total_paid = $fee_row['total_paid'] ?? 0;
        if ($total_paid > 0) {
            echo "<p class='status'>Paid Amount: ₹" . $total_paid . "</p>";
        } else {
            echo "<p class='status'>Not Paid</p>";
        }
        echo "</fieldset>";

        echo "<fieldset>";
        echo "<legend>Attendance Report (Current Month)</legend>";
        $attendance_sql = "
            SELECT COUNT(*) AS total_days,
                   SUM(CASE WHEN status='Present' THEN 1 ELSE 0 END) AS present_days,
                   SUM(CASE WHEN status='Absent' THEN 1 ELSE 0 END) AS absent_days,
                   SUM(CASE WHEN status='Leave' THEN 1 ELSE 0 END) AS leave_days
            FROM hostel_attendance 
            WHERE admission_id='$admission_id'
            AND MONTH(`date`) = MONTH(CURRENT_DATE())
            AND YEAR(`date`) = YEAR(CURRENT_DATE())
        ";
        $attendance_result = mysqli_query($conn, $attendance_sql);
        $attendance_row = mysqli_fetch_assoc($attendance_result);

        echo "<p><strong>Total Days:</strong> " . ($attendance_row['total_days'] ?? 0) . "</p>";
        echo "<p><strong>Present:</strong> " . ($attendance_row['present_days'] ?? 0) . "</p>";
        echo "<p><strong>Absent:</strong> " . ($attendance_row['absent_days'] ?? 0) . "</p>";
        echo "<p><strong>Leave:</strong> " . ($attendance_row['leave_days'] ?? 0) . "</p>";
        echo "</fieldset>";

        // Add buttons here
        echo "<div class='button-container'>";
        echo "<form action='leave_application.php' method='post'>
                <input type='hidden' name='admission_id' value='$admission_id'>
                <button type='submit'>Leave Report</button>
              </form>";
        echo "<form action='complaint_form.php' method='post'>
                <input type='hidden' name='admission_id' value='$admission_id'>
                <button type='submit'>Complaint Report</button>
              </form>";
        echo "</div>";

    } else {
        echo "<div class='not-found'>No student found with this Admission ID.</div>";
    }
} else {
    echo "<div class='not-found'>Invalid Request.</div>";
}
?>
</div>
<?php  include 'include/footer.php';?>

</body>
</html>
