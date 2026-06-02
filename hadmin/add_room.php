<?php
include 'con.php'; // Database Connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $room_type = $_POST['room_type'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $capacity = $_POST['capacity'];
    $description = $_POST['description'];

    // Image Upload
    $image = $_FILES['image']['name'];
    $target = "image/" . basename($image);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);

    // Insert into Database
    $sql = "INSERT INTO rooms (room_type, category, price, capacity, image, description) 
            VALUES ('$room_type', '$category', '$price', '$capacity', '$image', '$description')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Room Added Successfully'); window.location.href='admin_manage_rooms.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Room</title>
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

        input, textarea, select{
            width: 100%;
            padding: 12px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
           
            font-size: 14px;
        }


         input, textarea {
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

<?php include_once ('include/side.php'); ?>
<div class="form-container">
    <h1>Add Room</h1>
    
    <form method="POST" action="" enctype="multipart/form-data">
      

        <fieldset>
            <legend>Room Details</legend>
    
        <input type="text" name="room_type" placeholder="Room Type" required>
        
        <select name="category">
            <option value="School">School Girls</option>
            <option value="College">College Girls</option>
        </select>
        
        <input type="number" name="price" placeholder="Price" required>
        <input type="number" name="capacity" placeholder="Capacity" required>
        
        <label>Upload Image:</label>
        <input type="file" name="image" required>
        
        <textarea name="description" placeholder="Room Description"></textarea>
     </fieldset>   
        <button type="submit">Add Room</button>
    </form>
</div>

</body>
</html>
