<?php

    require("../FunctionFiles/dbconnect.php");

    //Checking to see if the search entry fields have some value or are empty
    if (isset($_POST['id_search'])) {$id = $_POST['id_search'];} else {$id = '';}
    if (isset($_POST['year_search'])) {$year = $_POST['year_search'];} else {$year = '';}

    $viewProgramFeesQuery = 
        "SELECT Prgm_ID, Enr_year, admission_fee, 
        (inst_1 + inst_2 + inst_3 + inst_4 + inst_5 + inst_6 + inst_7 + inst_8 + inst_9 + inst_10 + inst_11 + inst_12 + inst_13 + inst_14 + inst_15 + inst_16) AS total_tuition
         FROM fee_structure
         WHERE (Prgm_ID LIKE '%$id%') 
         AND (Enr_year LIKE '%$year%');
         ";

        $viewProgramFeesResult = $dbConn -> query($viewProgramFeesQuery);

?>

<style>

    .program-fee-table-display table{
        margin: 2rem 0;
        border: 2px solid black;
        border-collapse: collapse;
        text-align: center;
        border-spacing: 10px;
    }

    .program-fee-table-display table th, td{
        border: 2px solid black;
        border-collapse: collapse;
        text-align: center;
        font-size: 18px;
    }

    .program-fee-table-display table th{
        background-color: #6981d6;
        color: white;
        padding: 10px;
        font-size: 18px;
    }
    
    .program-fee-table-display table #view-more-button{
        margin: 10px;
        background-color: #6981d6;
        color: white;
        padding: 5px;
        width: 100px;
        border-radius: 4px;
        font-size: 18px;
    }

    .program-fee-table-display table #view-more-button:hover {
        background-color: rgb(146, 160, 212);
        transform: scale(1.02);
    }

</style>

<div class="program-fee-table-display">
    
    <table>

        <?php
        
            if ($viewProgramFeesResult -> num_rows > 0) {
                echo "
                    <tr>
                        <th>Program ID</th>
                        <th>Enrollment Year</th>
                        <th>Admission Fee</th>
                        <th>Total Tuition Fee</th>
                        <th>Action</th>
                    </tr>
                ";

                while ($dataRow = $viewProgramFeesResult->fetch_assoc()) {
                    $prgmID = $dataRow['Prgm_ID'];
                    $enrYear = $dataRow['Enr_year'];
                    $admFee = $dataRow['admission_fee'];
                    $tuitionFee = $dataRow['total_tuition'];

                $url = "PrgmID=".$prgmID."EnrYear=".$enrYear;
        
        ?>

            <tr>
                <td><?php echo $prgmID; ?></td>
                <td><?php echo $enrYear; ?></td>
                <td><?php echo $admFee; ?></td>
                <td><?php echo $tuitionFee; ?></td>
                <td><button id='view-more-button' onclick="window.open('programProfile.php?<?php echo $url ?>','_self')">Edit</button>
            </tr>

        <?php
                }

            } else {
                echo "No results found";
            }

        ?>

    </table>

</div>