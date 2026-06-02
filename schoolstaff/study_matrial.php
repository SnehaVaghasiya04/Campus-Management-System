<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Study Material Access</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 350px;
        }
        h2 {
            color: #333;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            width: 100%;
        }
        button:hover {
            background-color: #218838;
        }
        .error {
            color: red;
        }
        .material-list {
            margin-top: 20px;
            text-align: left;
        }
        .material-list a {
            display: block;
            text-decoration: none;
            color: #007bff;
            margin: 5px 0;
            padding: 5px;
            border-radius: 5px;
            background: #f8f9fa;
        }
        .material-list a:hover {
            background: #e9ecef;
        }
    </style>
</head>
<body>

<?php include 'con.php'; // Database connection ?>

<div class="container">
    <h2>Access Study Material</h2>
    <form method="post">
        <input type="text" name="student_id" placeholder="Enter Student ID" required>
        <button type="submit">View Material</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $student_id = $_POST['student_id'];

        // Fetch student's class and stream
        $student_query = "SELECT class, stream FROM student WHERE id = '$student_id'";
        $result = mysqli_query($conn, $student_query);
        $student = mysqli_fetch_assoc($result);

        if ($student) {
            $class = $student['class'];
            $stream = $student['stream'];

            // Fetch study materials
            $material_query = "SELECT * FROM student_materials WHERE class = '$class' AND stream = '$stream'";
            $material_result = mysqli_query($conn, $material_query);
            
            echo "<h2>Study Materials for Class $class - Stream $stream</h2>";
            echo "<div class='material-list'>";
            if (mysqli_num_rows($material_result) > 0) {
                while ($row = mysqli_fetch_assoc($material_result)) {
                    echo "<a href='{$row['material_link']}' download>{$row['material_name']}</a>";
                }
            } else {
                echo "<p>No study materials available.</p>";
            }
            echo "</div>";
        } else {
            echo "<p class='error'>Invalid Student ID.</p>";
        }
    }
    ?>

</div>

</body>
</html>
