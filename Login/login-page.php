<?php
    $pageTitle = "Login Page";
    include("../Layouts/header.php");
?>

<style>
   
    #login-page-container {
        margin: 0px 0px 0px 0px;
        height: 100vh;
        width: 100vw;
        display: flex;
    }

    #login-page-left-box{
        float: left;
        padding: 0rem 2rem;
        height: 100vh;
        width: 50%;
        background-color: #7a7edb;
        display: flex;
        flex-direction: column;
        align-items: left;
        justify-content: center;
        gap: 30px;
    }

    #login-page-left-box-title {
        display: flex;
        justify-content: left;
        align-items: center;
        color: rgb(30, 2, 54);
        font-size: 56px;
        font-weight: 1000;
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
        font-size: 18px;
        color: white;
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
        float: right;
        background-color: rgba(122, 126, 219, 10%);
        background-image: url("./form-image.png");
        background-position: center;
        background-repeat: no-repeat;
        background-size: contain;
        margin: 0px 0px 0px 0px;
        height: 100vh;
        width: 50%;
        display: grid;
        grid-template-columns: auto;
        grid-template-rows: 50px auto;
    }

    #login-page-right-nav {
        display: flex;
        padding: 1rem 0rem;
        flex-direction: row-reverse;
        color: rgb(30, 2, 54);
        font-weight: bold;
    }

    .login-nav-item {
        display: flex;
        justify-content: center;
        align-items: center;
        text-decoration: none;
        padding: 1rem 1rem;
        margin-right: 2vw;
        border-radius: 24px;
    }

    .login-nav-item:hover {
        transition-duration: 300ms;
        color: white;
        background-color: #7a7edb;
    }

    @media only screen and (max-width: 1120px) {

        #login-page-container {
            align-items: center;
            justify-content: center;
            background-color: rgba(122, 126, 219, 10%);
            background-image: url("./form-image.png");
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
        }

        #login-page-left-box {
            all: unset;
            border-radius: 36px;
            padding: 2rem 2rem;
            height: auto;
            width: auto;
            background-color: rgba(122, 126, 219, 70%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 30px;
        }

        #login-page-right-box {
            display: none;
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
        
        <span id="login-page-left-box-title">KU Fee Portal Sign In</span>

        <form id="login-form" action="../FunctionFiles/login-validate.php" method="post" onsubmit="return validateFormInput()">

            <input class="login-input" type="text" name="login-id" placeholder="User ID" autofocus><br>

            <input class="login-input" type="password" name="login-pswd" placeholder="Password"><br>

            <select id="login-input-select" class="login-input" name="user-type">
                <option value="student"> Student </option>
                <option value="admin"> Admin </option>
            </select><br>

            <button id="login-button" type="submit"> Sign In </button>

        </form>


    </div>
    
    <div id="login-page-right-box">
        
        <div id="login-page-right-nav">
            <a class="login-nav-item" href="https://mic.ku.edu.np/bachelor-of-business-information-systems-bbis"><span >BBIS</span></a>
            
            <a class="login-nav-item" href="https://www.ku.edu.np/"><span>Kathmandu Unviersity</span></a>

            <a class="login-nav-item" href="../Profile/TeamProfile.php"><span>About Us</span></a>
        </div>

</div>

<?php
    include("../Layouts/footer.php");
?>