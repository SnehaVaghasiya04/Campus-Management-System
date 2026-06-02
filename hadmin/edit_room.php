<?php
include('con.php'); // Database connection

// Check if 'id' is provided
if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo "Invalid room ID!";
    exit;
}

$room_id = $_GET['id'];

// Fetch room details
$query = "SELECT * FROM rooms WHERE id = $room_id";
$result = mysqli_query($conn, $query);
$room = mysqli_fetch_assoc($result);

if (!$room) {
    echo "Room not found!";
    exit;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $room_type = $_POST['room_type'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $capacity = $_POST['capacity'];
    $description = $_POST['description'];

    // Handle image upload
    if (!empty($_FILES['image']['name'])) {
        $image_name = time() . "_" . $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_folder = "image/" . $image_name;

        // Move new file and delete old image
        if (move_uploaded_file($image_tmp, $image_folder)) {
            unlink("image/" . $room['image']); // Delete old image
            $update_image = ", image = '$image_name'";
        } else {
            echo "Failed to upload image.";
            exit;
        }
    } else {
        $update_image = ""; // Keep the old image if no new one is uploaded
    }

    // Update room details
    $update_query = "UPDATE rooms SET 
        room_type = '$room_type', 
       
        capacity = '$capacity', 
        description = '$description' 
        $update_image WHERE id = $room_id";

    if (mysqli_query($conn, $update_query)) {
        echo "<script>alert('Room updated successfully!'); window.location='admin_manage_rooms.php';</script>";
    } else {
        echo "Error updating room: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Room</title>
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

        input, textarea {
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
    <form method="POST" action="" enctype="multipart/form-data">
        <h1>Edit Room</h1>

        <fieldset>
            <legend>Room Details</legend>



    <label>Room Type:</label>
    <input type="text" name="room_type" value="<?php echo $room['room_type']; ?>" required>

    

  
    <label>Description:</label>
    <textarea name="description" required><?php echo $room['description']; ?></textarea>

    <label>Current Image:</label>
    <br>
    <img src="image/<?php echo $room['image']; ?>" alt="Room Image">
    <br>

    <label>Upload New Image:</label>
    <input type="file" name="image" accept="image/*">

    <br><br></fieldset>
    <button type="submit">Update Room</button>
</form>
</div>

</body>
</html>
