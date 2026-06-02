<?php
// Include database and PHPMailer
include 'con.php';


require 'lib/fpdf.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


$limit = 5;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);
$start = ($page - 1) * $limit;

// Approve logic
if (isset($_GET['approve'])) {
    $approveId = (int)$_GET['approve'];

    $visitor = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM visitors WHERE id = $approveId"));

    if ($visitor && $visitor['status'] != 'Approved') {
        // Auto-generate visit date (2 days later)
        $visitDate = date('Y-m-d', strtotime('+2 days'));

        // Update status and visit date
        mysqli_query($conn, "UPDATE visitors SET status = 'Approved', visit_date = '$visitDate' WHERE id = $approveId");

        // Send email
        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'snehkunjgirlscampus2841@gmail.com'; // Your Gmail
            $mail->Password   = 'jecr qcix odfu ueve';    // App password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            $mail->setFrom('snehkunjgirlscampus2841@gmail.com', 'Hostel Admin');
            $mail->addAddress($visitor['email'], $visitor['name']);

            $mail->Subject = 'Hostel Visit Approved';
            $mail->Body    = "Dear {$visitor['name']},\n\nYour hostel visit has been approved.\nVisit Date: $visitDate\n\nPlease carry a valid ID.\n\nThank you,\nHostel Admin";

            $mail->send();
            header("Location: admin_view_visitors.php?msg=approved");
            exit;
        } catch (Exception $e) {
            echo "Mailer Error: {$mail->ErrorInfo}";
        }
    }
}

// Pagination
$totalVisitors = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(id) as total FROM visitors"))['total'];
$totalPages = ceil($totalVisitors / $limit);
$result = mysqli_query($conn, "SELECT * FROM visitors ORDER BY id DESC LIMIT $start, $limit");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - View Visitors</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8f9fa; }
        .container1 {
            background: #fff; padding: 20px; border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin: 90px auto 30px auto; width: 1000px;
            margin-left: 190px;
        }
        h1 { font-size: 22px; font-weight: 600; color: #333; }
        table { width: 100%; background: #fff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); }
        th { background: #007bff; color: white; text-align: left; padding: 10px; }
        td { padding: 10px; border-bottom: 1px solid #ddd; }
        .pagination { margin-top: 20px; display: flex; justify-content: center; gap: 10px; }
        .pagination a, .pagination span {
            padding: 8px 12px; border-radius: 5px; text-decoration: none; font-size: 14px; background: #007bff; color: white;
        }
        .pagination .disabled { background: #ddd; color: #666; pointer-events: none; }
    </style>
</head>
<body>
<?php include 'include/side.php'; ?>
<div class="container mt-4">
    <div class="container1">
        <fieldset>
            <legend><h1>Visitors List</h1></legend>

            <?php if (isset($_GET['msg']) && $_GET['msg'] == 'approved'): ?>
                <div class="alert alert-success">Visitor approved and email sent successfully.</div>
            <?php endif; ?>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Purpose</th>
                    <th>Visit Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>

                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['contact'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['purpose'] ?></td>
                        <td><?= $row['visit_date'] ?? '-' ?></td>
                        <td><?= $row['status'] ?></td>
                        <td>
                            <?php if ($row['status'] != 'Approved'): ?>
                                <a href="?approve=<?= $row['id'] ?>" class="btn btn-sm btn-success">Approve</a>
                            <?php else: ?>
                                Approved
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>

            <div class="pagination">
                <?php if ($page > 1): ?>
                    <a href="?page=<?= $page - 1 ?>">Previous</a>
                <?php else: ?>
                    <span class="disabled">Previous</span>
                <?php endif; ?>

                <span><?= $page ?> / <?= $totalPages ?></span>

                <?php if ($page < $totalPages): ?>
                    <a href="?page=<?= $page + 1 ?>">Next</a>
                <?php else: ?>
                    <span class="disabled">Next</span>
                <?php endif; ?>
            </div>
        </fieldset>
    </div>
</div>
</body>
</html>
