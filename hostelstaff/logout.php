<?php
session_start();
session_unset();  // Unset all session variables
session_destroy(); // Destroy the session

// Redirect to login page with a success message
header("Location: warden_login.php?logout=success");
exit();
?>
