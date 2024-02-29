<?php

    $dbServer = 'localhost';
    $dbUser = 'root';
    $dbPswd = '';
    $dbName = '';

    try {
        $dbConn = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);
    } catch (exception) {
        die("Database connection failed");
    }

?>