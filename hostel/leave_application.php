<?php
include 'con.php';

$admission_id = '';
$valid_admission = false;

// Step 1: Check Admission ID
if (isset($_POST['check_admission'])) {
    $admission_id = trim($_POST['admission_id']);
    if ($admission_id) {
        $check_sql = "SELECT * FROM hostel_student WHERE admission_id = '$admission_id'";
        $result = mysqli_query($conn, $check_sql);
        if (mysqli_num_rows($result) > 0) {
            $valid_admission = true;
        } else {
            echo "<script>alert('Admission ID Not Found!');</script>";
        }
    }
}

// Step 2: Submit Leave Application
if (isset($_POST['submit_leave'])) {
    $admission_id = trim($_POST['admission_id']);
    $reason = $_POST['reason'];
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];

    // Verify admission ID again to ensure it's valid
    $check_sql = "SELECT * FROM hostel_student WHERE admission_id = '$admission_id'";
    $result = mysqli_query($conn, $check_sql);
    if (mysqli_num_rows($result) > 0) {
        $sql = "INSERT INTO leave_application (admission_id, reason, from_date, to_date, applied_date) 
                VALUES ('$admission_id', '$reason', '$from_date', '$to_date', NOW())";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Leave Application Submitted!');</script>";
        } else {
            echo "<script>alert('Error submitting leave application.');</script>";
        }
        $valid_admission = true;
    } else {
        echo "<script>alert('Invalid Admission ID on submission!');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Leave Application</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f2f2f2;
        }
        .container {
            max-width: 700px;
            margin: 40px auto;
            background: #fff;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        label {
            font-weight: bold;
        }
        textarea, input, button {
            width: 100%;
            padding: 12px;
            margin-top: 8px;
            margin-bottom: 20px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 16px;
        }
        button {
            background: #003366;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
            padding: 12px;
        }
        button:hover {
            background: #003366;
        }
        .info {
            background: #e3f2fd;
            border: 1px solid #90caf9;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }
        /* Fieldset styling */
        .form-fieldset {
            border: 2px solid #003366;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            background: #f9f9f9;
            margin-top: 20px;
        }
        .form-fieldset legend {
            padding: 0 15px;
            font-size: 20px;
            font-weight: bold;
            color: #003366;
            background: #fff;
            border-radius: 5px;
            border: 1px solid #4CAF50;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }
        /* Header Section */
        .about-header1 {
            position: relative;
            text-align: center;
            color: black;
        }
        .about-image1 {
            background: url("/campus_management/admin/images/17.jpg") center center/cover;
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
        .banner1 {
            background-color: #003366;
            color: white;
            height: 60px;
            display: flex;
            align-items: center;
            padding-left: 550px;
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
<?php include ('include/header1.php'); ?>
<section class="about-header1">
    <div class="about-image1">
        <h1>Leave Application</h1>
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="home.php">Home</a> &gt; leave application
        </div>
    </div>
</section>

<div class="container">
    <?php if (!$valid_admission): ?>
        <form method="POST">
            <fieldset class="form-fieldset">
                <legend>Check Admission ID</legend>
                <label>Enter Admission ID:</label>
                <input type="text" name="admission_id" placeholder="Enter your Admission ID" required>
                <button type="submit" name="check_admission">Check</button>
            </fieldset>
        </form>
    <?php endif; ?>

    <?php if ($valid_admission): ?>
        <div class="info">
            Admission ID Verified: <?php echo htmlspecialchars($admission_id); ?>
        </div>

        <form method="POST">
            <fieldset class="form-fieldset">
                <legend>Leave Application Form</legend>
                <input type="hidden" name="admission_id" value="<?php echo htmlspecialchars($admission_id); ?>">

                <label>Reason:</label>
                <textarea name="reason" placeholder="Enter your reason for leave" required></textarea>

                <label>From Date:</label>
                <input type="date" name="from_date" required>

                <label>To Date:</label>
                <input type="date" name="to_date" required>

                <button type="submit" name="submit_leave">Submit Leave Application</button>
            </fieldset>
        </form>
    <?php endif; ?>
</div>
<?php include 'include/footer.php'; ?>
</body>
</html>
