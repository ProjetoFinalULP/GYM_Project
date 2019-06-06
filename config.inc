<?php

    $host = "sql213.epizy.com:3306";
    $username = "epiz_24005921";
    $password = "kFEmFNgYbL";
    $db_name = "epiz_24005921_database";

    // Create connection
$conn = new mysqli($host, $username, $password, $db_name);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

header("Content-type: text/html; charset=ISO-8859-1");
?>