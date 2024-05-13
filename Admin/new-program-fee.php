<?php
    require("../FunctionFiles/validate-admin-session.php");
    require("../FunctionFiles/dbconnect.php");

    $pageHeader = "New Program Fee";
    $pageTitle = "New Program Fee";
    
    include("../Layouts/header.php");
    include("../Layouts/nav-admin.php");

    $existingProgramsQuery = "SELECT Prgm_ID FROM program ORDER BY Prgm_ID ASC;";
    $existingProgramsResult = $dbConn -> query($existingProgramsQuery);

    function yearsMenu() {
        $currYear = date('Y');
        for ($x = $currYear - 20; $x < $currYear + 20; $x++) {
            echo "<option value=".$x.">".$x."</option>";
        }
    }

?>

<script>
    function calcTotalFees() {
        let admFee = parseFloat(document.getElementById("admissionFee").value);
        let instFee = parseFloat(document.getElementById("installmentFee").value);
        let numOfInst = parseFloat(document.getElementById("totalInstallment").value);
        let totalFee = admFee + (numOfInst * instFee);


        if (isNaN(admFee)) {
            totalFee = insFee * numOfInst;
        } else if (isNaN(instFee)) {
            totalFee = admFee;
        } else {
            totalFee = admFee + (instFee * numOfInst);
        }

        document.getElementById("totalFees").value = totalFee;
    }

</script>

<style> 
    .new-program-fee-container {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .new-program-fee-container form {
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

    .new-program-fee-container form span {
        display:grid;
        grid-template-columns: 14rem 20rem;
        grid-template-rows: 3.4rem;
    }

    .new-program-fee-container form label{
        margin: .8rem 0rem;
        position: relative;
    }

    .new-program-fee-container form input, select{
        margin: .5rem 0rem;
        padding: .1rem .5rem;
        font-size: 20px;
        width: auto;
        height: 35px;
        border: 1px solid black;
        position: relative;
    }

    #create-fee{
        background-color: #6981d6;
        color:white;
        border-radius: 5px;
        width: 100px;
        height: 30px;
        font-size: 16px;
        margin-top: 30px;
        padding: 5px;
    }

    #create-fee:hover {
        background: rgb(146, 160, 212);
        transform: scale(1.02);
    }
</style>

<div class="new-program-fee-container">

    <form name="new" action="../FunctionFiles/add-new-program-fee.php" method="post">

        <span>
            <label for="program-id"> Program ID: </label>
            <select  name="program-id" required>
                <option disabled selected value>
                <?php
                    while ($dataRow = $existingProgramsResult -> fetch_assoc()) {
                        echo "<option>". $dataRow['Prgm_ID'] ."</option>";
                    }
                ?>
            </select>
        </span>

        <span>
            <label for="year"> Year: </label>
            <select  name="enrYear" id ="enrYear" placeholder= required> 
                <option disabled selected value>
                <?php yearsMenu()?>
            </select>
        </span>

        <span>
            <label> Admission Fee: </label>
            <input id="admissionFee" oninput="calcTotalFees()" type="number" name="admissionFee" required><br>
        </span>

        <span>
            <label for="tuition-fee">Fee Per Installment: </label>
            <input type="number" name="installmentFee"  id="installmentFee" oninput="calcTotalFees()" required><br>
        </span>

        <span>
            <label for="total-installment"> Number of Installments: </label>
            <input type="number" name="totalInstallment"  id="totalInstallment" value="16" readonly></input><br>
        </span>

        <span>
           <label>Total:</label>
           <input type="number" name="totalFees"  id="totalFees"></input><br>
        </span>
       
        <button id="create-fee"> Create </button>
    </form>

</div>