<?php
include 'con.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $school_college = $_POST['school_college'];
    $class = $_POST['class'];
    $room_type = $_POST['room_type'];
    $room_no = $_POST['room_no'];
    $contact = $_POST['contact'];
    $guardian_name = $_POST['guardian_name'];
    $guardian_contact = $_POST['guardian_contact'];

    $sql = "INSERT INTO hostel_student (name, school_college, class, room_no, room_type, contact, guardian_name, guardian_contact)
            VALUES ('$name', '$school_college', '$class', '$room_no', '$room_type', '$contact', '$guardian_name', '$guardian_contact')";

    if (mysqli_query($conn, $sql)) {
        echo "<div class='success'>Student added successfully!</div>";
    } else {
        echo "<div class='error'>Error: " . mysqli_error($conn) . "</div>";
    }
}
?>

<?php include('include/side.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
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
</head>
<body>


<div class="form-container">
    <form method="POST" action="">
        <h1>Add Student</h1>

        <fieldset>
           

        <legend>Student Details</legend>
        <label>Name:</label>
        <input type="text" name="name" required>

        <label>School/College:</label>
        <input type="text" name="school_college" required>

        <label>Class:</label>
        <input type="text" name="class">
    </fieldset>

    <fieldset>
        <legend>Room Details</legend>
        <label>Room Type:</label>
        <select name="room_type" id="room_type" required>
            <option value="">Select Room Type</option>
            <?php
            $result = mysqli_query($conn, "SELECT DISTINCT room_type FROM room_number");
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $row['room_type'] . '">' . $row['room_type'] . '</option>';
            }
            ?>
        </select>

        <label>Room Number:</label>
        <select name="room_no" id="room_no" required>
            <option value="">Select Room Number</option>
        </select>
    </fieldset>

    <fieldset>
        <legend>Contact Details</legend>
        <label>Contact:</label>
        <input type="text" name="contact">

        <label>Guardian Name:</label>
        <input type="text" name="guardian_name">

        <label>Guardian Contact:</label>
        <input type="text" name="guardian_contact">
    </fieldset>
<button type="submit">Add student</button>
    
</form>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$('#room_type').change(function() {
    var roomType = $(this).val();
    if (roomType != '') {
        $.ajax({
            url: 'get_room_numbers.php',
            method: 'POST',
            data: {room_type: roomType},
            success: function(data) {
                $('#room_no').html(data);
            }
        });
    } else {
        $('#room_no').html('<option value="">Select Room Number</option>');
    }
});
</script>

</body>
</html>
