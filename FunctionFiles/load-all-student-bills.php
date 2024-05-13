<?php

    require("../FunctionFiles/dbconnect.php");

    //Checking to see if the search entry fields have some value or are empty
    if (isset($_POST['id_search'])) {$id = $_POST['id_search'];} else {$id = '';}
    if (isset($_POST['prgm_search'])) {$prgm = $_POST['prgm_search'];} else {$prgm = '';}
    if (isset($_POST['year_search'])) {$year = $_POST['year_search'];} else {$year = '';}

    $viewStudentBillsQuery = 
        "SELECT *
         FROM student_bill
         WHERE (Std_ID LIKE '%$id%')
         AND (Prgm_ID LIKE '%$prgm%') 
         AND (Enr_year LIKE '%$year%');
         ";

        $viewStudentBillsResult = $dbConn -> query($viewStudentBillsQuery);

?>

<style>

    .student-bills-table-display{
        margin: 2rem 0;
    }
    
    .student-bills-table-display table{
        border: 2px solid black;
        border-collapse: collapse;
        text-align: center;
        border-spacing: 10px;
    }
    
    .student-bills-table-display table th, td{
        border: 2px solid black;
        border-collapse: collapse;
        text-align: center;
        font-size: 18px;
        padding: 0 0.5rem;
    }

    .student-bills-table-display table th{
        background-color: #6981d6;
        color: white;
        padding: 10px;
        font-size: 18px;
    }

    .student-bills-table-display table #edit-button{
        margin: 10px;
        background-color: #6981d6;
        color: white;
        padding: 5px;
        width: 100px;
        border-radius: 4px;
        font-size: 18px;
    }

    .student-bills-table-display table #edit-button:hover {
        background-color: rgb(146, 160, 212);
        transform: scale(1.02);
    }

</style>

<div class="student-bills-table-display">

    <table>

        <?php
        
            if ($viewStudentBillsResult -> num_rows > 0) {
                echo "
                    <tr>
                        <th>Student ID</th>
                        <th>Program ID</th>
                        <th>Enrollment Year</th>
                        <th>Bill ID</th>
                        <th>Bill Status</th>
                        <th>Action</th>
                    </tr>
                ";

                while ($dataRow = $viewStudentBillsResult->fetch_assoc()) {

                    $url = "StdID=".$dataRow['Std_ID']."&PrgmID=".$dataRow['Prgm_ID']."&EnrYear=".$dataRow['Enr_year']."&BillID=".$dataRow['Bill_ID']
        
        ?>

            <tr>
                <td><?php echo $dataRow['Std_ID']; ?></td>
                <td><?php echo $dataRow['Prgm_ID']; ?></td>
                <td><?php echo $dataRow['Enr_year']; ?></td>
                <td><?php echo $dataRow['Bill_ID']; ?></td>
                <td><?php echo $dataRow['Bill_Status']; ?></td>
                <td><button id='edit-button' onclick="window.open('../Admin/student-bill-profile.php?<?php echo $url?>','_self')">View</button>
            </tr>

        <?php
                }

            } else {
                echo "No results found";
            }

        ?>

    </table>
    
</div>