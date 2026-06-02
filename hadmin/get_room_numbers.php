<?php
include 'con.php';

if (isset($_POST['room_type'])) {
    $room_type = $_POST['room_type'];
    $query = "SELECT room_no FROM room_number WHERE room_type='$room_type'";
    $result = mysqli_query($conn, $query);

    echo '<option value="">Select Room Number</option>';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row['room_no'] . '">' . $row['room_no'] . '</option>';
    }
}
?>
