<?php
include '../DBConnection.php';
$conn = OpenCon();
session_start();

// Unset specific session variables
unset($_SESSION['user']); // Change 'user' to the actual session variable you want to unset

// Destroy the entire session
session_destroy();

// Prevent caching by setting appropriate headers
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Redirect to the login page
header("Location: login-page.php");
exit;
?>
