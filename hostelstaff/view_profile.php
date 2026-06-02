<?php
include('con.php');
session_start();

// Redirect to login if not logged in
if (!isset($_SESSION['warden_contact'])) {
    header('Location: warden_login.php');
    exit();
}

$contact = $_SESSION['warden_contact'];

// Fetch warden details
$result = mysqli_query($conn, "SELECT * FROM warden WHERE contact='$contact'");
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            text-align: center;
            padding: 20px;
        }
        .profile-container {
            max-width: 450px;
            background: white;
            padding: 25px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            text-align: left;
        }
        .profile-container img {
            display: block;
            width: 130px;
            height: 130px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 15px;
            border: 3px solid #007bff;
        }
        fieldset {
            border: 2px solid #007bff;
            border-radius: 10px;
            padding: 15px;
        }
        legend {
            font-size: 1.2em;
            font-weight: bold;
            color: #007bff;
        }
        p {
            font-size: 1em;
            margin: 8px 0;
        }
        .btn-container {
            text-align: center;
            margin-top: 15px;
        }
        .btn {
            display: inline-block;
            padding: 10px 18px;
            text-decoration: none;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            margin: 5px;
            transition: 0.3s ease;
        }
        .edit-btn {
            background: #007bff;
            color: white;
        }
        .edit-btn:hover {
            background: #0056b3;
        }
        .dashboard-btn {
            background: #28a745;
            color: white;
        }
        .dashboard-btn:hover {
            background: #218838;
        }
    </style>
</head>
<body>

<div class="profile-container">
    <h2 style="text-align: center; color: #333;">Warden Profile</h2>

    <?php if ($data['photo']): ?>
        <img src="image/<?php echo htmlspecialchars($data['photo']); ?>" alt="Profile Picture">
    <?php else: ?>
        <img src="images/default.png" alt="Default Profile">
    <?php endif; ?>

    <fieldset>
        <legend>Profile Details</legend>
        <p><strong>Name:</strong> <?php echo htmlspecialchars($data['name']); ?></p>
        <p><strong>Designation:</strong> <?php echo htmlspecialchars($data['designation']); ?></p>
        <p><strong>Qualification:</strong> <?php echo htmlspecialchars($data['qualification']); ?></p>
    </fieldset>

    <div class="btn-container">
        <a href="warden_profile.php" class="btn edit-btn">Edit Profile</a>
        <a href="dashboard.php" class="btn dashboard-btn">Back to Dashboard</a>
    </div>
</div>

</body>
</html>
