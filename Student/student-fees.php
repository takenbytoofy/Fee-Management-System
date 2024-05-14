<?php
    require("../FunctionFiles/validate-student-session.php");
    require("../FunctionFiles/dbconnect.php");

    $pageHeader = "Student Fees";
    $pageTitle="Student Fees";

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
?>

<style>

    .student-fees-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100%;
        width: 100%;
        gap: 2rem;
    }

    .unpaid-bills-container, .unverified-bills-container, .paid-bills-container, .declined-bills-container {
        padding: 2rem 2rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 100%;
        gap: 2rem;
        background-color: #FFFFFF;
        box-shadow: 0 0.5rem 0.8rem rgba(0, 0, 0, 20%);
        border-radius: 24px;
    }

    .unpaid-bills-container, .unverified-bills-container, .paid-bills-container, .declined-bills-container h2 {
        color: rgba(56, 35, 92, 100%);
    }

</style>

<div class="student-fees-container">

    <div class="unpaid-bills-container">
        <h2>Unpaid Bills</h2>
        <?php include("../FunctionFiles/student-load-unpaid-bills.php");?>
    </div>
    
    <div class="unverified-bills-container">
        <h2>Unverified Bills</h2>
        <?php include("../FunctionFiles/student-load-unverified-bills.php");?>
    </div>
    
    <div class="declined-bills-container">
        <h2>Declined Receipts</h2>
        <?php include("../FunctionFiles/student-load-declined-receipts.php");?>
    </div>

    <div class="paid-bills-container">
        <h2>Paid Bills</h2>
        <?php include("../FunctionFiles/student-load-paid-bills.php");?>
    </div>
    
</div>

<?php

    include("../Layouts/footer.php");

?>