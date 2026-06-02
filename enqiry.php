<?php
include 'con.php';

$sql = "SELECT * FROM contact_form ORDER BY submitted_at DESC";
$result = $conn->query($sql);

echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Message</th>
            <th>Submitted At</th>
            <th>Actions</th>
        </tr>";

while($row = $result->fetch_assoc()) {
    echo "<tr>
            <td>".$row['id']."</td>
            <td>".$row['first_name']."</td>
            <td>".$row['last_name']."</td>
            <td>".$row['phone']."</td>
            <td>".$row['email']."</td>
            <td>".$row['message']."</td>
            <td>".$row['submitted_at']."</td>
            <td><a href='view_submission.php?id=".$row['id']."'>View</a> | 
                <a href='delete_submission.php?id=".$row['id']."'>Delete</a></td>
          </tr>";
}

echo "</table>";

$conn->close();
?>
