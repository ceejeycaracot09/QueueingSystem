<?php
include '../DBConnection.php';
$connection = OpenCon();

$selectedValue = $_GET['selectedValue'];


$query = "SELECT * FROM transaction_list WHERE transaction_num = " . $selectedValue;
$result = mysqli_query($connection, $query);

$options = array();
while ($row = mysqli_fetch_assoc($result)) {
    $option = array(
        'value' => $row['transaction'],
        'label' => $row['transaction']
    );
    $options[] = $option;
}


echo json_encode($options);
?>
