<?php

include 'header.inc'; // Include header file

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("settings.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitise inputs
    function clean_input($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    // Use null coalescing operator to suppress undefined index warnings
    $job_ref = clean_input($_POST["job_ref_number"] ?? "");
    $first_name = clean_input($_POST["first_name"] ?? "");
    $last_name = clean_input($_POST["last_name"] ?? "");
    $dob = clean_input($_POST["dob"] ?? "");
    $gender = clean_input($_POST["gender"] ?? "");
    $phone = clean_input($_POST["phone"] ?? "");
    $email = clean_input($_POST["email"] ?? "");
    $address = clean_input($_POST["address"] ?? "");
    $suburb = clean_input($_POST["suburb"] ?? "");
    $state = clean_input($_POST["state"] ?? "");
    $postcode = clean_input($_POST["postcode"] ?? "");
    $degree = clean_input($_POST["degree"] ?? "");
    $skills = isset($_POST["skills"]) ? implode(", ", array_map('clean_input', $_POST["skills"])) : "";
    $other_skills = clean_input($_POST["other_skills"] ?? "");
    $status = "New"; // Default status

    // Validation logic
    $errors = [];
    if (!preg_match("/^[A-Za-z\s]{1,20}$/", $first_name) || !preg_match("/^[A-Za-z\s]{1,20}$/", $last_name)) {
        $errors[] = "First and Last Name must only contain letters and spaces (max 20 characters).";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (!preg_match("/^[\d\s]{8,12}$/", $phone)) {
        $errors[] = "Phone number must be between 8 and 12 digits.";
    }
    if (!preg_match("/^\d{4}$/", $postcode)) {
        $errors[] = "Postcode must be 4 digits.";
    }
    if (empty($gender)) {
        $errors[] = "Gender is required.";
    }
    if (empty($dob)) {
        $errors[] = "Date of birth is required.";
    }

    if (!empty($errors)) {
        echo "<h2 class='process-eoi-h2'>Submission Failed</h2><ul class='process-eoi-p'>";
        foreach ($errors as $err) {
            echo "<li>" . htmlspecialchars($err) . "</li>";
        }
        echo "</ul><a href='apply.php' class='process-eoi-return-btn'>Return to Application</a>";
        include 'footer.inc';
        exit();
    }

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
                    foreach ($row as $field => $value) {
                        echo "<tr><td>" . htmlspecialchars($field) . "</td><td>" . htmlspecialchars($value) . "</td></tr>";
                    }
                    echo "</table></div>";
                    echo "<div class='process-eoi-button-container'><a href='jobs.php' class='process-eoi-return-btn'>Return to Job Search</a></div>";
                } else {
                    echo "<p class='process-eoi-p'>Unable to retrieve the submitted data.</p>";
                }
                mysqli_stmt_close($select_stmt);
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

include 'footer.inc';
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
</html>