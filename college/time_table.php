<?php
include("con.php");

// Fetch timetable data
$result = mysqli_query($conn, "SELECT * FROM ctimetable ORDER BY course, semester, FIELD(day, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday' ), time");

// Organize data into an array grouped by course and semester
$timetable = [];
while ($row = mysqli_fetch_assoc($result)) {
    $timetable[$row['course']][$row['semester']][$row['day']][] = $row;
}

// Define days of the week
$days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Timetable</title>
    <style>
     body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    background: #f4f8fb;
    color: #333;
}

/* Header Section */
.about-header1 {
    position: relative;
    text-align: center;
    color: white;
}

.about-image1 {
    background:  url("/campus_management/admin/images/17.jpg") center/cover;
    height: 300px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.about-image1 h1 {
    font-size: 42px;
    font-weight: 700;
    color: #003366;
    text-shadow: 3px 3px 10px rgba(0, 0, 0, 0.7);
}

/* Breadcrumb */
.banner1 {
    background-color: #003366;
    color: white;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    padding: 0 20px;
}

.banner1 a {
    color: #fff;
    text-decoration: none;
    transition: 0.3s;
}

.banner1 a:hover {
    text-decoration: underline;
}

/* Buttons */
.course-btn {
    padding: 12px 25px;
    margin: 15px;
    background: linear-gradient(135deg, #005a87, #003452);
    color: white;
    border: none;
    border-radius: 50px;
    font-size: 18px;
    cursor: pointer;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    transition: 0.3s ease;
}

.course-btn:hover {
    background: linear-gradient(135deg, #003452, #001f33);
    transform: translateY(-3px);
}

/* Tables */
/* Tables */
table {
    width: 95%;
    margin: 40px auto;
    border-collapse: separate;
    border-spacing: 0;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
    display: none;
    background: #ffffff;
    border: 1px solid #e0e0e0;
}

/* Table Headers */
th {
    padding: 18px;
    background: linear-gradient(135deg, #004d73, #003452);
    color: #fff;
    font-size: 18px;
    text-transform: uppercase;
    letter-spacing: 1px;
    border-right: 1px solid rgba(255, 255, 255, 0.2);
}

/* Last header no border */
th:last-child {
    border-right: none;
}

/* Table Cells */
td {
    padding: 18px;
    font-size: 16px;
    color: #333;
    background: #f9fcff;
    border-bottom: 1px solid #e0e0e0;
    border-right: 1px solid #e0e0e0;
    vertical-align: top;
}

/* Last column no right border */
td:last-child {
    border-right: none;
}

/* Last row no bottom border */
tr:last-child td {
    border-bottom: none;
}

/* Strong text inside cells */
td strong {
    color: #003452;
    font-weight: 600;
    display: block;
    margin-bottom: 5px;
}

/* Row Hover Effect */
table tr:hover td {
    background-color: #e6f3ff;
    transition: background-color 0.3s ease;
}

/* Responsive (optional improvement) */
@media (max-width: 768px) {
    table, th, td {
        font-size: 14px;
        padding: 12px;
    }
}

/* Active Table */
.active {
    display: table;
}

/* Heading */
h1[id^="heading-"] {
    display: block;
    margin-left: auto;
    margin-right: auto;
    text-align: center;
}


/* Responsive */
@media (max-width: 768px) {
    .course-btn {
        width: 90%;
        margin: 10px auto;
    }

    th, td {
        padding: 10px;
        font-size: 14px;
    }

    h1[id^="heading-"] {
    display: block;
    margin-left: auto;
    margin-right: auto;
}

}

    </style>
    <script>
        function showTable(id) {
            let tables = document.querySelectorAll("table");
            tables.forEach(table => table.style.display = "none"); // Hide all tables
            document.getElementById(id).style.display = "table"; // Show selected table
        }
    </script>
</head>
<body>
    <?php include('include2/add.php'); ?>
    <section class="about-header1">
    <div class="about-image1">
        <h1>Student Timetable</h1>
    </div>
    <div class="banner1">
        <div class="contain1">
            <a href="chome.php">Home</a> &gt; Time table
        </div>
    </div>
</section>
   

   

    <br><br>
 
    <!-- Generate tables -->
    <?php foreach ($timetable as $course => $semesters): ?>
        <?php foreach ($semesters as $semester => $daysData): ?>
            <h1 id="heading-<?php echo $course . '-' . $semester; ?>" style="display: none;"><?php echo "$course - Semester $semester"; ?></h1>
            <table id="<?php echo $course . '-' . $semester; ?>" <?php echo ($course === array_key_first($timetable) && $semester === array_key_first($semesters)) ? 'class="active"' : ''; ?>>
                <tr>
                    <th>Time</th>
                    <?php foreach ($days as $day): ?>
                        <th><?php echo $day; ?></th>
                    <?php endforeach; ?>
                </tr>
                <?php
                // Find all unique time slots
                $timeSlots = [];
                foreach ($daysData as $day => $subjects) {
                    foreach ($subjects as $subject) {
                        $timeSlots[$subject['time']] = true;
                    }
                }
                ksort($timeSlots);

                foreach (array_keys($timeSlots) as $time): ?>
                    <tr>
                        <td><?php echo $time; ?></td>
                        <?php foreach ($days as $day): ?>
                            <td>
                                <?php
                                if (isset($daysData[$day])) {
                                    foreach ($daysData[$day] as $subject) {
                                        if ($subject['time'] == $time) {
                                            echo "<strong>{$subject['subject']}</strong><br>{$subject['faculty_name']}<br>Room: {$subject['room_number']}";
                                        }
                                    }
                                }
                                ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endforeach; ?>
    <?php endforeach; ?>
     <!-- Generate buttons below heading -->
   
<div>
        <?php foreach ($timetable as $course => $semesters): ?>
            <?php foreach ($semesters as $semester => $daysData): ?>
                <button class="course-btn" onclick="showTable('<?php echo $course . '-' . $semester; ?>')">
                    <?php echo "$course - Semester $semester"; ?>
                </button>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </div>
    <script>
        function showTable(id) {
            let tables = document.querySelectorAll("table");
            let headings = document.querySelectorAll("h1[id^='heading-']");
            
            tables.forEach(table => table.style.display = "none"); // Hide all tables
            headings.forEach(heading => heading.style.display = "none"); // Hide all headings

            document.getElementById(id).style.display = "table"; // Show selected table
            document.getElementById("heading-" + id).style.display = "block"; // Show heading of selected table
        }
    </script>
    <?php  include 'include2/footer.php';?>
</body>
</html>
