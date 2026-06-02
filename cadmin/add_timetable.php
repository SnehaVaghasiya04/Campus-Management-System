<?php
include("con.php");

session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: login.php");
    exit();
}


// Fetch faculty names
$facultyQuery = "SELECT name FROM faculty ORDER BY name";
$facultyResult = mysqli_query($conn, $facultyQuery);

// Insert timetable entry
if (isset($_POST['add'])) {
    $course = $_POST['course'];
    $semester = $_POST['semester'];
    $subject = $_POST['subject'];
    $day = $_POST['day'];
    $time = $_POST['time'];
    $faculty = $_POST['faculty'];
    $room = $_POST['room'];

    $query = "INSERT INTO ctimetable (course, semester, subject, day, time, faculty_name, room_number) 
              VALUES ('$course', '$semester', '$subject', '$day', '$time', '$faculty', '$room')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Timetable Added Successfully!'); window.location.href='manage_timetable.php';</script>";
    } else {
        echo "<script>alert('Error adding timetable!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Timetable</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="form.css">

<style type="text/css">
    


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
        <h1>Add Timetable</h1>

        

    
        <fieldset>
            <legend>Timetable Details</legend>

            <select name="course" required>
                <option value="">Select Course</option>
                <option value="BCA">BCA</option>
                <option value="BCom">BCom</option>
                <option value="BBA">BBA</option>
                <option value="MSc IT">MSc IT</option>
            </select>

            <input type="number" name="semester" placeholder="Semester" min="1" required>

            <input type="text" name="subject" placeholder="Subject" required>

            <input type="text" name="day" placeholder="Day (Monday-Friday)" required>

            <input type="text" name="time" placeholder="Time (e.g., 10:00 AM - 11:00 AM)" required>

            <select name="faculty" required>
                <option value="">Select Faculty</option>
                <?php while ($row = mysqli_fetch_assoc($facultyResult)): ?>
                    <option value="<?php echo $row['name']; ?>"><?php echo $row['name']; ?></option>
                <?php endwhile; ?>
            </select>

            <input type="text" name="room" placeholder="Room Number" required>
</fieldset>
            <button type="submit" name="add">Add Timetable</button>
        
    </form>

    
</div>

</body>
</html>
