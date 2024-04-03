<?php
    session_start();

    $pageTitle = "Validate Token";
    require("../FunctionFiles/dbconnect.php");
    include("../Layouts/header.php");
?>
<style>

    .check-form {
        height: 100vh;
        width: 100vw;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: rgba(122, 126, 219, 10%);
        background-image: url("./form-image.png");
        background-position: center;
        background-repeat: no-repeat;
        background-size: contain;
    }

    .token-input {
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

    #token-form {
        border-radius: 36px;
        padding: 2rem 2rem;
        height: auto;
        width: auto;
        background-color: rgba(122, 126, 219, 70%);
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 5px;
    }

    #token-form #confirm-button {
        height: 32px;
        width: 200px;
        font-size: 18px;
        color: white;
        border-radius: 36px;
        border: none;
        background-color: rgba(30, 2, 54, 100%);
    }
    
    #token-form #confirm-button:hover {
        transition-duration: 300ms;
        background-color: rgba(30, 2, 54, 50%);
    }

    #token-form #confirm-button:active {
        transition-duration: 300ms;
        transform: scale(1.05);
    }


</style>

<script>

    function validateFormInput () {
        var token = document.forms["token-form"]["token"].value;


        if (token == "") {
            alert("Please enter your 6-digit token.");
            return false;
        } else {
            return true;
        }
    }

</script>

<div class="check-form">

    <form id="token-form" action="../FunctionFiles/validate-token.php" method="post" onsubmit="return validateFormInput()">

        <h1> Enter Token </h1>
          
        <input class="token-input" type="text" name="token" placeholder="6-Digit Token" maxlength="6" autofocus><br>

        <button id="confirm-button" type="submit"> Check Token </button>

    </form>

</div>

<?php
    include("../Layouts/footer.php");
?>