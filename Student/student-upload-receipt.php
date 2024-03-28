<?php

    $pageHeader = "Upload Fee Receipt";
    $pageTitle="Student Fees";

    require("../FunctionFiles/validate-session.php");
    include("../Layouts/header.php");
    include("../Layouts/nav-student.php");

?>

<style>

    #upload-receipt-page-container{
        height: 100%;
        display: grid;
        grid-template-columns: auto;
        grid-template-rows: auto;
        align-items: center;
        justify-content: center;
    }

    #fee-submit-form {
        display: grid;
        grid-template-columns: auto;
        grid-template-rows: auto auto auto auto;
        align-items: center;
        justify-content: center;
    }

    #form-label{
        margin: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 20px;
    }   

    #input-remarks{
        margin-bottom: 20px;
        padding-left: 10px;

        color: rgb(30, 2, 54);
        font-size: 18px;
        text-align: left;
        background-color: rgba(240, 240, 240, 80%);

        width: 400px;
        height: 40px;

        border-radius: 16px;
        border: none;
    }

    #payment-date{
        margin-bottom: 20px;
        padding-left: 10px;

        color: rgb(30, 2, 54);
        font-size: 18px;
        text-align: left;
        background-color: rgba(240, 240, 240, 80%);

        width: 400px;
        height: 40px;

        border-radius: 16px;
        border: none;
    }

    #choose-file{
        margin-bottom: 20px;
        padding-left: 10px;

        color: rgb(30, 2, 54);
        font-size: 18px;
        text-align: left;
        background-color: rgba(240, 240, 240, 80%);

        width: 400px;
        height: 40px;

        border-radius: 16px;
        border: none;
    }

    #receipt-submit-button{
        height: 32px;
        width: 100px;
        /* Font Style */
        font-size: 18px;
        color: white;
        /* Background and Border */
        border-radius: 36px;
        border: none;
        background-color: rgba(30, 2, 54, 100%);
    } 

    #receipt-submit-button:hover{
        transition-duration: 300ms;
        background-color: rgba(30, 2, 54, 50%);
    }

    #receipt-submit-button:active {
        transition-duration: 300ms;
        transform: scale(1.05);
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

<div id="upload-receipt-page-container">

    <form id="fee-submit-form" action= "../FunctionFiles/fee-submit-function.php" method="post" enctype="multipart/form-data" onsubmit="return validateFeeSubmit()">

        <label id="form-label"> Upload Latest Fee Payment Receipt</label><br>

        <input type="text" name="submit-remarks" placeholder="Remarks" id="input-remarks"><br>
        <input type="date" name="submit-date" id="payment-date"> <br>
        <input type="file" name="submit-receipt" id="choose-file"> <br>
        
        <button id="receipt-submit-button"> Submit </button>

    </form>

</div>

<?php

    include("../Layouts/footer.php");

?>
