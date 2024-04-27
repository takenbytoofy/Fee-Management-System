<?php

    require("../FunctionFiles/dbconnect.php");

    //Get data from the form 
    $prgmID = $_POST['program-id'];
    $year = $_POST['enrYear'];
    $admFee = $_POST['admissionFee'];
    $instFee = $_POST['installmentFee'];

    /*Check if the given program fee already exists 
        i.e. if the table already has a program with the entered year
    */

    $checkProgramFeeQuery = "
        SELECT * 
        FROM fee_structure
        WHERE Prgm_ID = '$prgmID' AND Enr_year = '$year';
        ";
    $checkProgramFeeQueryResult = $dbConn -> query($checkProgramFeeQuery); 

    //Getting ready to entry new fee strcture if no current one exists
    if ($checkProgramFeeQueryResult -> num_rows == 0) {
        
        $newProgramFeeInsertQuery =
            "INSERT into fee_structure
            VALUES ('$prgmID', '$year', '$admFee', '$instFee', '$instFee', '$instFee', '$instFee', '$instFee', '$instFee', '$instFee', '$instFee', '$instFee', '$instFee', '$instFee', '$instFee', '$instFee', '$instFee', '$instFee', '$instFee')
            ";
        try {
            $dbConn -> query($newProgramFeeInsertQuery);
            echo "
                <script>
                    alert('New Fee added.');
                    window.location.href = '../Admin/view-program-fees.php';
                </script>
                ";
        } catch (Exception $ex) {
            echo "
                <script>
                    alert('Fee could not be added.');
                    window.location.href = '../Admin/new-program-fee.php';
                </script>
                ";
        }

    } else {
        echo "
        <script>
            alert('Fee for the program and year already exists.');
            window.location.href = '../Admin/new-program-fee.php';
        </script>
        ";
    }

?>