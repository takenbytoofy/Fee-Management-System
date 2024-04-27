<?php

    require("../FunctionFiles/dbconnect.php");

    //Checking to see if the search entry fields have some value or are empty
    if (isset($_POST['id_search'])) {$id = $_POST['id_search'];} else {$id = '';}
    if (isset($_POST['name_search'])) {$name = $_POST['name_search'];} else {$name = '';}

    $viewProgramsQuery = 
        "SELECT Prgm_ID, Prgm_name
         FROM program
         WHERE (Prgm_ID LIKE '%$id%') 
         AND (Prgm_name LIKE '%$name%');
         ";

        $viewProgramsResult = $dbConn -> query($viewProgramsQuery);

?>

<style>

    .programs-table-display table{
        margin: 2rem 0;
        border: 2px solid black;
        border-collapse: collapse;
        text-align: center;
        border-spacing: 10px;
    }
    
    .programs-table-display table th, td{
        border: 2px solid black;
        border-collapse: collapse;
        text-align: center;
        font-size: 18px;
        padding: 0 0.5rem;
    }

    .programs-table-display table th{
        background-color: #6981d6;
        color: white;
        padding: 10px;
        font-size: 18px;
    }

    .programs-table-display table #edit-button{
        margin: 10px;
        background-color: #6981d6;
        color: white;
        padding: 5px;
        width: 100px;
        border-radius: 4px;
        font-size: 18px;
    }

    .programs-table-display table #edit-button:hover {
        background-color: rgb(146, 160, 212);
        transform: scale(1.02);
    }

</style>

<div class="programs-table-display">

    <table>

        <?php
        
            if ($viewProgramsResult -> num_rows > 0) {
                echo "
                    <tr>
                        <th>    Program ID         </th>
                        <th>    Program Name       </th>
                        <th>    Action     </th>
                    </tr>
                ";

                while ($dataRow = $viewProgramsResult->fetch_assoc()) {
                    $prgmID = $dataRow['Prgm_ID'];
                    $prgmName = $dataRow['Prgm_name'];

                $url = "PrgmID=".$prgmID 
        
        ?>

            <tr>
                <td><?php echo $prgmID; ?></td>
                <td><?php echo $prgmName; ?></td>
                <td><button id='edit-button' onclick="window.open('../Admin/edit-program.php?<?php echo $url ?>','_self')">Edit</button>
            </tr>

        <?php
                }

            } else {
                echo "No results found";
            }

        ?>

    </table>
    
</div>