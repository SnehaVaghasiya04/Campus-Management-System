<?php

include 'con.php';

$today = date('Y-m-d');

// Check if today's attendance is already marked for College students
$checkAttendance = mysqli_query($conn, "SELECT * FROM hostel_attendance WHERE date = '$today' AND admission_id IN (SELECT admission_id FROM hostel_student WHERE school_college='School') LIMIT 1");
$attendanceMarked = mysqli_num_rows($checkAttendance) > 0;

if (isset($_POST['submit']) && !$attendanceMarked) {
    $date = $_POST['date'];
    $attendance = $_POST['attendance'];

    foreach ($attendance as $admission_id => $status) {
        mysqli_query($conn, "INSERT INTO hostel_attendance (admission_id, date, status) VALUES ('$admission_id', '$date', '$status')");
    }

    echo "<script>alert('school Attendance marked successfully!'); window.location.href='school_attendance.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>College Students Attendance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
       body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        } 
        .container1 {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 90px;
            margin-left: 180px;
            width:  1000px;
            margin-bottom:  30px;
        }
        h1 {
            font-size: 22px;
            font-weight: 600;
            color: #333;
        }
        .search-bar {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 10px;
        }
        .search-bar input {
            padding: 8px;
            width: 250px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        table {
            width: 100%;
            background: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        th {
            background:  #007bff;
            color: white;
            text-align: left;
            padding: 10px;
        }
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .faculty-img {
    width: 80px;  /* Adjust width as needed */
    height: 80px; /* Adjust height as needed */
    border-radius: 5px; /* Optional: Rounds corners */
    object-fit: cover; /* Ensures proper scaling */
}

        .action-btn {
            padding: 6px 10px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            display: inline-block;
        }
        .edit-btn {
            background: #28a745;
            color: white;
        }
        .delete-btn {
            background: #dc3545;
            color: white;
        }
        .edit-btn:hover {
            background: #218838;
        }
        .delete-btn:hover {
            background: #c82333;
        }
        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 10px;
        }
        .pagination a, .pagination span {
            padding: 8px 12px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            background: #007bff;
            color: white;
        }
        .pagination .disabled {
            background: #ddd;
            color: #666;
            pointer-events: none;
        }
    </style>
</head>
<body>

<?php include ('include/side.php'); ?>
<div class="container mt-4">
        <div class="container1">
            <fieldset>
                <legend><h1>Mark School Students Attendance</h1></legend>

   

    <?php if ($attendanceMarked): ?>
        <h3 style="color: green;">Today's attendance has already been marked!</h3>
    <?php else: ?>
        <div class="Search-bar">
        <form method="post">
            <label>Date:</label>
            <input type="date" name="date" value="<?= $today ?>" readonly required><br><br>
       

            <table>
                <tr>
                    <th>Admission ID</th>
                    <th>Name</th>
                    <th>Attendance</th>
                </tr>
                <?php
                $students = mysqli_query($conn, "SELECT admission_id, name FROM hostel_student WHERE school_college='School'");
                while ($row = mysqli_fetch_assoc($students)) {
                    echo "<tr>
                            <td>{$row['admission_id']}</td>
                            <td>{$row['name']}</td>
                            <td>
                                <input type='radio' name='attendance[{$row['admission_id']}]' value='Present' required> Present
                                <input type='radio' name='attendance[{$row['admission_id']}]' value='Absent'> Absent
                            </td>
                          </tr>";
                }
                ?>
            </table>
            <br>
            <button type="submit" name="submit" class="btn btn-primary btn-sm">Submit Attendance</button>
        </form>
    <?php endif; ?>
</div>
</fieldset>
</div>
</div>


</body>
</html>
