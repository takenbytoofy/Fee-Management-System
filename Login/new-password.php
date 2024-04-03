<?php

    require("../FunctionFiles/validate-session.php");
    $pageTitle = "Change Password";
    require("../FunctionFiles/dbconnect.php");
    include("../Layouts/header.php");
?>
<style>

    .pwsd-change-form {
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

    .password-input {
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

    #password-change-form {
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

    #password-change-form #confirm-button {
        height: 32px;
        width: 200px;
        font-size: 18px;
        color: white;
        border-radius: 36px;
        border: none;
        background-color: rgba(30, 2, 54, 100%);
    }
    
    #password-change-form #confirm-button:hover {
        transition-duration: 300ms;
        background-color: rgba(30, 2, 54, 50%);
    }

    #password-change-form #confirm-button:active {
        transition-duration: 300ms;
        transform: scale(1.05);
    }


</style>

<script>

    function NewPassword () {
        var oldPswd = document.forms["password-change-form"]["old-pswd"].value;
        var newPswd = document.forms["password-change-form"]["new-pswd"].value;
        var newPswdRep = document.forms["password-change-form"]["new-pswd-rep"].value;

        if (oldPswd == "" || newPswd == "" || newPswdRep == "") {
            alert("All fields required");
            return false;
        } else {
            if (oldPswd == newPswd) {
                alert("Old Password and new Password Cannot be same");
                return false;    
            } else {
                if (newPswd === newPswdRep) {
                    return true;
                } else {
                    alert("New passwords must be same");
                    return false;
                }
            }
        }
    }

</script>

<div class="pwsd-change-form">

    <form id="password-change-form" action="../FunctionFiles/change-password.php" method="post" onsubmit="return NewPassword()">

        <h1> Change Password </h1>
          
        <input class="password-input" type="password" name="old-pswd" placeholder="Old Password" autofocus><br>
        <input class="password-input" type="password" name="new-pswd" placeholder="New Password" minlength="8"><br>
        <input class="password-input" type="password" name="new-pswd-rep" placeholder="Repeat New Password" minlength="8"   ><br>

        <button id="confirm-button" type="submit"> Change Password </button>

    </form>

</div>

<?php
    include("../Layouts/footer.php");
?>