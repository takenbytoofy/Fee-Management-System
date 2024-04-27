<?php

    require("../FunctionFiles/validate-admin-session.php");
    require("../FunctionFiles/dbconnect.php");

    $pageHeader = "Bills";
    $pageTitle = "Bills";

    include("../Layouts/header.php");
    include("../Layouts/nav-admin.php");

?>

<style>

    .view-bills-container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    #add-bill-button{
        float: right;
        padding: 5px;
        background-color: #6981d6;
        color: white;
        width: 100px;
        border-radius: 5px;
        font-size: 18px; 
    }

    #add-bill-button:hover {
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

<div class="view-bills-container">

    <div class="search-bar">
        <form action="../Admin/view-bills.php" method="POST">
            <input class="search-field" type="text" placeholder="Program ID.." name="prgm_search">
            <input class="search-field" type="text" placeholder="Enrollment Year..." name="year_search">
            <input class="search-field" type="text" placeholder="Installment..." name="inst_search">
            <button id="search-button" type="submit"><i class="fa fa-search"></i></button>
        </form>

        <button id="add-bill-button" onclick="window.open('../Admin/new-bill.php','_self')">  New Bill</button>

    </div>

    <?php include("../FunctionFiles/load-all-bills.php");?>

</div>


<?php
    include("../Layouts/footer.php");
?>