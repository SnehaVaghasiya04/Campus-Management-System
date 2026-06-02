<?php
include 'con.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Check Complaint Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
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
            font-size: 42px;
            font-weight: bold;
            color: #003366;
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.7);
        }

        /* Breadcrumb */
        .banner1 {
            background-color: #003366;
            color: white;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .contain1 {
            font-size: 18px;
        }

        .contain1 a {
            color: white;
            text-decoration: none;
        }

        /* Form Section */
        .form-section {
            max-width: 600px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-section h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #003366;
        }

        fieldset {
            border: 2px solid #003366;
            padding: 20px;
            border-radius: 12px;
        }

        legend {
            font-size: 20px;
            font-weight: bold;
            color: #003366;
            padding: 0 10px;
        }

        .form-section label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .form-section input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }

        .form-section button {
            background-color: #003366;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            width: 100%;
        }

        .form-section button:hover {
            background-color: #0055a5;
        }

        /* Complaints Table */
        table {
            width: 90%;
            margin: 40px auto;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            overflow: hidden;
        }

        table th, table td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #003366;
            color: #fff;
            font-size: 18px;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #eef;
        }

        /* Added styles */
        .complaint-heading {
            text-align: center;
            margin-top: 40px;
            color: #003366;
            font-size: 28px;
        }

        .no-complaint-message {
            text-align: center;
            font-size: 20px;
            margin-top: 30px;
            color: #ff0000;
        }
    </style>
</head>
<body>

<?php include 'include/header1.php'; ?>

<section class="about-header1">
    <div class="about-image1">
        <h1>Complaint Answer</h1>
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="home.php">Home</a> &gt; Complaint Answer
        </div>
    </div>
</section>

<section class="form-section">
    <h2>Check Your Complaint Status</h2>
    <form method="POST">
        <fieldset>
            <legend>Admission Details</legend>
            <label for="admission_id">Enter Your Admission ID:</label>
            <input type="text" id="admission_id" name="admission_id" placeholder="Enter your Admission ID" required>
            <button type="submit" name="check_complaints">Check Complaints</button>
        </fieldset>
    </form>
</section>

<?php
if (isset($_POST['check_complaints'])) {
    $admission_id = $_POST['admission_id'];

    $result = mysqli_query($conn, "SELECT * FROM complaint_form WHERE admission_id = '$admission_id'");

    if (mysqli_num_rows($result) > 0) {
        echo "<h3 class='complaint-heading'>Your Complaints</h3>
        <table>
            <tr>
                <th>Issue Type</th>
                <th>Description</th>
                <th>Complaint Date</th>
                <th>Warden's Answer</th>
            </tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>{$row['issue_type']}</td>
                <td>{$row['description']}</td>
                <td>{$row['complaint_date']}</td>
                <td>" . ($row['answer'] ? nl2br($row['answer']) : '<em>Pending</em>') . "</td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo "<p class='no-complaint-message'>No complaints found for this Admission ID.</p>";
    }
}
?>

<?php include 'include/footer.php'; ?>

</body>
</html>
