<style>

    .more-fee-options-bar {
        display: flex;
        background-color: #6981d6;
        color: white;
        margin-bottom: 2rem;
        border-radius: 8px;
    }

    .more-fee-options-bar .options {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 3rem;
        width: auto;
        padding: .5rem 3rem;
        cursor: pointer;
    }

    .more-fee-options-bar .options:hover {
        background: rgb(146, 160, 212);
        transform: scale(1.02);
        border-radius: 8px;
    }

</style>

<div class="more-fee-options-bar"> 

    <span class="options" onclick="window.open('../Admin/view-receipts.php','_self')"> Fee Receipts </span> <br>
    <span class="options" onclick="window.open('../Admin/view-bills.php','_self')">Program Bills</span> <br>
    <span class="options" onclick="window.open('../Admin/view-student-bills.php','_self')">Student Bills</span> <br>
    <span class="options" onclick="window.open('../Admin/view-program-fees.php','_self')">Program Fees </span> <br>

</div>