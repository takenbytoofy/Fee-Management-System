<?php

    require("../FunctionFiles/dbconnect.php");

    //Get data from the form 
    $prgm = $_POST['prgm'];
    $enrYear = $_POST['enr-year'];
    $inst = $_POST['inst'];
    $amount = $_POST['amount'];
    $creDate = $_POST['cre-date'];
    $dueDate = $_POST['due-date'];

    if ($inst == "Admission") {
        $studenBillDueField = 'admission_fee_due';
        $studenBillStatusField = 'admission_fee_status';

    } else {
        $studenBillDueField = 'inst_' . $inst . "_due";
        $studenBillStatusField = 'inst_' . $inst . "_status";
    }

    /*Check if the given program fee already exists 
        i.e. if the table already has a program with the entered year
    */

    $checkProgramBillQuery = 
        "SELECT * 
        FROM program_bill
        WHERE Prgm_ID = '$prgm' AND Enr_year = '$enrYear' AND installment = '$inst';
        ";
    $checkProgramBillQueryResult = $dbConn -> query($checkProgramBillQuery); 

    // Getting ready to entry new fee strcture if no current one exists
    if ($checkProgramBillQueryResult -> num_rows == 0) {
        
        $newProgramBillInsertQuery ="
            INSERT INTO program_bill (Bill_ID, Prgm_ID, Enr_year, installment, create_date, due_date, bill_status)
            VALUES ('', '$prgm', '$enrYear', '$inst',  '$creDate', '$dueDate', 'AC');
            ";
            
        try {
            $dbConn -> query($newProgramBillInsertQuery);
            $updateStudentBillQuery = "
                UPDATE TABLE student_bill

            ";
            echo "
                <script>
                    alert('New Bill added.');
                    window.location.href = '../Admin/view-bills.php';
                </script>
                ";
        } catch (Exception $ex) {
            echo "
                <script>
                    alert('Bill could not be added.');
                    window.location.href = '../Admin/new-bill.php';
                </script>
                ";
        }

    } else {
        echo "
        <script>
            alert('Bill with given details already exists.');
            window.location.href = '../Admin/new-bill.php';
        </script>
        ";
    }

?>