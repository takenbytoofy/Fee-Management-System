<?php

    require("../FunctionFiles/validate-admin-session.php");
    require("../FunctionFiles/dbconnect.php");

    $pageHeader = "Add Receipts";
    $pageTitle = "Add Receipts";

    include("../Layouts/header.php");
    include("../Layouts/nav-admin.php");

?>

<div class="add-receipt-container">

    <form action="" method="post">
        <span>
            <label for="student-name"> Student Name: </label>
            <input type="text" name="student-name" id="student-name" required><br>
        </span>

        <span>
            <label for="program-name"> Program Name: </label>
            <input type="text" name="program-name" id="program-name" required><br>
        </span>

        <span>
            <label for="program-id"> Program ID: </label>
            <input type="number" name="program-id" id="program-id" required><br>
        </span>

        <span>
            <label for="pmt-date"> Payment Date: </label>
            <input type="date" name="date" id="payment-date" required><br>
        </span>

        <span>
            <label for="choose-file"> Upload Receipt : </label>
            <input type="file" name="receipt" id="choose-file" required><br>
        </span>
            
        <button id="receipt-submit-button"> Submit </button>
    </form>

</div>

<style> 
    .add-receipt-container{
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .add-receipt-container form {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 2rem 2rem;
        background-color: white;
        border-radius: 10px;
        border-style: solid;
        border-color: #7a7edb;
        border-width: 3px;
        font-size: 20px;
        position: relative;
    }

    .add-receipt-container form span {
        display:grid;
        grid-template-columns: 14rem 20rem;
        grid-template-rows: 3.4rem;
    }
    
    .add-receipt-container form label{
        margin: .8rem 0rem;
        position: relative;
    }

    .add-receipt-container form input,select{
        margin: .5rem 0rem;
        padding: .1rem .5rem;
        font-size: 20px;
        width: auto;
        height: 35px;
        border: 1px solid black;
        position: relative;
    }

    .add-receipt-container form #receipt-submit-button{
        background-color: #6981d6;
        color:white;
        border-radius: 5px;
        width: 100px;
        height: 30px;
        font-size: 16px;
        margin-top: 30px;
        padding: 5px;
    }
    
    .add-receipt-container form #receipt-submit-button{
        background: rgb(146, 160, 212);
        transform: scale(1.02);
    }
    
</style>

<?php
    include('../Layouts/footer.php');
?>