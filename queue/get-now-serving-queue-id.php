<?php
session_start();

$nowServingQueueId = isset($_SESSION['nowServingQueueId']) ? $_SESSION['nowServingQueueId'] : '-';

echo $nowServingQueueId;
?>
