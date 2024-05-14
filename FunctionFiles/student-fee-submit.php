<?php
    require("../FunctionFiles/validate-student-session.php");
    require("../FunctionFiles/dbconnect.php");

    $username = $_SESSION['userid'];

    $studentDetailsQuery = "
    SELECT S.Std_ID, S.Prgm_ID, S.Enr_year
    FROM student as S
    INNER JOIN student_login as Sl
    ON S.Std_ID = Sl.Std_ID
    WHERE Sl.std_uname = '$username';
    ";

    $studentDetailsResult = $dbConn -> query($studentDetailsQuery);
    $studentDetailsData = $studentDetailsResult -> fetch_assoc();

    $stdID = $studentDetailsData['Std_ID'];
    $prgmID = $studentDetailsData['Prgm_ID'];
    $enrYear = $studentDetailsData['Enr_year'];

    $feeRemarks = $_POST['feeRemarks'];
    $depositDate = $_POST['depositDate'];
    $billID = $_POST['billID'];

    $feeReceiptImg = $_FILES['feeReceiptImg']['tmp_name'];
    $imgContent = addslashes(file_get_contents($feeReceiptImg));

    try {
        $feeSubmitQuery = "
            INSERT INTO fee_receipts (receipt_id, Std_ID, Prgm_ID, Enr_year, Bill_ID, pmt_date, receipt_img, receipt_status, remarks)
            VALUES ('', '$stdID', '$prgmID', '$enrYear', '$billID', '$depositDate', '$imgContent', 'Unverified', '$feeRemarks');
        ";

        $dbConn -> query($feeSubmitQuery);
        echo "
            <script>
                alert('Receipt Uploaded. Waiting for verification.');
                window.location.href = '../Student/student-fees.php';
            </script>
        ";
    } catch (Exception $ex) {
        echo "
            <script>
                alert('Failed to upload receipt');
                
            </script>
        ";
    }
?>