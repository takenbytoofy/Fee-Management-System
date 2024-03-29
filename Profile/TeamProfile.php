<?php
    $pageTitle = "Our Team";
    include("../Layouts/header.php");
?>

<style>

    .team-profile-container {
        height: 100vh;
        width: 100vw;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        background-color: rgba(122, 126, 219, 10%);
        gap: 30px;
    }

    .cards {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 30px;
    }
    .member {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        padding: 2rem 2rem;
        background-color: white;
        border-radius: 24px;
        color: rgb(30, 2, 54);
        box-shadow: 0 0.5rem 0.8rem rgba(0, 0, 0, 20%);
        gap: 20px;
    }

    .member p {
        text-align: center;
    }

    .member img{
        height: 150px;
        width: 150px;
        border-radius: 50%;
    }

    .member a {
        padding: 0.2rem 2rem;
        text-decoration: none;
        color: rgb(30, 2, 54);
    }

    .member a :hover {
        background-color: rgba(122, 126, 219, 100%);
        border-radius: 24px;
    }

    .member:hover {
        transform: scale(1.02);
        transition: 0.1s ease;
    }

</style>

<div class="team-profile-container">
    <h1> Our Team </h1>
    <div class="cards">
        <div class="member">
            <img src = "Ezal PFP.png" alt="Ezal Pfp"> 
            <p> Ezal Sujakhu <br> BBIS 2020 </p>
            <a href="https://www.linkedin.com/in/ezalsujakhu/" target="_blank"> LinkedIn </a> 
        </div>
        <div class="member">
            <img src = "Rhitika PFP.png" alt="Rhitika Pfp">
            <p> Rhitika Shrestha <br> BBIS 2020 </p>
            <a href="https://www.linkedin.com/in/rhitikashrestha/" target="_blank"> LinkedIn </a> 
        </div>
        <div class="member">
            <img src = "Tisha PFP.png" alt="Tisha Pfp">
            <p> Tisha Dhunju <br> BBIS 2020</p>
            <a href="https://www.linkedin.com/in/tisha-dhunju-04a1b1210/" target="_blank"> LinkedIn </a> 
        </div>
    </div>
</div>

<?php
    include("../Layouts/footer.php");
?>