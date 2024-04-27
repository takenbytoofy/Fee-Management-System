<?php

    session_start();

    //First checking if the session variable with state index exists
    if (isset($_SESSION['state'])) {

        //Checking if the state index is set to active and the usertype is an admin
        if($_SESSION['state'] == 'active' && $_SESSION['usertype'] == 'admin') {
        } else {
            echo "<script>
                if (confirm('No login session detected. Do you want to login?') == true) {
                    window.location = '../Login/login-page.php';
                } else {
                    window.location = '../index.php';
                }
            </script>";
        }
    } else {
        echo "<script>
        if (confirm('No login session detected. Do you want to login?') == true) {
            window.location = '../Login/login-page.php';
        } else {
            window.location = '../index.php';
        }
         </script>";
    }


?>