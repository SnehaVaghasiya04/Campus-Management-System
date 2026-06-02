<?php
require('lib/fpdf.php');
include 'con.php';

// Fetching Student Counts
$school_count = $conn->query("SELECT COUNT(*) as total FROM student")->fetch_assoc()['total'];
$college_count = $conn->query("SELECT COUNT(*) as total FROM cstudents")->fetch_assoc()['total'];
$hostel_count = $conn->query("SELECT COUNT(*) as total FROM hostel_student")->fetch_assoc()['total'];

$total = $school_count + $college_count + $hostel_count;

// Create PDF Class
class PDF extends FPDF {
    function Header() {
        // Add Logo
        $this->Image("lib\Picsart_25-01-06_18-46-54-842.png", 10, 6, 30); // Adjust 'logo.png' path and size as needed

        // College Name
        $this->SetFont('Arial', 'B', 16);
        $this->Cell(190, 10, 'sneh kunj girls campus', 0, 1, 'C'); // Change "XYZ College" to your actual name
        
        // Report Title
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(190, 10, 'School, College, and Hostel Student Report', 0, 1, 'C');
        $this->Ln(10); // Space below header
    }

    function Footer() {
        // Footer Position
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 10);
        $this->Cell(0, 10, 'Generated on: ' . date('d-m-Y'), 0, 0, 'C');
    }
}

// Create PDF Object
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

// Table Header
$pdf->SetFillColor(0, 123, 255);
$pdf->SetTextColor(255);
$pdf->Cell(95, 10, 'Category', 1, 0, 'C', true);
$pdf->Cell(95, 10, 'Total Count', 1, 1, 'C', true);

// Reset Color
$pdf->SetTextColor(0);

// Table Data
$pdf->Cell(95, 10, 'School Students', 1, 0, 'C');
$pdf->Cell(95, 10, $school_count, 1, 1, 'C');

$pdf->Cell(95, 10, 'College Students', 1, 0, 'C');
$pdf->Cell(95, 10, $college_count, 1, 1, 'C');

$pdf->Cell(95, 10, 'Hostel Students', 1, 0, 'C');
$pdf->Cell(95, 10, $hostel_count, 1, 1, 'C');

$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 14);
$pdf->SetFillColor(220, 220, 220);
$pdf->Cell(95, 10, 'Total Students', 1, 0, 'C', true);
$pdf->Cell(95, 10, $total, 1, 1, 'C', true);

// Output PDF
$pdf->Output('D', 'student_report.pdf');
?>
