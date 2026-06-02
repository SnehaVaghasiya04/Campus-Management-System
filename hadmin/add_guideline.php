<?php
include('con.php');

if(isset($_POST['submit'])){
    $icon = $_POST['icon'];
    $guideline = $_POST['guideline'];
    mysqli_query($conn, "INSERT INTO visitor_guidelines (icon, guideline) VALUES ('$icon', '$guideline')");
    header("Location: admin_manage_guidelines.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Visitor Guideline</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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
</head>
<body>
    <?php  include ('include/side.php');?>
   

    <div class="form-container">
    <form method="POST" action="">
        <h1>Add New Visitor Guideline</h1>

        <fieldset>
            <legend>Visitor Details</legend>
    
        <label>Icon Class:</label>
        <input type="text" name="icon" placeholder="e.g. fas fa-user-shield" required>
        
        <label>Guideline:</label>
        <textarea name="guideline" placeholder="Enter guideline here..." required></textarea>
        </fieldset>
        <button type="submit" name="submit">Add Guideline</button>
   
    
</form>
</div>

</body>
</html>
