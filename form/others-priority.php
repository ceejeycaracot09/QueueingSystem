<?php
include 'get-others.php';
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/priority.css">

</head>
<body>

<img class="img-position" src="../image/uc-logo-bg-160x83.c24343b851e5b064daf9.png" alt="Logo">

<form class="form-container" method="POST" action="queue-home.php">
   
    <div class="row">
        <div class="column middle">
          <h4>Waiting Number</h4>
          <h4>Hi,</h4>
          <h5><? echo $otherName ?></h5>
          <h5>Thank you for patiently waiting.</h5>
          <h2 class="number-size-h2"><? echo $lastid ?></h2>
          <div class="btn-control">
              <button class="btn">Done</button>
          </div> 
        </div>
    </div>

</form>

</body>
</html>
