<?php

    $studentPageHeader = "Student Details";
    $pageTitle = "FMS - My Details";
    include("../Layouts/header.php");
    include("../Layouts/nav-student.php");

?>

<style>

    #student-detail{
        background-color: #D1DBFD;
        display: inline-block;
        grid-area: page-content;
        margin: 40px 100px;
        width: 950px;
        height: 60vh;
        border-style: solid;
        border-color: #7a7edb;
        border-width: 2px ;
    }

    .detail-content{
        margin: 20px;
        padding: 2px;
    }

</style>

<div id="student-details-container">

    <div id="student-detail">
        <p class="detail-content"> Student Id: </p>
        <p class="detail-content"> Enrolled Program ID: </p>
        <p class="detail-content"> Student Name: </p>
        <p class="detail-content"> Gender: </p>
        <p class="detail-content"> Email: </p>
        <p class="detail-content"> Phone Number: </p>
        <p class="detail-content"> Address: </p>
    </div>

</div>

<?php

    include("../Layouts/student-page-footer.php");
    include("../Layouts/footer.php");

?>