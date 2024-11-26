<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) 
{
    // User is not logged in, redirect to login page
    header("location: http://localhost/lgtc/login");
    exit; // Stop further script execution
}

?>