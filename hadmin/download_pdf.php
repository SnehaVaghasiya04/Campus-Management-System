<?php
require('lib/fpdf.php');
include 'con.php';

$date = $_GET['date'];

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, "Attendance Report - $date", 0, 1, 'C');
$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(30, 10, 'Date', 1);
$pdf->Cell(40, 10, 'Admission ID', 1);
$pdf->Cell(50, 10, 'Name', 1);
$pdf->Cell(40, 10, 'School/College', 1);
$pdf->Cell(30, 10, 'Status', 1);
$pdf->Ln();

$pdf->SetFont('Arial', '', 12);

$result = mysqli_query($conn, "
    SELECT a.date, s.admission_id, s.name, s.school_college, a.status 
    FROM hostel_attendance a 
    JOIN hostel_student s ON a.admission_id = s.admission_id 
    WHERE a.date = '$date'
");

while ($row = mysqli_fetch_assoc($result)) {
    $pdf->Cell(30, 10, $row['date'], 1);
    $pdf->Cell(40, 10, $row['admission_id'], 1);
    $pdf->Cell(50, 10, $row['name'], 1);
    $pdf->Cell(40, 10, $row['school_college'], 1);
    $pdf->Cell(30, 10, $row['status'], 1);
    $pdf->Ln();
}

$pdf->Output();
?>
