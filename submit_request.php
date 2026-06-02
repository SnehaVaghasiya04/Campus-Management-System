<?php
include 'con.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer\Exception.php';
require 'PHPMailer\SMTP.php';
require 'PHPMailer\PHPMailer.php';

$message = ""; // For storing success or error messages

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $bus_id = $_POST['bus_id'];
    $pickup_point = $_POST['pickup_point'];

    $sql = "INSERT INTO facility_requests (name, email, phone, bus_id, pickup_point) 
            VALUES ('$name', '$email', '$phone', '$bus_id', '$pickup_point')";
    if ($conn->query($sql) === TRUE) {
        $bus_sql = "SELECT bus_number, route, timings, fees FROM buses WHERE id = $bus_id";
        $bus_result = $conn->query($bus_sql);

        if ($bus_result->num_rows > 0) {
            $bus = $bus_result->fetch_assoc();
            $bus_number = $bus['bus_number'];
            $route = $bus['route'];
            $timings = $bus['timings'];
            $fees = $bus['fees'];

            $subject = "Transportation Facility Request Confirmation";
            $body = "
                <p>Dear $name,</p>
                <p>Your request for transportation facility has been received. Here are the details:</p>
                <table border='1' cellpadding='5'>
                    <tr><th>Bus Number</th><td>$bus_number</td></tr>
                    <tr><th>Route</th><td>$route</td></tr>
                    <tr><th>Timings</th><td>$timings</td></tr>
                    <tr><th>Pickup Point</th><td>$pickup_point</td></tr>
                    <tr><th>Fees</th><td>$fees</td></tr>
                </table>
                <p>Thank you for using our services.</p>
                <p>Best Regards,<br>Campus Management Team</p>
            ";

            $mail = new PHPMailer(true);

            try {
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'snehkunjgirlscampus2841@gmail.com';
                $mail->Password   = 'jecr qcix odfu ueve';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;

                $mail->setFrom('no-reply@campusmanagement.com', 'Campus Management');
                $mail->addAddress($email, $name);

                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body    = $body;
                $mail->AltBody = strip_tags($body);

                $mail->send();
                $message = "<div style='color: green;'>Request submitted successfully, and email sent!</div>";
            } catch (Exception $e) {
                $message = "<div style='color: orange;'>Request submitted, but email could not be sent. Mailer Error: {$mail->ErrorInfo}</div>";
            }
        } else {
            $message = "<div style='color: orange;'>Request submitted, but bus details could not be retrieved.</div>";
        }
    } else {
        $message = "<div style='color: red;'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }

    $conn->close();
}
?>
