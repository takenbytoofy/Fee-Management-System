<?php
    $pageTitle = "Login Page";
    include("../Layouts/header.php");
?>
<body class="login">
            <div class="login-section">
               <!-- <div id="login-title"> FEE MANAGEMENT SYSTEM </div>-->

                <form action="./dashboard.html" method="post">
                    <input class="login-content" type="text" name="" placeholder="User Name"><br>
                    <input class="login-content" type="password" name="" placeholder="User Password"><br>
                    <select class="login-content">
                        <option value="student"> Student </option>
                        <option value="admin"> Admin </option>
                    </select><br>
                    <button id="login-button" type="submit"> Login </button>

                </form>
            </div>
          
</body>

<style>
    body.login{
    background-image: url(form_image.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    width: 1200px;
    height: 100vh;
}

#login-title{
    font-size: 20px;
    padding: 0;
    margin: 0;
    background-color: #F3C0AA;
}

.login-section{
    background-color: #D1DBFD;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    height:100vh ;
    width: 750px;
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
}
</style>
</html>




<?php
    include("../Layouts/footer.php");
?>