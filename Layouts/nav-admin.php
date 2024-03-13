<style>
    
    #naved-page {
        display: grid;
        row-gap: 0;
        column-gap: 0;
        /* Defining the Grid Display */
        grid-template-areas: 
        'nav page-title'
        'nav page-content';
        grid-template-columns: 270px auto;
        grid-template-rows: 50px auto;
    }

    #admin-nav-container{
        position: fixed;
        display: flex;
        height: 100vh;
        float: left;
        width: 270px;
        grid-area: nav;
    }

    #admin-page-title{
        background-color: #7a7edb;
        height: 50px;
        font-size: 25px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        grid-area: page-title;
    }

    #admin-page-content-container {
        grid-area: page-content;
    }

    #admin-account{
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
        height: 100vh;
        left:0;
        background: #D1DBFD;
        width: 300px;
        overflow:hidden; 
        padding-top: 20%;
        padding-bottom: 20%;
    }

    nav .fas{
        width: 40px;
        height: 50px;
        margin-right: none;
        font-size: 20px;
        display: flex;
        align-items: center;  
    }

    .nav-bar-text{
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
        border: none;
        background-color: white; 
        padding-left: 20px;
        height: 50px;
        margin: 10px;
        display: flex;
        float: left;
        color: rgb(76, 74, 74);
        font-size: 14px;
        width: 250px;   
    }

</style>

<div id="naved-page">

    <div id = "admin-nav-container">
        <nav>

            <span id="admin-account" >  </span> 

            <hr id="seperator"> 

            <button class="nav-bar"> 
                <i class=" fas fa-bars"></i>
                <span class="nav-bar-text"> Dashboard </span>
            </button><br>
            
            <button class="nav-bar">
                <i class=" fas fa-solid fa-user"></i>
                <span class="nav-bar-text"> Student Record </span>
            </button><br>

            <button class="nav-bar">
                <i class=" fas fa-dollar-sign"></i>
                <span class="nav-bar-text"> Fee Structure </span>
            </button><br>

            <button class="nav-bar">
                <i class="fas fa-file"></i>
                <span class="nav-bar-text"> Program Details </span>
            </button><br>

            <button class="nav-bar">
                <i class="fas fa-user-plus"></i>
                <span class="nav-bar-text"> New Student </span>
            </button><br>

            <button class="nav-bar">
                <i class="fas fa-receipt"></i>
                <span class="nav-bar-text"> Set Bills </span>
            </button><br>

            <button class="nav-bar" onclick="window.open('../FunctionFiles/logout-function.php','_self')">
                <i class="fas fa-sign-out-alt"></i>
                <span class="nav-bar-text"> Logout </span>
            </button><br>

        </nav>
    </div>

    <div id="admin-page-title">
        <?php echo $studentPageTitle?>
    </div>

    <div id="admin-page-content-container">
