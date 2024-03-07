<?php

    $studentPageHeader = "Student Details";
    $pageTitle = "FMS - My Details";
    include("../Layouts/header.php");
    include("../Layouts/nav-student.php");

?>

<style>

    *{
        margin:0;
        padding: 0;
        outline: none;
        border: none;
        text-decoration: none;
        box-sizing: border-box;
        font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

    }

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

<div id="student-detail">
    <p class="detail-content"> Student Id: </p>
    <p class="detail-content"> Enrolled Program ID: </p>
    <p class="detail-content"> Student Name: </p>
    <p class="detail-content"> Gender: </p>
    <p class="detail-content"> Email: </p>
    <p class="detail-content"> Phone Number: </p>
    <p class="detail-content"> Address: </p>
</div>

<?php

    include("../Layouts/footer.php");

?>