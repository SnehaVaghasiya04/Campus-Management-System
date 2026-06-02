<?php
// Start session for the student login
session_start();

// Check if student is logged in
if (!isset($_SESSION['student_id'])) {
  
}

// Include database connection
include('con.php');

// Get student ID from session
$student_id = $_SESSION['student_id'];

// Fetch attendance records for the student
$query = "SELECT * FROM attendance WHERE student_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $student_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Page</title>
</head>
<body>
    <h2>Attendance Record</h2>
    <table border="1">
        <tr>
            <th>Date</th>
            <th>Status</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['date']; ?></td>
            <td><?php echo $row['status']; ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php
// Close database connection
$conn->close();
?>
