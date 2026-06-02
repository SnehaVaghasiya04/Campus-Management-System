<?php
// DB connection
include 'con.php';


session_start();
if (!isset($_SESSION['admin_name'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}



$limit = 5;  // Number of records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max(1, $page);  // Ensure the page number is at least 1
$start = ($page - 1) * $limit;  // Calculate the starting record for SQL query

// Add Student
if (isset($_POST['add_student'])) {
    $full_name = $_POST['full_name'];
    $dob = $_POST['dob'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $standard = $_POST['standard'];
    $stream = $_POST['stream'];

    // Generate a unique student ID (e.g., S2025001)
    $student_id = "S" . date("Y") . str_pad(rand(1, 999), 3, "0", STR_PAD_LEFT);

    // SQL query to insert data into the 'student' table
    $sql = "INSERT INTO student (student_id, full_name, dob, contact, email, address, standard, stream) 
            VALUES ('$student_id', '$full_name', '$dob', '$contact', '$email', '$address', '$standard', '$stream')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<p class='success-msg'>New student added successfully!</p>";
    } else {
        echo "<p class='error-msg'>Error: " . $conn->error . "</p>";
    }
}

// Delete Student
if (isset($_GET['delete_student'])) {
    $student_id = $_GET['delete_student'];
    
    $sql = "DELETE FROM student WHERE student_id='$student_id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "<p class='success-msg'>Student deleted successfully!</p>";
    } else {
        echo "<p class='error-msg'>Error: " . $conn->error . "</p>";
    }
}

// Get total number of students to calculate total pages
$totalQuery = "SELECT COUNT(*) as total FROM student";
$totalResult = $conn->query($totalQuery);
$totalRow = $totalResult->fetch_assoc();
$totalRecords = $totalRow['total'];
$totalPages = ceil($totalRecords / $limit);  // Total pages

// Adjust the query to fetch records for the current page
$sql = "SELECT * FROM student LIMIT $start, $limit";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="table.css">
</head>
<body>
    <?php include_once('include/side.php'); ?>

    <div class="container mt-4">
        <div class="container1">
            <fieldset>
                <legend><h1>Manage Students</h1></legend>

                <table>
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Student ID</th>
                            <th>Standard</th>
                            <th>Stream</th>
                            <th>Date of Birth</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><?= htmlspecialchars($row['full_name']); ?></td>
                                <td><?= htmlspecialchars($row['student_id']); ?></td>
                                <td><?= htmlspecialchars($row['standard']); ?></td>
                                <td><?= htmlspecialchars($row['stream'] ?: 'N/A'); ?></td>
                                <td><?= htmlspecialchars($row['dob']); ?></td>
                                <td><?= htmlspecialchars($row['address']); ?></td>
                                <td>
                                    <a href="edit_student.php?id=<?= $row['student_id']; ?>" class="edit-btn">✏️</a>
                                    <a href="?delete_student=<?= $row['student_id']; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this student?');">🗑️</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

                <!-- Pagination links -->
                <?php  include 'include/pagination.php'; ?>
                </div>
            </fieldset>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
