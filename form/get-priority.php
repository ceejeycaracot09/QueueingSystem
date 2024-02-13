<?php
include 'get-student.php';
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/priority.css">

</head>
<body>

<img class="img-position" src="path/to/your/logo.png" alt="Logo">

<form class="form-container">
   
    <div class="row">
        <div class="column middle">
          <h4>Waiting Number</h4>
          <h4>Hi,</h4>
          <h5>Student Name</h5>
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
