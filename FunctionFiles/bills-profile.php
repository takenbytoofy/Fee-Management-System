<?php

    require("../FunctionFiles/validate-admin-session.php");
    require("../FunctionFiles/dbconnect.php");

    $pageHeader = "Bill Preview";
    $pageTitle = "Bill Preview";

    include("../Layouts/header.php");
    include("../Layouts/nav-admin.php");

    $prgm = $_POST['program-enrolled'];
    $year = $_POST['enrolled-year'];
    $inst = $_POST['installment'];
    $dueDate = $_POST['due-date'];

    $curDate = date('Y-m-d');

    if ($inst == "Admission") {
        $field = 'admission_fee';
    } else {
        $field = 'inst_' . $inst;
    }

    $amountQuery = "
        SELECT $field 
        FROM fee_structure
        WHERE Prgm_ID = '$prgm' AND Enr_year = '$year';
    "; 

    $amountQueryResult = $dbConn -> query($amountQuery);

    $data = $amountQueryResult -> fetch_assoc();
    
    $amount = $data[$field];
?>

<div class="bill-preview-container">

    <form action="../FunctionFiles/add-new-bill.php" method="post">

        <h3> Fee Bill </h3>
        
        <span>
            <label> Program ID: </label>
            <input type=text name='prgm' value='<?php echo $prgm;?>' readonly> <br>
        </span>

        <span>
            <label> Enrollement Year: </label>
            <input type=text name='enr-year' value='<?php echo $year;?>' readonly> <br>
        </span>

        <span>
            <label> Installment Num: </label>
            <input type=text name='inst' value='<?php echo $inst;?>' readonly> <br>
        </span>

        <span>
            <label> Amount (Rs): </label>
            <input type=text name='amount' value='<?php echo $amount;?>' readonly> <br>
        </span>

        <span>
            <label>Created Date: </label>
            <input type=text name='cre-date' value='<?php echo $curDate;?>' readonly> <br>
        </span>
        
        <span>
            <label>Due Date: </label>
            <input type=text name='due-date' value='<?php echo $dueDate;?>' readonly> <br>
        </span>
        
        <button id="confirm-button"> Confirm </button>
    </form>

</div>

<style> 

    .bill-preview-container{
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .bill-preview-container form {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 1rem 0rem;
        padding: 2rem 2rem;
        background-color: white;
        border-radius: 10px;
        border-style: solid;
        border-color: #7a7edb;
        border-width: 3px;
        font-size: 20px;
        position: relative;
    }
    .bill-preview-container form span {
        display:grid;
        grid-template-columns: 10rem 20rem;
        grid-template-rows: 3.4rem;
    }

    .bill-preview-container form label{
        margin: .8rem 0rem;
        position: relative;
    }

    .bill-preview-container form input, select{
        margin: .5rem 0rem;
        padding: .1rem .5rem;
        font-size: 20px;
        width: auto;
        height: 35px;
        border: 1px solid black;
        position: relative;
    }

    #print{
        background-color: lime;
        border-radius: 5px;
        width: 100px;
        height: 30px;
        font-size: 15px;
        margin-left: 10px;
        margin-right: 20px;
        float: right;
        
    }
    #confirm-button{
        color: white;
        background-color: #6981d6;
        border-radius: 5px;
        width: 100px;
        height: 30px;
        font-size: 16px;
        margin-top: 20px;
        padding: 5px;
    }

    #confirm-button:hover{
        background: rgb(146, 160, 212);
        transform: scale(1.02);
    }

</style>

<?php
    include('../Layouts/footer.php');
?>