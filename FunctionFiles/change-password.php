<?php

    session_start();
    require('./dbconnect.php');

    $userName = $_SESSION['userid'];
    $newPswd = $_POST['new-pswd'];
    
    $changePswdQuery = "UPDATE student_login SET Std_pswd='$newPswd' WHERE Std_uname='$userName';";

    //Checking to see if query works
    if ($dbConn -> query($changePswdQuery)) {
        //If password is reset -> activate session and update timestamp
        $_SESSION['state'] = "active"; 

        //Creating current time stamo and storing it in the database
        $loginTimeStamp = date('Y-m-d h:i:s');
        $timeStampQuery = "UPDATE student_login SET std_last_login = '$loginTimeStamp' WHERE std_uname = '$userName';";
        $dbConn -> query($timeStampQuery);

        echo "<script> window.open('../Student/dashboard-student.php','_self') </script>";
    } else {
        echo "
        <script> 
            alert('not done');
        </script>
        ";
    }

?>