<?php

    require("../FunctionFiles/dbconnect.php");

    //Checking to see if the search entry fields have some value or are empty
    if (isset($_POST['prgm_search'])) {$prgm = $_POST['prgm_search'];} else {$prgm = '';}
    if (isset($_POST['year_search'])) {$year = $_POST['year_search'];} else {$year = '';}
    if (isset($_POST['inst_search'])) {$inst = $_POST['inst_search'];} else {$inst = '';}

    $viewBillsQuery = 
        "SELECT *
         FROM program_bill
         WHERE (Prgm_ID LIKE '%$prgm%') 
         AND (Enr_year LIKE '%$year%')
         AND (installment LIKE '%$inst%');
         ";

        $viewBillsResult = $dbConn -> query($viewBillsQuery);

?>

<style>

    .bills-table-display{
        margin: 2rem 0;
    }
    
    .bills-table-display table{
        border: 2px solid black;
        border-collapse: collapse;
        text-align: center;
        border-spacing: 10px;
    }
    
    .bills-table-display table th, td{
        border: 2px solid black;
        border-collapse: collapse;
        text-align: center;
        font-size: 18px;
        padding: 0 0.5rem;
    }

    .bills-table-display table th{
        background-color: #6981d6;
        color: white;
        padding: 10px;
        font-size: 18px;
    }

    .bills-table-display table #edit-button{
        margin: 10px;
        background-color: #6981d6;
        color: white;
        padding: 5px;
        width: 100px;
        border-radius: 4px;
        font-size: 18px;
    }

    .bills-table-display table #edit-button:hover {
        background-color: rgb(146, 160, 212);
        transform: scale(1.02);
    }

</style>

<div class="bills-table-display">

    <table>

        <?php
        
            if ($viewBillsResult -> num_rows > 0) {
                echo "
                    <tr>
                        <th>Bill ID</th>
                        <th>Program ID</th>
                        <th>Enrollment Year</th>
                        <th>Installment</th>
                        <th>Created Date</th>
                        <th>Due Date</th>
                        <th>Action</th>
                    </tr>
                ";

                while ($dataRow = $viewBillsResult->fetch_assoc()) {

                    $url = $dataRow['Bill_ID'];
        
        ?>

            <tr>
                <td><?php echo $dataRow['Bill_ID']; ?></td>
                <td><?php echo $dataRow['Prgm_ID']; ?></td>
                <td><?php echo $dataRow['Enr_year']; ?></td>
                <td><?php echo $dataRow['installment']; ?></td>
                <td><?php echo $dataRow['create_date']; ?></td>
                <td><?php echo $dataRow['due_date']; ?></td>
                <td><button id='edit-button' onclick="window.open('../Admin/edit-program-bill.php?bilID=<?php echo $url ?>','_self')">Edit</button>
            </tr>

        <?php
                }

            } else {
                echo "No results found";
            }

        ?>

    </table>
    
</div>