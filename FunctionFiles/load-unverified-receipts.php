<?php

    require("../FunctionFiles/dbconnect.php");

    //Checking to see if the search entry fields have some value or are empty
    if (isset($_POST['id_search'])) {$id = $_POST['id_search'];} else {$id = '';}
    if (isset($_POST['stdID_search'])) {$stdID = $_POST['stdID_search'];} else {$stdID = '';}
    if (isset($_POST['prgm_search'])) {$prgm = $_POST['prgm_search'];} else {$prgm = '';}
    if (isset($_POST['year_search'])) {$year = $_POST['year_search'];} else {$year = '';}
    $recStatus = 'Unverified';
    $viewUnverifiedReceiptsQuery = 
        "SELECT *
         FROM fee_receipts
         WHERE (receipt_ID LIKE '%$id%' 
         AND Std_ID LIKE '%$stdID%'
         AND Prgm_ID LIKE '%$prgm%'
         AND Enr_year LIKE '%$year%')
         AND receipt_status = '$recStatus';";

    $viewUnverifiedReceiptsQueryResult = $dbConn -> query($viewUnverifiedReceiptsQuery);

?>

<style>

    .unverified-receipts-table-display table{
        margin: 2rem 0;
        border: 2px solid black;
        border-collapse: collapse;
        text-align: center;
        border-spacing: 10px;   
    }

    .unverified-receipts-table-display table th, td{
        border: 2px solid black;
        border-collapse: collapse;
        text-align: center;
        font-size: 18px;
    }

   .unverified-receipts-table-display table th{
        background-color: #6981d6;
        color: white;
        padding: 10px;
        font-size: 18px;
    }

    .unverified-receipts-table-display table #view-more-button{
        margin: 10px;
        background-color: #6981d6;
        color: white;
        padding: 5px;
        width: 100px;
        border-radius: 4px;
        font-size: 18px;
    }

    .unverified-receipts-table-display table #view-more-button:hover {
        background-color: rgb(146, 160, 212);
        transform: scale(1.02);
    }

</style>

<div class="unverified-receipts-table-display"> 

    <table> 
       

        <?php
        
            if ($viewUnverifiedReceiptsQueryResult -> num_rows > 0) {
                echo "
                    <tr>
                        <th>Receipt No.</th>
                        <th>Student ID</th>
                        <th>Program ID</th>
                        <th>Enrollment Year</th>
                        <th>Payment Date</th>
                        <th>Action</th>
                    </tr>
                ";

                while ($dataRow = $viewUnverifiedReceiptsQueryResult->fetch_assoc()) {
                    $recID = $dataRow['receipt_id'];
                    $stdID = $dataRow['Std_ID'];
                    $prgmID = $dataRow['Prgm_ID'];
                    $enrYear = $dataRow['Enr_year'];
                    $pmtDate = $dataRow['pmt_date'];

                $url = "RecID=".$recID;
        
        ?>

            <tr>
                <td><?php echo $recID; ?></td>
                <td><?php echo $stdID; ?></td>
                <td><?php echo $prgmID; ?></td>
                <td><?php echo $enrYear; ?></td>
                <td><?php echo $pmtDate; ?></td>

                <td><button id='view-more-button' onclick="window.open('../Admin/receipt-profile.php?<?php echo $url ?>','_self')">View</button>
            </tr>

        <?php
                }

            } else {
                echo "No results found";
            }

        ?>
        
    </table>

</div>