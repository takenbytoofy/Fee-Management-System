<?php

    require("../FunctionFiles/dbconnect.php");

    //Checking to see if the search entry fields have some value or are empty
    if (isset($_POST['id_search'])) {$id = $_POST['id_search'];} else {$id = '';}
    if (isset($_POST['prgm_search'])) {$prgm = $_POST['prgm_search'];} else {$prgm = '';}
    if (isset($_POST['year_search'])) {$year = $_POST['year_search'];} else {$year = '';}
    if (isset($_POST['name_search'])) {$name = $_POST['name_search'];} else {$name = '';}

    $viewStudentsQuery = 
        "SELECT Std_ID, Prgm_ID, Enr_year, Std_fname, Std_lname
         FROM student 
         WHERE (Std_ID LIKE '%$id%') 
         AND (Prgm_ID LIKE '%$prgm%') 
         AND (Enr_year LIKE '%$year%') 
         AND (Std_fname LIKE '%$name%');
         ";

        $viewStudentsResult = $dbConn -> query($viewStudentsQuery);

?>
<style>

    .students-table-display table{
        margin: 2rem 0;
        border: 2px solid black;
        border-collapse: collapse;
        text-align: center;
        border-spacing: 10px;
    }

    .students-table-display table th{
        background-color: #6981d6;
        color: white;
        padding:10px;
        font-size: 18px;
    }

    .students-table-display table th, td{
        width: 13rem;
        border: 2px solid black;
        border-collapse: collapse;
        text-align: center;
        font-size: 18px;
    }

    #view-more-button{
        margin: 10px;
        background-color: #6981d6;
        color: white;
        padding: 5px;
        width: 100px;
        border-radius: 4px;
        font-size: 18px;
    }

    #view-more-button:hover {
        background-color: rgb(146, 160, 212);
        transform: scale(1.02);
    }

</style>

<div class="students-table-display">

    <table>

        <?php
        
            if ($viewStudentsResult -> num_rows > 0) {
                echo "
                    <tr>
                        <th>    Student ID         </th>
                        <th>    Program ID         </th>
                        <th>    Enrolled Year      </th>
                        <th>    First Name         </th>
                        <th>    Last Name          </th>
                        <th>    Action             </th>
                    </tr>
                ";

                while ($dataRow = $viewStudentsResult->fetch_assoc()) {
                    $stdID = $dataRow['Std_ID'];
                    $prgmID = $dataRow['Prgm_ID'];
                    $enrYear = $dataRow['Enr_year'];
                    $stdFname = $dataRow['Std_fname'];
                    $stdLname = $dataRow['Std_lname'];

                    $url = "StdId=".$stdID."PrgmID=".$prgmID."EnrYear=".$enrYear; 
        ?>

                    <tr>
                        <td><?php echo $stdID; ?></td>
                        <td><?php echo $prgmID; ?></td>
                        <td><?php echo $enrYear; ?></td>
                        <td><?php echo $stdFname; ?></td>
                        <td><?php echo $stdLname; ?></td>
                        <td><button id='view-more-button' onclick="window.open('studentProfile.php?<?php echo $url ?>','_self')">View More</button>
                    </tr>

                <?php
                }

            } else {
                echo "No results found";
            }

        ?>

    </table>

</div>