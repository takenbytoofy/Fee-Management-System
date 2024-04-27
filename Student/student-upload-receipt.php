<?php
    require("../FunctionFiles/validate-student-session.php");
    require("../FunctionFiles/dbconnect.php");

    $pageHeader = "Upload Fee Receipt";
    $pageTitle="Student Fees";

    include("../Layouts/header.php");
    include("../Layouts/nav-student.php");

?>

<style>

    .upload-receipt-container {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .upload-receipt-container form {
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

    .upload-receipt-container form span {
        display:grid;
        grid-template-columns: 12rem 20rem;
        grid-template-rows: 3.4rem;
    }

    .upload-receipt-container form label{
        margin: .8rem 0rem;
        position: relative;
    }

    .upload-receipt-container form input, select{
        margin: .5rem 0rem;
        padding: .1rem .5rem;
        font-size: 20px;
        width: auto;
        height: 35px;
        border: 1px solid black;
        position: relative;
    }

    #receipt-submit-button{
        color: white;
        background-color: #6981d6;
        border-radius: 5px;
        width: 100px;
        height: 30px;
        font-size: 16px;
        margin-top: 20px;
        padding: 5px;
    } 
    #receipt-submit-button:hover{
        background: rgb(146, 160, 212);
        transform: scale(1.02);
    }

</style>

<script>

    function validateFeeSubmit () {
        var submitRemarks = document.forms["fee-submit-form"]["submit-remarks"].value;
        var submitDate = document.forms["fee-submit-form"]["submit-date"].value;
        var submitFile = document.forms["fee-submit-form"]["submit-receipt"].value;

        if (submitRemarks == "" || submitDate == "" || submitFile == "") {
            alert("All fields required");
            return false;
        } else {
            return true;
        }
    }

</script>

<div class="upload-receipt-container">

    <form id="fee-submit-form" action= "../FunctionFiles/fee-submit-function.php" method="post" enctype="multipart/form-data" onsubmit="return validateFeeSubmit()">

        <label id="form-label"> <h3> Upload Latest Fee Payment Receipt </h3> </label>
        
        <span>   
            <label>Remarks: </label>
            <input type="text" name="submit-remarks" placeholder="Remarks..." id="input-remarks">
        </span>
        <span>
            <label>Deposit Date:</label>
            <input type="date" name="submit-date" id="payment-date">
        </span>
        <span>
            <Label>Installment No:</Label>
            <select name="instNumber">

            </select>
        </span>
        <span>
            <label>Upload Receipt:</label>
            <input type="file" name="submit-receipt" id="choose-file">
        </span>
        
        <button id="receipt-submit-button"> Submit </button>

    </form>

</div>

<?php

    include("../Layouts/footer.php");

?>
