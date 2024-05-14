<?php

    require("../FunctionFiles/validate-admin-session.php");
    require("../FunctionFiles/dbconnect.php");

    $pageHeader = "Student Bills";
    $pageTitle = "Student Bills";

    include("../Layouts/header.php");
    include("../Layouts/nav-admin.php");

?>

<style>

    .view-student-bills-container {
        display: flex;
        flex-direction: column;
        align-items: center;
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
        width: 40%;
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

<div class="view-student-bills-container">

    <?php include("../Layouts/more-fees-option-bar.php");?>

    <div class="search-bar">
        <form action="../Admin/view-student-bills.php" method="POST">
            <input class="search-field" type="text" placeholder="Student ID..." name="id_search">
            <input class="search-field" type="text" placeholder="Program ID.." name="prgm_search">
            <input class="search-field" type="text" placeholder="Enrollment Year..." name="year_search">
            <select class='search-field' name='status_search'>
                <option disabled selected value>
                <option value="Paid">Paid</option>
                <option value="Unpaid">Unpaid</option>
            </select>
            <button id="search-button" type="submit"><i class="fa fa-search"></i></button>
        </form>

    </div>

    <?php include("../FunctionFiles/load-all-student-bills.php");?>

</div>


<?php
    include("../Layouts/footer.php");
?>