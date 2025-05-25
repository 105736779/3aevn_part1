<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="AI, IT, IT Company, Computer, Aevina, Artificial Intelligence, Official, Login">
    <meta name="description" content="Aevina's Official Website Manager Login Page">
    <meta name="author" content="Aevina Team">
    <title>Manager Login</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body class="apply-body">
    <figure class="login-image-container">
        <!-- Image generated from ChatGPT -->
        <img src="images/login-image.png" alt="Login Background Image" id="login-background-image">
    </figure>
    <main class="login">
    <div class="auth-container">
        <!-- Back Arrow Box -->
        <!-- Image from: https://www.flaticon.com/free-icon/back_3114883?term=arrow&page=1&position=38&origin=search&related_id=3114883 -->
        <a href="manage.php" class="back-arrow-box">
            <img src="images/back-arrow.svg" alt="Back Arrow" title="Back to previous page" class="back-arrow-icon">
        </a>
        <article>
            <section>
                <h2>Login</h2>
                <?php
                require_once 'settings.php';

                // Check if user is locked out
                if (isset($_SESSION['lockout_time']) && time() < $_SESSION['lockout_time']) {
                    $remaining_time = $_SESSION['lockout_time'] - time();
                    echo "<p class='error-message'>You have been locked from logging in. Please try again in $remaining_time seconds.</p>";
                } else {
                    // Clear lockout if time has expired
                    if (isset($_SESSION['lockout_time']) && time() >= $_SESSION['lockout_time']) {
                        unset($_SESSION['lockout_time']);
                        unset($_SESSION['login_attempts']);
                    }

                    // Display general error or success messages
                    if (isset($_SESSION['error'])) {
                        $error_class = '';
                        if ($_SESSION['error'] === 'The username or email does not exist') {
                            $error_class = 'invalid-identifier'; // Class for username/email error
                        } elseif ($_SESSION['error'] === 'Incorrect password. Please try again.') {
                            $error_class = 'invalid-password'; // Class for password error
                        }
                        echo "<p class='error-message'>" . $_SESSION['error'] . "</p>";
                    }
                    if (isset($_SESSION['success'])) {
                        echo "<p class='success-message'>" . $_SESSION['success'] . "</p>";
                        unset($_SESSION['success']);
                    }
                ?>
                <form action="process_login.php" method="POST">
                    <div class="form-row">
                        <label for="login_identifier">Email or Username <span class="required">*</span></label>
                        <input type="text" id="login_identifier" name="login_identifier" required placeholder="Enter email or username" aria-required="true" class="<?php echo (isset($error_class) && $error_class === 'invalid-identifier') ? 'error-input' : ''; ?>">
                    </div>
                    <div class="form-row">
                        <label for="password">Password <span class="required">*</span></label>
                        <input type="password" id="password" name="password" required placeholder="Enter password" aria-required="true" class="<?php echo (isset($error_class) && $error_class === 'invalid-password') ? 'error-input' : ''; ?>">
                    </div>
                    <input type="submit" value="Login" <?php echo (isset($_SESSION['lockout_time']) && time() < $_SESSION['lockout_time']) ? 'disabled' : ''; ?>>
                </form>
                <p>Don't have an account? <a href="register.php" class="job-link">Register here</a></p>
                <?php
                    unset($_SESSION['error']); // Clear error after displaying
                }
                ?>
            </section>
        </article>
    </div>
    </main>
</body>
</html>