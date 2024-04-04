<?php

    session_start();
    require('./dbconnect.php');

    $userName = $_SESSION['userid'];
    $inputToken = $_POST['token'];
    
    $tokenQuery = "SELECT change_token, token_expire FROM student_login WHERE Std_uname = '$userName';";

    $tokenDetails = $dbConn -> query($tokenQuery);

    $tokenDetailsResult = $tokenDetails->fetch_assoc();

    $currentDateTime = date('Y-m-d h:i:s');

    if ($tokenDetailsResult['change_token'] === $inputToken && $tokenDetailsResult['token_expire'] >= $currentDateTime ) {
        echo "<script> window.open('../Login/new-password.php','_self'); </script>";
    } else {
        echo "<script> 
            alert('Expired or Invalid Token.');
            window.open('../Login/token-form.php','_self');
            </script>";
    }

?>