<?php

    $pageHeader = "My Profile";
    $pageTitle="My Profile";

    require("../FunctionFiles/validate-student-session.php");
    require("../FunctionFiles/dbconnect.php");
    include("../Layouts/header.php");
    include("../Layouts/nav-student.php");

    $userName = $_SESSION['userid'];

    $userDetailQuery = "SELECT * FROM student AS std INNER JOIN student_login AS stdlgn ON std.Std_ID = stdlgn.Std_ID WHERE stdlgn.Std_uname = '$userName';";
    
    $userDetailResult = $dbConn -> query ($userDetailQuery); 
    $userData = $userDetailResult->fetch_assoc();

    $studentName = $userData['Std_fname'] . " " . $userData['Std_lname'];
    $studentID = $userData['Std_ID'];
    $programID = $userData['Prgm_ID'] . $userData['Enr_year'];
    $studentEmail = $userData['Std_email'];
    $studentPhone = $userData['Std_phone'];
    $studentAddress = $userData['Std_city'];
    $studentDOB = $userData['Std_dob'];
    $studentScholarship = $userData['Std_sch_status'];
?>

<style>

    .student-details-container {
        display: flex;
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
</div>

<?php

    include("../Layouts/footer.php");

?>