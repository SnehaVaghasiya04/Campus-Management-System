<?php
// Include database connection
include 'con.php';

// Include PHPMailer for sending emails
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/PHPMailer.php';

// Check if attendance form is submitted
if (isset($_POST['submit'])) {
    // Get the selected date
    $date = $_POST['date'];
    // Get all selected attendance data
    $attendance = $_POST['attendance']; // Array of student_id => status

    // Initialize counts for the daily report
    $total_students = count($attendance);
    $present_count = 0;
    $absent_count = 0;

    // Process attendance for each student
    foreach ($attendance as $student_id => $status) {
        // Insert into attendance table
        $query = "INSERT INTO cattendance (student_id, date, status) VALUES ('$student_id', '$date', '$status')";
        mysqli_query($conn, $query);

        // Count present and absent students
        if ($status == "Present") {
            $present_count++;
        } else {
            $absent_count++;
            // Send absent email
            sendAbsentEmail($student_id, $date);
        }
    }

    // Insert daily report if not already generated
    $checkReport = mysqli_query($conn, "SELECT * FROM daily_reports WHERE report_date='$date'");
    if (mysqli_num_rows($checkReport) == 0) {
        $report_query = "INSERT INTO daily_reports (report_date, total_students, present_count, absent_count) 
                         VALUES ('$date', '$total_students', '$present_count', '$absent_count')";
        mysqli_query($conn, $report_query);
    }

    // Show success message
    echo "<script>alert('Attendance marked successfully! Report Generated.'); window.location.href='staff_attendance.php';</script>";
}

// Function to send email to absent students
function sendAbsentEmail($student_id, $date) {
    // Include database connection
    include 'con.php';

    // Fetch student details
    $student_query = mysqli_query($conn, "SELECT email, name FROM cstudents WHERE student_id='$student_id'");
    $student = mysqli_fetch_assoc($student_query);

    // Initialize PHPMailer
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'snehkunjgirlscampus2841@gmail.com'; // Replace with your email
        $mail->Password = 'jecr qcix odfu ueve'; // Use App Password for Gmail
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Email details
        $mail->setFrom('snehkunjgirlscampus2841@gmail.com', 'College Admin');
        $mail->addAddress($student['email'], $student['name']);
        $mail->isHTML(true);
        $mail->Subject = "Attendance Notification - Absent on $date";
        $mail->Body = "<h3>Dear {$student['name']},</h3>
                       <p>You were marked absent on <strong>$date</strong>. Please ensure to maintain attendance requirements.</p>
                       <br>Best Regards, <br>College Administration";

        // Send email
        $mail->send();
    } catch (Exception $e) {
        echo "<script>alert('Error sending email to {$student['name']}: {$mail->ErrorInfo}');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Staff Attendance</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; background-color: #f4f4f4; }
        .container { width: 80%; margin: auto; background: white; padding: 20px; border-radius: 8px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #003452; color: white; }
    </style>
</head>
<body>
<?php include ('include/side.php') ?>
<div class="container">
    <h2>Mark Student Attendance</h2>
    <form method="post">
        <label>Select Date:</label>
        <input type="date" name="date" required><br><br>
        
        <table>
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Attendance</th>
            </tr>
            <?php
            $students = mysqli_query($conn, "SELECT student_id, name FROM cstudents");
            while ($row = mysqli_fetch_assoc($students)) {
                echo "<tr>
                        <td>{$row['student_id']}</td>
                        <td>{$row['name']}</td>
                        <td>
                            <input type='radio' name='attendance[{$row['student_id']}]' value='Present' required> Present
                            <input type='radio' name='attendance[{$row['student_id']}]' value='Absent'> Absent
                        </td>
                      </tr>";
            }
            ?>
        </table>
        <br>
        <button type="submit" name="submit">Submit Attendance</button>
    </form>
</div>

</body>
</html>
