<?php
require 'lib/fpdf.php'; // Include FPDF library

if (isset($_GET['standard']) && isset($_GET['total'])) {
    $standard = $_GET['standard'];
    $registrationFee = isset($_GET['registration']) ? (float)$_GET['registration'] : 0;
    $compositeFee = isset($_GET['composite']) ? (float)$_GET['composite'] : 0;
    $hostelFee = isset($_GET['hostel']) ? (float)$_GET['hostel'] : 0;
    $frequency = $_GET['frequency'] ?? 'Yearly';
    $totalFee = (float)$_GET['total'];
} else {
    die("Invalid access.");
}

// Function to format amount properly
function formatAmount($amount) {
    return ($amount == (int)$amount) ? number_format($amount, 0) : number_format($amount, 2);
}

// Create PDF instance
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12); // Use standard font for compatibility

// Title
$pdf->Cell(0, 10, "Fees Structure for " . $standard, 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Ln(5);
$pdf->Cell(0, 10, "Total fee for new admissions: ₹" . formatAmount($totalFee), 0, 1, 'C');
$pdf->Ln(10);

// Table Header
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(90, 10, 'Type', 1);
$pdf->Cell(50, 10, 'Frequency', 1);
$pdf->Cell(50, 10, 'Amount', 1);
$pdf->Ln();

// Table Data
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(90, 10, 'Registration/Application Fee', 1);
$pdf->Cell(50, 10, 'One Time', 1);
$pdf->Cell(50, 10, "₹" . formatAmount($registrationFee), 1);
$pdf->Ln();

$pdf->Cell(90, 10, 'Composite Fee', 1);
$pdf->Cell(50, 10, ucfirst($frequency), 1);
$pdf->Cell(50, 10, "₹" . formatAmount($compositeFee), 1);
$pdf->Ln();

if ($hostelFee > 0) {
    $pdf->Cell(90, 10, 'Hostel Fee', 1);
    $pdf->Cell(50, 10, ucfirst($frequency), 1);
    $pdf->Cell(50, 10, "₹" . formatAmount($hostelFee), 1);
    $pdf->Ln();
}

// Footer
$pdf->Ln(10);
$pdf->SetFont('Arial', 'I', 10);
$pdf->MultiCell(0, 10, "* The fees provided above are to the best of our knowledge. This information might vary, please get in touch with the school for proper details.", 0, 'L');

// Output PDF (force download)
$pdf->Output('D', 'Fees_Structure_' . $standard . '.pdf');
?>
