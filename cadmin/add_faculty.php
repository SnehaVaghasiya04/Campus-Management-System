<?php
include 'con.php';

session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $qualification = $_POST['qualification'];
    $field = $_POST['field'];
    $designation = $_POST['designation'];
    $experience = $_POST['experience'];
    $contact = $_POST['contact'];

    // Image Upload
    $image = $_FILES['image']['name'];
    $target = "image/" . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);

    $sql = "INSERT INTO faculty (name, email, phone, qualification, field, designation, experience, contact, image) 
            VALUES ('$name', '$email', '$phone', '$qualification', '$field', '$designation', '$experience', '$contact', '$image')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Faculty Added Successfully!'); window.location.href='manage_faculty.php';</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Faculty</title>
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
    
    </style>
</head>
<body>

<?php include_once('include/side.php'); ?>
<link rel="stylesheet" href="form.css">
<div class="form-container">
    <form method="POST" action="">
        
       
    <h1>Add Faculty</h1>

  
        <fieldset>
            <legend>Personal Information</legend>

            <label for="name">Name:</label>
            <input type="text" name="name" id="name" placeholder="Enter Name" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="Enter Email" required>

            <label for="phone">Phone:</label>
            <input type="text" name="phone" id="phone" placeholder="Enter Phone" required>

        </fieldset>

        <fieldset>
            <legend>Academic & Work Details</legend>

            <label for="qualification">Qualification:</label>
            <input type="text" name="qualification" id="qualification" placeholder="Enter Qualification" required>

            <label for="field">Field:</label>
            <select name="field" id="field" required>
                <option value="BCA">BCA</option>
                <option value="BCOM">BCOM</option>
                <option value="BBA">BBA</option>
                <option value="MSC IT">MSC IT</option>
            </select>

            <label for="designation">Designation:</label>
            <input type="text" name="designation" id="designation" placeholder="Enter Designation" required>

            <label for="experience">Experience (Years):</label>
            <input type="number" name="experience" id="experience" placeholder="Enter Experience" required>

        </fieldset>

        <fieldset>
            <legend>Contact & Image</legend>

            <label for="contact">Contact Details:</label>
            <input type="text" name="contact" id="contact" placeholder="Enter Contact Details" required>

            <label for="image">Upload Image:</label>
            <input type="file" name="image" id="image" required>

        </fieldset>

        <button type="submit" name="submit" class="submit-btn">Add Faculty</button>
    </form>

  
</div>

</body>
</html>
