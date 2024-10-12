<?php
session_start();

// Check if a user is logged in
if (!isset($_SESSION['username'])) {
    // If not, check if there is a cookie
    if (isset($_COOKIE['username'])) {
        $_SESSION['username'] = $_COOKIE['username'];
    } else {
        header("Location: login.php"); // Redirect to login page
        exit();
    }
}

// Set a cookie to remember the user
if (isset($_SESSION['username'])) {
    setcookie("username", $_SESSION['username'], time() + (86400 * 30), "/"); // 30-day cookie
}

// Example: Display welcome message based on session
echo "Welcome, " . $_SESSION['username'];
?>
