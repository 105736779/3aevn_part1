<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="HR, EOI, Management">
    <meta name="description" content="HR Manager - Manage Expressions of Interest">
    <link rel="stylesheet" href="styles/styles.css">
    <title>HR Manager</title>
</head>
<body class="apply-body">
    <?php
    require_once 'settings.php';

    // Check if user is authenticated
    if (!isset($_SESSION['manager_id'])) {
        // If not authenticated, show only the authentication message and login link
        echo '<figure class="error-image-container">';
        // Image generated from ChatGPT
        echo '<img src="images/error-image.png" alt="Background Image" id="error-image">';
        echo '</figure>';
        echo '<div class="auth-message-container">';
        echo '<div class="auth-message">';
        echo '<p><strong>Authentication</strong> is required to access this page.</p>';
        echo '<p><a href="login.php">Login here</a> <strong>OR</strong> <a href="index.php">Return to Homepage</a></p>';
        echo '</div>';
        echo '</div>';
    } else {
        // If authenticated, show the full content
        if (isset($_POST['logout'])) {
            session_destroy();
            header("Location: login.php");
            exit();
        }

        ?>
        <h1 class="manage-title">HR Manager - Manage Expressions of Interest</h1>
        <main class="manage-container">
            <section class="sort">
                <div class="manager-info">
                    <form method="POST" class="manage-form">
                        <fieldset>
                            <legend>Logged in as:</legend>
                            <p><?php echo htmlspecialchars($_SESSION['first_name'] . ' ' . $_SESSION['last_name']); ?></p>
                            <p><?php echo htmlspecialchars($_SESSION['email']); ?></p>
                            <input type="submit" name="logout" value="Logout" class="manage-btn-delete">
                        </fieldset>
                    </form>
                </div>
                <!-- Form for listing EOIs by applicant name -->
                <div class="sort-options">
                    <form action="manage.php" method="post" class="manage-form">
                        <fieldset>
                            <legend><h2 class="manage-form-title">List EOIs</h2></legend>
                            <?php
                            // Get all job reference numbers
                            $query = "SELECT job_reference FROM job";
                            $result = @mysqli_query($conn, $query) or die("<p class='error-message'>Unable to find the Job Reference Numbers</p>");
                            echo '<label for="job_search">Job Reference Number:</label>';
                            echo '<select name="job_search" id="job_search" class="form-input">';
                            echo '<option value="all">All</option>'; // Default option
                            
                            while ($row = mysqli_fetch_assoc($result)) {
                                $ref = htmlspecialchars($row['job_reference']);
                                echo "<option value=\"$ref\">$ref</option>";
                            }
                            
                            echo '</select>';
                            
                            mysqli_free_result($result);
                            ?>
                            <label class="label" for="first_name">First Name:</label>
                            <input type="text" id="first_name" name="first_name" pattern="[A-Za-z ]{1,20}" title="Max 20 alpha characters" class="form-input">
                            <label class="label" for="last_name">Last Name:</label>
                            <input type="text" id="last_name" name="last_name" pattern="[A-Za-z ]{1,20}" title="Max 20 alpha characters" class="form-input">
                            <div class="form-buttons">
                                <input type="submit" name="Search" value="Search" class="manage-btn">
                                <input type="submit" name="Delete_EOI" value="Delete" class="manage-btn-delete" onclick="return confirm('Are you sure you want to delete all EOIs for this job reference?');">
                            </div>
                        </fieldset>
                    </form>
                    <!-- Form for updating EOI status -->
                    <form action="manage.php" method="post" class="manage-form">
                        <fieldset>
                            <legend><h2 class="manage-form-title">Change EOI Status</h2></legend>
                            <label for="eoi_number">EOI Number:</label>
                            <input type="number" id="eoi_number" name="eoi_number" required class="form-input">
                            <label for="status">New Status:</label>
                            <select id="status" name="status" required class="form-input">
                                <option value="New">New</option>
                                <option value="Current">Current</option>
                                <option value="Final">Final</option>
                            </select>
                            <div class="form-buttons">
                                <input type="submit" name="update_status" value="Update Status" class="manage-btn">
                            </div>
                        </fieldset>
                    </form>
                    <form action="manage.php" method="post" class="manage-form">
                        <fieldset>
                            <legend><h2 class="manage-form-title">Sort the Order</h2></legend>
                            <div>
                                <label for="sort_field">Sort by:</label>
                                <select id="sort_field" name="sort_field" class="form-input">
                                    <option value="EOInumber">EOI Number</option>
                                    <option value="Status">Status</option>
                                </select>
                            </div>
                            <div>
                                <label for="order_field">Order:</label>
                                <select id="order_field" name="order_field" class="form-input">
                                    <option value="Ascending">Ascending</option>
                                    <option value="Descending">Descending</option>
                                </select>
                            </div>
                            <div class="form-buttons">
                                <input type="submit" name="sort_order" value="Apply Filter" class="manage-btn">
                            </div>
                        </fieldset>
                    </form>
                </div>
            </section>
            <?php
            $back_btn = "<div class=\"back-btn-container\"><a href=\"./manage.php\" class=\"back-btn\"><strong>Back to Manage Page</strong></a></div>";
            function sanitize_input($conn, $data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                $data = mysqli_real_escape_string($conn, $data);
                return $data;
            }

            function display_results($result)
            {
                if (mysqli_num_rows($result) == 0) {
                    echo "<p class='error-message'>No records found.</p>";
                    return;
                }
            
                echo "<div class='table-container'><table class='eoi-table'><tr>";
                $headers = [
                    "EOI", "Job Reference", "First Name", "Last Name", "DoB", "Gender",
                    "Address", "Suburb", "State", "Postcode", "Email", "Phone",
                    "Skill", "Degree", "Other Skills", "Status"
                ];
                foreach ($headers as $h) echo "<th>$h</th>";
                echo "</tr>";
                
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                        <td>{$row['EOInumber']}</td>
                        <td>{$row['job_ref']}</td>
                        <td>{$row['first_name']}</td>
                        <td>{$row['last_name']}</td>
                        <td>{$row['dob']}</td>
                        <td>{$row['gender']}</td>
                        <td>{$row['street_address']}</td>
                        <td>{$row['suburb']}</td>
                        <td>{$row['state']}</td>
                        <td>{$row['postcode']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['skills']}</td>
                        <td>{$row['degree']}</td>
                        <td>{$row['other_skills']}</td>
                        <td>{$row['status']}</td>
                    </tr>";
                }
                echo "</table></div>";
            }
            $eoi_table = "eoi";
            if (isset($_POST['Search'])) {
                $query = "SELECT * FROM $eoi_table";
                $fname_search = sanitize_input($conn, $_POST['first_name']);
                $lname_search = sanitize_input($conn, $_POST['last_name']);
                $job_search = $_POST['job_search'];
                if ($fname_search != "" || $lname_search != "" || $job_search != "all") {
                    $query .= " WHERE ";
                    if ($fname_search != "") {
                        $query .= "first_name LIKE '%$fname_search%' AND ";
                    }
                    if ($lname_search != "") {
                        $query .= "last_name LIKE '%$lname_search%' AND ";
                    }
                    if ($job_search != "all") {
                        $query .= "job_ref = '$job_search' AND ";
                    }
                    $query = substr($query, 0, -5);
                }
                $result = @mysqli_query($conn, $query) or die("<p class='error-message'>Failed to execute query</p> $back_btn");
                display_results($result);
                mysqli_free_result($result);
            }
            if (isset($_POST['Delete_EOI'])) {
                $job_ref = sanitize_input($conn, $_POST['job_search']);
                $fname = sanitize_input($conn, $_POST['first_name']);
                $lname = sanitize_input($conn, $_POST['last_name']);
            
                $query = "DELETE FROM $eoi_table WHERE ";
                $conditions = [];
                if ($job_ref == "all") {
                    echo "<p class='error-message'>Please select a specific job reference number to delete its EOIs.</p>";
                } else {
                    $conditions[] = "job_ref = '$job_ref'";
                }
            
                if (!empty($fname)) {
                    $conditions[] = "first_name LIKE '%$fname%'";
                }
            
                if (!empty($lname)) {
                    $conditions[] = "last_name LIKE '%$lname%'";
                }
                
                if (count($conditions) === 0) {
                    echo "<p class='error-message'>Please provide at least one filter (job, first name, or last name) to delete EOIs.</p>";
                } else {
                    $query .= implode(" AND ", $conditions);
                    $result = @mysqli_query($conn, $query) or die("<p class='error-message'>Failed to delete EOIs</p> $back_btn");
                    
                    if (mysqli_affected_rows($conn) > 0) {
                        echo "<p class='success-message'>Matching EOIs were successfully deleted.</p>";
                    } else {
                        echo "<p class='error-message'>No matching EOIs found to delete.</p>";
                    }
                }
            }

            if (isset($_POST['update_status'])) {
                $eoi_number = mysqli_real_escape_string($conn, $_POST['eoi_number']);
                $new_status = mysqli_real_escape_string($conn, $_POST['status']);
                $query = "UPDATE eoi SET status = '$new_status' WHERE EOInumber = '$eoi_number'";
                if (mysqli_query($conn, $query)) {
                    $result = "Status of EOI #$eoi_number updated to '$new_status'.";
                } else {
                    $result = "Error updating status: " . mysqli_error($conn);
                }
                if (isset($result)) echo "<p class='success-message'>$result</p>";
            }

            if (isset($_POST['sort_order'])) {
                $sort_field = $_POST['sort_field'];
                $order_field = $_POST['order_field'];
        
                $allowed_sort_fields = ['EOInumber', 'Status'];
                $allowed_order = ['Ascending', 'Descending'];
            
                if (!in_array($sort_field, $allowed_sort_fields)) {
                    $sort_field = 'EOInumber';
                }
            
                $order_sql = ($order_field === 'Descending') ? 'DESC' : 'ASC';
            
                $query = "SELECT * FROM eoi ORDER BY $sort_field $order_sql";
                $result = $conn->query($query);
                display_results($result);
                mysqli_free_result($result);
            }
            ?>
        </main>
    <?php
    } // End of else block for authenticated content
    ?>
</body>
</html>