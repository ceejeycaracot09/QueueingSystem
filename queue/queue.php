<?php
include '../DBConnection.php';
$conn = OpenCon();

$sql = "Select id From transaction_table WHERE status = 1 ORDER BY created_on DESC LIMIT 3";
$result = $conn->query($sql);

$pendingList = '<ul class = "no-bullets">';
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $task = $row['id'];
    $pendingList .= '<li>' . $task . '</li>';
  }
}
$pendingList .= '</ul>';
    
$conn->close();

?>