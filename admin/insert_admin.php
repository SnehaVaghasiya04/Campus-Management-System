<?php
include 'con.php'; // Database connection

// Admin details
$admin_username = 'sneha';
$admin_password = password_hash('mds', PASSWORD_DEFAULT); // Hash password
$admin_name = 'Sneha Vaghasiya';
$admin_email = 'snehavaghasiya016@gmail.com';

// Insert query
$query = "INSERT INTO admin (username, password, name, email) 
          VALUES ('$admin_username', '$admin_password', '$admin_name', '$admin_email')";

if (mysqli_query($conn, $query)) {
    echo "Admin user added successfully!";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
