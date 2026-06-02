<?php
include 'con.php';

// Fetch room types
$room_types_result = mysqli_query($conn, "SELECT DISTINCT room_type FROM rooms");
$room_types = [];
while ($row = mysqli_fetch_assoc($room_types_result)) {
    $room_types[] = $row['room_type'];
}

// Handle form submission
if (isset($_POST['submit'])) {
    $category = $_POST['category'];
    $standard_courses = $_POST['standard_course'];

    foreach ($standard_courses as $standard_course => $fees_data) {
        foreach ($fees_data as $room_type => $fees) {
            if (!empty($fees)) {
                mysqli_query($conn, "INSERT INTO hostel_fees (category, standard_course, room_type, fees)
                VALUES ('$category', '$standard_course', '$room_type', '$fees')");
            }
        }
    }

    echo "<div class='message'>Fees structure successfully added!</div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hostel Fees Structure</title>
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

        input, textarea , select {
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
    <script>
        function showFeeTable() {
            var category = document.getElementById('category').value;
            document.getElementById('feeTable').innerHTML = '';

            var standards = [];
            if (category === "School") {
                standards = ["5", "6", "7", "8", "9", "10", "11", "12"];
            } else if (category === "College") {
                standards = ["BBA", "BCA", "BCOM", "MSC IT"];
            }

            if (standards.length > 0) {
                var table = '<table><tr><th>Standard/Course</th>';
    <?php foreach ($room_types as $room_type) { ?>
                    table += '<th><?php echo $room_type; ?> (₹)</th>';
    <?php } ?>
                table += '</tr>';

                standards.forEach(function(std) {
                    table += '<tr><td>' + std + '</td>';
    <?php foreach ($room_types as $room_type) { ?>
                    table += '<td><input type="text" name="standard_course[' + std + '][<?php echo $room_type; ?>]" placeholder="Enter Fee"></td>';
    <?php } ?>
                    table += '</tr>';
                });

                table += '</table>';
                document.getElementById('feeTable').innerHTML = table;
            }
        }
    </script>
</head>
<body>
    <?php  include ('include/side.php');?>

<div class="form-container">
    <form method="POST" action="">
        <h1>Hostel Fees Structure</h1>

        <fieldset>
            <legend>Fees Details</legend>




    <label>Select Category:</label>
    <select name="category" id="category" onchange="showFeeTable()" required>
        <option value="">--Select--</option>
        <option value="School">School Girls</option>
        <option value="College">College Girls</option>
    </select>

    <div id="feeTable"></div>
</fieldset>
    <input type="submit" name="submit" value="Save Fees">
</form>
</div>
</body>
</html>
