<?php

    $userName = $_SESSION['userid'];
    $userType = "Admin";
?>

<style>

    .user-img {
        width: 50px;
        border-radius: 100%;
        border: 1px solid white;
    }

    .sidebar {
        position: absolute;
        top: 0;
        left:0;
        height: 100vh;
        width: 80px;
        background-color: rgba(122, 126, 219, 100%);
        padding:  0.4rem 0.8rem;
        transition: all 0.2s ease;
        position: fixed;
    }

    .sidebar.active ~ .main-content {
        left: 250px;
        width: calc(100% - 250px);
    }

    .sidebar.active {
        width: 250px;
    }

    .sidebar #btn {
        position: absolute;
        color: #ffffff;
        top: 0.4rem;
        left: 50%;
        font-size: 1.2rem;
        line-height: 50px;
        transform: translateX(-50%);
        cursor: pointer;
    }

    .sidebar.active #btn {
        left: 90%;
    }

    .sidebar .top .logo {
        color: #ffffff;
        display: flex;
        height: 50px;
        width: 100%;
        align-items: center;
        pointer-events: none;
        opacity: 0;
    }

    .sidebar.active .top .logo {
        opacity: 1;
    }

    .top .logo i {
        font-size: 2rem;
        margin-right: 5px;
    }

    .user {
        display: flex;
        align-items: center;
        margin: 1rem 0;
    }

    .user p {
        color: #ffffff;
        opacity: 1;
        margin-left: 1rem;
    }

    .bold {
        font-weight: 600;

    }

    .sidebar p {
        opacity: 0;
    }

    .sidebar.active p {
        opacity: 1;
    }

    .sidebar ul li {
        position: relative;
        list-style-type:  none;
        height: 50px;
        width: 90%;
        margin: 0.8rem auto;
        line-height: 50px;
    }

    .sidebar ul li a {
        color: #ffffff;
        display: flex;
        align-items: center;
        text-decoration: none;
        border-radius: 0.8rem;
    }

    .sidebar ul li a:hover {
        background-color: #ffffff;
        color: rgba(122, 126, 219, 100%);
    }

    .sidebar ul li a i {
        min-width: 50px;
        text-align: center;
        height: 50px;
        border-radius: 12px;
        line-height: 50px;
    }

    .sidebar .nav-item {
        opacity: 0;
    }

    .sidebar.active .nav-item {
        opacity: 1;
    }

    .sidebar ul li .tooltip {
        position: absolute;
        left: 125px;
        top: 50%;
        transform: translate(-50%, -50%);
        box-shadow: 0 0.5rem 0.8rem rgba(0, 0, 0, 20%);
        border-radius: 0.6rem;
        padding: 0.4rem 1.2rem;
        line-height: 1.8rem;
        z-index: 20;
        opacity: 0;
    }

    .sidebar ul li:hover .tooltip {
        opacity: 1;
    }

    .sidebar.active ul li .tooltip {
        display: none;
    }

    .sidebar ul li .tooltip:hover  {
        opacity: 0;
    }

    .main-content {
        position: relative;
        background-color: rgba(122, 126, 219, 10%);
        min-height: 100vh;
        min-width: none;
        top: 0;
        left: 80px;
        transition: all 0.5 ease;
        width: calc(100% - 80px);
        padding: 1rem;
    }

    .page-title {
        height: 50px;
        font-size: 36px;
        color: rgba(56, 35, 92, 100%);
        font-weight: 1000;
        
    }

</style>

<div class="sidebar">
    <div class="top">
        <div class="logo">
            <i class="bx bxs-bank"></i>
            <span>KU Fee Mangement Portal</span>
        </div>
        <i class="bx bx-menu" id="btn"></i>
    </div>
    <div class="user">
        <img src="../Layouts/user.png" alt="User Photo" class="user-img">
        <div>
            <p class="bold"> <?php echo $userName; ?> </p>
            <p> <?php echo $userType; ?> </p>
        </div>
    </div>
    <ul>
        <li>
            <a href="../Admin/dashboard-admin.php">
                <i class="bx bx-grid-alt"></i>
                <span class="nav-item">Dashboard</span>
            </a>
            <!-- <span class="tooltip">Dashboard</span> -->
        </li>
        <li>
            <a href="../Admin/view-students.php">
                <i class="fas fa-solid fa-user"></i>
                <span class="nav-item">Students</span>
            </a>
            <!-- <span class="tooltip">Students</span> -->
        </li>
        <li>
            <a href="../Admin/view-programs.php">
                <i class="fas fa-file"></i>
                <span class="nav-item">Programs</span>
            </a>
            <!-- <span class="tooltip">Programs</span> -->
        </li>
        <li>
            <a href="../Admin/view-fees.php">
                <i class="fas fa-dollar-sign"></i>
                <span class="nav-item">Fees</span>
            </a>
            <!-- <span class="tooltip">Fees</span> -->
        </li>
        <li>
            <a href="../FunctionFiles/logout-function.php">
                <i class="bx bx-log-out"></i>
                <span class="nav-item">Logout</span>
            </a>
            <!-- <span class="tooltip">Logout</span> -->
        </li>
    </ul>
    
</div>

<div class="main-content">

    <div class="container">
        <h1 class="page-title"> <?php echo $pageHeader ?> </h1>
    </div>



<script>
    var btn = document.querySelector('#btn');
    var sidebar = document.querySelector('.sidebar');

    btn.onclick = function () {
        sidebar.classList.toggle('active');
    };  

</script>