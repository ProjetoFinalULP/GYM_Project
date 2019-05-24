<?php

    $host = "sql209.epizy.com:3306";
    $username = "epiz_23801305";
    $password = "an6gNzun9gscP";
    $db_name = "epiz_23801305_database";

    // Create connection
    $conn = new mysqli($host, $username, $password, $db_name);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }    

?>