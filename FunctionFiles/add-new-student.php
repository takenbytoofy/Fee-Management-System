<?php

    require("../FunctionFiles/dbconnect.php");

    $stdFname =$_POST["first-name"];
    $stdLname =$_POST["last-name"];
    $stdID = $_POST["student-id"];
    $stdUname = $_POST["user-name"];
    $stdDOB = $_POST["student-dob"];
    $stdEmail = $_POST["student-email"];
    $stdCity = $_POST["student-address"];
    $stdPhone = $_POST["contact-number"];
    $stdGender = $_POST["student-gender"];
    $prgm = $_POST["program-enrolled"];
    $enrYear = $_POST["enrolled-year"];
    $schElig = $_POST["scholarship-eligibility"];

    //First making sure unique items are not repeated
    $checkStudentDetailQuery = "
        SELECT * 
        FROM student
        WHERE Std_ID = '$stdID' OR Std_email = '$stdEmail' OR Std_phone = '$stdPhone';
    ";
    $checkStudentLoginQuery = "
        SELECT *
        FROM student_login
        WHERE Std_ID = '$stdID' OR std_uname = '$stdUname';
    ";

    $checkStudentDetailQueryResult = $dbConn -> query ($checkStudentDetailQuery);
    $checkStudentLoginQueryResult = $dbConn -> query($checkStudentLoginQuery);

    if (($checkStudentDetailQueryResult -> num_rows == 0) AND ($checkStudentLoginQueryResult -> num_rows == 0)) {
        $insertStudentDetailQuery = "
            INSERT INTO student
            VALUES ('$stdID', '$prgm', '$enrYear', '$stdFname', '$stdLname', '$stdGender', '$stdDOB', '$stdEmail', '$stdPhone', '$stdCity', '$schElig');
        ";

        $insertStudentLoginQuery = "
            INSERT INTO student_login
            VALUES ('$stdID', '$stdUname', 'student@123', NULL, NULL, NULL);
        ";

        if ($dbConn -> query($insertStudentDetailQuery)) {
            
            if ($dbConn -> query($insertStudentLoginQuery)) {
                echo "
                <script>
                    alert('New student added.');
                    window.location.href = '../Admin/view-students.php';
                </script>
                ";
            } else {
                $rollbackQuery = "
                    DELETE FROM student
                    WHERE Std_ID = '$stdID';
                ";
                $dbConn -> query($rollbackQuery);
                echo "
                <script>
                    alert('Program could not be added.');
                    window.location.href = '../Admin/new-student.php';
                </script>
                ";
            }
            
        } else {
            echo "
                <script>
                    alert('Program could not be added.');
                    window.location.href = '../Admin/new-student.php';
                </script>
            ";
        }
    } else {
        echo "
        <script>
            alert('Duplicate data.');
            window.location.href = '../Admin/new-student.php';
        </script>
        ";
    }


?>