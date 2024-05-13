<?php
    require("../FunctionFiles/validate-student-session.php");
    require("../FunctionFiles/dbconnect.php");

    $pageHeader = "Student Fees";
    $pageTitle="Student Fees";

    include("../Layouts/header.php");
    include("../Layouts/nav-student.php");

?>

<div class="student-fees-container">

    <div class="unpaid-bills-container">
        
    </div>

    <div class="unverfied-bills-container">

    </div>

    <div class="paid-bills-container">

    </div>

</div>

<?php

    include("../Layouts/footer.php");

?>