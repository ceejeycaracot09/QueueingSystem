<?php
include '../queue/queue.php';
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
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="../css/monitor.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<img class="img-position" src="../image/uc-logo-bg-160x83.c24343b851e5b064daf9.png" alt="Logo">


    <div class="row">
        <div class="column left">
          <h2>Cashier</h2>
          <h1 class="number-size-h1">-</h1>
          <h3>Window</h3>
        </div>
        <div class="column middle">
          <h4>Waiting Number</h4>
          <h2 id="pendingQueue"><?php echo $pendingList; ?></h2>
        </div>
        <div class="column right">
            <div class="logout-button" action="../login/logout.php">
                <button type="submit" value = "Logout" class="btn"><i class="fa fa-close"></i></button>
            </div>
            <div>
                <h1><span id="span-list" class="number-size-h1-sc"><?php echo $queue_number; ?></span></h1>
            </div>
            <div>
                <h3 class="h3-margin">Now Serving</h3>
            </div>  
        </div>
    </div>
</body>
</html>