<?php

    // Destroying session and clearing all variables
    session_start();
    session_unset();
    session_destroy();

    header("Location: ../Login/login-page.php");

?>