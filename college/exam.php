<?php
include("con.php");

// Fetch all exam schedules
$result = mysqli_query($conn, 
    "SELECT e.id, e.course, e.semester, e.subject, e.exam_date, e.exam_time, e.venue, f.name AS supervisor_name 
    FROM cexam_schedule e 
    JOIN faculty f ON e.supervisor_id = f.id 
    ORDER BY e.exam_date ASC"
);

$exam_data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $exam_data[$row['course']][$row['semester']][] = $row;
}

$courses = [
    "BCom" => [2, 4, 6],
    "BBA" => [2, 4, 6],
    "BCA" => [2, 4],
    "MSc IoT" => [2, 4]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Exam Schedule</title>
    <style>
        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f4f9ff;
        }
        h1, h2 {
            color: #003366;
        }
        .about-header1 {
            position: relative;
            text-align: center;
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
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
        }
        .banner1 {
            background-color: #003366;
            color: white;
            padding: 15px;
            text-align: center;
        }
        .banner1 a {
            color: white;
            text-decoration: none;
        }
        .button-container {
            margin: 40px 0;
            text-align: center;
        }
        .button {
            padding: 12px 20px;
            margin: 8px;
            background: linear-gradient(135deg, #00557a, #003452);
            color: white;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        .button:hover {
            background: linear-gradient(135deg, #007cae, #004060);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .table-heading {
            width: 90%;
            margin: 40px auto 10px;
            padding: 20px;
            background: linear-gradient(135deg, #003366, #00557a);
            color: #fff;
            text-align: center;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            display: none;
        }
        .table-heading h2 {
            margin: 0;
            font-size: 26px;
            font-weight: 600;
            letter-spacing: 1px;
            color: white;
        }
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            display: none;
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #e6e6e6;
        }
        th {
            background: #003452;
            color: white;
            font-size: 18px;
        }
        tr:hover {
            background-color: #f0f8ff;
        }
        @media screen and (max-width: 768px) {
            .about-image1 h1 { font-size: 30px; }
            .button { font-size: 14px; padding: 10px 16px; }
            th, td { padding: 10px; }
        }
    </style>
    <script>
        function showTable(id) {
            document.querySelectorAll(".exam-table").forEach(table => table.style.display = "none");
            document.querySelectorAll(".table-heading").forEach(heading => heading.style.display = "none");
            document.getElementById(id).style.display = "table";
            document.getElementById(id + "-heading").style.display = "block";
            window.scrollTo({ top: document.getElementById(id + "-heading").offsetTop - 100, behavior: 'smooth' });
        }
    </script>
</head>
<body>
<?php include('include2/add.php'); ?>

<section class="about-header1">
    <div class="about-image1">
        <h1>Exam Schedule</h1>
    </div>
    <div class="banner1">
        <a href="chome.php">Home</a> &gt; Exam Schedule
    </div>
</section>

<!-- Dynamic Headings and Tables -->
<?php foreach ($courses as $course => $semesters): ?>
    <?php foreach ($semesters as $semester): ?>
        <?php if (!empty($exam_data[$course][$semester])): ?>
            <div id="<?= $course . $semester; ?>-heading" class="table-heading">
                <h2><?= $course . " - Semester " . $semester; ?> Exam Schedule</h2>
            </div>
            <table id="<?= $course . $semester; ?>" class="exam-table">
                <tr>
                    <th>ID</th>
                    <th>Course</th>
                    <th>Semester</th>
                    <th>Subject</th>
                    <th>Exam Date</th>
                    <th>Exam Time</th>
                    <th>Venue</th>
                    <th>Supervisor</th>
                </tr>
                <?php foreach ($exam_data[$course][$semester] as $exam): ?>
                    <tr>
                        <td><?= $exam['id']; ?></td>
                        <td><?= $exam['course']; ?></td>
                        <td><?= $exam['semester']; ?></td>
                        <td><?= $exam['subject']; ?></td>
                        <td><?= $exam['exam_date']; ?></td>
                        <td><?= $exam['exam_time']; ?></td>
                        <td><?= $exam['venue']; ?></td>
                        <td><?= $exam['supervisor_name']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endforeach; ?>

<!-- Buttons -->
<div class="button-container">
    <?php foreach ($courses as $course => $semesters): ?>
        <?php foreach ($semesters as $semester): ?>
            <?php if (!empty($exam_data[$course][$semester])): ?>
                <button class="button" onclick="showTable('<?= $course . $semester; ?>')">
                    <?= $course . " - Semester " . $semester; ?>
                </button>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endforeach; ?>
</div>

<script>
    let firstTable = document.querySelector(".exam-table");
    let firstHeading = document.querySelector(".table-heading");
    if (firstTable) firstTable.style.display = "table";
    if (firstHeading) firstHeading.style.display = "block";
</script>

<?php include 'include2/footer.php'; ?>
</body>
</html>
