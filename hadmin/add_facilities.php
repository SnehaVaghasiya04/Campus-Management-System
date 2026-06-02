<?php
include('con.php');
if(isset($_POST['submit'])){
    $icon = $_POST['icon'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    mysqli_query($conn, "INSERT INTO hostel_facilities (icon, title, description) VALUES ('$icon', '$title', '$description')");
    echo "<script>alert('Facility Added Successfully');</script>";
}
?>
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
<?php  include 'include/side.php';?>
<div class="form-container">
    <form method="POST" action="">
        <h1>Add Hostel Facility</h1>

        <fieldset>
            <legend>Facility Details</legend>


    Icon (FontAwesome class): <input type="text" name="icon" placeholder="fa-solid fa-wifi" required><br><br>
    Title: <input type="text" name="title" required><br><br>
    Description:<br>
    <textarea name="description" required></textarea><br><br>
</fieldset>
<button type="submit" name="submit">Add facility</button>
    
</form>
</div>
