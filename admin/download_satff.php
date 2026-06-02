<?php
require('lib/fpdf.php');  
include 'con.php';

class PDF extends FPDF {
    function Header() {
        // College Logo
        $this->Image('lib/Picsart_25-01-06_18-46-54-842.png', 10, 6, 30); 
        
        // Set Font for College Name
        $this->SetFont('Arial', 'B', 18);
        $this->SetTextColor(0, 51, 102); // Dark blue color
        
        // Move to the right
        $this->Cell(80);
        
        // College Name (Center-Aligned)
        $this->Cell(30, 10, "Sneh Kunj Girls Campus", 0, 1, 'C');
        
        // Subtitle
        $this->SetFont('Arial', 'I', 12);
        $this->Cell(190, 8, "Empowering Women Through Education", 0, 1, 'C');

        // Line break
        $this->Ln(10);
    }

    function Footer() {
        // Move to the bottom
        $this->SetY(-15);
        
        // Set Font
        $this->SetFont('Arial', 'I', 10);
        $this->SetTextColor(128, 128, 128); // Gray color
        
        // Footer text
        $this->Cell(0, 10, "Generated on " . date('d-m-Y'), 0, 0, 'C');
    }
}

// Fetch staff totals
$school_query = mysqli_query($conn, "SELECT COUNT(*) AS total_school FROM staff");
$school_data = mysqli_fetch_assoc($school_query);

$college_query = mysqli_query($conn, "SELECT COUNT(*) AS total_college FROM faculty");
$college_data = mysqli_fetch_assoc($college_query);

$warden_query = mysqli_query($conn, "SELECT COUNT(*) AS total_wardens FROM warden");
$warden_data = mysqli_fetch_assoc($warden_query);

$support_query = mysqli_query($conn, "SELECT COUNT(*) AS total_support FROM support_staff");
$support_data = mysqli_fetch_assoc($support_query);

// Create new PDF document
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

// Title
$pdf->SetTextColor(0, 123, 255);
$pdf->Cell(190, 10, "School, College, and Hostel Staff Report", 0, 1, 'C');
$pdf->Ln(5);

$pdf->SetFont('Arial', '', 12);
$pdf->SetTextColor(0, 0, 0);

// Table header
$pdf->SetFillColor(0, 123, 255);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(140, 10, "Category", 1, 0, 'C', true);
$pdf->Cell(50, 10, "Total Count", 1, 1, 'C', true);

// Table rows with alternate row colors
$pdf->SetFont('Arial', '', 12);
$pdf->SetTextColor(0, 0, 0);
$fill = false; // Row fill flag

$data = [
    ["School Teachers", $school_data['total_school']],
    ["College Teachers", $college_data['total_college']],
    ["Wardens", $warden_data['total_wardens']],
    ["Support Staff", $support_data['total_support']]
];

foreach ($data as $row) {
    $pdf->SetFillColor(224, 235, 255); // Light blue
    $pdf->Cell(140, 10, $row[0], 1, 0, 'C', $fill);
    $pdf->Cell(50, 10, $row[1], 1, 1, 'C', $fill);
    $fill = !$fill; // Toggle row color
}

// Output PDF
$pdf->Output('D', 'Staff_Report.pdf');
?>
