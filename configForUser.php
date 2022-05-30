<?php

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $databaseName = "loginpage";
    $port = 3306;

    // Create connection
    $conn = new mysqli($host, $dbusername, $dbpassword, $databaseName, $port);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>