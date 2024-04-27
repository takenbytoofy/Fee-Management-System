<?php

    require("../FunctionFiles/validate-admin-session.php");
    require("../FunctionFiles/dbconnect.php");

    $pageHeader = "Verify Receipt";
    $pageTitle = "Verify Receipt";

    include("../Layouts/header.php");
    include("../Layouts/nav-admin.php");

    $recID = $_GET['recID'];

    $receiptDetailsQuery = 
    "
        SELECT *
        FROM fee_receipts
        WHERE receipt_id = '$recID';
    ";

    $receiptDetailsQueryResult = $dbConn -> query($receiptDetailsQuery);
    $result = $receiptDetailsQueryResult->fetch_assoc();

    $stdID = $result['Std_ID'];
    $prgmID = $result['Prgm_ID'];
    $enyr = $result['Enr_year'];
    $pmt_date = $result['pmt_date'];
    $receiptImg = $result['receipt_img'];

    $studentNameQuery = 
    "
        SELECT Std_fname, Std_lname
        FROM student
        WHERE Std_ID = '$stdID' AND Prgm_ID = '$prgmID' AND Enr_year = '$enyr';
    ";
    $studentNameQueryResult = $dbConn -> query($studentNameQuery);
    $studentNameResult = $studentNameQueryResult -> fetch_assoc();
    $stdName = $studentNameResult['Std_fname'] . ' ' . $studentNameResult['Std_lname'];

?>

<div class="receipt-profile-container">

    <form action="" method="post">
        
        <span>
            <label class="title"> Student ID: </label>
            <input type="text" value='<?php echo $stdID;?>' readonly><br>
        </span>
                
        <span>
            <label class="title"> Student Name: </label>
            <input type="text" value='<?php echo $stdName;?>' readonly><br>
        </span>
                
        <span>
            <label class="title"> Program ID: </label>
            <input type="text" value='<?php echo $prgmID;?>' readonly><br>
        </span>
                
        <span>
            <label class="title"> Enrollment Year: </label>
            <input type="text" value='<?php echo $enyr;?>' readonly><br>
        </span>

        <span>
            <label class="title"> Payment Date </label>
            <input type="text" value='<?php echo $pmt_date;?>' readonly><br>
        </span>
        
        <h4>Uploaded Receipt</h4>
        <div class='receipt-image'>
            <?php print $receiptImg;?>
        </div>
        <br>

        <div class="buttons"> 
            <button id="accept-button" onclick=""> Accept </button> 
            <button id="decline-button" onclick=""> Decline</button>
        </div>
    </form>

</div>

<style> 
    .receipt-profile-container{
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .receipt-profile-container form {
        height: auto;
        width: auto;
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

    .receipt-profile-container form span {
        display:grid;
        grid-template-columns: 10rem 20rem;
        grid-template-rows: 3.4rem;
    }

    .receipt-profile-container form label{
        margin: .8rem 0rem;
        position: relative;
    }   

    .receipt-profile-container form input, select{
        margin: .5rem 0rem;
        padding: .1rem .5rem;
        font-size: 20px;
        width: auto;
        height: 35px;
        border: 1px solid black;
        position: relative;
    }

    .receipt-image{
        width: 550px; 
        height: 380px;
        border: 2px solid #7a7edb;
        border-radius: 4px;
    }
    
    #accept-button{
        background-color: lime;
        border-radius: 5px;
        border-radius: 5px;
        width: 100px;
        height: 30px;
        font-size: 16px;
        margin-top: 20px;
        padding: 5px;
    }

    #decline-button{
        background-color: #f59090;
        border-radius: 5px;
        width: 100px;
        height: 30px;
        font-size: 16px;
        margin-top: 20px;
        padding: 5px;
    }

    #accept-button, #decline-button :hover {
        transform: scale(1.02);
    }

    .receipt-profile-container form .buttons {
        display: flex;
        gap: 2rem;
    }

</style>

<?php
    include('../Layouts/footer.php');
?>
