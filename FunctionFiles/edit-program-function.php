<?php

    require("../FunctionFiles/dbconnect.php");

    //Get data from the form

    $curPrgmID = $_POST['cur-program-id'];
    $curPrgmName = $_POST['cur-program-name'];
    $newPrgmID = $_POST['new-program-id'];
    $newPrgmName = $_POST['new-program-name'];

    /*Check if the given program code or name already exists 
        i.e. if the table already has a program with the entered year
    */

    $checkProgramQuery = "
        SELECT * 
        FROM program
        WHERE Prgm_ID = '$curPrgmID' OR Prgm_name = '$curPrgmName';
        ";
    $checkProgramQueryResult = $dbConn -> query($checkProgramQuery);

    if ($checkProgramQueryResult -> num_rows == 1) {
        
        $dropCurrentProgramQuery = "
            DELETE FROM program
            WHERE Prgm_ID = '$curPrgmID' AND Prgm_name = '$curPrgmName';
        ";

        try {
            $dbConn -> query($dropCurrentProgramQuery);

            $newProgramInsertQuery ="
            INSERT INTO program
            VALUES ('$newPrgmID', '$newPrgmName');
            ";

            $dbConn -> query($newProgramInsertQuery);

            echo "
                <script>
                    alert('Program Edited.');
                    window.location.href = '../Admin/view-programs.php';
                </script>
                ";
        } catch (Exception $ex) {
            echo "
                <script>
                    alert('Program could not be edited.');
                    window.location.href = '../Admin/new-program.php';
                </script>
                ";
        }

    } else {
        echo "
        <script>
            alert('Entered program does not exist.');
            window.location.href = '../Admin/new-program.php';
        </script>
        ";
    }



?>