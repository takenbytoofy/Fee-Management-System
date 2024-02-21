<?php
    $studentPageTitle = "Student Details";
    $pageTitle = "Student Details";
    include("../Layouts/header.php");
    include("../Layouts/nav.php");
?>

<div id="student-detail">
    <p class="student-detail-content"> Student Id: </p>
    <p class="student-detail-content"> Enrolled Program ID: </p>
    <p class="student-detail-content"> Student Name: </p>
    <p class="student-detail-content"> Gender: </p>
    <p class="student-detail-content"> Email: </p>
    <p class="student-detail-content"> Phone Number: </p>
    <p class="student-detail-content"> Address: </p>

</div>


<style>

#student-detail{
    background-color: #D1DBFD;
    display: inline-block;
    margin: 40px 100px;
    width: 950px;
    height: 100%;
    border-style: solid;
    border-color: #7a7edb;
    border-width: 2px ;
}

.student-detail-content{
    margin: 20px;
    padding: 2px;
}

</style>

<?php 
    include("../Layouts/footer.php");
?>