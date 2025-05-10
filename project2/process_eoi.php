<?php
require_once("settings.php");



if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $job_ref = $_POST["job_ref_number"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $suburb = $_POST["suburb"];
    $state = $_POST["state"];
    $postcode = $_POST["postcode"];
    $degree = $_POST["degree"];
    $skills = isset($_POST["skills"]) ? implode(", ", (array)$_POST["skills"]) : "";
    //$_POST["skills"] will be an array 
    $other_skills = $_POST["other_skills"];

    $query = "INSERT INTO eoi 
        (job_ref, first_name, last_name, dob, gender, phone, email, street_address, suburb, state, postcode, degree, skills, other_skills)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssssssssssssss", $job_ref, $first_name, $last_name, $dob, $gender, $phone, $email, $address, $suburb, $state, $postcode, $degree, $skills, $other_skills);

    if (mysqli_stmt_execute($stmt)) {
        echo "<h2>Application submitted successfully!</h2>";
        echo "<p>Your EOI ID is: " . mysqli_insert_id($conn) . "</p>";
    } else {
        echo "<p>There was an error processing your application. Please try again later.</p>";
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>