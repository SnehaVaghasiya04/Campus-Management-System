<?php
include 'con.php';

// Fetch all unique classes (standards) from the exam_schedule table
$standards_query = mysqli_query($conn, "SELECT DISTINCT class FROM exam_schedule ORDER BY FIELD(
    class, 'Pre-Primary', 'Grade 1', 'Grade 2', 'Grade 3', 'Grade 4', 'Grade 5',
    'Grade 6', 'Grade 7', 'Grade 8', 'Grade 9', 'Grade 10',
    '11 Arts', '11 Commerce', '11 Science', '12 Arts', '12 Commerce', '12 Science'
)");

// Store standards in an array
$standards = [];
while ($row = mysqli_fetch_assoc($standards_query)) {
    $standards[] = $row['class'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Standard-wise Exam Schedule</title>
    <style>
       <style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f4f7fa;
        margin: 0;
        padding: 0;
        color: #333;
    }

    h1 {
        font-size: 42px;
        font-weight: 700;
        color: #003366;
        text-shadow: 2px 4px 10px rgba(0, 0, 0, 0.5);
        margin: 0;
    }

    h2 {
        font-size: 28px;
        color: #003452;
        margin-top: 50px;
        margin-bottom: 20px;
        padding: 10px 20px;
        display: inline-block;
        background: #e9f5ff;
        border-left: 5px solid #289cac;
        border-radius: 4px;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.1);
        animation: fadeIn 1.2s ease-in-out;
    }

    /* Hero Section */
    .about-image1 {
        background: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url("/campus_management/admin/images/17.jpg") center/cover no-repeat;
        height: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Breadcrumb */
    .banner1 {
        background-color: #003366;
        color: #fff;
        height: 60px;
        display: flex;
        align-items: center;
        padding-left: 550px;
        font-size: 18px;
    }

    .contain1 a {
        color: #ffffff;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .contain1 a:hover {
        color: #289cac;
    }

    /* Table */
    table {
        width: 90%;
        margin: 20px auto 30px auto;
        border-collapse: collapse;
        background-color: #ffffff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        border-radius: 12px;
        overflow: hidden;
        animation: fadeInUp 1.2s ease-in-out;
    }

    th, td {
        padding: 14px 16px;
        text-align: center;
        font-size: 16px;
    }

    th {
        background: linear-gradient(135deg, #004080, #0066cc);
               color: #ffffff;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #e3f6ff;
        transition: all 0.3s ease-in-out;
    }

    p {
        font-size: 18px;
        color: #555;
        margin-top: 10px;
    }

    /* Animation */
    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .banner1 {
            padding-left: 20px;
            justify-content: center;
        }

        table, th, td {
            font-size: 14px;
        }

        h1 {
            font-size: 32px;
        }

        h2 {
            font-size: 22px;
        }
    }
</style>

    </style>
</head>
<body>
      <?php include_once('include1/header2.php'); ?>
      <section class="about-header1">
    <div class="about-image1">
        <h1>Exam Schedule</h1>
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="shome.php">Home</a> &gt; Exam Schedule 
        </div>
    </div>
</section>
   

    <?php foreach ($standards as $standard) { 
        // Fetch exams for the current standard
        $exam_result = mysqli_query($conn, 
            "SELECT exam_schedule.*, staff.name AS teacher_name, staff.role AS teacher_role 
             FROM exam_schedule 
             LEFT JOIN staff ON exam_schedule.staff_id = staff.id 
             WHERE exam_schedule.class = '$standard'");
    ?>
        <h2><?= $standard; ?> Exam Schedule</h2>

        <?php if (mysqli_num_rows($exam_result) > 0) { ?>
            <table>
                <tr>
                    <th>Exam Name</th>
                    <th>Subject</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Assigned Teacher</th>
                    <th>Teacher Role</th>
                </tr>
                <?php while ($row = mysqli_fetch_assoc($exam_result)) { ?>
                    <tr>
                        <td><?= $row['exam_name']; ?></td>
                        <td><?= $row['subject']; ?></td>
                        <td><?= $row['exam_date']; ?></td>
                        <td><?= $row['exam_time']; ?></td>
                        <td><?= $row['teacher_name'] ?: 'Not Assigned'; ?></td>
                        <td><?= $row['teacher_role'] ?: 'N/A'; ?></td>
                    </tr>
                <?php } ?>
            </table>
        <?php } else { ?>
            <p>No exams scheduled for <?= $standard; ?>.</p>
        <?php } ?>
    <?php } ?>
<?php  include 'include1/footer.php';?>
</body>
</html>
