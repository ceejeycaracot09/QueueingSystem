<?php
include '../DBConnection.php';
$conn = OpenCon();
$db = $conn;
$tableName="user_table";
if(isset($_GET['delete']))
{
  $id= validate($_GET['delete']);
  $condition =['id'=>$id];
  $deleteMsg=delete_data($conn, $tableName, $condition);
  header("location:users-admin.php");

}
function delete_data($conn, $tableName, $condition){

    $conditionData='';
    $i=0;
    foreach($condition as $index => $row){
        $and = ($i > 0)?' AND ':'';
         $conditionData .= $and.$index." = "."'".$row."'";
         $i++;
    }

  $query= "DELETE FROM ".$tableName." WHERE ".$conditionData;
  $result= $conn->query($query);
  if($result){
    $msg="data was deleted successfully";
  }else{
    $msg= $conn->error;
  }
  return $msg;
}

function validate($value) {
$value = trim($value);
$value = stripslashes($value);
$value = htmlspecialchars($value);
return $value;
}
?>