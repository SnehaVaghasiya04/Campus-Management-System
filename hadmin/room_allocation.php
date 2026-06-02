<?php
include 'con.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';
require 'lib/fpdf.php';

$admission_id = '';
$student_name = '';
$student_status = '';
$room_type = '';
$available_rooms = [];
$student_email = '';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['search'])) {
        $admission_id = mysqli_real_escape_string($conn, $_POST['admission_id']);

        $student_result = mysqli_query($conn, "SELECT name, status, room_type, email FROM hostel_student WHERE admission_id='$admission_id'");
        if ($row = mysqli_fetch_assoc($student_result)) {
            $student_name = $row['name'];
            $student_status = $row['status'];
            $room_type = $row['room_type'];
            $student_email = $row['email'];

            $room_result = mysqli_query($conn, "SELECT room_no FROM room_number WHERE room_type='$room_type' AND status='Available'");
            while ($room = mysqli_fetch_assoc($room_result)) {
                $available_rooms[] = $room['room_no'];
            }
        } else {
            $message = "Admission ID not found!";
        }
    }

    if (isset($_POST['allocate'])) {
        $admission_id = mysqli_real_escape_string($conn, $_POST['admission_id']);
        $room_no = mysqli_real_escape_string($conn, $_POST['room_no']);
        $allocation_date = date('Y-m-d');

        $check = mysqli_query($conn, "SELECT * FROM room_allocation WHERE admission_id='$admission_id'");
        if (mysqli_num_rows($check) > 0) {
            $message = "Room already allocated for this student!";
        } else {
            $insert = mysqli_query($conn, "INSERT INTO room_allocation (admission_id, room_no, allocation_date) VALUES ('$admission_id', '$room_no', '$allocation_date')");
            $update_student = mysqli_query($conn, "UPDATE hostel_student SET status='Allocated' WHERE admission_id='$admission_id'");
            $update_room = mysqli_query($conn, "UPDATE room_number SET status='Occupied' WHERE room_no='$room_no'");

            if ($insert && $update_student && $update_room) {
                // Fetch student info again
                $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT name, room_type, email FROM hostel_student WHERE admission_id='$admission_id'"));
                $student_name = $row['name'];
                $room_type = $row['room_type'];
                $student_email = $row['email'];
                $student_status = 'Allocated';
                $message = "Room Allocated Successfully!";

                // Generate PDF
                $pdf = new FPDF();
                $pdf->AddPage();
                $pdf->SetFont('Arial', 'B', 16);
                $pdf->Cell(0, 10, 'Hostel Room Allocation Receipt', 0, 1, 'C');
                $pdf->Ln(10);
                $pdf->SetFont('Arial', '', 12);
                $pdf->Cell(0, 10, 'Admission ID: ' . $admission_id, 0, 1);
                $pdf->Cell(0, 10, 'Student Name: ' . $student_name, 0, 1);
                $pdf->Cell(0, 10, 'Room Number: ' . $room_no, 0, 1);
                $pdf->Cell(0, 10, 'Room Type: ' . $room_type, 0, 1);
                $pdf->Cell(0, 10, 'Allocation Date: ' . $allocation_date, 0, 1);
                $pdf->Ln(10);
                $pdf->Cell(0, 10, 'Thank you for choosing our hostel.', 0, 1);
                $receipt_file = 'receipt_' . $admission_id . '.pdf';
                $pdf->Output('F', $receipt_file);

                // Send Email with PHPMailer
                if (!empty($student_email)) {
                    $mail = new PHPMailer(true);
                    try {
                        $mail->isSMTP();
                        $mail->Host = 'smtp.gmail.com';
                        $mail->SMTPAuth = true;
                        $mail->Username = 'snehkunjgirlscampus2841@gmail.com'; // your email
                        $mail->Password = 'jecr qcix odfu ueve'; // app password
                        $mail->SMTPSecure = 'tls';
                        $mail->Port = 587;

                        $mail->setFrom('snehkunjgirlscampus2841@gmail.com', 'Hostel Management');
                        $mail->addAddress($student_email, $student_name);
                        $mail->isHTML(true);
                        $mail->Subject = 'Hostel Room Allocation Confirmation';
                        $mail->Body = "
                            <h2>Room Allocation Successful</h2>
                            <p>Dear <strong>$student_name</strong>,</p>
                            <p>Your hostel room has been allocated:</p>
                            <ul>
                                <li><strong>Admission ID:</strong> $admission_id</li>
                                <li><strong>Room Number:</strong> $room_no</li>
                                <li><strong>Room Type:</strong> $room_type</li>
                                <li><strong>Allocation Date:</strong> $allocation_date</li>
                            </ul>
                            <p>Thank you,<br>Hostel Management</p>
                        ";
                        $mail->addAttachment($receipt_file);
                        $mail->send();
                        $message .= " Email sent to $student_email.";
                    } catch (Exception $e) {
                        $message .= " Email error: {$mail->ErrorInfo}";
                    }
                }

                // Show PDF in browser
                if (file_exists($receipt_file)) {
                    header('Content-Type: application/pdf');
                    header('Content-Disposition: inline; filename="' . basename($receipt_file) . '"');
                    header('Content-Length: ' . filesize($receipt_file));
                    readfile($receipt_file);
                    unlink($receipt_file);
                    exit;
                }

            } else {
                $message = "Error in room allocation.";
            }
        }
    }
}
?>

<!-- HTML FORM & PAGE -->
<!DOCTYPE html>
<html>
<head>
    <title>Room Allocation</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        h2 {
            text-align: center;
            color: #007bff;
            padding: 20px 0;
        }
        form {
            margin: 30px  auto;
            padding: 20px;
            background-color: #fff;
            width: 60%;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-right: 200px;
        }
        fieldset {
            border: 2px solid #007bff;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
        }
        legend {
            font-weight: bold;
            color: #007bff;
        }
        label {
            font-weight: bold;
            margin-bottom: 10px;
        }
        input[type="text"], select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        .message {
            padding: 10px;
            margin: 10px auto;
            width: 60%;
            border-radius: 5px;
            text-align: center;
        }
        .success { background-color: #28a745; color: white; }
        .error { background-color: #dc3545; color: white; }
    </style>
</head>
<body>

<?php include 'include/side.php'; ?>

<?php if ($message): ?>
    <div class="message <?= strpos($message, 'Successfully') !== false ? 'success' : 'error' ?>">
        <?= $message ?>
    </div>
<?php endif; ?>

<form method="POST">
    <h2>Hostel Room Allocation</h2>
    <fieldset>
        <legend>Search Student</legend>
        <label for="admission_id">Admission ID:</label>
        <input type="text" name="admission_id" value="<?= htmlspecialchars($admission_id) ?>" required>
        <button type="submit" name="search">Search Student</button>
    </fieldset>
</form>

<?php if ($student_name): ?>
    <form method="POST">
        <fieldset>
            <legend>Student Details</legend>
            <p><strong>Name:</strong> <?= htmlspecialchars($student_name) ?></p>
            <p><strong>Status:</strong> <?= htmlspecialchars($student_status) ?></p>
            <p><strong>Room Type:</strong> <?= htmlspecialchars($room_type) ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($student_email) ?></p>
        </fieldset>

        <?php if ($student_status !== 'Allocated'): ?>
            <fieldset>
                <legend>Allocate Room</legend>
                <input type="hidden" name="admission_id" value="<?= htmlspecialchars($admission_id) ?>">
                <label for="room_no">Select Room:</label>
                <select name="room_no" required>
                    <?php foreach ($available_rooms as $room_no): ?>
                        <option value="<?= htmlspecialchars($room_no) ?>"><?= htmlspecialchars($room_no) ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" name="allocate">Allocate Room</button>
            </fieldset>
        <?php else: ?>
            <p>Room is already allocated for this student.</p>
        <?php endif; ?>
    </form>
<?php endif; ?>

</body>
</html>
