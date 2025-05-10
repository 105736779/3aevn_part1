<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if ($_SERVER['REQUEST_METHOD'] != 'POST' || !isset($_SERVER['HTTP_REFERER'])) {
            header('location:manage.php');
            exit;
        }
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
                echo "<p>No records found.</p>";
                return;
            }
        
            echo "<div class='table__container'><table><tr>";
            $headers = [
                "EOI number", "Job Reference Number", "First Name", "Last Name", "DoB", "Gender",
                "Street Address", "Suburb", "State", "Postcode", "Email", "Phone",
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
        require_once 'settings.php';
        // Back button
        $back_btn = "<div class=\"banner__press-container\">
        <a href=\"./manage.php\" class=\"banner__press\"><strong>Back to Manage Page</strong></a>
        </div>";
        $eoi_table = "eoi";
        // Search EOI form submission
        if (isset($_POST['Search'])) {
            $query = "SELECT * FROM $eoi_table";
            $fname_search = sanitize_input($conn, $_POST['first_name']);
            $lname_search = sanitize_input($conn, $_POST['last_name']);
            $job_search = $_POST['job_search'];
            // Check if there is any search criteria
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
            $result = @mysqli_query($conn, $query) or die("<p>Failed to execute query</p> $back_btn");
            display_results($result);
            mysqli_free_result($result);
        }
        if (isset($_POST['Delete_EOI'])) {
            $job_ref = sanitize_input($conn, $_POST['job_search']);
            $fname = sanitize_input($conn, $_POST['first_name']);
            $lname = sanitize_input($conn, $_POST['last_name']);
        
            // Start building DELETE query
            $query = "DELETE FROM $eoi_table WHERE ";
            $conditions = [];
        
            // Build conditions based on input
            if ($job_ref == "all") {
                echo "<p>Please select a specific job reference number to delete its EOIs.</p>";
            } else {
                $conditions[] = "job_ref = '$job_ref'";
            }
        
            if (!empty($fname)) {
                $conditions[] = "first_name LIKE '%$fname%'";
            }
        
            if (!empty($lname)) {
                $conditions[] = "last_ame LIKE '%$lname%'";
            }
        
            if (count($conditions) === 0) {
                echo "<p>Please provide at least one filter (job, first name, or last name) to delete EOIs.</p>";
            } else {
                $query .= implode(" AND ", $conditions);
                $result = @mysqli_query($conn, $query) or die("<p>Failed to delete EOIs</p> $back_btn");
        
                if (mysqli_affected_rows($conn) > 0) {
                    echo "<p>Matching EOIs were successfully deleted.</p>";
                } else {
                    echo "<p>No matching EOIs found to delete.</p>";
                }
            }
        }
        if (isset($_POST['update_status'])) {
            $eoi_number = mysqli_real_escape_string($conn, $_POST['eoi_number']);
            $new_status = mysqli_real_escape_string($conn, $_POST['status']); // sanitized user input to prevent SQL injection

            //update for This EOInumber to new_status and if it true print and not print
            $query = "UPDATE eoi SET status = '$new_status' WHERE EOInumber = '$eoi_number'";
            if (mysqli_query($conn, $query)) {
                $result = "Status of EOI #$eoi_number updated to '$new_status'.";
            } else {
                $result = "Error updating status: " . mysqli_error($conn);
            }
        }


        if (isset($_POST['sort_order'])) {
            $sort_field = $_POST['sort_field'];
            $order_field = $_POST['order_field'];
        
            // Sanitize and validate
            $allowed_sort_fields = ['EOInumber', 'Status'];
            $allowed_order = ['Ascending', 'Descending'];
        
            if (!in_array($sort_field, $allowed_sort_fields)) {
                $sort_field = 'EOInumber';
            }
        
            $order_sql = ($order_field === 'Descending') ? 'DESC' : 'ASC';
        
            // Simple query using ENUM's natural order
            $query = "SELECT * FROM eoi ORDER BY $sort_field $order_sql";
        
            $result = $conn->query($query);
            display_results($result);
            mysqli_free_result($result);
        }

    ?>

</body>
</html>