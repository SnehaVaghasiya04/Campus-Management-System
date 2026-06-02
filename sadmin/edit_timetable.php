<?php
include 'con.php';


session_start();
if (!isset($_SESSION['admin_name'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}



// Check if the timetable ID is provided in the URL
if (isset($_GET['id'])) {
    $timetable_id = $_GET['id'];

    // Fetch the existing timetable record
    $query = "SELECT * FROM class_timetables WHERE id = '$timetable_id'";
    $result = $conn->query($query);

    if ($result->num_rows == 1) {
        $timetable = $result->fetch_assoc();
    } else {
        echo "Timetable not found.";
        exit;
    }
}

// Handle the form submission to update the timetable
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $teacher_id = $_POST['teacher_id'];
    $standard = $_POST['standard'];
    $day = $_POST['day'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $subject = $_POST['subject'];

    // Update the timetable record
    $update_query = "UPDATE class_timetables 
                     SET teacher_id = '$teacher_id', standard = '$standard', day = '$day', 
                         start_time = '$start_time', end_time = '$end_time', subject = '$subject'
                     WHERE id = '$timetable_id'";

    if ($conn->query($update_query)) {
        echo "<script>alert('Timetable updated successfully!'); window.location.href='manage_timetable.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Timetable</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
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

<?php include_once('include/side.php'); ?>
<div class="form-container">
    <form method="POST" action="">
        <h1>Edit Timetable</h1>

        <fieldset>
            <legend>Time table Details</legend>

        <div class="form-group">
            <label>Teacher ID:</label>
            <input type="number" name="teacher_id" value="<?php echo $timetable['teacher_id']; ?>" required>
        </div>

        <div class="form-group">
            <label>Standard:</label>
            <input type="text" name="standard" value="<?php echo $timetable['standard']; ?>" required>
        </div>

        <div class="form-group">
            <label>Day:</label>
            <select name="day" required>
                <option value="Monday" <?php if ($timetable['day'] == 'Monday') echo 'selected'; ?>>Monday</option>
                <option value="Tuesday" <?php if ($timetable['day'] == 'Tuesday') echo 'selected'; ?>>Tuesday</option>
                <option value="Wednesday" <?php if ($timetable['day'] == 'Wednesday') echo 'selected'; ?>>Wednesday</option>
                <option value="Thursday" <?php if ($timetable['day'] == 'Thursday') echo 'selected'; ?>>Thursday</option>
                <option value="Friday" <?php if ($timetable['day'] == 'Friday') echo 'selected'; ?>>Friday</option>
                <option value="Saturday" <?php if ($timetable['day'] == 'Saturday') echo 'selected'; ?>>Saturday</option>
                <option value="Sunday" <?php if ($timetable['day'] == 'Sunday') echo 'selected'; ?>>Sunday</option>
            </select>
        </div>

        <div class="form-group">
            <label>Start Time:</label>
            <input type="time" name="start_time" value="<?php echo $timetable['start_time']; ?>" required>
        </div>

        <div class="form-group">
            <label>End Time:</label>
            <input type="time" name="end_time" value="<?php echo $timetable['end_time']; ?>" required>
        </div>

        <div class="form-group">
            <label>Subject:</label>
            <input type="text" name="subject" value="<?php echo $timetable['subject']; ?>" required>
        </div>
</fieldset>
        <button type="submit">Update Timetable</button>
        <a href="manage_timetable.php" class="btn-back">⬅ Back to Timetable</a>
    </form>
</div>

</body>
</html>
