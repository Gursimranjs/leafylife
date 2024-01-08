<?php
session_start();

// Destroy all session data
session_unset();
session_destroy();

// Redirect to the login page or any other desired location
header("Location: index.php");
exit();
?>
