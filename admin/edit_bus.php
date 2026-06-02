<?php
include 'con.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM buses WHERE id = $id");
    $busData = mysqli_fetch_assoc($result);
}

if (isset($_POST['update_bus'])) {
    $bus_number = mysqli_real_escape_string($conn, $_POST['bus_number']);
    $route = mysqli_real_escape_string($conn, $_POST['route']);
    $pickup_points = mysqli_real_escape_string($conn, $_POST['pickup_points']);
    $timings = mysqli_real_escape_string($conn, $_POST['timings']);
    $fees = mysqli_real_escape_string($conn, $_POST['fees']);

    $query = "UPDATE buses SET bus_number='$bus_number', route='$route', pickup_points='$pickup_points', timings='$timings', fees='$fees' WHERE id=$id";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Bus details updated successfully.');</script>";
        echo "<script>window.location.href = 'manage_bus.php'</script>";
    } else {
        echo "<script>alert('Something went wrong.');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Bus Details</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; }
        .form-container { width: 75%; background: white; padding: 25px; margin: 50px auto; box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1); border-radius: 5px;  margin-left: 260px;margin-top: 90px;}
        h1 { color: #d35400; text-align: center; }
        fieldset { border: 1px solid #ccc; padding: 15px; border-radius: 5px; }
        legend { font-size: 18px; font-weight: bold; color: #6c5ce7; }
        label { font-weight: bold; display: block; margin-top: 10px; }
        input { width: 100%; padding: 12px; margin-top: 5px; margin-bottom: 15px; border: 1px solid #ccc; font-size: 14px; }
        button { width: 100%; background: #6c5ce7; color: white; padding: 12px; font-size: 16px; border: none; border-radius: 5px; cursor: 

            pointer; }

            input, textarea {
            width: 97.5%;
            padding: 12px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
           
            font-size: 14px;
        }
        button:hover { background: #4834d4; }
    </style>
</head>
<body>
<?php include 'include/header.php'; ?>
<div class="form-container">
    <form method="post">
        <h1>Edit Bus Details</h1>
        <fieldset>
            <legend>Bus Details</legend>
            <label>Bus Number:</label>
            <input type="text" name="bus_number" required value="<?php echo htmlspecialchars($busData['bus_number']); ?>">
            <label>Route:</label>
            <input type="text" name="route" required value="<?php echo htmlspecialchars($busData['route']); ?>">
            <label>Pickup Points:</label>
            <input type="text" name="pickup_points" required value="<?php echo htmlspecialchars($busData['pickup_points']); ?>">
            <label>Timings:</label>
            <input type="text" name="timings" required value="<?php echo htmlspecialchars($busData['timings']); ?>">
            <label>Fees:</label>
            <input type="text" name="fees" required value="<?php echo htmlspecialchars($busData['fees']); ?>">
        </fieldset>
        <button type="submit" name="update_bus">Update Bus</button>
    </form>
</div>
</body>
</html>
