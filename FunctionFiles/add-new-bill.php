<?php

    require("../FunctionFiles/dbconnect.php");
    require('./email-script.php');

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

            $getBillIDQuery = "
                SELECT Bill_ID 
                FROM program_bill
                WHERE Prgm_ID = '$prgm' AND Enr_year = '$enrYear' AND installment = '$inst';";

            $getBillIDResult = $dbConn ->query($getBillIDQuery);
            $billIdData = $getBillIDResult -> fetch_assoc();
            $billID = $billIdData['Bill_ID'];

            $updateStudentBillQuery = "
                INSERT INTO student_bill (Std_ID, Prgm_ID, Enr_year, Bill_ID, Bill_Status)
                SELECT S.StD_ID, Pb.Prgm_ID, Pb.Enr_year, Pb.Bill_ID, 'Unpaid' as Bill_Status
                FROM program_bill AS Pb
                JOIN student as S
                ON S.Prgm_ID = Pb.Prgm_ID AND S.Enr_year = Pb.Enr_year
                HAVING Pb.Bill_ID = '$billID';
            ";
            try {
                $dbConn -> query($updateStudentBillQuery);

                $emailsQuery = "
                    SELECT S.Std_fname, S.Std_email
                    FROM student as S
                    INNER JOIN student_bill AS Sb
                    ON S.Std_ID = Sb.Std_ID AND S.Prgm_ID = Sb.Prgm_ID AND S.Enr_year = Sb.Enr_year
                    WHERE Sb.Bill_ID = '$billID';
                ";

                try {
                    $emailsResult = $dbConn -> query($emailsQuery);

                    $subject = 'New Bill ' . $inst . " Installment"; 

                    while ($emailsData = $emailsResult -> fetch_assoc()) {
                        $msg = "Dear ". $emailsData['Std_fname'] ." Your bill of amount: " . $amount . " for " . $inst . " installment is due by " . $dueDate;
                        $to = $emailsData['Std_email'];
                        sendMail($to, $subject, $msg);
                    }

                    echo "
                    <script>
                        alert('New Bill added. Emails sent.');
                        window.location.href = '../Admin/view-bills.php';
                    </script>
                    ";
                } catch (Exception $ex) {
                    echo "
                    <script>
                    alert('Email could not be sent.');

                    </script
                    ";
                }

            } catch (Exception $ex) {
                echo "
                <script>
                    alert('Student Bill could not be added.');
                    window.location.href = '../Admin/new-bill.php';
                </script>
                ";
            }

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