<?php
    $pageTitle = "Login Page";
    include("../Layouts/header.php");
?>

<style>
    #login-page-container {
        background-image: url(form_image.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        width: 100%;
        height: 100vh;
    }

    #login-title{
        font-size: 20px;
        padding: 0;
        margin: 0;
        background-color: #F3C0AA;
    }

    #login-section{
        background-color: #D1DBFD;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        height:100vh ;
        width: 600px;
        float: left;
    }

    .login-content{
        margin: 20px;
        font-size: 20px;
        text-align: center;
        align-items: center;
        width: 450px;
        height: 40px;
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

            <input class="login-content" type="text" name="" placeholder="User Name" required><br>

            <input class="login-content" type="password" name="" placeholder="User Password" required><br>

            <select class="login-content" name="user-type">
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