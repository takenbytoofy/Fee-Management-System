<?php
    $pageTitle = "Fee Manager";
    include("./Layouts/header.php");
?>

<!-- CSS for the page -->
<style>
    
    #index-page-container {
        margin: 0px 0px 0px 0px;
        height: 100vh;
        width: 100vw;
        background-image: url("./Login/main-image.png");
        background-size: cover;
        background-repeat: no-repeat;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #index-page-content-box {
        margin: 0px 0px 0px 0px;
        height: 500px;
        width: 800px;
        background-color: rgba(209, 219, 253, 60%);
        border-radius: 24px;
        /* Setting Display */
        display: grid;
        grid-template-columns: auto;
        grid-template-rows: auto auto;
    }

    #index-page-content-box-title {
        width: 100%;
        height: 100%;
        /* Aligning to Center */
        display: flex;
        justify-content: center;
        align-items: center;
        /* Others */
        color: black;
        font-size: 56px;
    }

    #login-button-container {
        /* Aligning to Center */
        display: flex;
        justify-content: center;
        align-items: center;
        /* Others */
        width: 100%;
        height: 100%;
        color: black;
        font-size: 28px;
    }

    #login-button {
        
    }

    #login-button:hover {
        
    }

</style>


<!-- HTML Code -->
<div id="index-page-container">
    
    <!-- Making an Initial Navigation bar -->
    <div id="index-page-content-box">

        <span id="index-page-content-box-title"> Fee Management System </span>
        <span id="login-button-container"><button id="login-button" onclick= window.open(url(./Login/login-page.php>Login</button></span>

    </div>

</div>


<?php
    include("./Layouts/footer.php");
?>