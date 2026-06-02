<?php
include 'con.php';
require 'lib/fpdf.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Get student details
$id = $_GET['id'];
$admission_id = 'ADM' . rand(1000, 9999);

$result = mysqli_query($conn, "SELECT * FROM hostel_student WHERE id='$id'");
$row = mysqli_fetch_assoc($result);

$name = $row['name'];
$email = $row['email'];
$school_college = $row['school_college'];
$class = $row['class'];
$room_type = $row['room_type'];

$contact = $row['contact'];
$guardian_name = $row['guardian_name'];
$guardian_contact = $row['guardian_contact'];

// Update status in database
mysqli_query($conn, "UPDATE hostel_student SET status='Confirmed', admission_id='$admission_id' WHERE id='$id'");

// Generate PDF Receipt with FPDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

$pdf->Cell(0, 10, 'Hostel Admission Receipt', 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(50, 10, 'Admission ID:', 0, 0);
$pdf->Cell(0, 10, $admission_id, 0, 1);

$pdf->Cell(50, 10, 'Name:', 0, 0);
$pdf->Cell(0, 10, $name, 0, 1);

$pdf->Cell(50, 10, 'School/College:', 0, 0);
$pdf->Cell(0, 10, $school_college, 0, 1);

$pdf->Cell(50, 10, 'Class:', 0, 0);
$pdf->Cell(0, 10, $class, 0, 1);

$pdf->Cell(50, 10, 'Room Type:', 0, 0);
$pdf->Cell(0, 10, $room_type, 0, 1);

$pdf->Cell(50, 10, 'Contact:', 0, 0);
$pdf->Cell(0, 10, $contact, 0, 1);

$pdf->Cell(50, 10, 'Guardian Name:', 0, 0);
$pdf->Cell(0, 10, $guardian_name, 0, 1);

$pdf->Cell(50, 10, 'Guardian Contact:', 0, 0);
$pdf->Cell(0, 10, $guardian_contact, 0, 1);

$pdf->Cell(50, 10, 'Status:', 0, 0);
$pdf->Cell(0, 10, 'Confirmed', 0, 1);

$pdf->Ln(10);
$pdf->MultiCell(0, 10, 'Thank you for joining our hostel. Please keep this receipt.');

$filename = 'Admission_Receipt_' . $admission_id . '.pdf';
$pdf_path = __DIR__ . '/' . $filename;
$pdf->Output('F', $pdf_path); // Save PDF file on server

// Send Email with PHPMailer and PDF attachment
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'snehkunjgirlscampus2841@gmail.com'; // Your Gmail
    $mail->Password   = 'jecr qcix odfu ueve'; // App password
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('hostel@snehkunj.com', 'Snehkunj Hostel');
    $mail->addAddress($email, $name);

    $mail->addAttachment($pdf_path); // Attach PDF

    $mail->isHTML(true);
    $mail->Subject = 'Hostel Admission Confirmation';
    $mail->Body    = "Hello <b>$name</b>,<br><br>Your hostel admission is <b>confirmed</b>.<br>Admission ID: <b>$admission_id</b>.<br><br>Please find your admission receipt attached.<br><br>Thank you.";

    $mail->send();
    echo 'Admission confirmed and email sent successfully with receipt.';
} catch (Exception $e) {
    echo "Error sending email: {$mail->ErrorInfo}";
}

// Delete PDF file from server after sending
unlink($pdf_path);
?>
