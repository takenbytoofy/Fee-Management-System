<?php

    require("../FunctionFiles/validate-admin-session.php");

    require("../FunctionFiles/dbconnect.php");

    $pageHeader = "Programs";
    $pageTitle = "Programs";

    include("../Layouts/header.php");
    include("../Layouts/nav-admin.php");

    //Checking to see if the search entry fields have some value or are empty
    $billID = $_GET['billID'];

    $retreiveBillQuery = 
        "SELECT *
         FROM program_bill
         WHERE Bill_ID = $billID
         ";

    $retreiveBillResult = $dbConn -> query($retreiveBillQuery);
    $retreiveBillData = $retreiveBillResult -> fetch_assoc();    

?>