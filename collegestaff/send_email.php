<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/PHPMailer.php';

function sendAbsentEmail($student_id, $date, $conn) {
    $student_query = mysqli_query($conn, "SELECT email, name FROM cstudents WHERE student_id='$student_id'");
    $student = mysqli_fetch_assoc($student_query);

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'snehkunjgirlscampus2841@gmail.com'; 
        $mail->Password = 'jecr qcix odfu ueve'; 
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('snehkunjgirlscampus2841@gmail.com', 'College Admin');
        $mail->addAddress($student['email'], $student['name']);
        $mail->isHTML(true);
        $mail->Subject = "Attendance Notification - Absent on $date";
        $mail->Body = "<h3>Dear {$student['name']},</h3>
                       <p>You were marked absent on <strong>$date</strong>. Please ensure to maintain attendance requirements.</p>
                       <br>Best Regards, <br>College Administration";

        $mail->send();
    } catch (Exception $e) {
        echo "<script>alert('Error sending email to {$student['name']}: {$mail->ErrorInfo}');</script>";
    }
}
?>
