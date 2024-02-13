<?php
include '../DBConnection.php';
$connection = OpenCon();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $oldName = $_POST["oldName"];
    $id_num = $_POST["id_num"];
    $oldEmail = $_POST["oldEmail"];
    $fistDropdown = $_POST["firstDropDown"];
    $secondDropdown = $_POST["secondDropdown"];

    $sql = "INSERT INTO transaction_table (client_type, id_num, fullname, email, transaction_department, transaction_id, status, created_on)
            VALUES ('Student', '$id_num', '$oldName', '$oldEmail', '$fistDropdown', '$secondDropdown', '1', CURRENT_TIMESTAMP)";

    $result = mysqli_query($connection, $sql);

    if ($result) {
        $lastId = mysqli_insert_id($connection);
        echo $lastId;
    } else {
        echo "error";
    }
}
?>
