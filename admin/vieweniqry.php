<?php
include 'con.php';  // Include the database connection
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}

// Get the submission ID from the URL
if (isset($_GET['id'])) {
    $submission_id = $_GET['id'];
    
    // Query to get the details of the specific submission
    $sql = "SELECT * FROM contact_form WHERE id = '$submission_id'";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $submission = mysqli_fetch_assoc($result);
    } else {
        echo "Submission not found!";
        exit;
    }
} else {
    echo "Invalid request!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Submission</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            text-align: center;
        }
        .container1 {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 80px;
            margin-left: 290px;
            width: 800px;
            margin-bottom: 30px;
            position: relative;
        }

        h1 {
            color: #333;
        }

        fieldset {
            width: 100%;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 2px solid #007BFF;
            position: relative;
        }

        legend {
            font-size: 20px;
            font-weight: bold;
            color: #007BFF;
            padding: 5px 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 10px;
            font-size: 18px;
            color: #555;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        td b {
            color: #222;
        }

        /* Back Button Styling */
        .btn-container {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .back-btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            background: #007BFF;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: 0.3s;
        }

        .back-btn:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <?php include_once('include/header.php'); ?>
    <div class="container1">
        <h1>View Submission</h1>
<div class="btn-container">
                <a href="enqiry.php" class="back-btn">Back to Submissions</a>
            </div>
        <fieldset>
            <legend>Submission Details</legend>

            <!-- Back Button Positioned at the Top-Right -->
            

            <table>
                <tr>
                    <td><b>First Name:</b></td>
                    <td><?php echo htmlspecialchars($submission['first_name']); ?></td>
                </tr>
                <tr>
                    <td><b>Last Name:</b></td>
                    <td><?php echo htmlspecialchars($submission['last_name']); ?></td>
                </tr>
                <tr>
                    <td><b>Phone:</b></td>
                    <td><?php echo htmlspecialchars($submission['phone']); ?></td>
                </tr>
                <tr>
                    <td><b>Email:</b></td>
                    <td><?php echo htmlspecialchars($submission['email']); ?></td>
                </tr>
                <tr>
                    <td><b>Message:</b></td>
                    <td><?php echo nl2br(htmlspecialchars($submission['message'])); ?></td>
                </tr>
                <tr>
                    <td><b>Submitted At:</b></td>
                    <td><?php echo htmlspecialchars($submission['submitted_at']); ?></td>
                </tr>
            </table>
        </fieldset>
    </div>
</body>
</html>
