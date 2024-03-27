<?php

    session_start();
    $_SESSION['User'] = "";

    $userType = $_POST['user-type'];
    if ($userType == "student") {
        header("Location:../Student/dashboard-student.php");
    } else if ($userType == "admin"){
        header("Location: ../Admin/dashboard-admin.php");
    }

?>