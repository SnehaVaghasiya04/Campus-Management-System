<?php
require 'lib/fpdf.php';
include('con.php'); // Database connection

if (isset($_GET['receipt_number'])) {
    $receipt_number = $_GET['receipt_number'];

    $query = "SELECT f.student_id, f.amount, f.paid, f.due, f.status, f.payment_date, s.full_name
              FROM fees f
              INNER JOIN student s ON f.student_id = s.student_id
              WHERE f.receipt_number = '$receipt_number'";

    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        // Create receipts directory if not exists
        $dir = "receipts/";
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true); // Create directory
        }

        // Create PDF
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 18);
        $pdf->Cell(0, 10, 'Payment Receipt', 0, 1, 'C');
        $pdf->Ln(5);

        // Add Border
        $pdf->SetLineWidth(0.5);
        $pdf->Rect(10, 10, 190, 120);

        // Receipt Details
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Ln(10);
        
        $pdf->Cell(50, 10, 'Receipt Number:', 1, 0, 'L');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(130, 10, $receipt_number, 1, 1, 'L');

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(50, 10, 'Student Name:', 1, 0, 'L');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(130, 10, $row['full_name'], 1, 1, 'L');

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(50, 10, 'Amount:', 1, 0, 'L');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(130, 10, "₹ " . number_format($row['amount'], 2), 1, 1, 'L');

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(50, 10, 'Amount Paid:', 1, 0, 'L');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(130, 10, "₹ " . number_format($row['paid'], 2), 1, 1, 'L');

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(50, 10, 'Amount Due:', 1, 0, 'L');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(130, 10, "₹ " . number_format($row['due'], 2), 1, 1, 'L');

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(50, 10, 'Status:', 1, 0, 'L');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(130, 10, ucfirst($row['status']), 1, 1, 'L');

        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(50, 10, 'Payment Date:', 1, 0, 'L');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(130, 10, $row['payment_date'], 1, 1, 'L');

        $pdf->Ln(10);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(0, 10, 'Authorized Signature:', 0, 1, 'R');
        $pdf->Line(150, 140, 190, 140);

        // Save PDF to server
        $file_path = $dir . "Receipt_" . $receipt_number . ".pdf";
        $pdf->Output($file_path, 'F'); // Save the file

        // Open the PDF in the browser
        header("Location: $file_path");
        exit();
    } else {
        echo "Receipt not found.";
    }
} else {
    echo "No receipt number provided.";
}
?>
