<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "queue_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


    $id_num = $_REQUEST['id_num'];
    $password =  $_REQUEST['password'];
    $fullname = $_REQUEST['fullname'];
    $office = $_REQUEST['office'];
    $windows = $_REQUEST['windows'];
    $campus = $_REQUEST['campus'];

    $sql = "INSERT INTO user_table (id_num, password, fullname, office, windows, campus)
        VALUES ('$id_num', '$password', '$fullname', '$office', '$windows', '$campus')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

echo'<form method="POST" action="users-admin.php">
    <input class="btn btn-sm btn-primary rounded-0 my-1" value = "Back" type="submit"/>
    </form>';

$conn->close();
?>