<?php

    $dbServer = 'localhost';
    $dbUser = 'root';
    $dbPswd = '';
    $dbName = '';

    try {
        $dbConn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
    } catch (exception) {
        die("Database connection failed");
    }

?>