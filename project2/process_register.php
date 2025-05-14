<?php
session_start();
require_once('settings.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $phone_number = trim($_POST['phone_number']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Store form data in session to repopulate the form on error
    $_SESSION['form_data'] = [
        'first_name' => $first_name,
        'last_name' => $last_name,
        'email' => $email,
        'phone_number' => $phone_number,
        'username' => $username
    ];

    // Server-side validation
    if (!preg_match("/^[A-Za-z\s]{1,20}$/", $first_name) || !preg_match("/^[A-Za-z\s]{1,20}$/", $last_name)) {
        $_SESSION['error'] = "First name and last name must contain only letters and spaces (max 20 characters).";
        header("Location: register.php");
        exit();
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Invalid email format.";
        header("Location: register.php");
        exit();
    }
    if (!preg_match("/^[0-9+\- ]{7,15}$/", $phone_number)) {
        $_SESSION['error'] = "Invalid phone number (7-15 digits with + or - allowed).";
        header("Location: register.php");
        exit();
    }
    if (strlen($password) < 8 || !preg_match("/[A-Z]/", $password) || !preg_match("/[!@#$%^&*]/", $password)) {
        $_SESSION['error'] = "Password must be at least 8 characters with 1 capital letter and 1 special character (!@#$%^&*).";
        header("Location: register.php");
        exit();
    }
    if ($password !== $confirm_password) {
        $_SESSION['error'] = "Registration failed. Please check your inputs.";
        $_SESSION['password_mismatch'] = true; // Set flag for password mismatch
        header("Location: register.php");
        exit();
    }

    // Check for duplicate email or username
    $stmt = $conn->prepare("SELECT email, username FROM managers WHERE email = ? OR username = ?");
    $stmt->bind_param("ss", $email, $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $_SESSION['error'] = "Email or username already exists.";
        header("Location: register.php");
        exit();
    }

    // Hash password and insert into database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO managers (first_name, last_name, email, phone_number, username, password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $first_name, $last_name, $email, $phone_number, $username, $hashed_password);

    if ($stmt->execute()) {
        // Clear form data on successful registration
        unset($_SESSION['form_data']);
        $_SESSION['success'] = "Registration successful! Redirecting to login...";
        header("Location: login.php");
        exit();
    } else {
        $_SESSION['error'] = "Registration failed. Please try again.";
        header("Location: register.php");
        exit();
    }
}

$stmt->close();
$conn->close();
?>