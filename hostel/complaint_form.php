<?php
include 'con.php';

$admission_id = $_POST['admission_id'] ?? '';
$valid_admission = false;

// Step 1: Check Admission ID
if (isset($_POST['check_admission'])) {
    if ($admission_id) {
        $check_sql = "SELECT * FROM hostel_student WHERE admission_id = '$admission_id'";
        $result = mysqli_query($conn, $check_sql);
        if (mysqli_num_rows($result) > 0) {
            $valid_admission = true;
        } else {
            echo "<script>alert('Admission ID Not Found!');</script>";
        }
    } else {
        echo "<script>alert('Please enter Admission ID.');</script>";
    }
}

// Step 2: Submit Complaint
if (isset($_POST['submit_complaint'])) {
    $admission_id = $_POST['admission_id'];
    $issue_type = $_POST['issue_type'];
    $description = $_POST['description'];

    $sql = "INSERT INTO complaint_form (admission_id, issue_type, description, complaint_date) 
            VALUES ('$admission_id', '$issue_type', '$description', NOW())";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Complaint Submitted Successfully!');</script>";
    } else {
        echo "<script>alert('Error submitting complaint.');</script>";
    }
    $valid_admission = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Complaint Form</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f4f7;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 40px auto;
            padding: 30px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        fieldset {
            border: 2px solid #003366;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        legend {
            font-size: 22px;
            font-weight: bold;
            color: #003366;
            padding: 0 10px;
        }
        h2 {
            text-align: center;
            color: #003366;
        }
        label {
            display: block;
            margin: 15px 0 5px;
            font-weight: bold;
        }
        input[type="text"],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            background: #f9f9f9;
        }
        textarea {
            resize: vertical;
            height: 120px;
        }
        button {
            width: 100%;
            padding: 12px;
            background: #003366;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            transition: background 0.3s;
        }
        button:hover {
            background: #00509e;
        }
        .info {
            background: #e0f7fa;
            padding: 15px;
            border: 1px solid #4dd0e1;
            border-radius: 8px;
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
            color: #006064;
        }
        .about-header1 {
            text-align: center;
            margin-bottom: 30px;
        }
        .about-image1 {
            background: url("/campus_management/admin/images/17.jpg") center/cover;
            height: 250px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .about-image1 h1 {
            font-size: 40px;
            color: #fff;
            text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.8);
        }
        .banner1 {
            background-color: #003366;
            padding: 15px;
            text-align: center;
            color: white;
            font-size: 20px;
        }
        .banner1 a {
            color: #ffcc00;
            text-decoration: none;
        }
    </style>
</head>
<body>

<section class="about-header1">
    <div class="about-image1">
        <h1>Complaint Form</h1>
    </div>
    <div class="banner1">
        <a href="home.php">Home</a> &gt; Complaint
    </div>
</section>

<?php include('include/header1.php'); ?>

<div class="container">
    <?php if (!$valid_admission && !isset($_POST['submit_complaint'])): ?>
        <fieldset>
            <legend>Verify Admission ID</legend>
            <form method="POST">
                <label>Admission ID:</label>
                <input type="text" name="admission_id" placeholder="Enter your Admission ID" required>
                <button type="submit" name="check_admission">Check Admission</button>
            </form>
        </fieldset>
    <?php endif; ?>

    <?php if ($valid_admission): ?>
        <div class="info">
            Verified Admission ID: <?php echo htmlspecialchars($admission_id); ?>
        </div>

        <fieldset>
            <legend>Submit Complaint</legend>
            <form method="POST">
                <input type="hidden" name="admission_id" value="<?php echo htmlspecialchars($admission_id); ?>">

                <label>Issue Type:</label>
                <select name="issue_type" required>
                    <option value="">-- Select Issue Type --</option>
                    <option value="Room Issue">Room Issue</option>
                    <option value="Water Issue">Water Issue</option>
                    <option value="Food Issue">Food Issue</option>
                    <option value="Other">Other</option>
                </select>

                <label>Description:</label>
                <textarea name="description" placeholder="Describe your issue..." required></textarea>

                <button type="submit" name="submit_complaint">Submit Complaint</button>
            </form>
        </fieldset>
    <?php endif; ?>
</div>

<?php include 'include/footer.php'; ?>
</body>
</html>
