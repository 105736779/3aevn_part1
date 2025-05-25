<?php
include 'header.inc';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Enhancements for Aevina AI Web Application">
    <meta name="keywords" content="Enhancements, Aevina, AI, IT Company, PHP, Features">
    <meta name="author" content="Aevina Team">
    <title>Enhancements</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body class="enhance-body">
    <main class="enhance-main">
        <section class="enhance-hero">
            <h1 class="enhance-title">Enhancements Overview</h1>
            <p class="enhance-subtitle">Discover the advanced features that make our web application more functional and secure using PHP.</p>
        </section>

        <section class="enhance-content">
            <div class="enhance-card">
                <h2 class="enhance-card-title">Manager Authentication System</h2>
                <p class="enhance-description">
                    The <strong>Manager Authentication System</strong> (implemented in <code>login.php</code>, <code>process_login.php</code>, <code>register.php</code>, and <code>process_register.php</code>) ensures secure access to the HR management page (<code>manage.php</code>). It includes user register, login with lockout mechanisms, and session management.
                </p>
                <details class="enhance-details">
                    <summary class="enhance-details-summary">How It Works</summary>
                    <div class="enhance-details-content">
                        <h3>Logic Behind It:</h3>
                        <ul>
                            <!-- suggested from GenAI to use the <code> element -->
                            <li><strong>Registration:</strong> Validates user inputs and checks for duplicates.</li>
                            <li><strong>Login:</strong> Verifies credentials with <code>password_verify()</code> and includes a lockout after 3 failed attempts.</li>
                            <li><strong>Session Management:</strong> Maintains user sessions securely.</li>
                        </ul>
                        <h3>Code Snippet:</h3>
                        <!-- suggested from GenAI to use the <pre> element -->
                        <pre class="code-snippet">
if (isset($_SESSION['lockout_time']) && time() < $_SESSION['lockout_time']) {
    header("Location: login.php");
    exit();
}
$_SESSION['login_attempts']++;
if ($_SESSION['login_attempts'] >= 3) {
    $_SESSION['lockout_time'] = time() + 60;
    $_SESSION['error'] = "Locked out for 60 seconds";
}
                        </pre>
                        <h4>Explanation:</h4>
                        <ul>
                            <li>Checks lockout status and increments failed attempts.</li>
                            <li>Locks out after 3 attempts for 60 seconds.</li>
                        </ul>
                        <h3>PHP vs HTML:</h3>
                        <ul>
                            <li><strong>HTML Limitation:</strong> Static HTML cannot handle user authentication or session management; it would require manual form submission without server-side validation.</li>
                            <li><strong>PHP Advantage:</strong> PHP processes form data, validates credentials, and manages sessions dynamically, adding security features like lockouts that HTML alone cannot achieve.</li>
                        </ul>
                    </div>
                </details>
            </div>

            <div class="enhance-card">
                <h2 class="enhance-card-title">EOI Management System</h2>
                <p class="enhance-description">
                    The <strong>EOI Management System</strong> in <code>manage.php</code> allows HR managers to list, search, delete, update, and sort Expressions of Interest (EOIs) dynamically.
                </p>
                <details class="enhance-details">
                    <summary class="enhance-details-summary">How It Works</summary>
                    <div class="enhance-details-content">
                        <h3>Logic Behind It:</h3>
                        <ul>
                            <li><strong>Search EOIs:</strong> Filters by job reference, first name, and last name.</li>
                            <li><strong>Delete EOIs:</strong> Deletes with confirmation.</li>
                            <li><strong>Update Status:</strong> Changes EOI status dynamically.</li>
                            <li><strong>Sort EOIs:</strong> Sorts by EOI number or status.</li>
                        </ul>
                        <h3>Code Snippet:</h3>
                        <pre class="code-snippet">
if (isset($_POST['Search'])) {
    $query = "SELECT * FROM $eoi_table WHERE ";
    $query .= "first_name LIKE '%$fname_search%'";
    $result = @mysqli_query($conn, $query);
    display_results($result);
}
                        </pre>
                        <h4>Explanation:</h4>
                        <ul>
                            <li>Builds a dynamic SQL query based on user input.</li>
                            <li>Executes the query and displays results.</li>
                        </ul>
                        <h3>PHP vs HTML:</h3>
                        <ul>
                            <li><strong>HTML Limitation:</strong> Static HTML can only display a fixed list of EOIs; it cannot search, delete, or update data dynamically.</li>
                            <li><strong>PHP Advantage:</strong> PHP interacts with a database to fetch, filter, and modify EOI data in real-time, providing interactive management features that HTML lacks.</li>
                        </ul>
                    </div>
                </details>
            </div>

            <div class="enhance-card">
                <h2 class="enhance-card-title">Data Validation and Sanitisation</h2>
                <p class="enhance-description">
                    The <strong>Data Validation and Sanitisation</strong> system (implemented across forms in <code>register.php</code>, <code>login.php</code>, and <code>manage.php</code>) ensures all user inputs are validated and sanitised to prevent SQL injection and XSS attacks.
                </p>
                <details class="enhance-details">
                    <summary class="enhance-details-summary">How It Works</summary>
                    <div class="enhance-details-content">
                        <h3>Logic Behind It:</h3>
                        <ul>
                            <li><strong>Input Validation:</strong> Checks for required fields and valid formats (e.g., email).</li>
                            <li><strong>Sanitisation:</strong> Uses <code>mysqli_real_escape_string()</code> and <code>htmlspecialchars()</code> to clean inputs.</li>
                            <li><strong>Error Handling:</strong> Displays user-friendly error messages for invalid inputs.</li>
                        </ul>
                        <h3>Code Snippet:</h3>
                        <pre class="code-snippet">
$email = mysqli_real_escape_string($conn, $_POST['email']);
$email = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = "Invalid email format";
}
                        </pre>
                        <h4>Explanation:</h4>
                        <ul>
                            <li>Escapes special characters and validates email format.</li>
                            <li>Prevents malicious code injection.</li>
                        </ul>
                        <h3>PHP vs HTML:</h3>
                        <ul>
                            <li><strong>HTML Limitation:</strong> HTML forms can collect input but cannot validate or sanitise data, leaving the application vulnerable to attacks.</li>
                            <li><strong>PHP Advantage:</strong> PHP processes and cleans input data server-side, ensuring security and data integrity that HTML cannot provide.</li>
                        </ul>
                    </div>
                </details>
            </div>

            <div class="enhance-card">
                <h2 class="enhance-card-title">Session Management and Security</h2>
                <p class="enhance-description">
                    The <strong>Session Management and Security</strong> system (implemented in <code>session_start()</code> and related files) enhances security by managing user sessions and protecting against session hijacking.
                </p>
                <details class="enhance-details">
                    <summary class="enhance-details-summary">How It Works</summary>
                    <div class="enhance-details-content">
                        <h3>Logic Behind It:</h3>
                        <ul>
                            <li><strong>Session Start:</strong> Initialises secure sessions with <code>session_start()</code>.</li>
                            <li><strong>Regeneration:</strong> Regenerates session IDs to prevent fixation.</li>
                            <li><strong>Timeout:</strong> Automatically logs out users after 30 minutes of inactivity.</li>
                        </ul>
                        <h3>Code Snippet:</h3>
                        <pre class="code-snippet">
session_start();
session_regenerate_id(true);
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 1800)) {
    session_destroy();
    header("Location: login.php");
}
$_SESSION['last_activity'] = time();
                        </pre>
                        <h4>Explanation:</h4>
                        <ul>
                            <li>Regenerates session ID for security.</li>
                            <li>Logs out after 30 minutes of inactivity.</li>
                        </ul>
                        <h3>PHP vs HTML:</h3>
                        <ul>
                            <li><strong>HTML Limitation:</strong> HTML cannot manage user sessions or enforce timeouts; it relies on client-side cookies without server-side control.</li>
                            <li><strong>PHP Advantage:</strong> PHP provides server-side session management, regenerating IDs and enforcing timeouts to enhance security beyond HTML's capabilities.</li>
                        </ul>
                    </div>
                </details>
            </div>
        </section>
    </main>

<?php
include 'footer.inc';
?>
</body>
</html>