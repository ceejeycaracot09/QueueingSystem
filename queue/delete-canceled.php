<?php
include '../DBConnection.php';
$conn = OpenCon();

$timeLimit = 86400;
$currentTime = time();
$timeToDelete = $currentTime - $timeLimit;

$sql = "DELETE FROM transaction_table WHERE status = '4', created_on <= '$timeToDelete'";

if(mysqli_query($conn,$sq;)){
    echo 'Data Deleted Successfully';
}else{
    echo "Error deleting data". mysqli_error($conn);
}

mysqli_close($conn);
?>