<?php
include 'con.php';
if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $rule_text = $_POST['rule_text'];
    $query = "INSERT INTO girls_hostel_rules (title, rule_text) VALUES ('$title', '$rule_text')";
    mysqli_query($conn, $query);
    header("Location: manage_rules.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Hostel Rule</title>
    <link rel="stylesheet" href="style.css">
    <style>/* General Page Styling */
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
<?php include_once("include/side.php"); ?>
<div class="form-container">
    <h1>➕ Add New Hostel Rule</h1>
    
    <form method="POST" action="">
        

        <fieldset>
            <legend>Hostel Rules Details</legend>
   
        <label for="title">Rule Title:</label>
        <input type="text" name="title" id="title" required placeholder="Enter Rule Title">

        <label for="rule_text">Rule Description:</label>
        <textarea name="rule_text" id="rule_text" required placeholder="Enter Rule Description"></textarea>
</fieldset>
        <button type="submit" name="submit">Add Rule</button>
    </form>
</div>

</body>
</html>
