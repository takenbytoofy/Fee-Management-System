<?php

    require("../FunctionFiles/validate-admin-session.php");
    require("../FunctionFiles/dbconnect.php");

    $recID = $_POST['recID'];
    $billID = $_POST['billID'];
    $stdID = $_POST['stdID'];
    $prgmID = $_POST['prgmID'];
    $enrYear = $_POST['enrYear'];
    if ($_POST['decision'] == 'Accept') {
        $decision = "Verified";
    } else {
        $decision = "Declined";
    }

    $updateReceiptStatusQuery = "
        UPDATE fee_receipts
        SET receipt_status = '$decision'
        WHERE receipt_id = '$recID';
    ";

    try {
        $dbConn -> query($updateReceiptStatusQuery);

        if ($decision == 'Verified') {
            
            $updateBillStatusQuery = "
                UPDATE student_bill
                SET Bill_Status = 'Paid'
                WHERE Std_ID = '$stdID' AND Prgm_ID = '$prgmID' AND Enr_year = '$enrYear' AND Bill_ID = '$billID';
            ";

            $dbConn -> query($updateBillStatusQuery); 

            echo "
            <script>
                alert('Verified Receipt.');
                window.location.href = '../Admin/view-fees.php';
            </script>
            ";
        } else {
            
            echo "
            <script>
                alert('Declined Receipt.');
                window.location.href = '../Admin/view-fees.php';
            </script>
            ";

        }


    } catch (Exception $ex) {
        echo "
            <script>
                alert('Could not verify/decline receipt.');
                window.location.href = '../Admin/receipt-profile.php?recID=".$recID."';
            </script>
        ";  
    }

?>