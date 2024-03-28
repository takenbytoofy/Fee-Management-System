<?php
    $pageTitle = "Login Page";
    include("../Layouts/header.php");
?>

<style>
   
    #login-page-container {
        margin: 0px 0px 0px 0px;
        height: 100vh;
        width: 100vw;
        /* Setting background colour*/
        background-color: #7a7edb;
        /* Setting display to create two columns */
        display: grid;
        grid-template-columns: auto auto;
        grid-template-rows: 100vh;
        align-items: center;
    }

    #login-page-left-box{
        margin: 0px 0px 0px 0px;
        height: 400px;
        /* Setting Display */
        padding-left: 2vw;
        display: grid;
        grid-template-columns: auto;
        grid-template-rows: auto auto;
    }

    #login-page-left-box-title {
        height: 100%;
        /* Aligning*/
        display: flex;
        justify-content: left;
        align-items: center;
        /* Others */
        color: rgb(30, 2, 54);
        font-size: 56px;
        font-weight: 500;
    }

    .login-input{
        margin-bottom: 20px;
        padding-left: 10px;

        color: rgb(30, 2, 54);
        font-size: 18px;
        text-align: left;
        background-color: rgba(250, 250, 250, 80%);

        width: 400px;
        height: 40px;

        border-radius: 16px;
        border: none;
    }

    #login-input-select{
        width: 120px;
        height: 40px;
    }

    #login-button{
        height: 32px;
        width: 100px;
        /* Font Style */
        font-size: 18px;
        color: white;
        /* Background and Border */
        border-radius: 36px;
        border: none;
        background-color: rgba(30, 2, 54, 100%);
    } 

    #login-button:hover{
        transition-duration: 300ms;
        background-color: rgba(30, 2, 54, 50%);
    }

    #login-button:active {
        transition-duration: 300ms;
        transform: scale(1.05);
    }

    #login-page-right-box {
        margin: 0px 0px 0px 0px;
        height: 100vh;
        width: 100%;
        /* Setting Display */
        display: grid;
        grid-template-columns: auto;
        grid-template-rows: 50px auto;
    }

    #login-page-right-box-top {
        padding-top: 2vw;
        padding-right: 2vw;
        display: flex;
        justify-content: right;
        align-items: center;
        color: rgb(30, 2, 54);
        font-weight: bold;
    }

    .login-nav-item {
        margin-right: 2vw;
    }

    .login-nav-item:hover {
        transition-duration: 300ms;
        color: black;
    }

    #login-page-right-box-bottom {
        display: flex;
        justify-content: right;
        align-items: center;
    }

    @media only screen and (max-width: 1120px) {
        #login-page-right-box {
            grid-template-columns: 600px;
        }
    }

    @media only screen and (max-width: 1030px) {
        #login-page-right-box {
            display: none;
        }

        #login-page-container {
            margin: 0px 0px 0px 0px;
            height: 100vh;
            width: 100vw;
            /* Setting background colour*/
            background-color: rgba(118, 76, 245, 80%);
            background-image: url("./form-image.png");
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
            /* Setting display to create two columns */
            display: grid;
            grid-template-columns: auto;
            grid-template-rows: 100vh;
            justify-content: center;
            align-items: center;
        }

        #login-page-left-box-title {
            height: 100%;
            /* Aligning*/
            display: flex;
            justify-content: center;
            align-items: center;
            /* Others */
            color: rgb(30, 2, 54);
            font-size: 56px;
            font-weight: 500;
        }
    }

</style>

<script>

    function validateFormInput () {
        var userId = document.forms["login-form"]["login-id"].value;
        var userPswd = document.forms["login-form"]["login-pswd"].value;
        var userType = document.forms["login-form"]["user-type"].value;

        if (userId == "" || userPswd == "" || userType == "") {
            alert("All fields required");
            return false;
        } else {
            return true;
        }
    }

</script>

<div id="login-page-container">
    
    <div id="login-page-left-box"> 
        
        <span id="login-page-left-box-title">FMS Sign In</span>

        <form id="login-form" action="../FunctionFiles/login-validate.php" method="post" onsubmit="return validateFormInput()">

            <input class="login-input" type="text" name="login-id" placeholder="User ID" autofocus><br>

            <input class="login-input" type="password" name="login-pswd" placeholder="Password"><br>

            <select id="login-input-select" class="login-input" name="user-type">
                <option value="student"> Student </option>
                <option value="admin"> Admin </option>
            </select><br>

            <button id="login-button" type="submit"> Login </button>

        </form>


    </div>
    
    <div id="login-page-right-box">
        
        <div id="login-page-right-box-top">
            <span class="login-nav-item">BBIS</span>
            
            <span class="login-nav-item">Kathmandu Unviersity</span>

            <span class="login-nav-item">About Us</span>
        </div>
        
        <div id="login-page-right-box-bottom">
            <img id="main-image" src="./form-image.png">
        </div>

</div>

<?php
    include("../Layouts/footer.php");
?>