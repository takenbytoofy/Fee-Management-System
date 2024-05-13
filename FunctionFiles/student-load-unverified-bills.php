<?php

    require("../FunctionFiles/dbconnect.php");
    $username = $_SESSION['userid'];

    $unverifiedBillsQuery = "
        SELECT fr.pmt_date, sb.Bill_ID, pb.installment, pb.due_date
        FROM fee_receipts as fr
        INNER JOIN student_bill AS sb
        ON fr.Std_ID = sb.Std_ID AND fr.Prgm_ID = sb.Prgm_ID AND fr.Enr_year = sb.Enr_year AND fr.Bill_ID = sb.Bill_ID
        INNER JOIN program_bill AS pb
        ON sb.Bill_ID = pb.Bill_ID
        WHERE fr.receipt_status = 'Unverified' AND fr.Std_ID = '$stdID' AND fr.Prgm_ID = '$prgmID' AND fr.Enr_year = '$enrYear';
    ";

    $unverifiedBillsResult = $dbConn -> query($unverifiedBillsQuery);

?>

<style>

    .student-unverified-bills-table-display table{
        width: 100%;
        border: 2px solid black;
        border-collapse: collapse;
        text-align: center;
        border-spacing: 10px;
    }
    
    .student-unverified-bills-table-display table th, td{
        border: 2px solid black;
        border-collapse: collapse;
        text-align: center;
        font-size: 18px;
        padding: 0.5rem 0.5rem;
    }

    .student-unverified-bills-table-display table th{
        background-color: #6981d6;
        color: white;
        padding: 10px;
        font-size: 18px;
    }

    .student-unverified-bills-table-display table #edit-button{
        margin: 10px;
        background-color: #6981d6;
        color: white;
        padding: 5px;
        width: 100px;
        border-radius: 4px;
        font-size: 18px;
    }

    .student-unverified-bills-table-display table #edit-button:hover {
        background-color: rgb(146, 160, 212);
        transform: scale(1.02);
    }

</style>

<div class="student-unverified-bills-table-display">

    <table>

        <?php
        
            if ($unverifiedBillsResult -> num_rows > 0) {
                echo "
                    <tr>
                        <th>Bill ID</th>
                        <th>Installment</th>
                        <th>Amount</th>
                        <th>Due Date</th>
                        <th>Payment Date</th>
                    </tr>
                ";

                while ($unverifiedBillsData = $unverifiedBillsResult->fetch_assoc()) {

                    $inst = $unverifiedBillsData['installment'];

                    if ($inst == "Admission") {
                        $field = 'admission_fee';
                    } else {
                        $field = 'inst_' . $inst;
                    }

                    $amountQuery = "
                        SELECT $field 
                        FROM fee_structure
                        WHERE Prgm_ID = '$prgmID' AND Enr_year = '$enrYear';
                    "; 

                    $amountQueryResult = $dbConn -> query($amountQuery);

                    $data = $amountQueryResult -> fetch_assoc();
        
        ?>

            <tr>
                <td><?php echo $unverifiedBillsData['Bill_ID']; ?></td>
                <td><?php echo $unverifiedBillsData['installment']; ?></td>
                <td><?php echo $data[$field]; ?></td>
                <td><?php echo $unverifiedBillsData['due_date']; ?></td>
                <td><?php echo $unverifiedBillsData['pmt_date']; ?></td>
            </tr>

        <?php
                }

            } else {
                echo "No results found";
            }

        ?>

    </table>
    
</div>