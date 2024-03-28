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
    }

    .student-detail {
        background-color: white;
    }

    .student-detail p{
        margin: 20px;
        padding: 2px;
        width: 200px;
    }

</style>

<div class="details-container">

    <div class="student-detail">
        <p> Student Id: </p>
        <p> Enrolled Program ID: </p>
        <p> Student Name: </p>
        <p> Gender: </p>
        <p> Email: </p>
        <p> Phone Number: </p>
        <p> Address: </p>
    </div>

</div>

<?php

    include("../Layouts/footer.php");

?>