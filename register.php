<?php
session_start(); // Moved to the top
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Manager Registration Page">
    <meta name="keywords" content="Manager, Registration, Aevina, AI, IT Company">
    <meta name="author" content="Aevina Team">
    <title>Manager Registration</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
  <figure class="login-image-container">
    <!-- Image generated from ChatGPT -->
        <img src="images/login-image.png" alt="Login Background Image" id="login-background-image">
  </figure>
  <main class="register">
    <div class="auth-container">
      <!-- Back Arrow Box -->
      <!-- Image from: https://www.flaticon.com/free-icon/back_3114883?term=arrow&page=1&position=38&origin=search&related_id=3114883 -->
      <a href="login.php" class="back-arrow-box">
        <img src="images/back-arrow.svg" alt="Back Arrow" title="Back to previous page" class="back-arrow-icon">
      </a>
      <article>
        <section>
          <h2>Registration</h2>
          <?php
          require_once 'settings.php';

          // Check for general error messages
          if (isset($_SESSION['error'])) {
              echo "<p class='error-message'>" . $_SESSION['error'] . "</p>";
              unset($_SESSION['error']);
          }
          // Check for success messages
          if (isset($_SESSION['success'])) {
              echo "<p class='success-message'>" . $_SESSION['success'] . "</p>";
              unset($_SESSION['success']);
          }
          // Check for password mismatch error specifically
          $passwordMismatch = isset($_SESSION['password_mismatch']) ? true : false;
          if ($passwordMismatch) {
              unset($_SESSION['password_mismatch']);
          }
          ?>
          <form action="process_register.php" method="POST">
            <fieldset>
              <div class="form-row">
                <label for="first_name">First Name <span class="required">*</span></label>
                <input type="text" id="first_name" name="first_name" required maxlength="20" pattern="^[A-Za-z\s]{1,20}$"
                       placeholder="Enter your first name" aria-required="true"
                       value="<?php echo isset($_SESSION['form_data']['first_name']) ? htmlspecialchars($_SESSION['form_data']['first_name']) : ''; ?>">
              </div>
              <div class="form-row">
                <label for="last_name">Last Name <span class="required">*</span></label>
                <input type="text" id="last_name" name="last_name" required maxlength="20" pattern="^[A-Za-z\s]{1,20}$"
                       placeholder="Enter your last name" aria-required="true"
                       value="<?php echo isset($_SESSION['form_data']['last_name']) ? htmlspecialchars($_SESSION['form_data']['last_name']) : ''; ?>">
              </div>
              <div class="form-row">
                <label for="email">Personal Email <span class="required">*</span></label>
                <input type="email" id="email" name="email" required placeholder="Enter your email" aria-required="true"
                       value="<?php echo isset($_SESSION['form_data']['email']) ? htmlspecialchars($_SESSION['form_data']['email']) : ''; ?>">
              </div>
              <div class="form-row">
                <label for="phone_number">Phone Number <span class="required">*</span></label>
                <input type="tel" id="phone_number" name="phone_number" required maxlength="15" placeholder="Enter phone number" aria-required="true"
                       value="<?php echo isset($_SESSION['form_data']['phone_number']) ? htmlspecialchars($_SESSION['form_data']['phone_number']) : ''; ?>">
              </div>
              <div class="form-row">
                <label for="username">Username <span class="required">*</span></label>
                <input type="text" id="username" name="username" required maxlength="50" placeholder="Enter username" aria-required="true"
                       value="<?php echo isset($_SESSION['form_data']['username']) ? htmlspecialchars($_SESSION['form_data']['username']) : ''; ?>">
              </div>
              <div class="form-row">
                <label for="password">Password <span class="required">*</span></label>
                <input type="password" id="password" name="password" required 
                  pattern="^(?=.*[A-Z])(?=.*[!@#$%^&*])(?=.*[0-9]).{8,}$"
                  placeholder="Enter password" aria-required="true">
                <small class="small-description">Password must be at least 8 characters, include 1 capital letter, 1 number, and 1 special character (!@#$%^&*).</small>
              </div>
              <div class="form-row">
                <label for="confirm_password">Confirm Password <span class="required">*</span></label>
                <input type="password" id="confirm_password" name="confirm_password" required placeholder="Confirm password" aria-required="true"
                       class="<?php echo $passwordMismatch ? 'password-mismatch' : ''; ?>">
                <span class="password-error <?php echo $passwordMismatch ? 'active' : ''; ?>">Passwords do not match</span>
              </div>
            </fieldset>
            <input type="submit" value="Register">
          </form>
        </section>
      </article>
    </div>
  </main>
</body>
</html>