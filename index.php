<?php
    $pageTitle = "Fee Manager";
    include("./Layouts/header.php");
?>

<!-- HTML Code -->

<!-- CSS for the page -->
<style>
    
    #index-page-container {
        margin: 0px 0px 0px 0px;
        height: 100%;
        width: 100%;
        background-color: #f0f0f0;
    }

    #index-page-nav-bar {
        margin: 0px 0px 0px 0px;
        height: 50px;
        width: 100%;
        background-color: #0e36ad;
    }

    #index-page-nav-header {
        display: flex;
        float: left;
        justify-content: center;
        align-items: center;
        width: 60%;
        height: 50px;
        color: white;
        font-size: 32px;
    }

    #index-page-login-button {
        display: flex;
        float: right;
        justify-content: center;
        align-items: center;

        width: 100px;
        height: 50px;

        border: none;

        color: white;
        font-size: 24px;
        background-color: #2a4bad;
    }

    #index-page-login-button:hover {
        background-color: #1d357a;
    }

</style>

<div id="index-page-container">
    
    <!-- Making an Initial Navigation bar -->
    <div id="index-page-nav-bar">

        <span id="index-page-nav-header"> Fee Management System </span>
        <button id="index-page-login-button" onclick="window.open('./Login/login-page.php','_self')">Login</button>

    </div>

</div>

<?php
    include("./Layouts/footer.php");
?>