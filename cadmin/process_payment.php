<?php
include 'con.php';

session_start();
if (!isset($_SESSION['admin_username'])) {
    header("Location: login.php");
    exit();
}


if (isset($_POST['pay_fees'])) {
    $student_id = $_POST['student_id'];
    $course = $_POST['course'];
    $semester = $_POST['semester'];
    $amount = $_POST['amount'];
    $payment_method = $_POST['payment_method'];

    // Get student name from cstudents table
    $query_student = mysqli_query($conn, "SELECT name FROM cstudents WHERE student_id='$student_id'");
    
    if (mysqli_num_rows($query_student) > 0) {
        $student_row = mysqli_fetch_assoc($query_student);
        $student_name = $student_row['name'];

        // Insert payment record
        $query = "INSERT INTO payments (student_id, student_name, course, semester, amount, payment_method, payment_status) 
                  VALUES ('$student_id', '$student_name', '$course', '$semester', '$amount', '$payment_method', 'Paid')";

        if (mysqli_query($conn, $query)) {
            header("Location: view_paid_fees.php");
            exit();
        } else {
            echo "<p style='color:red;'>Error inserting payment: " . mysqli_error($conn) . "</p>";
        }
    } else {
        echo "<p style='color:red;'>Student ID not found!</p>";
    }
}
?>
