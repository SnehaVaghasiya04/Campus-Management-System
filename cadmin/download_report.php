<?php
include 'con.php';
require('lib/fpdf.php');

// Check if a course is selected
if (isset($_GET['course'])) {
    $selectedCourse = $_GET['course'];
    
    // Fetch attendance data for the selected course
    $query = "SELECT * FROM daily_reports WHERE course='$selectedCourse' ORDER BY report_date DESC";
    $result = mysqli_query($conn, $query);

    // Create a PDF instance
    class PDF extends FPDF {
        // Header function
        function Header() {
            // Set font
            $this->SetFont('Arial', 'B', 14);
            // Title
            $this->Cell(0, 10, 'snehkunj girls college- Attendance Report', 0, 1, 'C');
            $this->Ln(5);
        }

        // Footer function
        function Footer() {
            $this->SetY(-15);
            $this->SetFont('Arial', 'I', 10);
            $this->Cell(0, 10, 'Generated on ' . date('d-m-Y'), 0, 0, 'C');
        }
    }

    // Initialize PDF
    $pdf = new PDF();
    $pdf->AddPage();
    
    // Report Title
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(190, 10, "Attendance Report - $selectedCourse", 0, 1, 'C');
    $pdf->Ln(5);

    // Set Table Headers
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->SetFillColor(0, 51, 102); // Dark blue background
    $pdf->SetTextColor(255, 255, 255); // White text
    $pdf->Cell(50, 10, 'Report Date', 1, 0, 'C', true);
    $pdf->Cell(40, 10, 'Course', 1, 0, 'C', true);
    $pdf->Cell(40, 10, 'Total Students', 1, 0, 'C', true);
    $pdf->Cell(30, 10, 'Present', 1, 0, 'C', true);
    $pdf->Cell(30, 10, 'Absent', 1, 1, 'C', true);
    
    // Reset font and colors for data rows
    $pdf->SetFont('Arial', '', 12);
    $pdf->SetTextColor(0, 0, 0);

    // Table Data
    $fill = false;
    while ($row = mysqli_fetch_assoc($result)) {
        $pdf->SetFillColor(230, 230, 230); // Light grey background for alternate rows
        $pdf->Cell(50, 10, $row['report_date'], 1, 0, 'C', $fill);
        $pdf->Cell(40, 10, $row['course'], 1, 0, 'C', $fill);
        $pdf->Cell(40, 10, $row['total_students'], 1, 0, 'C', $fill);
        $pdf->Cell(30, 10, $row['present_count'], 1, 0, 'C', $fill);
        $pdf->Cell(30, 10, $row['absent_count'], 1, 1, 'C', $fill);
        $fill = !$fill;
    }

    // Output PDF file for download
    $pdf->Output("D", "Attendance_Report_$selectedCourse.pdf");
}
?>
