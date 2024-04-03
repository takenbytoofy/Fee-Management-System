<?php

    $pageHeader = "My Profile";
    $pageTitle="My Profile";

    require("../FunctionFiles/validate-session.php");
    include("../Layouts/header.php");
    include("../Layouts/nav-student.php");

?>

<style>

    .details-container {
        width:100px;
        padding: 2rem 2rem;
    }

    .user-title {
        display: flex;
        gap: 30px;
    }

    .user-title img {
        border-radius: 50%;
        height: 100px;
        width: 100px;
    }

    .user-title-details p {
        margin: 20px;
        padding: 2px;
        width: 200px;
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
            <p> Student Name: </p>
            <p> Student Id: </p>
            <p> Enrolled Program ID: </p>
            <p> Email: </p>
            <p> Phone Number: </p>
        </div>
    </div>

    <!-- <div class="student-detail">
        <p> Student Id: </p>
        <p> Enrolled Program ID: </p>
        <p> Student Name: </p>
        <p> Gender: </p>
        <p> Email: </p>
        <p> Phone Number: </p>
        <p> Address: </p>
    </div> -->

</div>

<?php

    include("../Layouts/footer.php");

?>