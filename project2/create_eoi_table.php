<?php
require_once('settings.php');

// Connect to the database
$conn = @mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// SQL to create the table
$sql = "CREATE TABLE IF NOT EXISTS eoi (
    EOInumber INT AUTO_INCREMENT PRIMARY KEY,
    job_ref_number VARCHAR(10) NOT NULL,
    first_name VARCHAR(20) NOT NULL,
    last_name VARCHAR(20) NOT NULL,
    dob DATE NOT NULL,
    gender VARCHAR(10) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    email VARCHAR(100) NOT NULL,
    street_address VARCHAR(40) NOT NULL,
    suburb VARCHAR(40) NOT NULL,
    state VARCHAR(3) NOT NULL,
    postcode CHAR(4) NOT NULL,
    degree VARCHAR(100),
    skills TEXT,
    other_skills TEXT,
    status ENUM('New', 'Current', 'Final') DEFAULT 'New'
);";

// Run the query
if (mysqli_query($conn, $sql)) {
    echo "✅ Table 'eoi' created or already exists.";
} else {
    echo "❌ Error creating table: " . mysqli_error($conn);
}


mysqli_close($conn);
?>