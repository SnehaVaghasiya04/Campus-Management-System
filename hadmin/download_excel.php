<?php
include 'con.php';

$date = $_GET['date'];
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=attendance_$date.xls");

echo "Date\tAdmission ID\tName\tSchool/College\tStatus\n";

$result = mysqli_query($conn, "
    SELECT a.date, s.admission_id, s.name, s.school_college, a.status 
    FROM hostel_attendance a 
    JOIN hostel_student s ON a.admission_id = s.admission_id 
    WHERE a.date = '$date'
");

while ($row = mysqli_fetch_assoc($result)) {
    echo "{$row['date']}\t{$row['admission_id']}\t{$row['name']}\t{$row['school_college']}\t{$row['status']}\n";
}
?>
