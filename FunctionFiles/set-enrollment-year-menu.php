<?php
    
    require("../FunctionFiles/dbconnect.php");

    if (isset($_GET['value'])) {
        
        $prgmID = $_GET['value'];
        $existingEnrYearsQuery = "SELECT Enr_year FROM fee_structure WHERE Prgm_ID = '$prgmID';";
        $existingEnrYearsResult = $dbConn -> query($existingEnrYearsQuery);
    
        $options = array();

        while ($dataRow = $existingEnrYearsResult -> fetch_assoc()) {

            $options[] = $dataRow['Enr_year']; 

        }

        echo json_encode($options);
    } else {

        echo json_encode([]);

    }

?>