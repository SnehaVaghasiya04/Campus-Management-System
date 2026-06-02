<?php
include 'con.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM hostel_student WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $school_college = $_POST['school_college'];
    $class = $_POST['class'];
   
    $room_type = $_POST['room_type'];
    $contact = $_POST['contact'];
    $guardian_name = $_POST['guardian_name'];
    $guardian_contact = $_POST['guardian_contact'];
   

    $sql = "UPDATE hostel_student SET name='$name', school_college='$school_college', class='$class', room_no='$room_no', room_type='$room_type', contact='$contact', guardian_name='$guardian_name', guardian_contact='$guardian_contact' WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "Student updated successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<style type="text/css">body {
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
<?php include('include/side.php'); ?>


<div class="form-container">
    <form method="POST" action="">
        <h1>Edit Student</h1>

        <fieldset>
            <legend>Student Details</legend>


    Name: <input type="text" name="name" value="<?= $row['name'] ?>"><br>
    School/College: <input type="text" name="school_college" value="<?= $row['school_college'] ?>"><br>
    Class: <input type="text" name="class" value="<?= $row['class'] ?>"><br>
   
    Room Type: <input type="text" name="room_type" value="<?= $row['room_type'] ?>"><br>
    Contact: <input type="text" name="contact" value="<?= $row['contact'] ?>"><br>
    Guardian Name: <input type="text" name="guardian_name" value="<?= $row['guardian_name'] ?>"><br>
    Guardian Contact: <input type="text" name="guardian_contact" value="<?= $row['guardian_contact'] ?>"><br>
  </fieldset>
  <button type="submit"> Update Student</button>
   
</form>
</div>

