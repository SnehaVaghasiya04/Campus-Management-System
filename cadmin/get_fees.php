<?php
include 'db.php';

$course = $_GET['course'];
$semester = $_GET['semester'];

$query = "SELECT tuition_fee, hostel_fee, transport_fee FROM college_fees WHERE course='$course' AND semester='$semester'";
$result = mysqli_query($conn, $query);
$fees = mysqli_fetch_assoc($result);

echo json_encode($fees);
?>
