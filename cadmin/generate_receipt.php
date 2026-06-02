<?php
require('lib/fpdf.php'); // Include FPDF library
include 'con.php';

// Get payment details
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM payments WHERE id=$id";
    $result = mysqli_query($conn, $query);
    $payment = mysqli_fetch_assoc($result);
} else {
    die("Invalid request.");
}

// Create PDF instance
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

// Title
$pdf->Cell(190, 10, 'College Fees Payment Receipt', 1, 1, 'C');
$pdf->Ln(10);

// Table Headers
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(60, 10, 'Field', 1, 0, 'C');
$pdf->Cell(120, 10, 'Details', 1, 1, 'C');

// Table Data
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(60, 10, 'Receipt No:', 1, 0);
$pdf->Cell(120, 10, $payment['id'], 1, 1);

$pdf->Cell(60, 10, 'Student ID:', 1, 0);
$pdf->Cell(120, 10, $payment['student_id'], 1, 1);

$pdf->Cell(60, 10, 'Student Name:', 1, 0);
$pdf->Cell(120, 10, $payment['student_name'], 1, 1);

$pdf->Cell(60, 10, 'Course:', 1, 0);
$pdf->Cell(120, 10, $payment['course'], 1, 1);

$pdf->Cell(60, 10, 'Semester:', 1, 0);
$pdf->Cell(120, 10, $payment['semester'], 1, 1);

$pdf->Cell(60, 10, 'Amount Paid:', 1, 0);
$pdf->Cell(120, 10, '₹' . number_format($payment['amount'], 2), 1, 1);

$pdf->Cell(60, 10, 'Payment Method:', 1, 0);
$pdf->Cell(120, 10, $payment['payment_method'], 1, 1);

$pdf->Cell(60, 10, 'Date:', 1, 0);
$pdf->Cell(120, 10, $payment['payment_date'], 1, 1);

$pdf->Ln(20); // Add space before signature

// Signature Section
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190, 10, '', 0, 1, 'C'); // Empty Cell for spacing
$pdf->Cell(190, 10, 'Authorized Signature', 0, 1, 'R'); // Right-aligned signature text
$pdf->Cell(190, 10, '___________________', 0, 1, 'R'); // Signature Line

// Output PDF in browser
$pdf->Output('I', 'Receipt_' . $payment['id'] . '.pdf'); // "I" opens PDF in browser
?>
