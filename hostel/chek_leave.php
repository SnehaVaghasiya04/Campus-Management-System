<?php
include 'con.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Check Leave Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            
        }

        h2 {
            text-align: center;
            color: #333;
        }

        fieldset {
            width: 50%;
            margin: 20px auto;
            padding: 20px;
            border: 2px solid #003366;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        legend {
            font-size: 1.4em;
            font-weight: bold;
            color: #003366;
        }

        label, input, button {
            display: block;
            width: 100%;
            margin-top: 10px;
            font-size: 1em;
        }

        input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            padding: 10px;
            background-color: #003366;
            color: #fff;
            border: none;
            border-radius: 5px;
            margin-top: 15px;
            cursor: pointer;
        }

        button:hover {
            background-color: #003366;
        }

        .result {
            width: 50%;
            margin: 20px auto;
            padding: 20px;
            background-color: #e7f3fe;
            border-left: 5px solid #2196F3;
            border-radius: 5px;
        }

        .error {
            width: 50%;
            margin: 20px auto;
            padding: 15px;
            background-color: #f8d7da;
            color: #721c24;
            border-left: 5px solid #f44336;
            border-radius: 5px;
        }
         /* Header Section */
        .about-header1 {
            position: relative;
            text-align: center;
            color: black;
        }

        .about-image1 {
            background: url("/campus_management/admin/images/17.jpg")  center center/cover;
            height: 300px;
            display: flex;
            
            align-items: center;
            justify-content: center;
        }

        .about-image1 h1 {
            font-size: 36px;
            font-weight: bold;
            color: #003366;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
        }

        /* Banner */
        .banner1 {
            background-color: #003366;
            color: white;
            height: 60px;
            display: flex;
            align-items: center;
            padding: 0 20px;
        padding-left:   550px;
        }

        .contain1 {
            font-size: 20px;
        }

        .contain1 a {
            color: white;
            text-decoration: none;
        }

    </style>
</head>
<body>

<?php include ('include/header1.php');?>
<section class="about-header1">
    <div class="about-image1">
        <h1>Check Leave Application Status</h1>
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="home.php">Home</a> &gt; students
        </div>
    </div>
</section>


<fieldset>
    <legend>Enter Admission ID</legend>
    <form method="POST">
        <label for="admission_id">Admission ID:</label>
        <input type="text" name="admission_id" id="admission_id" required>
        <button type="submit" name="check_status">Check Status</button>
    </form>
</fieldset>

<?php
if (isset($_POST['check_status'])) {
    $admission_id = $_POST['admission_id'];

    $check_sql = "SELECT * FROM leave_application WHERE admission_id = '$admission_id' ORDER BY applied_date DESC LIMIT 1";
    $result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        echo "<div class='result'>
            <h3>Leave Application Details:</h3>
            <p><strong>Reason:</strong> {$row['reason']}</p>
            <p><strong>From:</strong> {$row['from_date']}</p>
            <p><strong>To:</strong> {$row['to_date']}</p>
            <p><strong>Status:</strong> <strong style='color:blue;'>{$row['leave_status']}</strong></p>
        </div>";
    } else {
        echo "<div class='error'>No application found for this Admission ID.</div>";
    }
}
?>
<?php  include 'include/footer.php';?>
</body>
</html>
