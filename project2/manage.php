<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    <?php
    require_once 'settings.php';
    ?>
    <h1 class="manage_title">HR Manager - Manage Expressions of Interest</h1>

    <!-- Form for listing EOIs by applicant name -->
    <form action="manage.php" method="post">
        <fieldset>
            <legend><h2 class="manage">List EOIs</h2></legend>
            <?php
            // Get all job reference numbers
            $query = "SELECT job_reference FROM job";
            $result = @mysqli_query($conn, $query) or die("<p>Unable to find the Job Reference Numbers</p>");
            //$result will have all the results from job table 

            echo '<label for="job_search">Job Reference Number:</label>';
            echo '<select name="job_search" id="job_search">';
            echo '<option value="all">All</option>'; // Default option
            
            while ($row = mysqli_fetch_assoc($result)) {
                //take each row result inside result and do a loop
                $ref = htmlspecialchars($row['job_reference']); // for safety
                //$ref will take job_reference and then echo to print out it
                echo "<option value=\"$ref\">$ref</option>";
            }
            
            echo '</select>';
            
            mysqli_free_result($result);
            ?>
            <!--Take the user input and prompt them to press Submit or Delete Button-->
            <br>
            <label class="label" for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" pattern="[A-Za-z ]{1,20}" title="Max 20 alpha characters">
            <br>
            <label class="label" for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" pattern="[A-Za-z ]{1,20}" title="Max 20 alpha characters">
            <br>
            <input type="submit" name="Search"  value="Search">
            <input type="submit" name="Delete_EOI" value="Delete" onclick="return confirm('Are you sure you want to delete all EOIs for this job reference?');">
        </fieldset>
    </form>

    <!-- Form for updating EOI status -->
    <form action="manage.php" method="post">
        <fieldset>
        <!--Take the EOI number from user-->
            <legend><h2>Change EOI Status</h2></legend>
            <label  for="eoi_number">EOI Number:</label>
            <input  type="number" id="eoi_number" name="eoi_number" required> 
            <br>
        <!--ALlow user to select which type of Statuse they want to change-->
            <label  for="status">New Status:</label>
            <select id="status" name="status" required>
                <option value="New">New</option>
                <option value="Current">Current</option>
                <option value="Final">Final</option>
            </select> 
            <br> 
            <br>
            <input type="submit" name="update_status" value="Update Status">
        </fieldset>
    </form>
    
    <form action="manage.php" method="post">
        <fieldset>
            <legend><h2>Sort the order</h2></legend>
            <div>
                <label for="sort_field">Sort by:</label>
                <select id="sort_field" name="sort_field">
                    <option value="EOInumber">EOI Number</option>
                    <option value="Status">Status</option>
                </select>
            </div>
            <div>
                <label for="order_field">Order:</label>
                <select id="order_field" name="order_field">
                    <option value="Ascending">Ascending</option>
                    <option value="Descending">Descending</option>
                </select>
            </div>
            <div class="submit__btn-container">
                <input type="submit" name="sort_order" value="Apply Filter" class="submit__btn">
            </div>
        </fieldset>
    </form>
    <?php
        $back_btn = "<div class=\"banner__press-container\">
        <a href=\"./manage.php\" class=\"banner__press\"><strong>Back to Manage Page</strong></a>
        </div>";
        function sanitize_input($conn, $data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            $data = mysqli_real_escape_string($conn, $data);
            return $data;
        }

        //create this function to display the result 
        function display_results($result)
        {
            if (mysqli_num_rows($result) == 0) {
                echo "<p>No records found.</p>";
                return;
            //if there is no result 
            }
        
            echo "<div class='table__container'><table><tr>";
            $headers = [
                "EOI number", "Job Reference Number", "First Name", "Last Name", "DoB", "Gender",
                "Street Address", "Suburb", "State", "Postcode", "Email", "Phone",
                "Skill", "Degree", "Other Skills", "Status"
            ];
            // Using foreach to print each table head without doing multiple times
            foreach ($headers as $h) echo "<th>$h</th>";
            echo "</tr>";
            
            //Using while loop to print the result depends on data from eoi table 
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
        // Search EOI form submission
        if (isset($_POST['Search'])) {
            $query = "SELECT * FROM $eoi_table";
            //take value from eoi table

            $fname_search = sanitize_input($conn, $_POST['first_name']);
            $lname_search = sanitize_input($conn, $_POST['last_name']);
            $job_search = $_POST['job_search'];
            // Check if there is any search criteria
            if ($fname_search != "" || $lname_search != "" || $job_search != "all") {
                $query .= " WHERE ";
                // .= mean add WHERE into $query which is "SELECT * FROM $eoi_table" 

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
                // substr($query, 0, -5) because we need to do the same principle so for the last item we have to delete 5 words (AND)
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
            //initialize an array to combine the criteria
        
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
                $conditions[] = "last_name LIKE '%$lname%'";
            }
            
            //check if $condition have value inside
            if (count($conditions) === 0) {
                echo "<p>Please provide at least one filter (job, first name, or last name) to delete EOIs.</p>";
            } else {
                //Insert AND between each elements of $condition so that it has to meet all elements
                $query .= implode(" AND ", $conditions);
                $result = @mysqli_query($conn, $query) or die("<p>Failed to delete EOIs</p> $back_btn");
                
                //mysqli_affected_rows this function can help we check if any row has been delete
                if (mysqli_affected_rows($conn) > 0) {
                    echo "<p>Matching EOIs were successfully deleted.</p>";
                } else {
                    echo "<p>No matching EOIs found to delete.</p>";
                }
            }
        }

        //Update Status
        if (isset($_POST['update_status'])) {
            $eoi_number = mysqli_real_escape_string($conn, $_POST['eoi_number']);
            $new_status = mysqli_real_escape_string($conn, $_POST['status']); // sanitized user input to prevent SQL injection

            //update for This EOInumber to new_status and if it true print and not print
            $query = "UPDATE eoi SET status = '$new_status' WHERE EOInumber = '$eoi_number'";

            //check if we've updated successfully
            if (mysqli_query($conn, $query)) {
                $result = "Status of EOI #$eoi_number updated to '$new_status'.";
            } else {
                $result = "Error updating status: " . mysqli_error($conn);
            }
            if (isset($result)) echo "<p>$result</p>";
        }


        if (isset($_POST['sort_order'])) {
            $sort_field = $_POST['sort_field'];
            //because in sort_field we use <select> command so that we take te value 
            $order_field = $_POST['order_field'];
        
            // Sanitize and validate

            // create arrays which have all the options for each select value
            $allowed_sort_fields = ['EOInumber', 'Status'];
            $allowed_order = ['Ascending', 'Descending'];
            
            // check if in array $allowed_sort_fields that no value is matched with $sort_field so set $sort_field = 'EOInumber' to avoid error
            if (!in_array($sort_field, $allowed_sort_fields)) {
                $sort_field = 'EOInumber';
            }
            
            // create a variable which check if $order_field === 'Descending' so order_sql will be DESC otherwis it is ASC
            $order_sql = ($order_field === 'Descending') ? 'DESC' : 'ASC';
            
            //DESC and ASC command help sort value depend on high to low or low to high in turns
            // Simple query using ENUM's natural order
            $query = "SELECT * FROM eoi ORDER BY $sort_field $order_sql";
            //it will be like SELECT * FROM eoi ORDER BY EOInumber DESC 
            //orders the rows by the EOInumber column in descending order
            $result = $conn->query($query);
            display_results($result);
            mysqli_free_result($result);
        }

    
    
    ?>

</body>
</html>