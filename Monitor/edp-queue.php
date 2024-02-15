<!DOCTYPE html>
<html>
<head>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="../css/monitor-queue.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="logout-button">
    <form action="../login/logout.php" method="post">
        <button type="submit" class="btn"><i class="fa fa-close"></i> Logout</button>
    </form>
</div>  
<img class="img-position" src="../image/uc-logo-bg-160x83.c24343b851e5b064daf9.png" alt="Logo">

<div class="row">
    <div class="column left">
        <h2>Waiting Number</h2>
        <div id = "waitingNumberTransactionContainer">
        <h3 id="pendingQueue"><?= $pendingList ?></h3>
        </div>
    </div>
    <div class="column right">
        <h2>Priority Number</h2>
        <!-- Display the Queue -->
        <div id="recentTransactionsContainer">
            <h3><span id="span-list" class="number-size-h1-sc"><?= $recentTransactionsList ?></span></h3>
        </div>
    </div>
</div>

</body>
</html>
<script>
    // Function that handles AJAX errors
    function handleAjaxError(jqXHR, textStatus, errorThrown) {
        console.error("AJAX Error:", textStatus, errorThrown);
    }

    // Function to load and refresh the recent transactions
    function loadRecentTransactions() {
        $.ajax({
            url: 'refresh-table.php',  
            method: 'GET',
            success: function (data) {
                $('#recentTransactionsContainer').html(data);
            },
            error: handleAjaxError  
        });
    }

    loadRecentTransactions();
    setInterval(loadRecentTransactions, 5000);

    // Function to load and refresh the recent Waiting Number transactions
    function loadRecentTransactionsWaitingNumber() {
        $.ajax({
            url: 'refresh-waiting-number.php',
            method: 'GET',
            success: function (dataa) {
                console.log("Data received:", dataa);
                $('#waitingNumberTransactionContainer').html(dataa);
            },
            error: handleAjaxError
        });
    }
    loadRecentTransactionsWaitingNumber();
    setInterval(loadRecentTransactionsWaitingNumber, 5000);

</script>