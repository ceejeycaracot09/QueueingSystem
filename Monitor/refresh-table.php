<?php
include '../DBConnection.php';
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

// Output the HTML content
echo $recentTransactionsList;
?>
