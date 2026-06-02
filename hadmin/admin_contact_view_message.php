<?php
include 'con.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($conn, "SELECT * FROM hostel_contact WHERE id='$id'");
    $data = mysqli_fetch_assoc($query);
} else {
    echo "<script>alert('Invalid Request'); window.location.href='admin_contact_view.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Message</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        fieldset {
            border: 2px solid #007bff;
            padding: 20px;
            border-radius: 10px;
        }
        legend {
            font-size: 22px;
            font-weight: 600;
            color: #007bff;
            padding: 0 10px;
        }
        p {
            font-size: 16px;
            margin-bottom: 10px;
        }
        .btn-back {
            background: #007bff;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-top: 15px;
        }
        .btn-back:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <fieldset>
        <legend>Message Details</legend>
        <p><strong>Name:</strong> <?= htmlspecialchars($data['name']) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($data['email']) ?></p>
        <p><strong>Phone:</strong> <?= htmlspecialchars($data['phone']) ?></p>
        <p><strong>Date:</strong> <?= htmlspecialchars($data['date']) ?></p>
        <p><strong>Message:</strong><br><?= nl2br(htmlspecialchars($data['message'])) ?></p>
        <a href="admin_contact_view.php" class="btn-back">Back</a>
    </fieldset>
</div>

</body>
</html>
