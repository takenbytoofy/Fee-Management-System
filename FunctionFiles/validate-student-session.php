<?php

    session_start();

    if (isset($_SESSION['state'])) {
        if($_SESSION['state'] != 'active') {
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