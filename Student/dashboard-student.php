<?php
    require("../FunctionFiles/validate-student-session.php");
    require("../FunctionFiles/dbconnect.php");

    $pageHeader = "Dashboard";
    $pageTitle = "Student Dashboard";

    include("../Layouts/header.php");
    include("../Layouts/nav-student.php");

?>

<div class="container">
    <div class="content">
        <div class="cards">
            <div class="card">
                <div class="box">
                    <h1>-----</h1>
                    <h3> Paid Till Date </h3>
                </div>
                <div class="icon-case">
                    <i class="fas fa-solid fa-list"></i>
                </div>
            </div>
            <div class="card">
                <div class="box">
                    <h1> ----- </h1>
                    <h3> Payments Made </h3>
                </div>
                <div class="icon-case">
                <i class="fas fa-solid fa-receipt"></i>
                </div>
            </div>
            <div class="card">
                <div class="box">
                    <h1> ----</h1>
                    <h3> Unpaid Bills </h3>
                </div>
                <div class="icon-case">
                <i class="fas fa-solid fa-coins"></i>
                </div>
            </div>
            <div class="card">
                <div class="box">
                    <h1>---- </h1>
                    <h3> Unverified Payments </h3>
                </div>
                <div class="icon-case">
                <i class="fas fa-solid fa-clock"></i>
                </div>
            </div>
        </div>
        
        <div class="content-2">
            <i id="bell" class="fas fa-solid fa-bell"></i>
            <h2>Upcoming Payment </h2> <br>  
            <div class="search-bar">
                <form id="search-bar" action="./Search.php">
                    <input class="search-field" type="text" placeholder="Year.." name="search">
                    <input class="search-field" type="text" placeholder="Installment Number.." name="search">
                    <input class="search-field" type="text" placeholder="Amount.." name="search">
                    <button id="search-button" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>

                
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

<?php

    include("../Layouts/footer.php");

?>