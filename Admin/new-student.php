<?php
    require("../FunctionFiles/validate-admin-session.php");
    require("../FunctionFiles/dbconnect.php");

    $pageHeader = "New Student";
    $pageTitle = "New Student";

    include("../Layouts/header.php");
    include("../Layouts/nav-admin.php");

    $existingProgramsQuery = "SELECT Prgm_ID FROM program ORDER BY Prgm_ID ASC;";
    $existingProgramsResult = $dbConn -> query($existingProgramsQuery);

?>

<script>

    function newStudentFormValidate(){
        let a = document.forms["new-student-form"]["first-name"].value;
        let aa = document.forms["new-student-form"]["last-name"].value;
        let b = document.forms["new-student-form"]["student-id"].value;
        let c = document.forms["new-student-form"]["user-name"].value;
        let d = document.forms["new-student-form"]["student-dob"].value;
        let e = document.forms["new-student-form"]["student-email"].value;
        let f = document.forms["new-student-form"]["student-address"].value;
        let g = document.forms["new-student-form"]["contact-number"].value;
        let h = document.forms["new-student-form"]["student-gender"].value;
        let i = document.forms["new-student-form"]["program-enrolled"].value;
        let j = document.forms["new-student-form"]["enrolled-year"].value;
        let k = document.forms["new-student-form"]["scholarship-eligibility"].value;


        
        if(a=="" ||  aa=="" || b=="" || c=="" || d=="" || e=="" || f=="" ||  g=="" || h=="" || i=="" || j==""){
            alert("All Student Details is Required");
            return false;
        }else {
            return true;
        }
        
    }

    document.addEventListener("DOMContentLoaded", function () {
        var prgmDropdown = document.getElementById("program-enrolled");
        var yearDropdown = document.getElementById("enrolled-year");

        prgmDropdown.addEventListener("change", function () {
            var selectedValue = prgmDropdown.value;
            if (selectedValue !== "") {
                // Send selected value to server using AJAX
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            // On successful response, add options to dropdown2
                            var response = JSON.parse(xhr.responseText);
                            yearDropdown.innerHTML = ""; // Clear existing options
                            response.forEach(function (option) {
                                var optionElement = document.createElement("option");
                                optionElement.textContent = option;
                                yearDropdown.appendChild(optionElement);
                            });
                        } else {
                            console.error("Error: " + xhr.status);
                        }
                    }
                };
                xhr.open("GET", "../FunctionFiles/set-enrollment-year-menu.php?value=" + encodeURIComponent(selectedValue), true);
                xhr.send();
            } else {
                yearDropdown.innerHTML = ""; // Clear dropdown2 if no value selected in dropdown1
            }
        });
    });

</script>

<style>

    .new-student-container {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .new-student-container form{
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 2rem 2rem;
        background-color: white;
        border-radius: 10px;
        border-style: solid;
        border-color: #7a7edb;
        border-width: 3px;
        font-size: 20px;
        position: relative;
    }

    .new-student-container form span {
        display:grid;
        grid-template-columns: 14rem 20rem;
        grid-template-rows: 3.4rem;
    }

    .new-student-container form label{
        margin: .8rem 0rem;
        position: relative;
    }

    .new-student-container form input, select{
        margin: .5rem 0rem;
        padding: .1rem .5rem;
        font-size: 20px;
        width: auto;
        height: 35px;
        border: 1px solid black;
        position: relative;
    }

    #submit-button{
        color: white;
        background-color: #6981d6;
        border-radius: 5px;
        width: 100px;
        height: 30px;
        font-size: 16px;
        margin-top: 20px;
        padding: 5px;
    } 
    #submit-button:hover{
        background: rgb(146, 160, 212);
        transform: scale(1.02);
    }

</style>

<div class="new-student-container">

    <form name="new-student-form" action="../FunctionFiles/add-new-student.php" method="post" onsubmit="return newStudentFormValidate()">
        <span>
            <label> First Name: </label>
            <input type="text" name="first-name"><br>
        </span>

        <span>
            <label> Last Name: </label>
            <input type="text" name="last-name"><br>
        </span>

        <span>
            <label> Student ID: </label>
            <input type="number" name="student-id"> <br>
        </span>
            

        <span>
            <label> User Name: </label>
            <input type="text" name="user-name"><br>
        </span>

        <span>
            <label> Student Email: </label>
            <input type="text" name="student-email"><br>
        </span>

        <span>
            <label> Date of Birth (AD): </label>
            <input type="date" name="student-dob"><br>
        </span>

        <span>
            <label> City: </label>
            <input type="text" name="student-address"><br>
        </span>

        <span>
            <label> Contact Number: </label>
            <input type="number" name="contact-number"> <br>
        </span>

        <span>
            <label> Gender: </label>
            <select class="login-content" name="student-gender">
                <option disabled selected value>
                <option value="Female"> Female </option>
                <option value="Male"> Male </option>
                <option value="Others"> Others </option> 
            </select><br>
        </span>

        <span>
            <label> Program Enrolled: </label>
            <select class="login-content" name="program-enrolled" id="program-enrolled" oninput="setEnrYearMenu()"> 
            <option disabled selected value>
                <?php
                    while ($dataRow = $existingProgramsResult -> fetch_assoc()) {
                        echo "<option value=".$dataRow['Prgm_ID'].">". $dataRow['Prgm_ID'] ."</option>";
                    }
                ?>
            </select><br>
        </span>

        <span>
            <label for="program-enrolled"> Enrolled Year: </label>
            <select class="login-content" name="enrolled-year" id="enrolled-year">
                <option disabled selected value>
            </select><br>
        </span>

        <span>
            <label for="scholarship-eligibility"> Scholarship Eligibility: </label>
            <select class="login-content" name="scholarship-eligibility">
                <option disabled selected value>
                <option value="Non"> Not Eligible </option>
                <option value="Active"> Eligible </option>
                <option value="Inactive"> Inactive </option>                
            </select><br>
        </span>
                
        <button id="submit-button" type="submit"> Submit </button>
    </form>
</div>