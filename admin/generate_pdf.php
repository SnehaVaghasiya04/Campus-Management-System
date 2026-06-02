<?php
require('lib/fpdf.php'); // Include FPDF library
include 'con.php'; // Database connection

class PDF extends FPDF {
    // Custom Header
    function Header() {
        // College Logo
        $this->Image("lib/Picsart_25-01-06_18-46-54-842.png", 10, 6, 30); // Adjust position & size
        
        // Set Header Font
        $this->SetFont('Arial', 'B', 16);
        $this->SetTextColor(33, 37, 41); // Dark color
        $this->Cell(190, 10, 'Sneh Kunj Girls Campus', 0, 1, 'C'); 
        
        $this->SetFont('Arial', 'I', 12);
        $this->SetTextColor(100, 100, 100); // Gray color
        $this->Cell(190, 8, 'Comprehensive Staff Report', 0, 1, 'C');
        $this->Ln(5);
        
        // Add a thin line
        $this->SetDrawColor(100, 100, 100);
        $this->Line(10, 28, 200, 28);
        $this->Ln(5);
    }

    // Custom Footer
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 10);
        $this->SetTextColor(100, 100, 100);
        $this->Cell(0, 10, 'Generated on: ' . date('d-m-Y') . ' | Page ' . $this->PageNo(), 0, 0, 'C');
    }

    // Function to create a styled table
    function CreateTable($header, $data) {
        $this->SetFont('Arial', 'B', 12);
        $this->SetFillColor(33, 37, 41); // Dark background for header
        $this->SetTextColor(255, 255, 255); // White text for header
        $this->SetDrawColor(0, 0, 0);
        
        // Auto adjust column width based on content
        $widths = [60, 65, 65]; // Adjusted width
        foreach ($header as $key => $col) {
            $this->Cell($widths[$key], 10, $col, 1, 0, 'C', true);
        }
        $this->Ln();
        
        // Set normal text color and font
        $this->SetFont('Arial', '', 11);
        $this->SetTextColor(0, 0, 0);
        
        $fill = false; // Row background toggle
        foreach ($data as $row) {
            foreach ($row as $key => $col) {
                $this->SetFillColor(230, 230, 230); // Light gray for alternate rows
                $this->Cell($widths[$key], 8, $col, 1, 0, 'C', $fill);
            }
            $this->Ln();
            $fill = !$fill; // Alternate row color
        }
    }
}

// Create new PDF instance
$pdf = new PDF();
$pdf->SetMargins(10, 20, 10);
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

// Fetch faculty data
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 14);
$pdf->SetTextColor(33, 37, 41);
$pdf->Cell(190, 10, 'Faculty', 0, 1, 'L');

$result = mysqli_query($conn, "SELECT name, field, designation FROM faculty");
$faculty_data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $faculty_data[] = [$row['name'], $row['field'], $row['designation']];
}
$pdf->CreateTable(['Name', 'Field', 'Designation'], $faculty_data);

// Fetch staff data
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(190, 10, 'Staff', 0, 1, 'L');

$result = mysqli_query($conn, "SELECT name, role FROM staff");
$staff_data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $staff_data[] = [$row['name'], $row['role'], ''];
}
$pdf->CreateTable(['Name', 'Role', ''], $staff_data);

// Fetch warden data
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(190, 10, 'Wardens', 0, 1, 'L');

$result = mysqli_query($conn, "SELECT name, designation FROM warden");
$warden_data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $warden_data[] = [$row['name'], $row['designation'], ''];
}
$pdf->CreateTable(['Name', 'Designation', ''], $warden_data);

// Fetch support staff data
$pdf->Ln(5);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(190, 10, 'Support Staff', 0, 1, 'L');

$result = mysqli_query($conn, "SELECT name, duty_role FROM support_staff");
$support_staff_data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $support_staff_data[] = [$row['name'], $row['duty_role'], ''];
}
$pdf->CreateTable(['Name', 'Duty Role', ''], $support_staff_data);

// Output PDF
$pdf->Output('D', 'staff_report.pdf'); // 'D' forces download

?>
