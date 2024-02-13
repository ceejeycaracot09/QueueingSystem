<?php
include '../DBConnection.php';
include '../qscript.php';
$conn = OpenCon();

$sql = "SELECT id FROM transaction_table WHERE status = '2' ORDER BY created_on DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $queue_number = $row["id"];
} else {
    $queue_number = "---";
}

$sql = "Select id From transaction_table WHERE status = 1 ORDER BY created_on DESC LIMIT 5";
$result = $conn->query($sql);

$pendingList = '<ul>';
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $task = $row['id'];
    $pendingList .= '<li>' . $task . '</li>';
  }
}
$pendingList .= '</ul>';
    
$conn->close();

?>
<!DOCTYPE html>
<html>
<head>
  <title>Monitor</title>
  <link rel="stylesheet" href="../css/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class = "container">
      <div class = "pending-tasks">
  <h1>Pending Queue Monitor</h1>
  <div id="pendingQueue"><?php echo $pendingList; ?></div>
      </div>
      <div class = "queue">
<h1>Now Serving:<h1>
<span id="span-list"><?php echo $queue_number; ?></span>
</div>
</div>
</body>
</html>

