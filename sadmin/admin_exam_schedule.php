<?php
include 'con.php';

session_start();
if (!isset($_SESSION['admin_name'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}


// Fetch all staff members for the dropdown
$staffs = mysqli_query($conn, "SELECT * FROM staff");

// Handle form submission
if (isset($_POST['add_exam'])) {
    $exam_name = $_POST['exam_name'];
    $subject = $_POST['subject'];
    $class = $_POST['class'];
    $exam_date = $_POST['exam_date'];
    $exam_time = $_POST['exam_time'];
    $staff_id = $_POST['staff_id']; // Assign teacher

    $sql = "INSERT INTO exam_schedule (exam_name, subject, class, exam_date, exam_time, staff_id) 
            VALUES ('$exam_name', '$subject', '$class', '$exam_date', '$exam_time', '$staff_id')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Exam added successfully!');</script>";
    } else {
        echo "<script>alert('Error adding exam!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Exam Schedule</title>
</head>
<body>
    <h2>Add Exam Schedule</h2>

    <form method="POST">
        Exam Name: <input type="text" name="exam_name" required><br>
        Subject: <input type="text" name="subject" required><br>
        Class: <select name="class" required>
            <option value="Pre-Primary">Pre-Primary</option>
            <?php for ($i = 1; $i <= 10; $i++) echo "<option value='Grade $i'>Grade $i</option>"; ?>
            <option value="11 Arts">11 Arts</option>
            <option value="11 Commerce">11 Commerce</option>
            <option value="11 Science">11 Science</option>
            <option value="12 Arts">12 Arts</option>
            <option value="12 Commerce">12 Commerce</option>
            <option value="12 Science">12 Science</option>
        </select><br>
        Date: <input type="date" name="exam_date" required><br>
        Time: <input type="time" name="exam_time" required><br>
        Assign Teacher:
        <select name="staff_id" required>
            <option value="">Select Teacher</option>
            <?php while ($staff = mysqli_fetch_assoc($staffs)) { ?>
                <option value="<?= $staff['id']; ?>"><?= $staff['name']; ?> (<?= $staff['role']; ?>)</option>
            <?php } ?>
        </select><br>
        <button type="submit" name="add_exam">Add Exam</button>
    </form>

    <br>
    <a href="view_exam_schedule.php">View Exam Schedule</a> <!-- Link to view page -->
</body>
</html>
