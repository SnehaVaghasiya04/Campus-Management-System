<?php
include('con.php');

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $designation = $_POST['designation'];
    $qualification = $_POST['qualification'];

    $photo = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    move_uploaded_file($tmp_name, "../image/" . $photo);

    $insert = "INSERT INTO warden (name, photo, contact, designation, qualification)
               VALUES ('$name', '$photo', '$contact', '$designation', '$qualification')";
    
    if(mysqli_query($conn, $insert)){
        echo "<div class='success'>Warden Added Successfully!</div>";
    } else {
        echo "<div class='error'>Error: " . mysqli_error($conn) . "</div>";
    }
}
?>
<?php include ('include/side.php'); ?>

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
        }
</style>



    <div class="form-container">
    <form method="post" enctype="multipart/form-data">
        <h1>Add Warden</h1>

        <fieldset>
            <legend>Warden Details</legend>
    <label>Name:</label>
    <input type="text" name="name" required>

    <label>Photo:</label>
    <input type="file" name="photo" required>

    <label>Contact:</label>
    <input type="text" name="contact" required>

    <label>Designation:</label>
    <input type="text" name="designation" required>

    <label>Qualification:</label>
    <input type="text" name="qualification" required>
</fieldset>
<button type="submit" name="submit" >Add Warden</button>
    
</form>
</div>

