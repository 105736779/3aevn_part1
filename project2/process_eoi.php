<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


require_once("settings.php");

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize inputs
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
        (job_ref_number, first_name, last_name, dob, gender, phone, email, street_address, suburb, state, postcode, degree, skills, other_skills, status)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $query);
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "sssssssssssssss",
            $job_ref, $first_name, $last_name, $dob, $gender, $phone, $email, $address,
            $suburb, $state, $postcode, $degree, $skills, $other_skills, $status
        );

        if (mysqli_stmt_execute($stmt)) {
            echo "<h2>Application submitted successfully!</h2>";
            echo "<p>Your EOI ID is: " . mysqli_insert_id($conn) . "</p>";
        } else {
            echo "<p>There was an error executing the query: " . mysqli_error($conn) . "</p>";
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "<p>There was an error preparing the query: " . mysqli_error($conn) . "</p>";
    }

    mysqli_close($conn);
}
?>