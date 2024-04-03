<?php

    session_start();
    require('./dbconnect.php');
    require('./email-script.php');

    $userName = $_POST['login-id'];
    $password = $_POST['login-pswd'];
    $userType = $_POST['user-type'];

    if ($userType == "student") {
        $loginQuery = "SELECT * FROM student_login WHERE std_uname = '$userName' AND std_pswd = '$password';"; 
        $loginResult = $dbConn -> query($loginQuery);

        if (($loginResult->num_rows) == 1) {

            $loginTimeStamp = date('Y-m-d h:i:s');

            $loginDetails = $loginResult -> fetch_assoc();
            $studentID = $loginDetails['Std_ID'];
            $isNewLogin = is_null($loginDetails['std_last_login']) ? true : false;

            if ($isNewLogin) {
                echo "<script> 
                        alert('New Login Detected. Change password with the link sent to your email.');
                    </script>";

                
                $studentDetailsQuery = "SELECT Std_fname, Std_lname, Std_email FROM student WHERE Std_ID = '$studentID'";

                $studentDetails = $dbConn -> query($studentDetailsQuery);
                $studentDetailsResult = $studentDetails->fetch_assoc();

                $to = $studentDetailsResult['Std_email'];
                $subject = "Change Password - KU Fee Portal";
                $msg = "Change your password with the given link.";

                
                
                sendMail($to, $subject, $msg);

            } else {
                $_SESSION['state'] = "active";
                $_SESSION['userid'] = $userName;
                $_SESSION['usertype'] = 'student';

                 // $timeStampQuery = "UPDATE student_login SET std_last_login = '$loginTimeStamp' WHERE std_uname = '$userName';";
            // $dbConn -> query($timeStampQuery);

            // header("Location:../Student/dashboard-student.php");
            }
  
           

        } else {

            echo "<script> 
                alert('Login Attempt Invalid');
                window.open('../Login/login-page.php', '_self');
            </script>";

        }

    } else if ($userType == "admin"){
        header("Location: ../Admin/dashboard-admin.php");
    }

?>