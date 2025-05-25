
<?php

include 'header.inc'; // Include header file

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("settings.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitise inputs (GenAI)
    function clean_input($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    $job_ref = clean_input($_POST["job_ref_number"]);
    $first_name = clean_input($_POST["first_name"]);
    $last_name = clean_input($_POST["last_name"]);
    $dob = clean_input($_POST["dob"]);
    $gender = clean_input($_POST["gender"]);
    $phone = clean_input($_POST["phone"]);
    $email = clean_input($_POST["email"]);
    $address = clean_input($_POST["address"]);
    $suburb = clean_input($_POST["suburb"]);
    $state = clean_input($_POST["state"]);
    $postcode = clean_input($_POST["postcode"]);
    $degree = clean_input($_POST["degree"]);
    $skills = isset($_POST["skills"]) ? implode(", ", array_map('clean_input', $_POST["skills"])) : "";
    $other_skills = clean_input($_POST["other_skills"]);
    $status = "New"; // Default status

    $query = "INSERT INTO eoi 
        (job_ref, first_name, last_name, dob, gender, phone, email, street_address, suburb, state, postcode, degree, skills, other_skills, status)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $query);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssssssssssssss",
            $job_ref, $first_name, $last_name, $dob, $gender, $phone, $email, $address,
            $suburb, $state, $postcode, $degree, $skills, $other_skills, $status
        );

        if (mysqli_stmt_execute($stmt)) {
            echo "<h2 class='process-eoi-h2'>Application submitted <span class='successfully'>successfully!</span></h2>";
            $eoi_id = mysqli_insert_id($conn);
            echo "<p class='process-eoi-p'>Your EOI ID is: <strong>" . $eoi_id . "</strong></p>";

            // Fetch the inserted record to display in a table
            $select_query = "SELECT * FROM eoi WHERE EOInumber = ?";
            $select_stmt = mysqli_prepare($conn, $select_query);
            if ($select_stmt) {
                mysqli_stmt_bind_param($select_stmt, "i", $eoi_id);
                mysqli_stmt_execute($select_stmt);
                $result = mysqli_stmt_get_result($select_stmt);
                $row = mysqli_fetch_assoc($result);

                if ($row) {
                    echo "<div class='process-eoi-table-container'>";
                    echo "<table class='process-eoi-table'>";
                    echo "<tr><th>Field</th><th>Value</th></tr>";
                    echo "<tr><td>EOI ID</td><td>" . htmlspecialchars($row['EOInumber']) . "</td></tr>";
                    echo "<tr><td>Job Reference</td><td>" . htmlspecialchars($row['job_ref']) . "</td></tr>";
                    echo "<tr><td>First Name</td><td>" . htmlspecialchars($row['first_name']) . "</td></tr>";
                    echo "<tr><td>Last Name</td><td>" . htmlspecialchars($row['last_name']) . "</td></tr>";
                    echo "<tr><td>Date of Birth</td><td>" . htmlspecialchars($row['dob']) . "</td></tr>";
                    echo "<tr><td>Gender</td><td>" . htmlspecialchars($row['gender']) . "</td></tr>";
                    echo "<tr><td>Phone</td><td>" . htmlspecialchars($row['phone']) . "</td></tr>";
                    echo "<tr><td>Email</td><td>" . htmlspecialchars($row['email']) . "</td></tr>";
                    echo "<tr><td>Address</td><td>" . htmlspecialchars($row['street_address']) . "</td></tr>";
                    echo "<tr><td>Suburb</td><td>" . htmlspecialchars($row['suburb']) . "</td></tr>";
                    echo "<tr><td>State</td><td>" . htmlspecialchars($row['state']) . "</td></tr>";
                    echo "<tr><td>Postcode</td><td>" . htmlspecialchars($row['postcode']) . "</td></tr>";
                    echo "<tr><td>Degree</td><td>" . htmlspecialchars($row['degree']) . "</td></tr>";
                    echo "<tr><td>Skills</td><td>" . htmlspecialchars($row['skills']) . "</td></tr>";
                    echo "<tr><td>Other Skills</td><td>" . htmlspecialchars($row['other_skills']) . "</td></tr>";
                    echo "<tr><td>Status</td><td>" . htmlspecialchars($row['status']) . "</td></tr>";
                    echo "</table>";
                    echo "</div>";

                    // Add Return to Job Search button
                    echo "<div class='process-eoi-button-container'>";
                    echo "<a href='jobs.php' class='process-eoi-return-btn'>Return to Job Search</a>";
                    echo "</div>";
                } else {
                    echo "<p class='process-eoi-p'>Unable to retrieve the submitted data.</p>";
                }

                mysqli_stmt_close($select_stmt);
            } else {
                echo "<p class='process-eoi-p'>Error preparing select query: " . mysqli_error($conn) . "</p>";
            }
        } else {
            echo "<p class='process-eoi-p'>There was an error executing the query: " . mysqli_error($conn) . "</p>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<p class='process-eoi-p'>There was an error preparing the query: " . mysqli_error($conn) . "</p>";
    }

    mysqli_close($conn);
}

include 'footer.inc'; // Include footer file

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="EOI Submission Page">
    <meta name="keywords" content="EOI, Submission, Aevina, AI, IT Company">
    <meta name="author" content="Aevina Team">
    <link rel="stylesheet" href="styles/styles.css">
    <title>EOI Submission</title>
</head>
<body class="process-eoi-body">
</body>
</html></body>