<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    // Redirect to the login page if not logged in
    header("Location: ../login/desktop.html");
    exit();  // Make sure to stop script execution after redirection
}
// Retrieve window number from URL parameter
$department = isset($_GET['dept']) ? $_GET['dept'] : 'default_dept';
$windowNumber = isset($_GET['window']) ? $_GET['window'] : 'default';

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
            <h2 id = "officeContainer"><?php echo $department; ?></h2>
            <h1 id = "windowNumberContainer"class="number-size-h1"><?php echo $windowNumber; ?></h1>
            <h3>Window</h3>
        </div>
        <div class="column middle">
          <h4>Waiting Number</h4>
          <div id = "waitingNumberTransactionContainer">
          <h2 id="pendingQueue"><?php echo $pendingList; ?></h2>
          </div>
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
    <audio id="notification">
    <source src="audio/notif.wav" type="audio/wav">
    Your browser does not support the audio element.
    </audio>
    <script>
    // Function that handle AJAX errors
    function handleAjaxError(jqXHR, textStatus, errorThrown) {
            console.error("AJAX Error:", textStatus, errorThrown);
    }
    function updateNowServingQueueId() {
          $.ajax({
              url: 'get-now-serving-queue-id.php', 
              method: 'GET',
              success: function (data) {
                  $('#span-list').html(data); 
              },
              error: handleAjaxError 
          });
    }

    updateNowServingQueueId();
    setInterval(updateNowServingQueueId, 5000);

    function loadRecentTransactionsWaitingNumber() {
          $.ajax({
              url: 'queue.php',
              method: 'GET',
              success: function (dataa) {
                  

                  
                  $('#waitingNumberTransactionContainer').html(pendingList);
              },
              error: handleAjaxError
          });
      }

      loadRecentTransactionsWaitingNumber();
      setInterval(loadRecentTransactionsWaitingNumber, 5000);




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
    alert(message);
  }

  function notify() {
    var audio = document.getElementById("notification");
    audio.play();
  }
</script>
</body>
</html>


