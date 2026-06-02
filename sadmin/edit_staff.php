<?php
include 'con.php';


session_start();
if (!isset($_SESSION['admin_name'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}


$id = $_GET['id'];
$query = "SELECT * FROM staff WHERE id='$id'";
$result = mysqli_query($conn, $query);
$staff = mysqli_fetch_assoc($result);

if (isset($_POST['update_staff'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $qualification = $_POST['qualification'];
    $role = $_POST['role'];

    $updateQuery = "UPDATE staff SET 
                    name='$name', email='$email', contact='$contact', 
                    qualification='$qualification', role='$role' 
                    WHERE id='$id'";

    if (mysqli_query($conn, $updateQuery)) {
        echo "<script>alert('Staff updated successfully!');</script>";
        echo "<script>window.location.href = 'manage_staff.php';</script>";
    } else {
        echo "<script>alert('Failed to update staff.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Staff</title>
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
      <?php include_once('include\side.php'); ?>
   

        <div class="form-container">
    <form method="POST" action="">
        <h1>Edit Staff</h1>

        <fieldset>
            <legend>Staff Details</legend>
      
            <!-- Name and Email -->
            <div class="form-row">
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" name="name" value="<?php echo $staff['name']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" value="<?php echo $staff['email']; ?>" required>
                </div>
            </div>

            <!-- Contact and Qualification -->
            <div class="form-row">
                <div class="form-group">
                    <label>Contact:</label>
                    <input type="text" name="contact" value="<?php echo $staff['contact']; ?>" required>
                </div>
                <div class="form-group">
                    <label>Qualification:</label>
                    <input type="text" name="qualification" value="<?php echo $staff['qualification']; ?>" required>
                </div>
            </div>

            <!-- Role Dropdown -->
            <div class="form-group">
                <label>Role:</label>
                <select name="role" required>
                    <option value="Pre-Primary Staff" <?php if ($staff['role'] == 'Pre-Primary Staff') echo 'selected'; ?>>Pre-Primary Staff</option>
                    <option value="Primary Staff" <?php if ($staff['role'] == 'Primary Staff') echo 'selected'; ?>>Primary Staff</option>
                    <option value="Upper Primary Staff" <?php if ($staff['role'] == 'Upper Primary Staff') echo 'selected'; ?>>Upper Primary Staff</option>
                    <option value="Secondary Staff" <?php if ($staff['role'] == 'Secondary Staff') echo 'selected'; ?>>Secondary Staff</option>
                    <option value="Higher Secondary Science Staff" <?php if ($staff['role'] == 'Higher Secondary Science Staff') echo 'selected'; ?>>Higher Secondary Science Staff</option>
                    <option value="Higher Secondary Commerce Staff" <?php if ($staff['role'] == 'Higher Secondary Commerce Staff') echo 'selected'; ?>>Higher Secondary Commerce Staff</option>
                    <option value="Higher Secondary Arts Staff" <?php if ($staff['role'] == 'Higher Secondary Arts Staff') echo 'selected'; ?>>Higher Secondary Arts Staff</option>
                </select>
            </div>
</fieldset>
            <!-- Submit Button -->
            <button type="submit" name="update_staff">Update Staff</button>
        </form>
    </div>
</body>
</html>
