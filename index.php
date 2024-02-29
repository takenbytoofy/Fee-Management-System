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
        /* Setting background colour*/
        background-color: rgba(118, 76, 245, 80%);
        /* Setting display to create two columns */
        display: grid;
        grid-template-columns: auto auto;
        grid-template-rows: 100vh;
        align-items: center;
    }

    #index-page-left-box {
        margin: 0px 0px 0px 0px;
        height: 400px;
        /* Setting Display */
        padding-left: 2vw;
        display: grid;
        grid-template-columns: auto;
        grid-template-rows: auto 50px auto;
    }

    #index-page-left-box-title {
        height: 100%;
        /* Aligning*/
        display: flex;
        justify-content: left;
        align-items: center;
        /* Others */
        color: White;
        font-size: 56px;
        font-weight: 500;
    }

    #index-page-left-box-subtitle {
        height: 100%;
        /* Aligning*/
        display: flex;
        justify-content: left;
        align-items: center;
        /* Others */
        color: white;
        font-size: 32px;
    }

    #login-button-container {
        height: 100%;
        /* Aligning*/
        display: flex;
        justify-content: left;
        align-items: center;
        /* Others */
        width: 100%;
        height: 100%;
    }

    #login-button {
        height: 40px;
        border-radius: 16px;
        width: 140px;
        /* Font Style */
        font-size: 20px;
        color: black;
        /* Background and Border */
        border-radius: 36px;
        border: none;
        background-color: rgba(255, 255, 255, 100%);
    }

    #login-button:hover {
        transition-duration: 300ms;
        background-color: rgba(255, 255, 255, 0.5);
    }

    #login-button:active {
        transition-duration: 300ms;
        transform: scale(1.05);
    }

    #index-page-right-box {
        margin: 0px 0px 0px 0px;
        height: 100vh;
        width: 100%;
        /* Setting Display */
        display: grid;
        grid-template-columns: auto;
        grid-template-rows: 50px auto;
    }

    #index-page-right-box-top {
        padding-top: 2vw;
        padding-right: 2vw;
        display: flex;
        justify-content: right;
        align-items: center;
        color: white;
    }

    .index-nav-item {
        margin-right: 2vw;
    }

    .index-nav-item:hover {
        transition-duration: 300ms;
        color: black;
    }

    #index-page-right-box-bottom {
        display: flex;
        justify-content: right;
        align-items: center;
    }

    @media only screen and (max-width: 1050px) {
        #index-page-right-box {
            grid-template-columns: 600px;
        }
    }

    @media only screen and (max-width: 990px) {
        #index-page-container {
            margin: 0px 0px 0px 0px;
            height: 100vh;
            width: 100vw;
            /* Setting background colour*/
            background-color: rgba(118, 76, 245, 80%);
            /* Setting display to create two columns */
            display: grid;
            grid-template-areas: 'content';
            align-items: center;
        }

        #index-page-left-box {
            grid-area: content;
            margin: 0px 0px 0px 0px;
            width: 100%;
            grid-area: content;
            /* Setting Display */
            padding-left: 2vw;
            display: grid;
            grid-template-columns: auto;
            grid-template-rows: auto 50px auto;
        }

        #index-page-right-box{
            display: none;
        }
    }

</style>


<!-- HTML Code -->
<div id="index-page-container">
    
    <div id="index-page-left-box">

        <span id="index-page-left-box-title">Fee Management <br> System</span>
        <span id="index-page-left-box-subtitle">Kathmandu Unviersity</span>
        <span id="login-button-container">
            <button id="login-button" onclick="window.open('./Login/login-page.php','_self')" autofocus>
                Sign In
            </button>
        </span>

    </div>

    <div id="index-page-right-box">
        
        <div id="index-page-right-box-top">
            <span class="index-nav-item">BBIS</span>
            
            <span class="index-nav-item">Kathmandu Unviersity</span>

            <span class="index-nav-item">About Us</span>
        </div>
        
        <div id="index-page-right-box-bottom">
            <img id="main-image" src="./Login/form-image.png">
        </div>  

    </div>

</div>


<?php
    include("./Layouts/footer.php");
?>