<?php

    $studentPageHeader = "My Dashboard";
    $pageTitle = "FMS - My Dashboard";
    include("../Layouts/header.php");
    include("../Layouts/nav-student.php");

?>
<style>
    #dashboard-container {
        height: 100%;
        width: 100%;
        display: grid;
        grid-template-columns: 100%;
        grid-template-rows: auto auto;
        justify-content: center;
        align-items: center;    
    }

    .dashboard-option{
        background-color: rgb(252, 225, 190);
        margin: 30px 250px;
        padding: 60px;
        width: 500px;
        height: 200px;
        text-align: center;
        font-size: 20px;
        font-weight: bold;
        border-radius: 20px;
        border-style: solid;
        border-color: white;
        border-width: 5px;
        line-height: 2;
    }



</style>

<div id="dashboard-container">
    
    <div class="dashboard-option">
        Upcoming Fee Payment <i class=" fas fa-bell">

        </i> <br>
        Date:
    </div>

    <div class="dashboard-option">
        Total Payments Made <i class=" fas fa-file-invoice">
        </i> <br>
        Rs: 200000
    </div>

</div>

<?php

    include("../Layouts/student-page-footer.php");
    include("../Layouts/footer.php");

?>