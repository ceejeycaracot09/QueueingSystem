<?php
include '../queue/queue.php';

// Fetch the recent served transactions for the window
$sql_transaction = "SELECT t.id, tt.department, t.transaction_window 
                    FROM transaction_table t 
                    JOIN transaction_type tt ON t.transaction_department = tt.id
                    WHERE t.status = '2' AND t.created_on IS NOT NULL 
                    ORDER BY t.created_on DESC LIMIT 5";

$result_transaction = $conn->query($sql_transaction);

$recentTransactions = array();
while ($row = $result_transaction->fetch_assoc()) {
    $recentTransactions[] = array(
        'queue_num' => $row['id'],
        'department' => $row["department"],
        'window_number' => $row["transaction_window"]
    );
}

echo json_encode($recentTransactions);
$conn->close();
?>
