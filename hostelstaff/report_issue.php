<?php

include('con.php');

session_start();
if(!isset($_SESSION['warden_contact'])){
    header('Location: warden_login.php');
}

if(isset($_POST['submit'])){
    $issue = $_POST['issue'];
    $warden_contact = $_SESSION['warden_contact'];

    $insert = "INSERT INTO staff_issues (warden_contact, issue)
               VALUES ('$warden_contact', '$issue')";
    
    if(mysqli_query($conn, $insert)){
        echo "Issue Reported!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
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

        input, textarea {
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
<?php include('include/side.php'); ?>

<div class="form-container">
    <form method="POST" action="">
        <h1>Report Staff Issue</h1>

        <fieldset>
            <legend>Notice Details</legend>



    Describe Issue: <textarea name="issue"></textarea><br>
    <input type="submit" name="submit" value="Report">
</form>
</fieldset>
</form>
</div>

