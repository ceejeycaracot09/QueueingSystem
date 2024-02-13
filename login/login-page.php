<?php
session_start();
include '../DBConnection.php';

// Check if the user is already logged in
if (isset($_SESSION['id']) && $_SESSION['id'] > 0) {
    header("Location: ./");
    exit;
}

$conn = OpenCon();

if (isset($_GET['error'])) {
    echo '<center><p class="error">' . $_GET['error'] . '</p></center>';
}
?>