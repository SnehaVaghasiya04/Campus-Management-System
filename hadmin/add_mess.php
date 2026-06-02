<?php
include 'con.php'; // Database Connection

// Insert Mess Rule
if(isset($_POST['add_rule'])){
    $title = $_POST['title'];
    $rule_text = $_POST['rule_text'];
    mysqli_query($conn, "INSERT INTO mess_rules (title, rule_text) VALUES ('$title', '$rule_text')");
}

// Insert Food Schedule
if(isset($_POST['add_food'])){
    $day = $_POST['day'];
    $morning_snacks = $_POST['morning_snacks'];
    $breakfast = $_POST['breakfast'];
    $lunch = $_POST['lunch'];
    $evening_snacks = $_POST['evening_snacks'];
    $dinner = $_POST['dinner'];
    $late_night_snacks = $_POST['late_night_snacks'];

    mysqli_query($conn, "INSERT INTO food_schedule (day, morning_snacks, breakfast, lunch, evening_snacks, dinner, late_night_snacks) 
    VALUES ('$day', '$morning_snacks', '$breakfast', '$lunch', '$evening_snacks', '$dinner', '$late_night_snacks')");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Mess Rules & Food Schedule</title>
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

    <h2>Add New Mess Rule</h2>
    <form method="POST" class="form-container">
        <input type="text" name="title" placeholder="Enter Rule Title" required>
        <textarea name="rule_text" placeholder="Enter Rule Description" required></textarea>
        <button type="submit" name="add_rule">Add Rule</button>
    </form>

    <h2>Add New Food Schedule</h2>
    <form method="POST" class="form-container">
        <select name="day" required>
            <option value="">Select Day</option>
            <option>Monday</option><option>Tuesday</option><option>Wednesday</option>
            <option>Thursday</option><option>Friday</option><option>Saturday</option><option>Sunday</option>
        </select>
        <input type="text" name="morning_snacks" placeholder="Morning Snacks" required>
        <input type="text" name="breakfast" placeholder="Breakfast" required>
        <input type="text" name="lunch" placeholder="Lunch" required>
        <input type="text" name="evening_snacks" placeholder="Evening Snacks" required>
        <input type="text" name="dinner" placeholder="Dinner" required>
        <input type="text" name="late_night_snacks" placeholder="Late Night Snacks" required>
        <button type="submit" name="add_food">Add Schedule</button>
    </form>

</body>
</html>
