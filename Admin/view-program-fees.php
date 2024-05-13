<?php

    require("../FunctionFiles/validate-admin-session.php");
    require("../FunctionFiles/dbconnect.php");
    
    $pageHeader = "Program Fees";
    $pageTitle = "Program Fees";

    include("../Layouts/header.php");
    include("../Layouts/nav-admin.php");

?> 

<style>

    .view-program-fee-container {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    #add-program-fee-button{
        margin: 10px;
        padding: 5px;
        background-color: #6981d6;
        color: white;
        width: 120px;
        border-radius: 5px;
        font-size: 18px;
    }

    #add-program-fee-button:hover {
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

<div class="view-program-fee-container">
    
    <?php include("../Layouts/more-fees-option-bar.php");?>

    <div class="search-bar">
        <form  action="../Admin/view-program-fees.php">
            <input class="search-field" type="text" placeholder="Program ID.." name="id_search">
            <input class="search-field" type="number" placeholder="Year..." name="year_search">
            <button id="search-button" type="submit"><i class="fa fa-search"></i></button>
        </form>
        <button id="add-program-fee-button" onclick="window.open('./new-program-fee.php','_self')">  Add Fees </button>
    </div>

    <?php include("../FunctionFiles/load-all-program-fees.php");?>
</div>
   
<?php
    include("../Layouts/footer.php");
?>