<?php
include '../DBConnection.php';
$conn = OpenCon();

$sql = "SELECT t.id, tt.department, t.transaction_id 
        FROM transaction_table t 
        JOIN transaction_type tt ON t.transaction_department = tt.id
        WHERE t.status = '1' ORDER BY t.created_on DESC LIMIT 5";
$result = $conn->query($sql);

$pendingList = '<table class="pending-table">';
$pendingList .= '<tr><th>Number</th><th>Department</th><th>Transaction</th></tr>';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $task = $row['id'];
        $department = $row['department'];
        $transaction = $row['transaction_id'];
        $pendingList .= '<tr><td>' . $task . '</td><td>' . $department . '</td><td>' . $transaction . '</td></tr>';
    }
}

$pendingList .= '</table>';

$conn->close();

//Echo the output
echo $pendingList;
?>
