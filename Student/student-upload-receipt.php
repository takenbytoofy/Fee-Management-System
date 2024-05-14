<?php
    require("../FunctionFiles/validate-student-session.php");
    require("../FunctionFiles/dbconnect.php");

    $pageHeader = "Upload Fee Receipt";
    $pageTitle="Student Fees";

    include("../Layouts/header.php");
    include("../Layouts/nav-student.php");

    $username = $_SESSION['userid'];

    $studentDetailsQuery = "
    SELECT S.Std_ID, S.Prgm_ID, S.Enr_year
    FROM student as S
    INNER JOIN student_login as Sl
    ON S.Std_ID = Sl.Std_ID
    WHERE Sl.std_uname = '$username';
    ";

    $studentDetailsResult = $dbConn -> query($studentDetailsQuery);
    $studentDetailsData = $studentDetailsResult -> fetch_assoc();

    $stdID = $studentDetailsData['Std_ID'];
    $prgmID = $studentDetailsData['Prgm_ID'];
    $enrYear = $studentDetailsData['Enr_year'];

    $unpaidBillsQuery = "
    SELECT sb.Bill_ID, pb.installment, pb.create_date, pb.due_date
    FROM student_bill AS sb
    INNER JOIN program_bill as pb
    ON sb.Bill_ID = pb.Bill_ID
    WHERE sb.Std_ID = '$stdID' AND sb.Prgm_ID = '$prgmID' AND sb.Enr_year = '$enrYear' AND sb.Bill_Status = 'Unpaid';
    ";

    $unpaidBillsResult = $dbConn -> query($unpaidBillsQuery);
?>

<style>

    .upload-receipt-container {
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 2rem 0rem;
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

    function newStudentFormValidate(){

        let a = document.forms["fee-submit-form"]["feeRemarks"].value;
        let b = document.forms["fee-submit-form"]["depositDate"].value;
        let c = document.forms["fee-submit-form"]["billID"].value;
        let d = document.forms["fee-submit-form"]["feeReceiptImg"].value;

        if(a=="" || b=="" || c=="" || d==""){
            alert("Please fill all details.");
            return false;
        }else {
            return true;
        }
        
    }

</script>

<div class="upload-receipt-container">

    <form id="fee-submit-form" action="../FunctionFiles/student-fee-submit.php" onsubmit="return newStudentFormValidate()" method="post" enctype="multipart/form-data">

        <label id="form-label"> <h3> Upload Latest Fee Payment Receipt </h3> </label>
        
        <span>   
            <label>Remarks:</label>
            <input type="text" name="feeRemarks" placeholder="Remarks..." id="feeRemarks">
        </span>
        <span>
            <label>Deposit Date:</label>
            <input type="date" name="depositDate" id="depositDate">
        </span>
        <span>
            <label>Bill: </Label>
            <select name="billID" id="billID">
                <option disabled selected value>
            <?php
            
                if ($unpaidBillsResult -> num_rows > 0) {
                
                    while ($data = $unpaidBillsResult->fetch_assoc()) {
                        $billID = $data['Bill_ID'];
                        if ($data['installment'] == "Admission") {
                            $inst = $data['installment'];
                        } else {
                            $inst = 'Installment ' . $data['installment'];
                        }
                        echo "<option value=".$data['Bill_ID']."> Bill: ".$billID." - ".$inst."</option>";
                    }

                }
            
            ?>
            </select>
        </span>
        <span>
            <label>Upload Receipt:</label>
            <input type="file" name="feeReceiptImg" id="feeReceiptImg" multiple="">
        </span>
        
        <button id="receipt-submit-button" type="submit"> Submit </button>

    </form>

</div>

<?php

    include("../Layouts/footer.php");

?>
