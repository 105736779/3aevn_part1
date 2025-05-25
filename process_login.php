<?php
session_start();
require_once 'settings.php'; // Include database connection settings

// Function to sanitise input
function sanitize_input($conn, $data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($conn, $data);
    return $data;
}

// Initialise login attempts if not set
if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}

$login_identifier = sanitize_input($conn, $_POST['login_identifier']);
$password = sanitize_input($conn, $_POST['password']);

// Check if user is locked out
if (isset($_SESSION['lockout_time']) && time() < $_SESSION['lockout_time']) {
    header("Location: login.php");
    exit();
}

// Query to check if the username or email exists
$query = "SELECT * FROM managers WHERE username = '$login_identifier' OR email = '$login_identifier'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0) {
    // Username or email does not exist
    $_SESSION['error'] = "The username/email does not exist";
    header("Location: login.php");
    exit();
}

// Fetch the user record
$user = mysqli_fetch_assoc($result);

// Verify password
if (password_verify($password, $user['password'])) {
    // Successful login
    $_SESSION['manager_id'] = $user['id']; // Changed from 'manager_id' to 'id'
    $_SESSION['first_name'] = $user['first_name'];
    $_SESSION['last_name'] = $user['last_name'];
    $_SESSION['email'] = $user['email'];
    unset($_SESSION['login_attempts']); // Reset login attempts on success    
    // Explicitly save the session before redirecting
    session_write_close();
    
    header("Location: manage.php");
    exit();
} else {
    // Incorrect password
    $_SESSION['login_attempts']++;
    if ($_SESSION['login_attempts'] >= 3) {
        // Lock the user out for 1 minute (60 seconds)
        $_SESSION['lockout_time'] = time() + 60; // Change the '60' to adjust lockout duration
        $_SESSION['error'] = "You have been locked from logging in. Please try again later";
        unset($_SESSION['login_attempts']); // Reset attempts after lockout
    } else {
        $_SESSION['error'] = "Incorrect password. Please try again.";
    }
    header("Location: login.php");
    exit();
}

mysqli_free_result($result);
mysqli_close($conn);
?>