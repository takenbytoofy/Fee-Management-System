<?php

    $dbServer = 'localhost';
    $dbUser = 'root';
    $dbPswd = '';
    $dbName = 'ku_fms';

    try {
        $dbConn = new mysqli($dbServer, $dbUser, $dbPswd, $dbName);
    } catch (exception) {
        die("Database connection failed");
    }

?>