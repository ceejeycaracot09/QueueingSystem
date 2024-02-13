<?php
include '../queue/queue.php';
$conn = OpenCon();

// Query to select offices with the value "EDP" and check status
$sql = "SELECT id, windows, status FROM user_table WHERE office = 'Registrar'";
$result = $conn->query($sql);

// Fetch the latest updated status and id from transaction_table
while ($row = $result->fetch_assoc()) {
    $windows = $row['windows'];
    $status = $row['status'];

    // Fetch the latest served queue number for the window
    $sql_transaction = "SELECT id FROM transaction_table WHERE status = '2' AND transaction_window = $windows AND transaction_department = '3' AND created_on IS NOT NULL ORDER BY created_on DESC LIMIT 1";
    $result_transaction = $conn->query($sql_transaction);

    $queue_number = "---"; // Default value if no match is found

    if ($result_transaction->num_rows > 0) {
        $row_transaction = $result_transaction->fetch_assoc();
        $queue_number = $row_transaction["id"];
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="refresh" content="5"> <!-- Refresh the page every 5 seconds -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="../css/monitor.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<img class="img-position" src="../image/uc-logo-bg-160x83.c24343b851e5b064daf9.png" alt="Logo">

<div class="row">
    <div class="column left">
        <h2>ACCOUNTING</h2>
        <h1 class="number-size-h1"><?= ($status == 1) ? $windows : '-' ?></h1>
        <h3>Window</h3>
    </div>
    <div class="column middle">
        <h4>Waiting Number</h4>
        <?php
        // Display pending list for the current window
        $sql_pending = "SELECT id FROM transaction_table WHERE status = 1 ORDER BY created_on DESC LIMIT 5";
        $result_pending = $conn->query($sql_pending);

        $pendingList = '<ul>';
        if ($result_pending->num_rows > 0) {
            while ($row_pending = $result_pending->fetch_assoc()) {
                $task = $row_pending['id'];
                $pendingList .= '<li>' . $task . '</li>';
            }
        }
        $pendingList .= '</ul>';
        echo '<h2 id="pendingQueue">' . $pendingList . '</h2>';
        ?>
    </div>
    <div class="column right">
        <div class="logout-button" action="../login/logout.php">
            <button type="submit" value="Logout" class="btn"><i class="fa fa-close"></i></button>
        </div>
        <div>
            <h1><span id="span-list" class="number-size-h1-sc"><?= $queue_number ?></span></h1>
        </div>
        <div>
            <h3 class="h3-margin">Now Serving</h3>
            <p>Queue ID: <?= $queue_number ?></p>
        </div>
    </div>
</div>

</body>
</html>

<?php
}

$conn->close();
?>
