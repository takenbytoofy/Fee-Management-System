<?php

    require("../FunctionFiles/dbconnect.php");

    //Checking to see if the search entry fields have some value or are empty
    if (isset($_POST['prgm_search'])) {$prgm = $_POST['prgm_search'];} else {$prgm = '';}
    if (isset($_POST['year_search'])) {$year = $_POST['year_search'];} else {$year = '';}
    if (isset($_POST['inst_search'])) {$inst = $_POST['inst_search'];} else {$inst = '';}
    if (isset($_POST['status_search'])) {$status = $_POST['status_search'];} else {$status = '';}

    $viewReceiptsQuery = 
        "SELECT *
         FROM fee_receipts
         WHERE (Prgm_ID LIKE '%$prgm%') 
         AND (Enr_year LIKE '%$year%')
         AND (Enr_year LIKE '%$inst%')
         AND (receipt_status = '$status');
         ";

        $viewReceiptsResult = $dbConn -> query($viewReceiptsQuery);

?>

<style>

    .receipts-table-display{
        margin: 2rem 0;
    }
    
    .receipts-table-display table{
        border: 2px solid black;
        border-collapse: collapse;
        text-align: center;
        border-spacing: 10px;
    }
    
    .receipts-table-display table th, td{
        border: 2px solid black;
        border-collapse: collapse;
        text-align: center;
        font-size: 18px;
        padding: 0 0.5rem;
    }

    .receipts-table-display table th{
        background-color: #6981d6;
        color: white;
        padding: 10px;
        font-size: 18px;
    }

    .receipts-table-display table #edit-button{
        margin: 10px;
        background-color: #6981d6;
        color: white;
        padding: 5px;
        width: 100px;
        border-radius: 4px;
        font-size: 18px;
    }

    .receipts-table-display table #edit-button:hover {
        background-color: rgb(146, 160, 212);
        transform: scale(1.02);
    }

</style>

<div class="receipts-table-display">

    <table>

        <?php
        
            if ($viewReceiptsResult -> num_rows > 0) {
                echo "
                    <tr>
                        <th>Receipt ID</th>
                        <th>Student ID</th>
                        <th>Program ID</th>
                        <th>Payment Date</th>
                        <th>Installment</th>
                        <th>Receipt Status</th>
                        <th>Action</th>
                    </tr>
                ";

                while ($dataRow = $viewReceiptsResult->fetch_assoc()) {

                    $url = "recID=".$dataRow['receipt_id'];
        
        ?>

            <tr>
                <td><?php echo $dataRow['receipt_id']; ?></td>
                <td><?php echo $dataRow['Std_ID']; ?></td>
                <td><?php echo $dataRow['Prgm_ID']; ?></td>
                <td><?php echo $dataRow['pmt_date']; ?></td>
                <td><?php echo $dataRow['installment']; ?></td>
                <td><?php echo $dataRow['receipt_status']; ?></td>
                <td><button id='edit-button' onclick="window.open('../FunctionFiles/receipt-profile.php?<?php echo $url ?>','_self')">More</button>
            </tr>

        <?php
                }

            } else {
                echo "No results found";
            }

        ?>

    </table>
    
</div>