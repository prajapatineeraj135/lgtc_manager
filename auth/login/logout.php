<?php
session_start(); // Start the session
session_destroy(); // Destroy the session
header("Location: http://localhost/lgtc/login"); // Redirect to login page
exit;
?>