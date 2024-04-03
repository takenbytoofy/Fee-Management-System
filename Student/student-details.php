<?php

    $pageHeader = "My Profile";
    $pageTitle="My Profile";

    require("../FunctionFiles/validate-session.php");
    include("../Layouts/header.php");
    include("../Layouts/nav-student.php");

    $studentName = "Ezal Sujakhu";
    $studentID = "2011027";
    $programID = "BBIS2020";
    $studentEmail ="2011027_ezal@kusom.edu.np";
    $studentPhone = "9840334055";
    $studentAddress = "Suryabinayak, Bhaktapur";
    $studentDOB = "2002-03-30";
    $studentScholarship = "None";
?>

<style>

    .details-container {
        padding: 2rem 2rem;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .user-title {
        height: auto;
        width: auto;
        padding: 1rem 0.6rem;
        border-radius: 24px;
        background-color: #FFFFFF;
        display: flex;
        gap: 30px;
        align-items: center;
        box-shadow: 0 0.5rem 0.8rem rgba(0, 0, 0, 20%);
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
        height: auto;
        width: auto;
        padding: 1rem 2rem;
        border-radius: 24px;
        background-color: #FFFFFF;
        display: flex;
        gap: 30px;
        align-items: center;
        box-shadow: 0 0.5rem 0.8rem rgba(0, 0, 0, 20%);
    }
    /* .student-detail {
        background-color: white;
    }

    .student-detail p{
        margin: 20px;
        padding: 2px;
        width: 200px;
    } */

</style>

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

<?php

    include("../Layouts/footer.php");

?>