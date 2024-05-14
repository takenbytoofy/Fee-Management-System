<?php

    require("../FunctionFiles/dbconnect.php");

    $paidBillsQuery = "
    SELECT sb.Bill_ID, pb.installment, pb.create_date, pb.due_date
    FROM student_bill AS sb
    INNER JOIN program_bill as pb
    ON sb.Bill_ID = pb.Bill_ID
    WHERE sb.Std_ID = '$stdID' AND sb.Prgm_ID = '$prgmID' AND sb.Enr_year = '$enrYear' AND sb.Bill_Status = 'Paid';
    ";

    $paidBillsResult = $dbConn -> query($paidBillsQuery);

?>

<style>

    .student-paid-bills-table-display table{
        width: 100%;
        border: 2px solid black;
        border-collapse: collapse;
        text-align: center;
        border-spacing: 10px;
    }
    
    .student-paid-bills-table-display table th, td{
        border: 2px solid black;
        border-collapse: collapse;
        text-align: center;
        font-size: 18px;
        padding: 0.5rem 0.5rem;
    }

    .student-paid-bills-table-display table th{
        background-color: #6981d6;
        color: white;
        padding: 10px;
        font-size: 18px;
    }

    .student-paid-bills-table-display table #edit-button{
        margin: 10px;
        background-color: #6981d6;
        color: white;
        padding: 5px;
        width: 100px;
        border-radius: 4px;
        font-size: 18px;
    }

    .student-paid-bills-table-display table #edit-button:hover {
        background-color: rgb(146, 160, 212);
        transform: scale(1.02);
    }

</style>

<div class="student-paid-bills-table-display">

    <table>

        <?php
        
            if ($paidBillsResult -> num_rows > 0) {
                echo "
                    <tr>
                        <th>Bill ID</th>
                        <th>Installment</th>
                        <th>Amount</th>
                        <th>Created Date</th>
                        <th>Due Date</th>
                    </tr>
                ";

                while ($paidBillsData = $paidBillsResult->fetch_assoc()) {

                    $inst = $paidBillsData['installment'];

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
                <td><?php echo $paidBillsData['Bill_ID']; ?></td>
                <td><?php echo $paidBillsData['installment']; ?></td>
                <td><?php echo $data[$field]; ?></td>
                <td><?php echo $paidBillsData['create_date']; ?></td>
                <td><?php echo $paidBillsData['due_date']; ?></td>
            </tr>

        <?php
                }

            } else {
                echo "No results found";
            }

        ?>

    </table>
    
</div>