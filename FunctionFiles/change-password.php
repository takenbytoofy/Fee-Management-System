<?php

    session_start();
    require('./dbconnect.php');

    $userName = $_SESSION['userid'];
    $newPswd = $_POST['new-pswd'];
    
    $changePswdQuery = "UPDATE student_login SET Std_pswd='$newPswd' WHERE Std_uname='$userName';";

    if ($dbConn -> query($changePswdQuery)) {
        $_SESSION['state'] = "active";
        $loginTimeStamp = date('Y-m-d h:i:s');
        $timeStampQuery = "UPDATE student_login SET std_last_login = '$loginTimeStamp' WHERE std_uname = '$userName';";
        $dbConn -> query($timeStampQuery);
        $_SESSION['state'] = 'active';
        echo "<script> window.open('../Student/dashboard-student.php','_self') </script>";
    } else {
        echo "
        <script> 
            alert('not done');
        </script>
        ";
    }

?>