
<div id="student-dashboard">

    <div class = "student-nav-container">

        <nav>

            <span id="student-name" > Student Name </span> 

            <hr id="seperator"> 

            <a href="#" class="nav-bar"> 
                <i class=" fas fa-bars"></i>
                <span class="nav-item"> Dashboard </span>
            </a><br>
                
            <a href="#" class="nav-bar">
                <i class=" fas fa-solid fa-user"></i>
                <span class="nav-item"> My Details </span>
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
    
    <div id="student-page-title">
        Insert Title
    </div>

</div>   


<style>
       
    * {
        margin:0;
        padding: 0;
        outline: none;
        border: none;
        text-decoration: none;
        box-sizing: border-box;
        font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    #student-dashboard {
        background-color: rgb(236, 232, 232);
        display: flex;
    }

    #student-nav-container {
        display: flex;
        height: 100vh;
        float: left;
        width: 300px;
        align-items:center;  
    }

    #student-page-title {
        width: 100%;
        height: 50px;
        background-color: #7a7edb;
        font-size: 25px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        border-style: solid;
        border-width: 3px;
        border-color: white;
    }

    #student-name {
        margin: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: white;
        border-radius: 15px;
        height: 50px;
        font-size: 18px;
    }

    #seperator {
        width: 280px;
        background-color: #4D52D3;
        height: 2px;
        margin-left: 10px;
    
    }

    nav {
        position: relative;
        top: 0;
        bottom:0;
        height: 100vh;
        left:0;
        background: #D1DBFD;
        width: 300px;
        overflow:hidden; 
        padding-top: 20%;
        padding-bottom: 20%;
    }

    nav .fas {
        width: 70px;
        height: 50px;
        font-size: 20px;
        display: flex;
        align-items: center;
    }

    .nav-item {
        font-size: 20px;
        height: 50px;
        display: flex;
        align-items: center;
    }

    .nav-bar:hover {
        background: rgb(149, 164, 235);
    }

    .nav-bar {
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

</style>