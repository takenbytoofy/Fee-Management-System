<?php

    $studentPageHeader = "Fee Structure";
    $pageTitle = "FMS - Fee Structure";
    include("../Layouts/header.php");
    include("../Layouts/nav-student.php");

?>

<style>
    #section-title{
        font-size: 20px;
        font-weight: bold;
        margin:5px;
        display: flex;
        justify-content: center;
        align-items: center;
        
    }

    .button-selection{
        background: white;
        border-radius: 10px;
        border-style: solid;
        border-color: #4D52D3;
        border-width: 2px;
        width: 400px;
        height: 400px;
        display: inline-block;
        margin: 40px 400px;

    }

    .button-custom{
        background-color: rgb(163, 240, 163);
        color: white;
        margin: 20px;
        padding: 10px;
        width: 360px;
        font-size: 20px;
        border-radius: 18px;
    }

    .button-custom:hover{
        background-color: rgb(86, 164, 145);
    }
    
</style>

<div id="student-fee-structure-container">

    <div id="my-fee-structure">
    
    

    </div>

    <div class="button-selection">
            <p id="section-title"> Select Program
                 <i class="fas fa-check"></i>
            </p>
            <button class= "button-custom" type="button" onclick="location.href='feeBBIS2020.html'"> BBIS 2020 </button><br>
            <button class= "button-custom" type="button" onclick="location.href='feeBBIS2021.html'"> BBIS 2021 </button>
            <button class= "button-custom" type="button" onclick="location.href='feeBBIS2020.html'"> BBIS 2022 </button>
            <button class= "button-custom" type="button" onclick="location.href='feeBBIS2020.html'"> BBIS 2023 </button>
            
        </div>  

</div>

<?php

    include("../Layouts/footer.php");

?>