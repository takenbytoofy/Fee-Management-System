<?php
    
    require("../FunctionFiles/validate-admin-session.php");
    require("../FunctionFiles/dbconnect.php");
    
    $pageHeader = "Fees";
    $pageTitle = "Fees";

    include("../Layouts/header.php");
    include("../Layouts/nav-admin.php");

?>

<script>

    var Btn1 = document.querySelector('#btn1');
    var sidebar1 = document.querySelector('.sidebar1');

    Btn1.onclick = function () {
        sidebar1.classList.toggle('active');
    }; 

</script>

<style>

    .view-fees-container {
        display: flex;
        align-items: center;
        flex-direction: column;
    }

    .unverified-receipts-container {
        display: flex;
        align-items: center;
        /* justify-content: center; */
        flex-direction: column;
        margin: .5rem .5rem;
        padding: .5rem .5rem;
        background-color: white;
        border-radius: 4px;
        border-style: solid;
        border-color: #7a7edb;
        border-width: 3px;
        font-size: 20px;
    }

    .search-bar{
        margin: .5rem 0rem;
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
        width: 30%;
    }

    #search-button{
        padding: 5px;
        font-size: 18px;
        background: #6981d6;
        cursor: pointer;
        border-radius: 5px;
    }

    #search-button:hover {
        background: rgb(146, 160, 212);
        transform: scale(1.02);
    }

    .more-fee-options-bar {
        display: flex;
        background-color: #6981d6;
        color: white;
        margin-bottom: 2rem;
        border-radius: 8px;
    }

    .more-fee-options-bar .options {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 3rem;
        width: auto;
        padding: .5rem 3rem;
        cursor: pointer;
    }

    .more-fee-options-bar .options:hover {
        background: rgb(146, 160, 212);
        transform: scale(1.02);
        border-radius: 8px;
    }


</style>

<div class="view-fees-container">

    <?php include("../Layouts/more-fees-option-bar.php");?>

    <div class="unverified-receipts-container">

        <h3>Unverified Receipts</h3>

        <div class="search-bar">

            
        <form action="../Admin/view-fees.php" method="post">
            <input class="search-field" type="text" placeholder="Receipt Number.." name="id_search">
            <input class="search-field" type="text" placeholder="Student Name.." name="stdID_search">
            <input class="search-field" type="text" placeholder="Program ID.." name="prgm_search">
            <input class="search-field" type="number" placeholder="Enrollment Year.." name="year_search">
            <button id="search-button" type="submit"><i class="fa fa-search"></i></button>
        </form>

        </div>

        <?php include('../FunctionFiles/load-unverified-receipts.php');?>
       
    </div>

</div>
    


<?php
    include("../Layouts/footer.php");
?>