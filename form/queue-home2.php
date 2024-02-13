
<?php
                    
                    include '../DBConnection.php';
                    $connection = OpenCon();
    
                    $query = "SELECT * FROM transaction_type";
                    $result = mysqli_query($connection, $query);
    
                    while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value="' . $row['id'] . '">' . $row['department'] . '</option>';
                    }
?>