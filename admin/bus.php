<?php

include 'con.php';

session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bus_number = $_POST['bus_number'];
    $route = $_POST['route'];
    $pickup_points = $_POST['pickup_points'];
    $timings = $_POST['timings'];
    $fees = $_POST['fees'];


    $sql = "INSERT INTO buses (bus_number, route, pickup_points, timings, fees) 
            VALUES ('$bus_number', '$route', '$pickup_points', '$timings', '$fees')";
    if ($conn->query($sql) === TRUE) {
        echo "Bus details added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <style type="text/css"> body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .form-container {
            width: 75%;
            background: white;
            padding: 25px;
            margin: 50px auto;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin-top: 90px;
            margin-left: 260px;

        }

        h1 {
            color: #d35400;
            font-size: 22px;
            text-align: center;
        }

        fieldset {
            border: 1px solid #ccc;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        legend {
            font-size: 18px;
            font-weight: bold;
            color: #6c5ce7;
        }

        label {
            font-size: 14px;
            color: #555;
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
           
            font-size: 14px;
        }

input, textarea {
            width: 97.5%;
            padding: 12px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
           
            font-size: 14px;
        }
        textarea {
            height: 100px;
            resize: none;
        }

        button {
            width: 100%;
            background: #6c5ce7;
            color: white;
            padding: 12px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-transform: uppercase;
            font-weight: bold;
        }

        button:hover {
            background: #4834d4;
        }</style>
</head>
<body>
<?php include 'include/header.php'; ?>
<div class=" form-container ">
<form method="post">
    <h1> Add bus details </h1>
    <fieldset><legend>Bus Details</legend>
    <label>Bus Number:</label> <input type="text" name="bus_number" required><br>
    <label>Route:</label> <input type="text" name="route" required><br>
    <label>Pickup Points:</label> <input type="text" name="pickup_points" required><br>
    <label>Timings:</label> <input type="text" name="timings" required><br>
    <label>Fees:</label> <input type="text" name="fees" required><br>
</fieldset>
    <button type="submit">Add Bus</button>
</form>
</div>
</body>
</html>