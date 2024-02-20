
    <body class="dashboard">
        <div class = "container">
            <nav>
                <span id="student-name" > Student Name </span> 
                <hr id="seperator"> 
                     <a href="#" class="nav-bar"> 
                        <i class=" fas fa-bars"></i>
                        <span class="nav-item"> Dashboard </span>
                    </a><br>
                    
                    <a href="#" class="nav-bar">
                        <i class=" fas fa-solid fa-user"></i>
                        <span class="nav-item"> Student Detail </span>
                    </a><br>

                    <a href="#" class="nav-bar">
                        <i class=" fas fa-dollar-sign"></i>
                        <span class="nav-item"> Fee Structure </span>
                    </a><br>

                    <a href="#" class="nav-bar">
                        <i class="fas fa-file"></i>
                        <span class="nav-item"> Payment Record </span>
                    </a><br>

                    <a href="#" class="nav-bar">
                        <i class="fas fa-file-invoice"></i>
                        <span class="nav-item"> Fee Dues </span>
                    </a><br>

                    <a href="#" class="nav-bar">
                        <i class="fas fa-receipt"></i>
                        <span class="nav-item"> Upload Receipt </span>
                    </a><br>

                    <a href="#" class="nav-bar">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="nav-item"> Logout </span>
                    </a><br>
            </nav>
        </div>
    </body>
    <style>
        
*{
    margin:0;
    padding: 0;
    outline: none;
    border: none;
    text-decoration: none;
    box-sizing: border-box;
    font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

}
.container{
    display: flex;
    height: 100vh;
    float: left;
    width: 300px;
    
}

.user-name{
    border-radius: 15px;
    background-color: white;
    padding: 2px;
    margin: 10px;
    
}

#student-name{
    margin: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: white;
    border-radius: 15px;
    height: 50px;
    font-size: 18px;
}

#seperator{
    width: 280px;
    background-color: #4D52D3;
    height: 2px;
    margin-left: 10px;
   
}

nav{
    position: relative;
    top: 0;
    bottom:0;
    height: 120vh;
    left:0;
    background: #D1DBFD;
    width: 300px;
    overflow:hidden; 
    padding-top: 20%;
    padding-bottom: 20%;
}

nav .fas{
    width: 70px;
    height: 50px;
    font-size: 20px;
    display: flex;
    align-items: center;
    
}
.nav-item{
    /* position:relative; */
    
    font-size: 20px;
    height: 50px;
    display: flex;
    align-items: center;

    
}
.nav-bar:hover{
    background: rgb(149, 164, 235);
}
.nav-bar{
    border-radius: 15px;
    background-color: white; 
    padding-left: 20px;
    height: 50px;
    margin: 10px;
    display: flex;
    float: left;
    color: rgb(76, 74, 74);
    font-size: 14px;
    width: 280px;
   
}

body.dashboard{
    background-color: rgb(236, 232, 232);
}
</style>
</html>
