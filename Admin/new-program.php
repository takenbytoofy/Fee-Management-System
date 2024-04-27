<?php
    require("../FunctionFiles/validate-admin-session.php");
    require("../FunctionFiles/dbconnect.php");

    $pageHeader = "New Program";
    $pageTitle = "New Program";
    
    include("../Layouts/header.php");
    include("../Layouts/nav-admin.php");

?>

<script>
    function jsFormValidate(){
        let a = document.forms["add-program-form"]["program-name"].value;
        let b = document.forms["add-program-form"]["program-id"].value;
    
        
        if(a=="" || b==""){
            alert("All Student Details is Required");
            return false;
        }else {
            return true;
        }
    }
</script>

<style>

    .new-program-container{
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .new-program-container form {
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

    .new-program-container form span {
        display:grid;
        grid-template-columns: 14rem 20rem;
        grid-template-rows: 3.4rem;
    }

    .new-program-container form label{
        margin: .8rem 0rem;
        position: relative;
    }

    .new-program-container form input,select{
        margin: .5rem 0rem;
        padding: .1rem .5rem;
        font-size: 20px;
        width: auto;
        height: 35px;
        border: 1px solid black;
        position: relative;
    }

    .new-program-container form #submit-button{
        background-color: #6981d6;
        color:white;
        border-radius: 5px;
        width: 100px;
        height: 30px;
        font-size: 16px;
        margin-top: 30px;
        padding: 5px;
    }

    .new-program-container form #submit-button:hover{
        background: rgb(146, 160, 212);
        transform: scale(1.02);
    }

</style>

<div class="new-program-container">

    <form name="add-program-form" action="../FunctionFiles/add-new-program.php" method="POST" onsubmit="return jsFormValidate()">

        <span>
            <label> Program ID: </label>
            <input type="text" name="program-id">
        </span>

        <span>
            <label> Program Name: </label>
            <input type="text" name="program-name">
        </span>
        
        <button id="submit-button" type="submit"> Submit </button>

    </form>

</div>

<?php
    include("../Layouts/footer.php");
?>