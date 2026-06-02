<?php
session_start();
include 'con.php';



// Fetch distinct standards
$standards = [];
$standard_query = "SELECT DISTINCT standard FROM class_timetables ORDER BY standard";
$standard_result = mysqli_query($conn, $standard_query);
while ($row = mysqli_fetch_assoc($standard_result)) {
    $standards[] = $row['standard'];
}

// Fetch unique time slots for the row headers
$time_slots = [];
$time_query = "SELECT DISTINCT start_time, end_time FROM class_timetables ORDER BY start_time";
$time_result = mysqli_query($conn, $time_query);
while ($row = mysqli_fetch_assoc($time_result)) {
    $time_slots[] = $row;
}

// Get search input for teacher name
$search_teacher = isset($_GET['teacher_name']) ? trim($_GET['teacher_name']) : '';

// Fetch timetable data with teacher names
$timetable_data = [];
$query = "SELECT c.*, s.name AS teacher_name 
          FROM class_timetables c
          LEFT JOIN staff s ON c.teacher_id = s.id";

if (!empty($search_teacher)) {
    $query .= " WHERE s.name LIKE ?";
}

$query .= " ORDER BY c.standard, FIELD(c.day, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'), c.start_time";

$stmt = $conn->prepare($query);

if (!empty($search_teacher)) {
    $search_param = "%$search_teacher%";
    $stmt->bind_param("s", $search_param);
}

$stmt->execute();
$result = $stmt->get_result();

while ($row = mysqli_fetch_assoc($result)) {
    $timetable_data[$row['standard']][$row['start_time']][$row['day']][] = $row;
}

$days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Timetable</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f3f4f6;
        }
        .container1 {
            background: #ffffff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            margin-top: 120px;
            width: 950px;
            margin-left: 200px;
            margin-right: auto;
        }
        h1 {
    font-size: 20px;
    font-weight: 700;
    color: black; /* Fix this */
   
    margin-bottom: 20px;
}
        .search-bar {
            display: flex;
            justify-content: right;
            margin-bottom: 20px;
        }
        .search-bar input {
            padding: 10px;
            width: 280px;
            border-radius: 6px;
            border: 1px solid #ced4da;
            margin-right: 8px;
        }
        .search-bar button {
            padding: 10px 15px;
            border-radius: 6px;
            background: #007bff;
            border: none;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s ease-in-out;
        }
        .search-bar button:hover {
            background: #0056b3;
        }
        table {
            width: 30%;
            background: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-collapse: collapse;

        }

        th {
            background: #007bff;
            color: white;
            text-align: center;
            padding: 12px;
            font-size: 16px;
        }
        td {
            padding: 12px;
            text-align: center;
            font-size: 14px;
            border-bottom: 1px solid #e9ecef;
        }
        tr:nth-child(even) {
            background: #f8f9fa;
        }
        tr:hover {
            background: #e2e6ea;
        }
        .timetable-cell {
            min-width: 140px;
        }
        .teacher-highlight {
            color: #d9534f;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            margin-top: 15px;
        }
        .subject-title {
            font-weight: bold;
            color: #2c3e50;
        }
        .teacher-name {
            font-size: 12px;
            color: #6c757d;
        }
    </style>
</head>
<body>

<?php include_once('include2/side.php'); ?>

<div class="container mt-4">
    <div class="container1">
        <fieldset>
            <legend><h1>All Standards Timetable</h1></legend>

            <!-- Search Form for Teacher -->
            <div class="search-bar">
                <form method="GET">
                    <input type="text" name="teacher_name" value="<?php echo htmlspecialchars($search_teacher); ?>" placeholder="Enter teacher name">
                    <button type="submit" class="btn btn-primary btn-sm">Search</button>
                </form>
            </div>

            <!-- Display Teacher Name if searched -->
            <?php if (!empty($search_teacher)) { ?>
                <h3 class="teacher-highlight">Showing timetable for: <span><?php echo htmlspecialchars($search_teacher); ?></span></h3>
            <?php } ?>

            <!-- Timetable Tables -->
            <?php foreach ($standards as $standard) { ?>
                <h2 class="mt-4"><?php echo strtoupper($standard); ?> Timetable</h2>

                <table >
                    <thead>
                        <tr>
                            <th>Time Slot</th>
                            <?php foreach ($days as $day) { echo "<th>$day</th>"; } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($time_slots as $slot) { ?>
                            <tr>
                                <td><?php echo "{$slot['start_time']} - {$slot['end_time']}"; ?></td>
                                <?php foreach ($days as $day) { ?>
                                    <td class="timetable-cell">
                                        <?php
                                        if (isset($timetable_data[$standard][$slot['start_time']][$day])) {
                                            foreach ($timetable_data[$standard][$slot['start_time']][$day] as $entry) {
                                                echo "<div class='subject-title'>{$entry['subject']}</div>";
                                                echo "<div class='teacher-name'>Teacher: {$entry['teacher_name']}</div><hr>";
                                            }
                                        } else {
                                            echo "—"; // Empty slot
                                        }
                                        ?>
                                    </td>
                                <?php } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </fieldset>
    </div>
</div>

</body>
</html>
