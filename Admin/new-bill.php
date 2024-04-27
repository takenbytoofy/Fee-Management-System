<?php


    require('../FunctionFiles/validate-admin-session.php');
    require('../FunctionFiles/dbconnect.php');
    
    $pageHeader = 'Create Bill';
    $pageTitle = 'Create Bill';

    include('../Layouts/header.php');
    include('../Layouts/nav-admin.php');

    $existingProgramsQuery = "SELECT Prgm_ID FROM program ORDER BY Prgm_ID ASC;";
    $existingProgramsResult = $dbConn -> query($existingProgramsQuery);

?>

<script>

    function newBillFormValidate(){
        let a = document.forms["new-bill-form"]["program-enrolled"].value;
        let b = document.forms["new-bill-form"]["enrolled-year"].value;
        let c = document.forms["new-bill-form"]["installment"].value;
        let d = document.forms["new-bill-form"]["due-date"].value;
        
        if(a=="" || b=="" || c=="" || d==""){
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
                            // On successful response, add options to yeardropDown
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
                yearDropdown.innerHTML = ""; // Clear yearDropDown if no value selected in dropdown1
            }
        });
    });

</script>

<div class="new-bill-container">
    <h2>New Bill</h2>
    <form name='new-bill-form' action="../FunctionFiles/bills-profile.php" method="post" onsubmit="return newBillFormValidate()">

        <span>
            <label> Program: </label>
            <select class="form-content" name="program-enrolled" id="program-enrolled"> 
                <option disabled selected value>
                <?php
                    while ($dataRow = $existingProgramsResult -> fetch_assoc()) {
                        echo "<option value=".$dataRow['Prgm_ID'].">". $dataRow['Prgm_ID'] ."</option>";
                    }
                ?>
            </select><br>
        </span>

        <span>
            <label> Enrollment Year: </label>
            <select class="form-content" name="enrolled-year" id="enrolled-year">
                <option disabled selected value>
            </select><br>
        </span>
            
        <span>
            <label> Installment Num: </label>
            <select name="installment" id="installment">
                <option disabled selected value>
                <option value='Admission'>Admission</option>
                <option value='1'>1</option>
                <option value='2'>2</option>
                <option value='3'>3</option>
                <option value='4'>4</option>
                <option value='5'>5</option>
                <option value='6'>6</option>
                <option value='7'>7</option>
                <option value='8'>8</option>
                <option value='9'>9</option>
                <option value='10'>10</option>
                <option value='11'>11</option>
                <option value='12'>12</option>
                <option value='13'>13</option>
                <option value='14'>14</option>
                <option value='15'>15</option>
                <option value='16'>16</option>
            </select>
        </span>

        <span>
            <label> Due Date:</label>
            <input type='date' class='form-content' id='due-date' name='due-date'>
        </span>

        <button id="create""> Create </button>
    </form>
</div>

<style>

    .new-bill-container {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .new-bill-container form{
        display: flex;
        flex-direction: column;
        align-items: center;
        margin: 1rem 0rem;
        padding: 2rem 2rem;
        background-color: white;
        border-radius: 10px;
        border-style: solid;
        border-color: #7a7edb;
        border-width: 3px;
        font-size: 20px;
        position: relative;;
    }

    .new-bill-container form span {
        display:grid;
        grid-template-columns: 14rem 20rem;
        grid-template-rows: 3.4rem;
    }

    .new-bill-container form label{
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


    #create{
        color: white;
        background-color: #6981d6;
        border-radius: 5px;
        width: 100px;
        height: 30px;
        font-size: 16px;
        margin-top: 20px;
        padding: 5px;
    }

    #create:hover{
        background: rgb(146, 160, 212);
        transform: scale(1.02);
    }

</style>