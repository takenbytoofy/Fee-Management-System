<?php

    require("../FunctionFiles/validate-admin-session.php");
    require("../FunctionFiles/dbconnect.php");

    $pageHeader = "Dashboard";
    $pageTitle = "Admin Dashboard";

    include("../Layouts/header.php");
    include("../Layouts/nav-admin.php");

    $studentCountQuery = 
    "
        SELECT COUNT(*) AS studentCount
        FROM student;
    ";
    $studentCountQueryResult = $dbConn -> query($studentCountQuery);
    $studentCountQueryData = $studentCountQueryResult -> fetch_assoc();
    $studentCount = $studentCountQueryData['studentCount'];

    $programCountQuery = 
    "
        SELECT COUNT(*) AS programCount
        FROM program;
    ";
    $programCountQueryResult = $dbConn -> query($programCountQuery);
    $programCountQueryData = $programCountQueryResult -> fetch_assoc();
    $programCount = $programCountQueryData['programCount'];

    $unpaidBillCountQuery = 
    "
        SELECT COUNT(*) AS unpaidBillCount
        FROM student_bill
        WHERE Bill_Status = 'Unpaid';
    ";

    $unpaidBillCountQueryResult = $dbConn -> query($unpaidBillCountQuery);
    $unpaidBillCountQueryData = $unpaidBillCountQueryResult -> fetch_assoc();
    $unpaidBillCount = $unpaidBillCountQueryData['unpaidBillCount'];

    $unverifiedReceiptsCountQuery = 
    "
        SELECT COUNT(*) AS unverifiedReceiptsCount
        FROM fee_receipts
        WHERE receipt_status = 'Unverified';
    ";
    $unverifiedReceiptsCountQueryResult = $dbConn -> query($unverifiedReceiptsCountQuery);
    $unverifiedReceiptsCountQueryData = $unverifiedReceiptsCountQueryResult -> fetch_assoc();
    $unverifiedReceiptsCount = $unverifiedReceiptsCountQueryData['unverifiedReceiptsCount'];

?>

<div class="container">
    <div class="content">
        <div class="cards">
            <a href="../Admin/view-students.php">
                <div class="card">
                    <div class="box">
                        <h1> <?php echo $studentCount?> </h1>
                        <h3> Enrolled Students</h3>
                    </div>
                    <div class="icon-case">
                        <i class="fas fa-solid fa-user"></i>
                    </div>
                </div>
            </a>
            <a href="../Admin/view-programs.php">
                <div class="card">
                    <div class="box">
                        <h1> <?php echo $programCount?> </h1>
                        <h3>Programs </h3>
                    </div>
                    <div class="icon-case">
                    <i class="fas fa-solid fa-book"></i>
                    </div>
                </div>
            </a>
            <a href="../Admin/view-student-bills.php">
                <div class="card">
                    <div class="box">
                        <h1> <?php echo $unpaidBillCount?> </h1>
                        <h3>Unpaid Bills</h3>
                    </div>
                    <div class="icon-case">
                    <i class="fas fa-solid fa-file"></i>
                    </div>
                </div>
            </a>
            <a href="../Admin/view-fees.php">
                <div class="card">
                    <div class="box">
                        <h1> <?php echo $unverifiedReceiptsCount?> </h1>
                        <h3>Unverified Receipts</h3>
                    </div>
                    <div class="icon-case">
                    <i class="fas fa-solid fa-users"></i>
                    </div>
                </div>
            </a>
        </div>
        
        <div class="content-2">
            <h2>New Students</h2> <br>
            <div class="search-bar">
                <form id="search-bar" action="dashboard-admin.php" method="post">
                    <input class="search-field" type="text" placeholder="Student Name.." name="name_search">
                    <input class="search-field" type="text" placeholder="Program Name.." name="prgm_search">
                    <input class="search-field" type="text" placeholder="Year.." name="year_ search">
                    <button id="search-button" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>

            <?php include('../FunctionFiles/load-all-students.php');?>
        </div>
    </div>
</div>

<style>

    .container .content {
        position: relative;
        margin-top: 20px;
        height: auto;
    }

    .container .content .cards {
        padding: 15px 15px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    .container .content .cards a{
        text-decoration: none;
        color: black;
    }

    .container .content .icon-case{
        font-size: 30px;
    }

    .container .content .cards .card {
        width: 300px;
        height: 150px;
        background: white;
        border: 4px solid #6981d6;
        border-radius: 10px;
        margin: 20px 10px;
        display: flex;
        align-items: center;
        justify-content: space-around;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
            
    .container .content .content-2 {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .container .content .content-2 {
        display: flex;
        flex-direction: column;
        padding: 2rem 2rem;
        background-color: #6981d6;
        border: 2px solid white;
        border-radius: 10px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);  
    }

    .container .content .content-2 h2 {
        font-size: 28px;
        color: white;
    }

    .content-2 .search-bar {
        display: flex;
        
    }

    #view-all{
        width: 100px;
        height: 20px;
        font: 18px;
        background-color: #f59090;
        color: white;
        border: 2px solid white;
        border-radius: 5px;
        float: right;
    }
    .container .content .content-2 table {
        width: auto;
        border: 3px solid white;
        border-radius: 4px;
        background-color: white;
    }
    
    th{
        background-color:  #f59090;
        color: white;
        padding: 10px;
        font-size: 18px;
    }

    td{
        border: 2px solid black;
        border-collapse: collapse;
        text-align: center;
        font-size: 18px;
    }

    .search-field{
        padding: 5px;
        margin-top: 10px;
        margin-right: 0px;
        font-size: 16px;
        border: 2px solid black;
        border-radius: 5px;
        width: 200px;
    }

    #search-button{
        padding: 5px;
        margin-right: 30px;
        margin-left: 0;
        font-size: 16px;
        background: white;
        border: 2px solid black;
        cursor: pointer;
        border-radius: 5px;
        
    }
</style>


