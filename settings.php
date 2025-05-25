<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "jobs_list"; 

$conn = mysqli_connect($host, $username, $password, $database);
//if in here you have initialized $conn so that you dont need to do it in other pages
if (!$conn) {
    //if the connection failed then do this
    die("connection failed:" . mysqli_connect_error());
    
}
?>