<?php
include '../DBConnection.php';
$conn = OpenCon();
session_start();

if (isset($_SESSION['windows'])) {
    $currentCashierId = $_SESSION['windows'];

    $cashierQuery = "SELECT office, windows FROM user_table WHERE windows = $currentCashierId";
    $cashierResult = mysqli_query($conn, $cashierQuery);

    if (mysqli_num_rows($cashierResult) > 0) {
        $cashierRow = mysqli_fetch_assoc($cashierResult);
        $cashierId = $cashierRow['windows'];
        $cashierName = $cashierRow['office'];

        echo "<h1>Current Cashier: $cashierName</h1>";

        $queueQuery = "SELECT id, fullname FROM transaction_table WHERE status = '2' ORDER BY id LIMIT 1";
        $queueResult = mysqli_query($conn, $queueQuery);

        if (mysqli_num_rows($queueResult) > 0) {
            while ($queueRow = mysqli_fetch_assoc($queueResult)) {
                $queueId = $queueRow['id'];
                $customerName = $queueRow['fullname'];

                echo "<p>Queue ID: $queueId</p>";
                echo "<p>Customer Name: $customerName</p>";
            }
        } else {
            echo "<p>No queue available for $cashierName.</p>";
        }
    } else {
        echo "<p>Invalid cashier ID.</p>";
    }
} else {
    echo "<p>No cashier session found.</p>";
}

mysqli_close($conn);
?>
