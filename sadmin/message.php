<?php
include 'con.php';



session_start();
if (!isset($_SESSION['admin_name'])) {
    header("Location: login.php"); // Redirect if not logged in
    exit();
}


// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date_posted = $conn->real_escape_string($_POST['date_posted']); // Admin-specified date
    $content = $conn->real_escape_string($_POST['content']); // Notice content

    $sql = "INSERT INTO schoolnotic (date_posted, content) VALUES ('$date_posted', '$content')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Notice added successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>	</title>
	<style >
		  .con2 {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
         .con2 h2 {
            text-align: center;
        }
         .con2  form {
            display: flex;
            flex-direction: column;
        }
        .con2  input, textarea {
            margin: 10px 0;
            padding: 10px;
            font-size: 16px;
        }
         .con2  button {
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            font-size: 18px;
            cursor: pointer;
            border-radius: 5px;
        }
        .con2  button:hover {
            background: #0056b3;
        }
	</style>
</head>
<body>

	 <?php include_once('include\side.php'); ?>

	 <div class="con2">
        <h2>Add Notice</h2>
        <form method="POST">
            <input type="date" name="date_posted" required> <!-- Date picker -->
            <textarea name="content" placeholder="Enter notice content" rows="5" required></textarea>
            <button type="submit">Add Notice</button>
        </form>
    </div>

</body>
</html>