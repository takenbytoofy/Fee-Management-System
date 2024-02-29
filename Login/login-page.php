<?php
    $pageTitle = "Login Page";
    include("../Layouts/header.php");
?>

<style>
    #login-page-container {
        background-image: url(main-image.png);
        background-size: cover;
        background-repeat: no-repeat;
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items:center;
    }

    #login-section{
        background-color: rgba(209, 219, 253, 60%);
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        height:500px ;
        width: 600px;
        float: left;
    }

    #login-title{
        font-size: 20px;
        padding: 0; 
        margin: 0;
        background-color: #F3C0AA;
    }


    .login-input{
        margin: 20px;
        font-size: 20px;
        text-align: center;
        align-items: center;
        width: 450px;
        height: 40px;
        border-radius: 5px 5px 5px 5px;
        border-width: 2px;
    }

    #login-button{
        font-size: 20px;
        justify-content: center;
        margin: 20px;
        align-items: center;
        width: 450px;
        height: 40px;
        background-color: #F3C0AA;
    } 

    #login-button:hover{
        background: rgb(105, 115, 164);
        color: white;
    }

</style>

<div id="login-page-container">
    
    <div id="login-section">        

        <form action="./dashboard.html" method="post">

            <input class="login-input" type="text" name="login-id" placeholder="User ID" required><br>

            <input class="login-input" type="password" name="login-pswd" placeholder="Password" required><br>

            <select class="login-input" name="user-type">
                <option value="student"> Student </option>
                <option value="admin"> Admin </option>
            </select><br>

            <button id="login-button" type="submit"> Login </button>

        </form>

    </div>
          
</div>

<?php
    include("../Layouts/footer.php");
?>