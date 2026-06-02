<?php
include 'con.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM hostel_student WHERE id=$id");
header("Location: view_student.php");
?>
