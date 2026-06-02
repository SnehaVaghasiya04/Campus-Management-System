<?php
// DB connection
include 'con.php';



session_start();
if (!isset($_SESSION['admin_name'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}

// Handle form submission
if (isset($_POST['add_student'])) {
    $full_name = $_POST['full_name'];
    $dob = $_POST['dob'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $standard = $_POST['standard'];
    $stream = $_POST['stream'];

    // Generate a unique student ID (e.g., S2025001)
    $student_id = "S" . date("Y") . str_pad(rand(1, 999), 3, "0", STR_PAD_LEFT);

    // SQL query to insert data into the 'student' table
    $sql = "INSERT INTO student (student_id, full_name, dob, contact, email, address, standard, stream) 
            VALUES ('$student_id', '$full_name', '$dob', '$contact', '$email', '$address', '$standard', '$stream')";
    
    // Execute the query and check if insertion was successful
    if ($conn->query($sql) === TRUE) {
        echo "<p class='success-msg'>New student added successfully!</p>";
    } else {
        echo "<p class='error-msg'>Error: " . $conn->error . "</p>";
    }
}

// Close the DB connection
$conn->close();
?>

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
 <?php include_once('include/side.php'); ?>

 <div class="form-container">
    <form method="POST" action="add_student.php">
        <h1>Add New Student</h1>

        <fieldset>
            <legend>Student Details</legend>
    
     
        
        <!-- Add student form -->
        
            <div class="form-group">
                <label for="full_name">Full Name:</label>
                <input type="text" id="full_name" name="full_name" required>
            </div>

            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" required>
            </div>

            <div class="form-group">
                <label for="contact">Contact Number:</label>
                <input type="text" id="contact" name="contact" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <textarea id="address" name="address" required></textarea>
            </div>

            <div class="form-group">
                <label for="standard">Standard:</label>
                <select name="standard" id="standard" required onchange="toggleStreamField()">
                    <option value="Pre-Primary">Pre-Primary</option>
                    <option value="Primary">Primary</option>
                    <option value="Standard 1">Standard 1</option>
                    <option value="Standard 2">Standard 2</option>
                    <option value="Standard 3">Standard 3</option>
                    <option value="Standard 4">Standard 4</option>
                    <option value="Standard 5">Standard 5</option>
                    <option value="Standard 6">Standard 6</option>
                    <option value="Standard 7">Standard 7</option>
                    <option value="Standard 8">Standard 8</option>
                    <option value="Standard 9">Standard 9</option>
                    <option value="Standard 10">Standard 10</option>
                    <option value="Standard 11">Standard 11</option>
                    <option value="Standard 12">Standard 12</option>
                </select>
            </div>

            <!-- Stream field (hidden by default) -->
            <div class="form-group" id="stream-field" style="display:none;">
                <label for="stream">Stream (For Standard 11 & 12):</label>
                <select name="stream" id="stream">
                    <option value="Science">Science</option>
                    <option value="Commerce">Commerce</option>
                    <option value="Arts">Arts</option>
                </select>
            </div>
</fieldset>
            <button type="submit" name="add_student" class="btn">Add Student</button>
        </form>
    </div>

    <script>
        // Function to show/hide the stream field based on standard selection
        function toggleStreamField() {
            var standard = document.getElementById("standard").value;
            var streamField = document.getElementById("stream-field");

            // Show the stream field only if standard is 11 or 12
            if (standard === "Standard 11" || standard === "Standard 12") {
                streamField.style.display = "block";
            } else {
                streamField.style.display = "none";
            }
        }
    </script>

</body>
</html>
