<?php
include '../DBConnection.php';
$connection = OpenCon();

if($_SERVER["REQUEST_METHOD"] == "POST"){
$otherName = $_POST["otherName"];
    $otherMobile = $_POST["otherMobile"];
    $otherEmail = $_POST["otherEmail"];
    $firstDropdownOthers = $_POST["firstDropdownOthers"];
    $secondDropdownOthers = $_POST["secondDropdownOthers"];



$sql = "INSERT INTO transaction_table (client_type, fullname, mobile_num, email, transaction_department, transaction_id, status)
VALUES ('Others', '$otherName', '$otherMobile', '$otherEmail', '$firstDropdownOthers', '$secondDropdownOthers', '1')";
$result = mysqli_query($connection, $sql);

if ($result) {
  $lastId = mysqli_insert_id($connection);
  echo $lastId;
} else {
  echo "error";
}
}
?>