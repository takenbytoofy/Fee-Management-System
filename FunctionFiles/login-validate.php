<?php

    session_start();
    $_SESSION['User'] = "";
    header("Location:../Student/dashboard-student.php");


?>