<?php

    require("../FunctionFiles/validate-admin-session.php");
    require("../FunctionFiles/dbconnect.php");
    
    $pageHeader = "Student Profile";
    $pageTitle = "Student Profile";

    include("../Layouts/header.php");
    include("../Layouts/nav-admin.php");

    $stdID = $_GET['StdID'];
    $prgmID = $_GET['PrgmID'];
    $enrYear = $_GET['EnrYear'];


    $studentDetailQuery = "
        SELECT * 
        FROM student 
        WHERE Std_ID = '$stdID' AND Prgm_ID = '$prgmID' AND Enr_year = '$enrYear';";
    
    $studentDetailResult = $dbConn -> query ($studentDetailQuery); 
    $studentData = $studentDetailResult->fetch_assoc();

    $studentName = $studentData['Std_fname'] . " " . $studentData['Std_lname'];
    $studentID = $studentData['Std_ID'];
    $programID = $studentData['Prgm_ID'] . $studentData['Enr_year'];
    $studentEmail = $studentData['Std_email'];
    $studentPhone = $studentData['Std_phone'];
    $studentAddress = $studentData['Std_city'];
    $studentDOB = $studentData['Std_dob'];
    $studentScholarship = $studentData['Std_sch_status'];
?>

<style>

    .student-details-container {
        display: flex;
        flex-direction: column;
        gap: 2rem;
        align-items: center;
        justify-content: center;
    }

    .details-container {
        padding: 2rem 2rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        background-color: #FFFFFF;
        box-shadow: 0 0.5rem 0.8rem rgba(0, 0, 0, 20%);
        border-radius: 24px;
    }

    .user-title {
        height: auto;
        width: auto;
        padding: 1rem 0.6rem;
        display: flex;
        gap: 30px;
        align-items: center;
    }

    .user-title img {
        border-radius: 50%;
        height: 200px;
        width: 200px;
    }

    .user-title-details {
        display: flex;
    }   

    .user-title-details p {
        margin: 10px;
        width: 200px;
    }

    .fields p {
        font-weight: 600;
    }

    .user-details {
        padding: 1rem 2rem;
        border-radius: 24px;
        display: flex;
        gap: 30px;
        align-items: center;
    }

    .bill-details-container {
        padding: 2rem 2rem;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        background-color: #FFFFFF;
        box-shadow: 0 0.5rem 0.8rem rgba(0, 0, 0, 20%);
        border-radius: 24px;
    }

    .bill-details-container .bill-card {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

</style>

<div class="student-details-container">
    <div class="details-container">

        <div class="user-title">
            <img src = '../Layouts/user.png' alt='User Picture'>
            <div class="user-title-details">
                <div class="fields">
                    <p> Student Name: </p> 
                    <p> Student Id: </p>
                    <p> Enrolled Program ID: </p>
                    <p> Email: </p>
                    <p> Phone Number: </p>
                </div>
                <div class="details">
                    <p> <?php echo $studentName ?> </p> 
                    <p> <?php echo $studentID ?></p>
                    <p> <?php echo $programID ?> </p>
                    <p> <?php echo $studentEmail ?> </p>
                    <p> <?php echo $studentPhone ?> </p>
                </div>
            </div>
        </div>

        <div class="user-details">
            <div class="fields">
                <p>Address: </p>
                <p>Date of Birth: </p>
                <p>Scholarship Status: </p>

            </div>
            <div class="details">
                <p> <?php echo $studentAddress ?> </p> 
                <p> <?php echo $studentDOB ?></p>
                <p> <?php echo $studentScholarship?> </p>
            </div>
        </div>

    </div>
    <div class="details-container">
        <h2>Bills</h2>
        <div class="bill-details-container">
            <div class="bill-card">
                <h3>Unverified Receipts</h3>
                <?php include('../FunctionFiles/admin-load-unverified-receipts.php');?>
            </div>
            <div class="bill-card">
                <h3>Unpaid Bills</h3>
                <?php include('../FunctionFiles/admin-load-unpaid-bills.php');?>
            </div>
            <div class="bill-card">
                <h3>Declined Receipts</h3>
                <?php include('../FunctionFiles/admin-load-declined-receipts.php');?>
            </div>
            <div class="bill-card">
                <h3>Paid Bills</h3>
                <?php include('../FunctionFiles/admin-load-paid-bills.php');?>
            </div>
        </div>
    </div>
</div>

<?php
    include("../Layouts/footer.php");
?>