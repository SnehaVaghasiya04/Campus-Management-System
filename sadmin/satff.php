<?php



include 'con.php';



session_start();
if (!isset($_SESSION['admin_name'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}


if (isset($_POST['add_staff'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $qualification = $_POST['qualification'];
    $role = $_POST['role'];
    
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
    $upload_dir = "image/";
    move_uploaded_file($image_tmp, $upload_dir . $image_name);

    $query = "INSERT INTO staff (name, email, contact, qualification, role, image, date_added)
              VALUES ('$name', '$email', '$contact', '$qualification', '$role', '$image_name', NOW())";
    if (mysqli_query($conn, $query)) {
        echo "<div class='success'>Staff added successfully!</div>";
    } else {
        echo "<div class='error'>Error: " . mysqli_error($conn) . "</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Staff</title>
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
    <form method="POST" enctype="multipart/form-data">
        <h1>Add New Staff</h1>

        <fieldset>
            <legend>Staff Details</legend>
   
        
            <!-- Name and Email Side by Side -->
            <div class="form-row">
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required>
                </div>
            </div>

            <!-- Contact and Qualification Side by Side -->
            <div class="form-row">
                <div class="form-group">
                    <label for="contact">Contact:</label>
                    <input type="text" name="contact" id="contact" required>
                </div>
                <div class="form-group">
                    <label for="qualification">Qualification:</label>
                    <input type="text" name="qualification" id="qualification" required>
                </div>
            </div>

            <!-- Role Dropdown -->
            <div class="form-group">
                <label for="role">Role:</label>
                <select name="role" id="role" required>
                    <option value="Pre-Primary Staff">Pre-Primary Staff</option>
                    <option value="Primary Staff">Primary Staff</option>
                    <option value="Upper Primary Staff">Upper Primary Staff</option>
                    <option value="Secondary Staff">Secondary Staff</option>
                    <option value="Higher Secondary Science Staff">Higher Secondary Science Staff</option>
                    <option value="Higher Secondary Commerce Staff">Higher Secondary Commerce Staff</option>
                    <option value="Higher Secondary Arts Staff">Higher Secondary Arts Staff</option>
                </select>
            </div>

            <!-- Image Upload -->
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" name="image" id="image" required>
            </div>
</fieldset>
            <!-- Submit Button -->
            <button type="submit" name="add_staff">Add Staff</button>
        </form>
    

</form>
</body>
</html>
