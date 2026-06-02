<?php
include 'con.php'; // Database Connection

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM food_schedule WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){
    $morning_snacks = $_POST['morning_snacks'];
    $breakfast = $_POST['breakfast'];
    $lunch = $_POST['lunch'];
    $evening_snacks = $_POST['evening_snacks'];
    $dinner = $_POST['dinner'];
    $late_night_snacks = $_POST['late_night_snacks'];

    mysqli_query($conn, "UPDATE food_schedule SET 
        morning_snacks='$morning_snacks', 
        breakfast='$breakfast', 
        lunch='$lunch', 
        evening_snacks='$evening_snacks', 
        dinner='$dinner', 
        late_night_snacks='$late_night_snacks' 
        WHERE id=$id");

    header("Location: manage_mess.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Food Schedule</title>
    <style>
      body {
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
        }
    </style>
</head>
<body>
    <?php  include('include/side.php'); ?>

    <div class="form-container">
    <form method="POST" action="">
        <h1>Edit Food Schedule</h1>

        <fieldset>
            <legend>Food Details</legend>
    
    
        <input type="text" name="morning_snacks" value="<?php echo $row['morning_snacks']; ?>" required>
        <input type="text" name="breakfast" value="<?php echo $row['breakfast']; ?>" required>
        <input type="text" name="lunch" value="<?php echo $row['lunch']; ?>" required>
        <input type="text" name="evening_snacks" value="<?php echo $row['evening_snacks']; ?>" required>
        <input type="text" name="dinner" value="<?php echo $row['dinner']; ?>" required>
        <input type="text" name="late_night_snacks" value="<?php echo $row['late_night_snacks']; ?>" required>
    </fieldset>
        <button type="submit" name="update">Update Schedule</button>
    </form>
</div>
</body>
</html>
