<?php
include '../queue/queue.php';
$conn = OpenCon();

// Fetch the 5 most recent served transactions for the window
$sql_transaction = "SELECT t.id, tt.department, t.transaction_window 
                    FROM transaction_table t 
                    JOIN transaction_type tt ON t.transaction_department = tt.id
                    WHERE t.status = '2' AND t.created_on IS NOT NULL 
                    ORDER BY t.created_on DESC LIMIT 5";

$result_transaction = $conn->query($sql_transaction);

// Display 5 results
$recentTransactionsList = '<table class="recent-transactions">';
$recentTransactionsList .= '<tr><th>Now Serving</th><th>Department</th><th>Window</th></tr>';
$isFirst = true;
while ($row = $result_transaction->fetch_assoc()) {
    $queue_num = $row['id'];
    $department = $row["department"];
    $window_number = $row["transaction_window"];

    $rowClass = $isFirst ? 'first-row' : '';

    $recentTransactionsList .= '<tr class="' . $rowClass . '"><td>' . $queue_num . '</td><td>' . $department . '</td><td>' . $window_number . '</td></tr>';

    $isFirst = false;
}
$recentTransactionsList .= '</table>';

$conn->close();
?>


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
        <h3 id="pendingQueue"><?= $pendingList ?></h3>
    </div>
    <div class="column right">
        <h2>Priority Number</h2>
        <!-- Display the Queue -->
        <div>
            <h3><span id="span-list" class="number-size-h1-sc"><?= $recentTransactionsList ?></span></h3>
        </div>
    </div>
</div>

</body>
</html>
