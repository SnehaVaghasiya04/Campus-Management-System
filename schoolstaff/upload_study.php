<?php
// Database connection
include 'con.php';



// Handle material upload (only admin)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['material_file'])) {
    $standard = $_POST['standard'];
    $stream = $_POST['stream'];
    $material_name = $_POST['material_name'];

    // Handle file upload
    $file_name = $_FILES['material_file']['name'];
    $file_tmp_name = $_FILES['material_file']['tmp_name'];
    $file_error = $_FILES['material_file']['error'];

    $upload_dir = 'image/'; // Changed to 'uploads/' for better organization
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true); // Ensure the folder exists
    }
    $file_destination = $upload_dir . basename($file_name);

    if ($file_error === 0) {
        if (move_uploaded_file($file_tmp_name, $file_destination)) {
            $sql = "INSERT INTO student_materials (standard, stream, material_name, material_link) 
                    VALUES ('$standard', '$stream', '$material_name', '$file_destination')";
            if ($conn->query($sql) === TRUE) {
                $message = "Material uploaded successfully!";
            } else {
                $message = "Error: " . $conn->error;
            }
        } else {
            $message = "Failed to upload the file.";
        }
    } else {
        $message = "There was an error uploading the file.";
    }
} else {
    $message = "Please select a file to upload.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Study Material</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .form-container {
            width: 75%;
            background: white;
            padding: 25px;
            margin: 50px auto;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin-top: 90px;
            margin-left: 260px;
        }

        h1 {
            color: #d35400;
            font-size: 22px;
            text-align: center;
        }

        fieldset {
            border: 1px solid #ccc;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        legend {
            font-size: 18px;
            font-weight: bold;
            color: #6c5ce7;
        }

        label {
            font-size: 14px;
            color: #555;
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }

        input, textarea, select {
           width: 97.5%;
            padding: 12px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
           
            font-size: 14px;
        }

         
        textarea {
            height: 100px;
            resize: none;
        }

        button {
            width: 100%;
            background: #6c5ce7;
            color: white;
            padding: 12px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-transform: uppercase;
            font-weight: bold;
        }

        button:hover {
            background: #4834d4;
        }
    </style>
</head>
<body>
<div class="form-container">
   <?php include_once('include2/side.php'); ?>

    <h1>Add Study Material</h1>
    <?php if (isset($message)): ?>
        <p class="message" style="color: red; text-align: center; font-weight: bold;">
            <?= htmlspecialchars($message); ?>
        </p>
    <?php endif; ?>
    <form method="POST" action="" enctype="multipart/form-data">
         <fieldset><lagend> study details</lagend>
        <label for="standard">Select Standard:</label>
        <select name="standard" id="standard" required>
            <option value="Nursery">Nursery</option>
            <option value="KG">KG</option>
            <?php for ($i = 1; $i <= 12; $i++): ?>
                <option value="<?= $i ?>">Class <?= $i ?></option>
            <?php endfor; ?>
        </select>

        <label for="stream">Select Stream (For Class 11-12 Only):</label>
        <select name="stream" id="stream">
            <option value="None">None</option>
            <option value="Science">Science</option>
            <option value="Commerce">Commerce</option>
            <option value="Arts">Arts</option>
        </select>

        <label for="material_name">Material Name:</label>
        <input type="text" name="material_name" id="material_name" required>

        <label for="material_file">Upload Material (File):</label>
        <input type="file" name="material_file" id="material_file" required>

        <button type="submit">📤 Add Material</button>
    </form>
</lagend>
</fieldset>
</div>
</body>
</html>