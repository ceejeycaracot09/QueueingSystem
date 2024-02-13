<?php
include '../DBConnection.php';
$conn = OpenCon();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM transaction_table WHERE status = '2' ORDER BY created_on ASC LIMIT 1";
$result = $conn->query($sql);

if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    $queue_id = $row['id'];

$query = "UPDATE transaction_table SET status='4', updated_on=NOW() WHERE id=$queue_id";
$result = $conn->query($query);

if (!$result) {
    echo "No queue to cancel";
}else{
    echo "---";
}
}
?>