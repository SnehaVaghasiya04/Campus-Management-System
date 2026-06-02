<?php


session_start();
if (!isset($_SESSION['admin_name'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}


include 'con.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/PHPMailer.php'; // PHPMailer Autoloader

$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$start = ($page - 1) * $limit;
$total_result = $conn->query("SELECT COUNT(*) AS total FROM student");
$total_row = $total_result->fetch_assoc();
$totalRecords = $total_row['total'];
$totalPages = ceil($totalRecords / $limit); 




// Fetch students list
$result = $conn->query("SELECT * FROM student ORDER BY admission_date DESC LIMIT $start, $limit");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm_admission'])) {
    $student_id = $_POST['student_id'];
    $confirm_query = "UPDATE student SET admission_confirmed = 1 WHERE student_id = '$student_id'";
    if (mysqli_query($conn, $confirm_query)) {
        // Get student details
        $query = "SELECT * FROM student WHERE student_id = '$student_id'";
        $student_result = $conn->query($query);
        $student = $student_result->fetch_assoc();
        
        // Send email confirmation
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'snehkunjgirlscampus2841@gmail.com';
            $mail->Password = 'jecr qcix odfu ueve';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            
            // Recipients
            $mail->setFrom('no-reply@campusmanagement.com', 'Campus Management');
            $mail->addAddress($student['email'], $student['full_name']);
            
            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Admission Confirmation';
            $mail->Body = "
                <html>
                <body>
                    <h3>Student Admission Confirmation</h3>
                    <p>Dear {$student['full_name']},</p>
                    <p>Your admission has been confirmed. Your Student ID is: <strong>{$student['student_id']}</strong></p>
                    <p><strong>Required Documents:</strong></p>
                    <ul>
                        <li>Birth Certificate</li>
                        <li>Identity Proof</li>
                        <li>Passport Size Photograph</li>
                        <li>Previous Year Marksheets (if applicable)</li>
                    </ul>
                    <p>Best regards,<br>Your School</p>
                </body>
                </html>
            ";

            // Send email
            if ($mail->send()) {
                echo "Admission confirmed for {$student['full_name']}. An email has been sent.";
            } else {
                echo "Email could not be sent.";
            }
        } catch (Exception $e) {
            echo "Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Error confirming admission.";
    }
}

mysqli_close($conn);
?>
<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    
       body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;

        } 
        .container1 {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 90px;
            margin-left: 180px;
            width:  1000px;
            margin-bottom:  30px;

        }
        h1 {
            font-size: 22px;
            font-weight: 600;
            color: #333;
        }
        .search-bar {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 10px;
        }
        .search-bar input {
            padding: 8px;
            width: 250px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        table {
            width: 70%;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            font-size: 14px;
        }
        th {
            background:  #007bff;
            color: white;
            text-align: left;
            padding: 10px;
        }
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .faculty-img {
    width: 80px;  /* Adjust width as needed */
    height: 80px; /* Adjust height as needed */
    border-radius: 5px; /* Optional: Rounds corners */
    object-fit: cover; /* Ensures proper scaling */
}

        .action-btn {
            padding: 6px 10px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            display: inline-block;
        }
        .edit-btn {
            background: #28a745;
            color: white;
        }
        .delete-btn {
            background: #dc3545;
            color: white;
        }
        .edit-btn:hover {
            background: #218838;
        }
        .delete-btn:hover {
            background: #c82333;
        }
        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .pagination a, .pagination span {
            padding: 8px 12px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            background: #007bff;
            color: white;
        }
        .pagination .disabled {
            background: #ddd;
            color: #666;
            pointer-events: none;
        }
    </style>
    <title>Student List</title>
    
</head>
<body>
  <?php include_once('include/side.php'); ?>


 <div class="container mt-4">
        <div class="container1">
            <fieldset>
                <legend><h1>Student Admission List</h1></legend>

<table>
    <tr>
        <th>Student ID</th>
        <th>Full Name</th>
        <th>Standard</th>
        <th>Stream</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Admission Date</th>
        <th>Admission Status</th>
        <th>Confirm Admission</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?= $row['student_id']; ?></td>
        <td><?= $row['full_name']; ?></td>
        <td><?= $row['standard']; ?></td>
        <td><?= $row['stream'] ?: '-'; ?></td>
        <td><?= $row['contact']; ?></td>
        <td><?= $row['email']; ?></td>
        <td><?= $row['admission_date']; ?></td>
        <td><?= $row['admission_confirmed'] ? 'Confirmed' : 'Pending'; ?></td>
        <td>
            <?php if (!$row['admission_confirmed']) { ?>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="student_id" value="<?= $row['student_id']; ?>">
                    <input type="submit" name="confirm_admission" value="Confirm" class="btn">
                </form>
            <?php } ?>
        </td>
    </tr>
    <?php } ?>
</table>
    <?php include 'include/pagination.php' ?>


     
</body>
</html>
