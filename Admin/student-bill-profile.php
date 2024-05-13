<?php

    require("../FunctionFiles/validate-admin-session.php");
    require("../FunctionFiles/dbconnect.php");

    $pageHeader = "Student Bill";
    $pageTitle = "Student Bill";

    include("../Layouts/header.php");
    include("../Layouts/nav-admin.php");

    $stdID = $_GET['StdID'];
    $prgm = $_GET['PrgmID'];
    $year = $_GET['EnrYear'];
    $billID = $_GET['BillID'];

    $studentBillProfileQuery = "
        SELECT S.Std_fname, S.Std_lname, Sb.Std_ID, Sb.Prgm_ID, Sb.Enr_year, Sb.Bill_ID, Sb.Bill_Status, Pb.installment, Pb.create_date, Pb.due_date
        FROM student AS S
        INNER JOIN student_bill AS Sb
        ON  S.Std_ID = Sb.Std_ID AND S.Prgm_ID = Sb.Prgm_ID AND S.Enr_year = Sb.Enr_year
        INNER JOIN program_bill AS Pb
        ON Sb.Bill_ID = Pb.Bill_ID
        HAVING Sb.Std_ID = '$stdID' AND Sb.Prgm_ID = '$prgm' AND Sb.Enr_year = '$year' AND Sb.Bill_ID = '$billID';
    "; 

    $studentBillProfileResult = $dbConn -> query($studentBillProfileQuery);
    $studentBillData = $studentBillProfileResult -> fetch_assoc();

    $inst = $studentBillData['installment'];

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

<div class="student-bill-profile-container">

    <div class="profile">

        <h3> <?php echo $studentBillData['Std_fname']?>'s Bill </h3>
        
        <span>
            <label> Name: </label>
            <input type=text name='stdName' value='<?php echo $studentBillData['Std_fname']." ".$studentBillData['Std_lname'];?>' readonly> <br>
        </span>
        
        <span>
            <label> Name: </label>
            <input type=text name='stdID' value='<?php echo $studentBillData['Std_ID'];?>' readonly> <br>
        </span>
        
        <span>
            <label> Program:</label>
            <input type=text name='prgm' value='<?php echo $studentBillData['Prgm_ID']." ".$studentBillData['Enr_year'];?>' readonly> <br>
        </span>

        <span>
            <label> Bill ID: </label>
            <input type=text name='billID' value='<?php echo $studentBillData['Bill_ID'];?>' readonly> <br>
        </span>

        <span>
            <label> Bill Status: </label>
            <input type=text name='billStatus' value='<?php echo $studentBillData['Bill_Status'];?>' readonly> <br>
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
            <input type=text name='cre-date' value='<?php echo $studentBillData['create_date'];?>' readonly> <br>
        </span>
        
        <span>
            <label>Due Date: </label>
            <input type=text name='due-date' value='<?php echo $studentBillData['due_date'];?>' readonly> <br>
        </span>

    </div>

</div>

<style> 

    .student-bill-profile-container{
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .student-bill-profile-container .profile {
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
    .student-bill-profile-container .profile span {
        display:grid;
        grid-template-columns: 10rem 20rem;
        grid-template-rows: 3.4rem;
    }

    .student-bill-profile-container .profile label{
        margin: .8rem 0rem;
        position: relative;
    }

    .student-bill-profile-container .profile input, select{
        margin: .5rem 0rem;
        padding: .1rem .5rem;
        font-size: 20px;
        width: auto;
        height: 35px;
        border: 1px solid black;
        position: relative;
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