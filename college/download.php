<?php
require('lib/fpdf.php'); // Include FPDF Library

// Check if required GET parameters exist
if (isset($_GET['course']) && isset($_GET['semester']) && isset($_GET['total'])) {
    $course = $_GET['course'];
    $semester = $_GET['semester'];
    $totalFee = $_GET['total'];
    $registrationFee = $_GET['registration'] ?? 0;
    $tuitionFee = $_GET['tuition'] ?? 0;
    $hostelFee = $_GET['hostel'] ?? 0;
    $transportFee = $_GET['transport'] ?? 0;
} else {
    die("Invalid access.");
}

// Create PDF instance
$pdf = new FPDF();
$pdf->AddPage();

// Set Title
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(190, 10, "Fees Structure for $course - Semester $semester", 0, 1, 'C');
$pdf->Ln(5);

// Total Fee Highlight
$pdf->SetFont('Arial', 'B', 14);
$pdf->SetTextColor(29, 94, 255); // Blue Color
$pdf->Cell(190, 10, "Total Fee: ₹" . number_format($totalFee), 0, 1, 'C');
$pdf->SetTextColor(0, 0, 0); // Reset Color
$pdf->Ln(5);

// Table Header
$pdf->SetFont('Arial', 'B', 12);
$pdf->SetFillColor(230, 230, 230);
$pdf->Cell(100, 10, 'Type', 1, 0, 'C', true);
$pdf->Cell(40, 10, 'Frequency', 1, 0, 'C', true);
$pdf->Cell(50, 10, 'Amount (₹)', 1, 1, 'C', true);

// Table Rows
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(100, 10, 'Registration/Application Fee', 1, 0, 'L');
$pdf->Cell(40, 10, 'One Time', 1, 0, 'C');
$pdf->Cell(50, 10, number_format($registrationFee), 1, 1, 'R');

$pdf->Cell(100, 10, 'Tuition Fee', 1, 0, 'L');
$pdf->Cell(40, 10, 'Yearly', 1, 0, 'C');
$pdf->Cell(50, 10, number_format($tuitionFee), 1, 1, 'R');

$pdf->Cell(100, 10, 'Hostel Fee', 1, 0, 'L');
$pdf->Cell(40, 10, 'Yearly', 1, 0, 'C');
$pdf->Cell(50, 10, number_format($hostelFee), 1, 1, 'R');

$pdf->Cell(100, 10, 'Transport Fee', 1, 0, 'L');
$pdf->Cell(40, 10, 'Yearly', 1, 0, 'C');
$pdf->Cell(50, 10, number_format($transportFee), 1, 1, 'R');

// Footer Note
$pdf->Ln(5);
$pdf->SetFont('Arial', 'I', 10);
$pdf->MultiCell(0, 7, "* The fees provided above are to the best of our knowledge. This information might vary. Please get in touch with the school for accurate details.", 0, 'L');

// Output PDF
$pdf->Output("D", "Fees_Structure_$course_Semester_$semester.pdf");
?>
