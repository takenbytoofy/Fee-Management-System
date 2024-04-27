<?php

    require("../FunctionFiles/dbconnect.php");

    //Get data from the form 
    $prgmID = $_POST['program-id'];
    $prgmName = $_POST['program-name'];

    /*Check if the given program code or name already exists 
        i.e. if the table already has a program with the entered year
    */

    $checkProgramQuery = "
        SELECT * 
        FROM program
        WHERE Prgm_ID = '$prgmID' OR Prgm_name = '$prgmName';
        ";
    $checkProgramQueryResult = $dbConn -> query($checkProgramQuery);
    
    //Getting ready to entry new program
    if ($checkProgramQueryResult -> num_rows == 0) {
        
        $newProgramInsertQuery ="
            INSERT INTO program
            VALUES ('$prgmID', '$prgmName');
        ";

        try {
            $dbConn -> query($newProgramInsertQuery);
            echo "
                <script>
                    alert('New Program added.');
                    window.location.href = '../Admin/view-programs.php';
                </script>
                ";
        } catch (Exception $ex) {
            echo "
                <script>
                    alert('Program could not be added.');
                    window.location.href = '../Admin/new-program.php';
                </script>
                ";
        }

    } else {
        echo "
        <script>
            alert('Entered program already exists.');
            window.location.href = '../Admin/new-program.php';
        </script>
        ";
    }
?>