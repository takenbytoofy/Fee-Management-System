<?php

    $pageHeader = "Dashboard";
    $pageTitle = "Student Dashboard";

    require("../FunctionFiles/validate-student-session.php");
    include("../Layouts/header.php");
    include("../Layouts/nav-student.php");

?>

<style>

    .dashboard-container {
        margin: 0.2rem 0.2rem;
    }

    .dashboard-tiles {
        display: flex;
    }

    .dashboard-tiles a{
        margin: 0.2rem 1rem;
        display: flex;
        flex-direction: column;
        border-radius: 24px;
        min-height: 250px;
        min-width: 250px;
        background-color: #ffffff;
        box-shadow: 0 0.5rem 0.8rem rgba(56, 35, 92, 20%);
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: none;
    }

</style>

<div class="dashboard-container">
    
    <div class="dashboard-tiles">
        <a href="#">
            <i class="fas fa-bell"></i>  
            <h3>Upcoming Fee</h3> 
            <br>
            Date
        </a>

        <a href="#">
            <i class="fas fa-file-invoice"></i>
            <h3>Total Payments Made</h3>
            <br>
            Rs
        </a>

        <a href="#">
            <i class="fas fa-file-invoice"></i>
            <h3>Fees Due</h3>
            <br>
            Rs
        </a>

        <a href="#">
            <i class="fas fa-file-invoice"></i>
            <h3>Remaining Fees</h3>
            <br>
            Rs
        </a>
    </div>

</div>

<?php

    include("../Layouts/footer.php");

?>