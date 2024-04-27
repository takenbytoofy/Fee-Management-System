<?php
    require("../FunctionFiles/validate-admin-session.php");
    require("../FunctionFiles/dbconnect.php");

    $pageHeader = "Edit Program";
    $pageTitle = "Edit Program";
    
    include("../Layouts/header.php");
    include("../Layouts/nav-admin.php");

    $prgmID = $_GET['PrgmID'];
    $existingProgramsQuery = "SELECT Prgm_name FROM program WHERE Prgm_ID = '$prgmID';";
    $existingProgramsResult = $dbConn -> query($existingProgramsQuery);
    $prgmName = $existingProgramsResult -> fetch_assoc()['Prgm_name'];

?>

<script>
    function editProgramFunction(){
        let a = document.forms["edit-program-form"]["program-name"].value;
        let b = document.forms["edit-program-form"]["program-id"].value;
        
        if(a=="" || b==""){
            alert("All Student Details is Required");
            return false;
        }else {
            return true;
        }
    }
</script>

<style>

    .edit-program-container{
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .edit-program-container form {
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

    .edit-program-container form span {
        display:grid;
        grid-template-columns: 14rem 20rem;
        grid-template-rows: 3.4rem;
    }

    .edit-program-container form label{
        margin: .8rem 0rem;
        position: relative;
    }

    .edit-program-container form input,select{
        margin: .5rem 0rem;
        padding: .1rem .5rem;
        font-size: 20px;
        width: auto;
        height: 35px;
        border: 1px solid black;
        position: relative;
    }

    .edit-program-container form #submit-button{
        background-color: #6981d6;
        color:white;
        border-radius: 5px;
        width: 100px;
        height: 30px;
        font-size: 16px;
        margin-top: 30px;
        padding: 5px;
    }

    .edit-program-container form #submit-button:hover{
        background: rgb(146, 160, 212);
        transform: scale(1.02);
    }

</style>

<div class="edit-program-container">

    <form name="edit-program-form" action="../FunctionFiles/edit-program-function.php" method="POST" onsubmit="editProgramFunction()">

        <span>
            <label>Current Program ID: </label>
            <input type="text" name="cur-program-id" value='<?php echo $prgmID?>' readonly>
        </span>

        <span>
            <label>Current Program Name: </label>
            <input type="text" name="cur-program-name" value='<?php echo $prgmName?>' readonly>
        </span>

        <span>
            <label>New Program ID: </label>
            <input type="text" name="new-program-id" value='<?php echo $prgmID?>'>
        </span>

        <span>
            <label>New Program Name: </label>
            <input type="text" name="new-program-name" value='<?php echo $prgmName?>'>
        </span>
        
        <button id="submit-button" type="submit"> Submit </button>

    </form>

</div>

<?php
    include("../Layouts/footer.php");
?>