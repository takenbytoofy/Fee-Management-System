<?php
    require("../FunctionFiles/validate-student-session.php");
    require("../FunctionFiles/dbconnect.php");

    $pageHeader = "Dashboard";
    $pageTitle = "Student Dashboard";

    include("../Layouts/header.php");
    include("../Layouts/nav-student.php");

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

    $billsQuery = "
    SELECT sb.Bill_ID, pb.installment
    FROM student_bill AS sb
    INNER JOIN program_bill AS pb
    ON sb.Bill_ID = pb.Bill_ID
    WHERE sb.Bill_Status = 'Paid' AND sb.Std_ID = '$stdID' AND sb.Prgm_ID = '$prgmID' AND sb.Enr_year = '$enrYear';
    ";

    $billsResult = $dbConn -> query($billsQuery);
    $totalAmount = 0;
    $installments = array();

    if ($billsResult -> num_rows > 0) {
        while ($billsData = $billsResult -> fetch_assoc()) {

            $inst = $billsData['installment'];
            $installments[] = $inst;

            if ($inst == "Admission") {
                $field = 'admission_fee';
            } else {
                $field = 'inst_' . $inst;
            }
        
            $amountQuery = "
                SELECT $field 
                FROM fee_structure
                WHERE Prgm_ID = '$prgmID' AND Enr_year = '$enrYear';
            "; 
        
            $amountQueryResult = $dbConn -> query($amountQuery);
        
            $data = $amountQueryResult -> fetch_assoc();
            
            $totalAmount += $data[$field];

        }
    }


    $paidBillCountQuery = 
    "
    SELECT COUNT(*) AS paidBillCount
    FROM student_bill
    WHERE Bill_Status = 'Paid' AND Std_ID = '$stdID' AND Prgm_ID = '$prgmID' AND Enr_year = '$enrYear';
    ";

    $paidBillCountQueryResult = $dbConn -> query($paidBillCountQuery);
    $paidBillCountQueryData = $paidBillCountQueryResult -> fetch_assoc();
    $paidBillCount = $paidBillCountQueryData['paidBillCount'];

    $unpaidBillCountQuery = 
    "
    SELECT COUNT(*) AS unpaidBillCount
    FROM student_bill
    WHERE Bill_Status = 'Unpaid' AND Std_ID = '$stdID' AND Prgm_ID = '$prgmID' AND Enr_year = '$enrYear';
    ";

    $unpaidBillCountQueryResult = $dbConn -> query($unpaidBillCountQuery);
    $unpaidBillCountQueryData = $unpaidBillCountQueryResult -> fetch_assoc();
    $unpaidBillCount = $unpaidBillCountQueryData['unpaidBillCount'];

    $unverifiedReceiptsCountQuery = 
    "
        SELECT COUNT(*) AS unverifiedReceiptsCount
        FROM fee_receipts
        WHERE receipt_status = 'Unverified' AND Std_ID = '$stdID' AND Prgm_ID = '$prgmID' AND Enr_year = '$enrYear';
    ";
    $unverifiedReceiptsCountQueryResult = $dbConn -> query($unverifiedReceiptsCountQuery);
    $unverifiedReceiptsCountQueryData = $unverifiedReceiptsCountQueryResult -> fetch_assoc();
    $unverifiedReceiptsCount = $unverifiedReceiptsCountQueryData['unverifiedReceiptsCount'];

?>

<div class="container">
    <div class="content">
        <div class="cards">
            <div class="card">
                <div class="box">
                    <h1></h1>
                    <h1> <?php echo $totalAmount?> </h1>
                    <h3> Paid Till Date </h3>
                </div>
                <div class="icon-case">
                    <i class="fas fa-solid fa-list"></i>
                </div>
            </div>
            <div class="card">
                <div class="box">
                    <h1> <?php echo $paidBillCount?> </h1>
                    <h3> Payments Made </h3>
                </div>
                <div class="icon-case">
                <i class="fas fa-solid fa-receipt"></i>
                </div>
            </div>
            <div class="card">
                <div class="box">
                    <h1> <?php echo $unpaidBillCount?> </h1>
                    <h3> Unpaid Bills </h3>
                </div>
                <div class="icon-case">
                <i class="fas fa-solid fa-coins"></i>
                </div>
            </div>
            <div class="card">
                <div class="box">
                    <h1> <?php echo $unverifiedReceiptsCount?> </h1>    
                    <h3> Unverified Payments </h3>
                </div>
                <div class="icon-case">
                <i class="fas fa-solid fa-clock"></i>
                </div>
            </div>
        </div>
        
        <div class="content-2">
            <h2>Fee Overview for <?php echo $prgmID . " " . $enrYear?></h2>
            <div class="fee-card">
                <div class="inst-card">
                    <h3>Admission Fee</h3>
                    <?php 
                        if (in_array('Admission', $installments)) {
                            echo "Paid";
                        }
                    ?>
                </div>
            </div>
            <div class="fee-card">
                <div class="inst-card">
                    <h3>Installment 1</h3>
                    <?php 
                        if (in_array('1', $installments)) {
                            echo "Paid";
                        }
                    ?>
                </div>
                <div class="inst-card">
                    <h3>Installment 2</h3>
                    <?php 
                        if (in_array('2', $installments)) {
                            echo "Paid";
                        }
                    ?>
                </div>
            </div>
            <div class="fee-card">
                <div class="inst-card">
                    <h3>Installment 3</h3>
                    <?php 
                        if (in_array('3', $installments)) {
                            echo "Paid";
                        }
                    ?>
                </div>
                <div class="inst-card">
                    <h3>Installment 4</h3>
                    <?php 
                        if (in_array('4', $installments)) {
                            echo "Paid";
                        }
                    ?>
                </div>
            </div>
            <div class="fee-card">
                <div class="inst-card">
                    <h3>Installment 5</h3>
                    <?php 
                        if (in_array('5', $installments)) {
                            echo "Paid";
                        }
                    ?>
                </div>
                <div class="inst-card">
                    <h3>Installment 6</h3>
                    <?php 
                        if (in_array('6', $installments)) {
                            echo "Paid";
                        }
                    ?>
                </div>
            </div>
            <div class="fee-card">
                <div class="inst-card">
                    <h3>Installment 7</h3>
                    <?php 
                        if (in_array('7', $installments)) {
                            echo "Paid";
                        }
                    ?>
                </div>
                <div class="inst-card">
                    <h3>Installment 8</h3>
                    <?php 
                        if (in_array('8', $installments)) {
                            echo "Paid";
                        }
                    ?>
                </div>
            </div>
            <div class="fee-card">
                <div class="inst-card">
                    <h3>Installment 9</h3>
                    <?php 
                        if (in_array('9', $installments)) {
                            echo "Paid";
                        }
                    ?>
                </div>
                <div class="inst-card">
                    <h3>Installment 10</h3>
                    <?php 
                        if (in_array('10', $installments)) {
                            echo "Paid";
                        }
                    ?>
                </div>
            </div>
            <div class="fee-card">
                <div class="inst-card">
                    <h3>Installment 11</h3>
                    <?php 
                        if (in_array('11', $installments)) {
                            echo "Paid";
                        }
                    ?>
                </div>
                <div class="inst-card">
                    <h3>Installment 12</h3>
                    <?php 
                        if (in_array('12', $installments)) {
                            echo "Paid";
                        }
                    ?>
                </div>
            </div>
            <div class="fee-card">
                <div class="inst-card">
                    <h3>Installment 13</h3>
                    <?php 
                        if (in_array('13', $installments)) {
                            echo "Paid";
                        }
                    ?>
                </div>
                <div class="inst-card">
                    <h3>Installment 14</h3>
                    <?php 
                        if (in_array('14', $installments)) {
                            echo "Paid";
                        }
                    ?>
                </div>
            </div>
            <div class="fee-card">
                <div class="inst-card">
                    <h3>Installment 15</h3>
                    <?php 
                        if (in_array('15', $installments)) {
                            echo "Paid";
                        }
                    ?>
                </div>
                <div class="inst-card">
                    <h3>Installment 16</h3>
                    <?php 
                        if (in_array('16', $installments)) {
                            echo "Paid";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>



<style>

    .container .content {
        position: relative;
        margin-top: 20px;
        height: auto;
    }

    .container .content .cards {
        padding: 15px 15px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    .container .content .icon-case{
        font-size: 30px;
    }

    .container .content .cards .card {
        width: 300px;
        height: 150px;
        background: white;
        border: 4px solid #6981d6;
        border-radius: 10px;
        margin: 20px 10px;
        display: flex;
        align-items: center;
        justify-content: space-around;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
            
    .container .content .content-2 {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .container .content .content-2 {
        display: flex;
        flex-direction: column;
        padding: 2rem 2rem;
        background-color: #6981d6;
        border: 2px solid white;
        border-radius: 10px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);  
    }

    .content-2 h2 {
        color: white;
    }

    .content-2 .fee-card {
        display: flex;
        justify-content: center;
        gap: 2rem;
        width: 100%;
    }

    .content-2 .fee-card .inst-card {
        border-radius: 12px;
        color: black;
        background-color: white;
        margin: .5rem 1rem;
        padding: 2rem;
    }

</style>

<?php

    include("../Layouts/footer.php");

?>