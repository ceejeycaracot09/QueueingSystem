<?php
// Start the session
session_start();
include '../DBConnection.php';
$conn = OpenCon();



// Check if the user is logged in and get their department
if (isset($_SESSION['id'])) {
    $loggedInUserId = $_SESSION['id'];

    $userQuery = "SELECT * FROM user_table WHERE id = $loggedInUserId";
    $userResult = $conn->query($userQuery);
    

    if ($userResult->num_rows > 0) {
        $userRow = $userResult->fetch_assoc();
        $office = $userRow['office'];
        $windowNumber = $userRow['windows'];

        $departmentIdQuery = "SELECT id FROM transaction_type WHERE department = '$office'";
        $departmentIdResult = $conn->query($departmentIdQuery);

        if ($departmentIdResult->num_rows > 0) {
            $departmentIdRow = $departmentIdResult->fetch_assoc();
            $departmentId = $departmentIdRow['id'];

        // Fetch waiting numbers based on the department of the current user
        $sql = "SELECT id FROM transaction_table WHERE status = 1 AND transaction_department = '$departmentId' ORDER BY created_on DESC LIMIT 3";
        $result = $conn->query($sql);

        $pendingList = '<ul class="no-bullets">';
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $task = $row['id'];
                $pendingList .= '<li>' . $task . '</li>';
            }
        }
        $pendingList .= '</ul>';
      } else {
        $pendingList = '<p>Error: Department not found in transaction_type table for the logged-in user</p>';
    }
} else {
    $pendingList = '<p>Error: Office not found for the logged-in user</p>';
}
} else {
$pendingList = '<p>Error: User ID not found in session</p>';
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, max-age=0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<img class="img-position" src="../image/uc-logo-bg-160x83.c24343b851e5b064daf9.png" alt="Logo">


    <div class="row">
        <div class="column left">
            <h2><?php echo $office; ?></h2>
            <h1 class="number-size-h1"><?php echo $windowNumber; ?></h1>
            <h3>Window</h3>
        </div>
        <div class="column middle">
          <h4>Waiting Number</h4>
          <h2 id="pendingQueue"><?php echo $pendingList; ?></h2>
        </div>
        <div class="column right">
        <div class="logout-button">
            <form action="../login/logout.php" method="POST">
                <button type="submit" class="btn"><i class="fa fa-close"></i></button>
            </form>
        </div>
            <div>
                <h1><span id="span-list" class="number-size-h1-sc">-</span></h1>
            </div>
            <div>
                <h3 class="h3-margin">Now Serving</h3>
            </div>
            <div class="btn-control">
                <button class="btn" id="btn-next" onClick="notify()">Next</button>
                <button class="btn" id="btn-recall" onClick="notify()">Recall</button>
                <button class="btn" id="btn-update">Served</i></button>
                <button class="btn" id="btn-cancel">Cancel</i></button>
            </div>    
        </div>
    </div>
</body>
</html>


<script>
  $("#btn-next").click(function () {
    $.ajax({
      type: "GET",
      url: "next-queue.php",
      success: function (msg) {
        $("#span-list").html(msg);
        showMessage("Queue advanced successfully.");
      },
      error: function () {
        showMessage("Error advancing the queue.");
      },
    });
  });

  $("#btn-recall").click(function () {
    $.ajax({
      type: "GET",
      url: "recall-queue.php",
      success: function (msg) {
        $("#span-list").html(msg);
        showMessage("Queue recalled successfully.");
      },
      error: function () {
        showMessage("Error recalling the queue.");
      },
    });
  });

  $("#btn-update").click(function () {
    $.ajax({
      type: "GET",
      url: "update-queue.php",
      success: function (msg) {
        $("#span-list").html(msg);
        showMessage("Queue updated as served.");
      },
      error: function () {
        showMessage("Error updating the queue.");
      },
    });
  });

  $("#btn-cancel").click(function () {
    $.ajax({
      type: "GET",
      url: "cancel-queue.php",
      success: function (msg) {
        $("#span-list").html(msg);
        showMessage("Queue canceled successfully.");
      },
      error: function () {
        showMessage("Error canceling the queue.");
      },
    });
  });

  function showMessage(message) {
    // You can customize this part to display the message in a specific element on your page.
    alert(message);
  }

  function notify() {
    var audio = document.getElementById("notification");
    audio.play();
  }
</script>