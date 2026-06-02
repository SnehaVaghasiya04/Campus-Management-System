<?php
// DB connection
include 'con.php';



session_start();
if (!isset($_SESSION['admin_name'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}


// Fetch student details to pre-fill the form
if (isset($_GET['id'])) {
    $student_id = $_GET['id'];

    // Fetch student data
    $sql = "SELECT * FROM student WHERE student_id='$student_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch student details from the database
        $student = $result->fetch_assoc();
    } else {
        echo "<p class='error-msg'>No student found with ID $student_id.</p>";
        exit;
    }
}

// Update student details
if (isset($_POST['update_student'])) {
    $full_name = $_POST['full_name'];
    $dob = $_POST['dob'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $standard = $_POST['standard'];
    $stream = $_POST['stream'];

    // SQL query to update student data
    $update_sql = "UPDATE student SET full_name='$full_name', dob='$dob', contact='$contact', email='$email', 
                   address='$address', standard='$standard', stream='$stream' WHERE student_id='$student_id'";

    if ($conn->query($update_sql) === TRUE) {
        echo "<p class='success-msg'>Student updated successfully!</p>";
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
    <title>Edit Student</title>
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

        input, textarea, select {
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
    <div class="container">
        <div class="form-container">
     <form method="POST" action="edit_student.php?id=<?= $student['student_id']; ?>">
        <h1>Edit Student Information</h1>

        <fieldset>
            <legend>Student Details</legend>
       

        <!-- Edit student form -->
       
            <div class="form-group">
                <label for="full_name">Full Name:</label>
                <input type="text" id="full_name" name="full_name" value="<?= htmlspecialchars($student['full_name']); ?>" required>
            </div>

            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" value="<?= htmlspecialchars($student['dob']); ?>" required>
            </div>

            <div class="form-group">
                <label for="contact">Contact Number:</label>
                <input type="text" id="contact" name="contact" value="<?= htmlspecialchars($student['contact']); ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($student['email']); ?>" required>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <textarea id="address" name="address" required><?= htmlspecialchars($student['address']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="standard">Standard:</label>
                <select name="standard" id="standard" required>
                    <option value="Pre-Primary" <?= $student['standard'] == 'Pre-Primary' ? 'selected' : ''; ?>>Pre-Primary</option>
                    <option value="Primary" <?= $student['standard'] == 'Primary' ? 'selected' : ''; ?>>Primary</option>
                    <option value="Standard 1" <?= $student['standard'] == 'Standard 1' ? 'selected' : ''; ?>>Standard 1</option>
                    <option value="Standard 2" <?= $student['standard'] == 'Standard 2' ? 'selected' : ''; ?>>Standard 2</option>
                    <option value="Standard 3" <?= $student['standard'] == 'Standard 3' ? 'selected' : ''; ?>>Standard 3</option>
                    <option value="Standard 4" <?= $student['standard'] == 'Standard 4' ? 'selected' : ''; ?>>Standard 4</option>
                    <option value="Standard 5" <?= $student['standard'] == 'Standard 5' ? 'selected' : ''; ?>>Standard 5</option>
                    <option value="Standard 6" <?= $student['standard'] == 'Standard 6' ? 'selected' : ''; ?>>Standard 6</option>
                    <option value="Standard 7" <?= $student['standard'] == 'Standard 7' ? 'selected' : ''; ?>>Standard 7</option>
                    <option value="Standard 8" <?= $student['standard'] == 'Standard 8' ? 'selected' : ''; ?>>Standard 8</option>
                    <option value="Standard 9" <?= $student['standard'] == 'Standard 9' ? 'selected' : ''; ?>>Standard 9</option>
                    <option value="Standard 10" <?= $student['standard'] == 'Standard 10' ? 'selected' : ''; ?>>Standard 10</option>
                    <option value="Standard 11" <?= $student['standard'] == 'Standard 11' ? 'selected' : ''; ?>>Standard 11</option>
                    <option value="Standard 12" <?= $student['standard'] == 'Standard 12' ? 'selected' : ''; ?>>Standard 12</option>
                </select>
            </div>

            <div class="form-group">
                <label for="stream">Stream (For Standard 11 & 12):</label>
                <select name="stream" id="stream">
                    <option value="Science" <?= $student['stream'] == 'Science' ? 'selected' : ''; ?>>Science</option>
                    <option value="Commerce" <?= $student['stream'] == 'Commerce' ? 'selected' : ''; ?>>Commerce</option>
                    <option value="Arts" <?= $student['stream'] == 'Arts' ? 'selected' : ''; ?>>Arts</option>
                </select>
            </div>

         </fieldset>   <button type="submit" name="update_student" class="btn">Update Student</button>
        </form>
    </div>

</body>
</html>
