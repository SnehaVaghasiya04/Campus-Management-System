<?php
// Start session to check if admin is logged in
session_start();

// Redirect to login page if admin is not logged in
/*if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
} */




// Include database connection file
include("con.php");

// Check if an ID is passed in the URL
if (!isset($_GET['id'])) {
    echo "<script>alert('Invalid request!'); window.location.href='admin_manage_contacts.php';</script>";
    exit();
}

// Get the message ID from the URL
$message_id = $_GET['id'];

// Fetch message details from the database
$query = "SELECT * FROM contact_messages WHERE id = $message_id";
$result = mysqli_query($conn, $query);

// Check if message exists
if (mysqli_num_rows($result) == 0) {
    echo "<script>alert('Message not found!'); window.location.href='admin_manage_contacts.php';</script>";
    exit();
}

// Fetch message data
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>View Contact Message</title>
    <link rel="stylesheet" href="admin_styles.css"> <!-- Link to Admin CSS -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 50%;
        }

        fieldset {
            border: 2px solid #007bff;
            border-radius: 10px;
            padding: 20px;
            background: #f9f9ff;
        }

        legend {
            font-size: 20px;
            font-weight: bold;
            color: #007bff;
            padding: 8px 15px;
            border-radius: 5px;
            background: #e7f1ff;
            border: 1px solid #007bff;
        }

        .message-details p {
            font-size: 16px;
            margin-bottom: 10px;
            padding: 10px;
            background: #f8f9fa;
            border-left: 4px solid #007bff;
            border-radius: 5px;
        }

        .back-button {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 15px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: 0.3s;
            font-size: 16px;
        }

        .back-button:hover {
            background: #0056b3;
        }
    </style>
</head>

<body>

<div class="container">
    <fieldset>
        <legend>📩 View Contact Message</legend>

        <div class="message-details">
            <p><strong>Name:</strong> <?php echo htmlspecialchars($row['name']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($row['email']); ?></p>
            <p><strong>Subject:</strong> <?php echo htmlspecialchars($row['subject']); ?></p>
            <p><strong>Message:</strong></p>
            <p><?php echo nl2br(htmlspecialchars($row['message'])); ?></p>
            
        </div>

        <a href="admin_manage_contacts.php" class="back-button">🔙 Back to Messages</a>
    </fieldset>
</div>

</body>
</html>
