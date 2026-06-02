<?php
include 'con.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/PHPMailer.php'; 



if (isset($_GET['approve_id'])) {
    $id = $_GET['approve_id'];

    // Generate a unique Student ID (STUxxxx)
    $student_id = "STU" . rand(1000, 9999);

    // Fetch student details
    $query = "SELECT * FROM cstudents WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $email = $row['email'];
    $name = $row['name'];
    $course = $row['course'];
    $semester = $row['semester']; // Fetch semester

    // Approve student & assign Student ID
    $update_query = "UPDATE cstudents SET student_id='$student_id', status='Approved' WHERE id='$id' ";
    
    if (mysqli_query($conn, $update_query)) {
        // Send email using PHPMailer
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'snehkunjgirlscampus2841@gmail.com';
            $mail->Password = 'jecr qcix odfu ueve'; // Use App Password for Gmail
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            $mail->setFrom('snehkunjgirlscampus2841@gmail.com', 'College Admin');
            $mail->addAddress($email, $name);

            $mail->isHTML(true);
            $mail->Subject = "Admission Approved - Your Student ID";
            $mail->Body = "
                <h3>Dear $name,</h3>
                <p>Congratulations! Your admission to the <strong>$course</strong> program (Semester <strong>$semester</strong>) has been approved.</p>
                <p><strong>Your Student ID:</strong> <b>$student_id</b></p>
                <h4>Next Steps:</h4>
                <ul>
                    <li>Login to your student portal using your Student ID.</li>
                    <li>Check your course schedule and faculty details.</li>
                    <li>Submit required documents if pending.</li>
                    <li>Pay the first semester fees before the deadline.</li>
                </ul>
                <p>If you have any questions, contact the admission office.</p>
                <br>
                <p>Best Regards,<br>College Administration</p>
            ";

            $mail->send();
            echo "<script>alert('Student Approved & Email Sent!'); window.location.href='manage_Addmissiom.php';</script>";
        } catch (Exception $e) {
            echo "<script>alert('Student Approved but email could not be sent: {$mail->ErrorInfo}');</script>";
        }
    } else {
        echo "<script>alert('Error approving student!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Admissions</title>


     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="table.css">

    <style>
       
        .approve-btn {
            display: inline-block;
            padding: 8px 12px;
            background: green;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .approve-btn:hover {
            background: darkgreen;
        }
        .approved-text {
            color: green;
            font-weight: bold;
        }
    </style>
</head>
<body>

<?php include_once('include/side.php'); ?>

<div class="container mt-4">
        <div class="container1">
            <fieldset>
                <legend><h1>All Students Applications</h1></legend>

               


                 
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Course</th>
            <th>Semester</th> <!-- Added Semester Column -->
            <th>Student ID</th>
            <th>Status</th>
        </tr>
        <?php 
        $query = "SELECT * FROM cstudents";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><?php echo $row['course']; ?></td>
                <td><?php echo $row['semester']; ?></td> <!-- Display Semester -->
                <td><?php echo ($row['status'] == 'Approved') ? $row['student_id'] : 'N/A'; ?></td>
                <td>
                    <?php if ($row['status'] == 'Approved') { ?>
                        <span class="approved-text">Approved</span>
                    <?php } else { ?>
                        <a href="manage_Addmissiom.php?approve_id=<?php echo $row['id']; ?>" class="approve-btn">Approve</a>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>
