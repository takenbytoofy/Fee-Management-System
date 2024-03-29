<?php
    $pageTitle = "Fee Manager";
    include("./Layouts/header.php");
?>

<style>
    .index-container {
        background-color: #7a7edb;
        height: 100vh;
        width: 100vw;
        color: rgba(0,0,0,100%);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .index-main-content {
        background-color: rgba(255,255,255, 70%);
        border-radius: 24px;
        padding: 4rem; 
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 32px;
    }

    .index-title {
        font-size: 48px;
        font-weight: 1000;
        height: 64px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .index-subtitle {
        font-size: 32px;
        font-weight: 500;
        height: 64px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .index-main-content a {
        text-decoration: none;
        padding: 0.5rem 1.5rem;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 24px;
        color: white;
        border-radius: 36px;
        background-color: rgba(30, 2, 54, 100%);
        box-shadow: 0 0.5rem 0.8rem rgba(56, 35, 92, 20%);
    }

    .index-main-content a:hover {
        transition-duration: 300ms;
        background-color: rgba(30, 2, 54, 50%);
    }

    .index-main-content a:active {
        transition-duration: 300ms;
        transform: scale(1.05);
    }

</style>

<div class="index-container">
    <div class="index-main-content">
        <span class="index-title">KU Fee Portal</span>
        <span class="index-subtitle"> Kathmandu Unviersity</span>
        <a class="index-button" href="./Login/login-page.php">
            <span>Sign In</span>
        </a>
    </div>
</div>

<?php
    include("./Layouts/footer.php");
?>