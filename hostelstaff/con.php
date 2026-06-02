<?php
// Database configuration
$servername = "localhost"; // Usually localhost
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "cmpus"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// Close the connection when done
?>