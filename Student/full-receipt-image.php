<?php

    require("../FunctionFiles/validate-student-session.php");
    require("../FunctionFiles/dbconnect.php");

    $pageTitle= "Fee Receipt Full Image";

    include("../Layouts/header.php");

    $recID = $_GET['RecID'];

    $receiptImageQuery = 
    "
        SELECT receipt_img
        FROM fee_receipts
        WHERE receipt_id = '$recID';
    ";

    $receiptImageQueryResult = $dbConn -> query($receiptImageQuery);
    $result = $receiptImageQueryResult->fetch_assoc();
    $receiptImg = $result['receipt_img'];
?>

<style>
    .full-image {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        width: 100%;
    }

    .full-image img {
        height: 100%;
        width: 100%;
    }
</style>

<div class="full-image">
    <img src="data:image/jpeg;base64,<?= base64_encode($receiptImg); ?>" alt="Image">
</div>

<?php
    include("../Layouts/footer.php");
?>