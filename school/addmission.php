<?php
include 'con.php'; // Include database connection

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/PHPMailer.php'; // PHPMailer Autoloader

// Variables for messages
$successMessage = '';
$errorMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $full_name = $_POST['full_name'];
    $dob = $_POST['dob'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $standard = $_POST['standard'];
    $stream = $_POST['stream'] ?? ''; // Stream might be empty for other standards

    // Generate a unique student ID
    $student_id = "S" . date("Y") . str_pad(rand(1, 999), 3, "0", STR_PAD_LEFT);

    // Insert student data into the database
    $query = "INSERT INTO student (student_id, full_name, dob, contact, email, address, standard, stream) 
              VALUES ('$student_id', '$full_name', '$dob', '$contact', '$email', '$address', '$standard', '$stream')";

    if (mysqli_query($conn, $query)) {
        // Initialize PHPMailer
        $mail = new PHPMailer(true);
        
        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Use your SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'snehkunjgirlscampus2841@gmail.com'; // Your email address
            $mail->Password = 'jecr qcix odfu ueve';  // Your email password (use App Password for Gmail if 2-step verification is on)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;
            
            // Recipients
            $mail->setFrom('no-reply@campusmanagement.com', 'Campus Management');
            $mail->addAddress($email, $full_name); // Add recipient email
            
            // Email Content
            $mail->isHTML(true);
            $mail->Subject = 'Student ID Confirmation';

            // Include Stream only if Standard is 11 or 12
            $stream_info = "";
            if ($standard === "Standard 11" || $standard === "Standard 12") {
                $stream_info = "<tr><th>Stream</th><td>$stream</td></tr>";
            }

            $mail->Body    = "
                <html>
                <body>
                    <h3>Student ID Confirmation</h3>
                    <p>Dear $full_name,</p>
                    <p>Your Student ID is: <strong>$student_id</strong></p>
                    
                    <h4>Student Details:</h4>
                    <table border='1' cellpadding='10'>
                        <tr>
                            <th>Date of Birth</th>
                            <td>$dob</td>
                        </tr>
                        <tr>
                            <th>Contact Number</th>
                            <td>$contact</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>$email</td>
                        </tr>
                        <tr>
                            <th>Standard</th>
                            <td>$standard</td>
                        </tr>
                        $stream_info
                        <tr>
                            <th>Address</th>
                            <td>$address</td>
                        </tr>
                    </table>
                    
                    <p>Best regards,<br>Sneh Kunj Girls School</p>
                </body>
                </html>
            ";

            // Send email
            if ($mail->send()) {
                $successMessage = "Student ID: $student_id. An email has been sent to $email.";
            } else {
                $errorMessage = "Student ID: $student_id. However, the email could not be sent.";
            }
        } catch (Exception $e) {
            $errorMessage = "Error: {$mail->ErrorInfo}";
        }
    } else {
        $errorMessage = "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn); // Close database connection
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Admission Form</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        /* General Styling */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 0;
            animation: fadeIn 1s ease-in-out;
        }

        .container1 {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .card {
            display: flex;
            background: white;
            width: 900px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            animation: slideIn 1.5s ease-in-out;
        }

        /* Success and Error Message Boxes */
        .message-box {
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
            font-size: 16px;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
        }

        /* Left Section (Details) */
        .left {
            background: #003366;
            color: white;
            width: 40%;
            padding: 40px;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .left h2 {
            color: white;
            font-size: 24px;
            margin-bottom: 15px;
            animation: fadeInText 1.2s ease-in-out;
        }

        /* Right Section (Form) */
        .right {
            width: 60%;
            padding: 40px;
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        form {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .full-width {
            grid-column: span 2;
        }

        label {
            font-size: 14px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 5px;
        }

        input, select, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            transition: 0.3s;
        }

        input:focus, select:focus, textarea:focus {
            border-color: #3498db;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
        }

        .submit-btn {
            background: #003366;
            color: white;
            border: none;
            padding: 12px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: 0.3s;
            width: 100%;
            grid-column: span 2;
        }

        .submit-btn:hover {
            background: #2980b9;
            transform: scale(1.05);
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideIn {
            from { transform: translateY(30px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        @keyframes fadeInText {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .card {
                flex-direction: column;
                width: 100%;
            }

            .left, .right {
                width: 100%;
                text-align: center;
            }

            form {
                grid-template-columns: 1fr;
            }
        }

        /* Header Section */
        .about-header1 {
            position: relative;
            text-align: center;
            color: black;
        }

        .about-image1 {
            background: url("/campus_management/admin/images/17.jpg")  center center/cover;
            height: 300px;
            display: flex;
            
            align-items: center;
            justify-content: center;
        }

        .about-image1 h1 {
            font-size: 36px;
            font-weight: bold;
            color: #003366;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }

        /* Banner */
        .banner1 {
            background-color: #003366;
            color: white;
            height: 60px;
            display: flex;
            align-items: center;
            padding: 0 20px;
        padding-left:   550px;
        }

        .contain1 {
            font-size: 20px;
        }

        .contain1 a {
            color: white;
            text-decoration: none;
        }



        
    </style>

    <script>
        function toggleStreamField() {
            var standard = document.getElementById("standard").value;
            var streamField = document.getElementById("stream-field");
            streamField.style.display = (standard === "Standard 11" || standard === "Standard 12") ? "block" : "none";
        }

        // Function to validate Date of Birth based on Standard
        function validateDOB() {
            var dob = new Date(document.getElementById("dob").value);
            var standard = document.getElementById("standard").value;
            var today = new Date();
            var age = today.getFullYear() - dob.getFullYear();
            var month = today.getMonth() - dob.getMonth();
            if (month < 0 || (month === 0 && today.getDate() < dob.getDate())) {
                age--;
            }

            var minAge = 0;
            var maxAge = 0;

            // Set min and max age based on standard
            switch (standard) {
                case "Pre-Primary":
                    minAge = 3;
                    maxAge = 5;
                    break;
                case "Standard 1":
                case "Standard 2":
                    minAge = 6;
                    maxAge = 8;
                    break;
                case "Standard 3":
                case "Standard 4":
                    minAge = 8;
                    maxAge = 10;
                    break;
                case "Standard 5":
                    minAge = 10;
                    maxAge = 12;
                    break;
                case "Standard 6":
                    minAge = 11;
                    maxAge = 13;
                    break;
                case "Standard 7":
                    minAge = 12;
                    maxAge = 14;
                    break;
                case "Standard 8":
                    minAge = 13;
                    maxAge = 15;
                    break;
                case "Standard 9":
                    minAge = 14;
                    maxAge = 16;
                    break;
                case "Standard 10":
                    minAge = 15;
                    maxAge = 17;
                    break;
                case "Standard 11":
                    minAge = 16;
                    maxAge = 18;
                    break;
                case "Standard 12":
                    minAge = 17;
                    maxAge = 19;
                    break;
                default:
                    alert("Please select a valid standard");
                    return false;
            }

            // Validate the age range
            if (age < minAge || age > maxAge) {
                alert("Your age is not appropriate for the selected standard.");
                return false;
            }

            return true; // Allow form submission
        }
    </script>
</head>
<body>
    <?php include_once('include1/header2.php'); ?>


<section class="about-header1">
    <div class="about-image1">
        <h1>Admission</h1>
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="shome.php">Home</a> &gt; Admission
        </div>
    </div>
</section>
    <!-- Display Success or Error Messages -->
    <?php if ($successMessage): ?>
        <div class="message-box success"><?= $successMessage ?></div>
    <?php elseif ($errorMessage): ?>
        <div class="message-box error"><?= $errorMessage ?></div>
    <?php endif; ?>

    <div class="container1">
        <div class="card">
            <!-- Left Section -->
            <div class="left">
                <i class="fas fa-graduation-cap"></i>
                <h2>Welcome to Sneh Kunj Girls School</h2>
                <p>Fill out the form to register and receive your unique student ID.</p>
            </div>

            <!-- Right Section (Form) -->
            <div class="right">
                <h2>Student Admission Form</h2>
                <form method="POST" onsubmit="return validateDOB()">
                    <div class="form-group">
                        <label>Full Name:</label>
                        <input type="text" name="full_name" required>
                    </div>

                    <div class="form-group">
                        <label>Date of Birth:</label>
                        <input type="date" name="dob" id="dob" required>
                    </div>

                    <div class="form-group">
                        <label>Contact Number:</label>
                        <input type="text" name="contact" required>
                    </div>

                    <div class="form-group">
                        <label>Email:</label>
                        <input type="email" name="email" required>
                    </div>

                    <div class="form-group full-width">
                        <label>Address:</label>
                        <textarea name="address" required></textarea>
                    </div>

                    <div class="form-group">
                        <label>Standard:</label>
                        <select name="standard" id="standard" required onchange="toggleStreamField()">
                            <option value="Pre-Primary">Pre-Primary</option>
                            <option value="Primary">Primary</option>
                            <option value="Standard 1">Standard 1</option>
                            <option value="Standard 2">Standard 2</option>
                            <option value="Standard 3">Standard 3</option>
                            <option value="Standard 4">Standard 4</option>
                            <option value="Standard 5">Standard 5</option>
                            <option value="Standard 6">Standard 6</option>
                            <option value="Standard 7">Standard 7</option>
                            <option value="Standard 8">Standard 8</option>
                            <option value="Standard 9">Standard 9</option>
                            <option value="Standard 10">Standard 10</option>
                            <option value="Standard 11">Standard 11</option>
                            <option value="Standard 12">Standard 12</option>
                        </select>
                    </div>

                    <div class="form-group" id="stream-field" style="display:none;">
                        <label>Stream:</label>
                        <select name="stream">
                            <option value="Science">Science</option>
                            <option value="Commerce">Commerce</option>
                            <option value="Arts">Arts</option>
                        </select>
                    </div>

                    <button type="submit" class="submit-btn">Submit Admission</button>
                </form>
            </div>
        </div>
    </div>
    <?php  include 'include1/footer.php';?>
</body>
</html>
