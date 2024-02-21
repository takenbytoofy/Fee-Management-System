<?php
    $studentPageTitle = "Student Details";
    $pageTitle = "Student Details";
    include("../Layouts/header.php");
    include("../Layouts/nav.php");

?>
        <div class="student-detail">
            <p class="detail-content"> Student Id: </p>
            <p class="detail-content"> Enrolled Program ID: </p>
            <p class="detail-content"> Student Name: </p>
            <p class="detail-content"> Gender: </p>
            <p class="detail-content"> Email: </p>
            <p class="detail-content"> Phone Number: </p>
            <p class="detail-content"> Address: </p>

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

#page-title{
    margin-top: 10px;
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

.student-detail{
    background-color: #D1DBFD;
    display: inline-block;
    margin: 40px 100px;
    width: 950px;
    height: 60vh;
    border-style: solid;
    border-color: #7a7edb;
    border-width: 2px ;
}

.detail-content{
    margin: 20px;
    padding: 2px;
}

</style>
</html>