<?php

    session_start();
    require('./dbconnect.php');
    require('./email-script.php');

    //Posting username, password and usertype from login form
    $userName = $_POST['login-id'];
    $password = $_POST['login-pswd'];
    $userType = $_POST['user-type'];

    //Checking usertype being student or admin

    //If user is student : 
    if ($userType == "student") {

        // Query to check if entered username exists and if password is correct in students
        $loginQuery = "SELECT * FROM student_login WHERE std_uname = '$userName' AND std_pswd = '$password';"; 
        $loginResult = $dbConn -> query($loginQuery);

        //If username and password is correct, number of rows returned will be equal to 1
        if (($loginResult->num_rows) == 1) {

            //Setting session variables
            $_SESSION['userid'] = $userName;
            $_SESSION['usertype'] = 'student';

            $loginDetails = $loginResult -> fetch_assoc();
            $studentID = $loginDetails['Std_ID'];

            // Query to check if it is the first time that the user has logged in
            $isNewLogin = is_null($loginDetails['std_last_login']) ? true : false;

            // If it is the first time the user has logged in
            if ($isNewLogin) {
                echo "<script> 
                        alert('New Login Detected. Change password with the link sent to your email.');
                    </script>";

                //Token to change password is created and mailed if the user has logged if for first time
                $token = sprintf("%06d", mt_rand(1, 999999));
                $tokenExpire = date('Y-m-d h:i:s', strtotime('+10 minutes'));
                $tokenQuery = "UPDATE student_login SET change_token='$token', token_expire='$tokenExpire';";
                $dbConn -> query($tokenQuery);

                $studentDetailsQuery = "SELECT Std_fname, Std_lname, Std_email FROM student WHERE Std_ID = '$studentID'";

                $studentDetails = $dbConn -> query($studentDetailsQuery);
                $studentDetailsResult = $studentDetails->fetch_assoc();

                $to = $studentDetailsResult['Std_email'];
                $subject = "Change Password - KU Fee Portal";
                $msg = "Your Token is: " . $token;

                sendMail($to, $subject, $msg);
                header('Location: ../Login/token-form.php');

             // If the user has logged in before
            } else {
                $_SESSION['state'] = "active";
                $loginTimeStamp = date('Y-m-d h:i:s');
                $timeStampQuery = "UPDATE student_login SET std_last_login = '$loginTimeStamp' WHERE std_uname = '$userName';";
                $dbConn -> query($timeStampQuery);
                header("Location:../Student/dashboard-student.php");
            }

        } else {
        // If the username and password is incorrect
            echo "<script> 
                alert('Login Attempt Invalid');
                window.open('../Login/login-page.php', '_self');
            </script>";

        }

    // If user is admin :
    } else if ($userType == "admin"){
        
        // Query to check if entered username exists and if password is correct in admins
        $loginQuery = "SELECT * FROM admin_login WHERE adm_uname = '$userName' AND adm_pswd = '$password';"; 
        $loginResult = $dbConn -> query($loginQuery);

        //If username and password is correct, number of rows returned will be equal to 1
        if (($loginResult->num_rows) == 1) {

            $_SESSION['userid'] = $userName;
            $_SESSION['usertype'] = 'admin';
            $_SESSION['state'] = 'active';

            $loginDetails = $loginResult -> fetch_assoc();
            $adminID = $loginDetails['Adm_ID'];

            $_SESSION['state'] = "active";
            $loginTimeStamp = date('Y-m-d h:i:s');
            $timeStampQuery = "UPDATE student_login SET std_last_login = '$loginTimeStamp' WHERE std_uname = '$userName';";
            $dbConn -> query($timeStampQuery);
            header("Location:../Admin/dashboard-admin.php");

        } else {

        // If the username and password is incorrect
            echo "<script> 
                alert('Login Attempt Invalid');
                window.open('../Login/login-page.php', '_self');
            </script>";

        }

    }

?>