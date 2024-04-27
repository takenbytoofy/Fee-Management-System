<?php

    require("../FunctionFiles/validate-admin-session.php");
    require("../FunctionFiles/dbconnect.php");
    $pageHeader = "Student";
    $pageTitle = "Student";

    include("../Layouts/header.php");
    include("../Layouts/nav-admin.php");

?>    

<style>

    .view-students-container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    #add-student-button{
        float: right;
        padding: 5px;
        background-color: #6981d6;
        color: white;
        width: 120px;
        border-radius: 5px;
        font-size: 18px;
    }

    #add-student-button:hover {
        background-color: rgb(146, 160, 212);
        transform: scale(1.02);
    }

    .search-bar{
        display: flex;
        align-items: center; 
    }

    .search-bar form {
        display: flex;
        flex-direction: row;
        gap: 1rem;
    }

    .search-field{
        padding: 5px;
        font-size: 18px;
        border-radius: 5px;
        width: 20%;
        overflow: hidden;
    }

    #search-button{
        padding: 5px;
        margin-right: 30px;
        margin-left: 0;
        font-size: 18px;
        background: #6981d6;
        cursor: pointer;
        border-radius: 5px;
    }

    #search-button:hover {
        background: rgb(146, 160, 212);
        transform: scale(1.02);
    }
    
</style>

<div class="view-students-container">

    <div class = "search-bar">
        <form action="../Admin/view-students.php" method="POST">
            <input class="search-field" type="text" placeholder="Student ID..." name="id_search"></input>
            <input class="search-field" type="text" placeholder="Program ID..." name="prgm_search"></input>
            <input class="search-field" type="text" placeholder="Enrolled Year..." name="year_search"></input>
            <input class="search-field" type="text" placeholder="First Name.." name="name_search"></input>

            <button id="search-button" type="submit"><i class="fa fa-search"></i></button>
        </form>
        <button id="add-student-button" onclick="window.open('../Admin/new-student.php','_self')">  Add Student </button>
    </div>

    <?php include("../FunctionFiles/load-all-students.php");?>

</div>

<?php
    include("../Layouts/footer.php");
?>