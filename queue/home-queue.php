<?php
session_start();
include '../qscript.php';
?>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<body>
  <h2><?php echo $_SESSION['office'] ?> <br> <?php echo $_SESSION['windows']; ?></h2>
<h2><b><p align="center">Now Serving: <br><br>
<span id="span-list">---</span>
</p>
<center>
<button id="btn-next" onClick="notify()">Next Queue</button>
  <button id="btn-recall" onClick="notify()">Recall</button>
  <button id="btn-update">Served</button>
  <button id="btn-cancel">Cancel</button>

<form action="../login/logout.php" method="POST">
  <input class="btn btn-sm btn-primary rounded-0 my-1" value = 'Logout' type="submit"/>
</center>


<audio id = "notification">
  <source src = "../audio/notif.wav" type = "audio/mpeg"></audio>


