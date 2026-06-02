<?php include_once('include1/header2.php'); 
include 'con.php';

if (!isset($standard)) {
    die("Standard not specified.");
}

// Fetch timetable for the selected standard
$query = "SELECT * FROM class_timetables WHERE standard = '$standard' 
          ORDER BY FIELD(day, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'), start_time";
$result = $conn->query($query);

$timetable_by_day = [];

while ($row = $result->fetch_assoc()) {
    $timetable_by_day[$row['day']][] = $row;
} ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
<?php include_once('include1\header2.php'); ?>
<section class="about-header1">
    <div class="about-image1">
        <h1><?php echo "<h2>Timetable for Standard: $standard</h2>";?></h1>
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="shome.php">Home</a> &gt; Time table
        </div>
    </div>
</section>
</body>
</html>
<?php
// Display timetable

echo "<table class='timetable'>
        <thead>
            <tr>
                <th>Start Time</th>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
                <th>Saturday</th>
            </tr>
        </thead>
        <tbody>";

// Get all unique start times
$start_times = [];
foreach ($timetable_by_day as $entries) {
    foreach ($entries as $entry) {
        $start_times[] = $entry['start_time'];
    }
}
$start_times = array_unique($start_times);

foreach ($start_times as $start_time) {
    echo "<tr><td>{$start_time}</td>";

    foreach (['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'] as $day) {
        $subject = '';
        if (isset($timetable_by_day[$day])) {
            foreach ($timetable_by_day[$day] as $entry) {
                if ($entry['start_time'] == $start_time) {
                    $subject = $entry['subject'];
                    break;
                }
            }
        }
        echo "<td>{$subject}</td>";
    }

    echo "</tr>";
}

echo "</tbody></table>";
?>
<?php  include 'include1/footer.php';?>

<!-- CSS Styles for the Timetable -->
<style type="text/css">
    /* General Styles */
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #eef3f9;
        margin: 0;
        padding: 0;
        color: #222;
    }

    h2 {
        text-align: center;
        font-size: 32px;
        color: #003366;
        margin: 40px 0 20px;
        letter-spacing: 1px;
    }

    /* Timetable Table Styling */
    .timetable {
        width: 90%;
        margin: 40px auto 100px;
        border-collapse: separate;
        border-spacing: 0;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        overflow: hidden;
    }

    .timetable th {
        padding: 15px;
       background: linear-gradient(135deg, #004080, #0066cc);
        color: #fff;
        font-size: 18px;
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }

    .timetable td {
        padding: 15px;
        background-color: #fff;
        font-size: 16px;
        border-bottom: 1px solid #ddd;
        transition: background-color 0.3s ease;
    }

    .timetable tr:nth-child(even) td {
        background-color: #f7fbff;
    }

    .timetable tr:hover td {
        background-color: #dceeff;
    }

    .timetable td:first-child {
        font-weight: bold;
        color: #004d7a;
    }

    /* Responsive Design */
    @media screen and (max-width: 768px) {
        .timetable th, .timetable td {
            padding: 12px;
            font-size: 14px;
        }

        h2 {
            font-size: 26px;
        }
    }

    /* Header Section */
    .about-header1 {
        text-align: center;
       
    }

    .about-image1 {
        background:  url("/campus_management/admin/images/17.jpg") center/cover;
        height: 300px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .about-image1 h1 {
        font-size: 40px;
        font-weight: bold;
        color: #fff;
        text-shadow: 2px 4px 10px rgba(0, 0, 0, 0.6);
        padding: 0 20px;
    }

    /* Breadcrumb Banner */
    .banner1 {
        background-color: #003366;
        color: white;
        height: 55px;
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
        transition: color 0.3s;
    }

    .contain1 a:hover {
        color: #fff;
    }
</style>

