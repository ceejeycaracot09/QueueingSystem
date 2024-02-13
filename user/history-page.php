<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h3 class="card-title">History Log</h3>
        <div class="card-tools align-middle">
        <form action = 'home-admin.php' method = "POST">
            <button class="btn btn-dark btn-sm py-1 rounded-0" type="submit">Home</button>
</form>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-hover table-striped table-bordered">
            <!-- <colgroup>
                <col width="10%">
                <col width="40%">
                <col width="30%">
            </colgroup> -->
            <thead>
                <tr>
                    <th>CLIENT TYPE</th>
                    <th>ID NUMBER</th>
                    <th>NAME</th>
                    <th>MOBILE NUMBER</th>
                    <th>TRANSACTION ID</th>
                    <th>CREATED ON</th>
                    <th>UPDATED ON</th>
                    <th>STATUS</th>
                </tr>
            </thead>



<?php
                include '../DBConnection.php';
                $conn = OpenCon();
                $sql = mysqli_query ($conn,"SELECT * FROM transaction_table");
                $i = 1;
                    while($row = mysqli_fetch_array($sql)):
                ?>
                <tr>
                    <td><?php echo $row['client_type'] ?></td>
                    <td><?php echo $row['id_num'] ?></td>
                    <td><?php echo $row['fullname'] ?></td>
                    <td><?php echo $row['mobile_num'] ?></td>
                    <td><?php echo $row['transaction_id'] ?></td>
                    <td><?php echo $row['created_on'] ?></td>
                    <td><?php echo $row['updated_on'] ?></td>
                    <td>
                        <?php
                            if($row['status']==1)
                            {
                                echo "<p>Waiting</p>";
                            }
                            elseif($row['status'] == 2)
                            {
                                echo "<p>NOW SERVING</p>";
                            }
                            elseif($row['status'] == 3)
                            {
                                echo "<p>SERVED</p>";
                            }
                            elseif($row['status' == 4])
                            {
                                echo "<p>CANCELLED</p>";
                            }
                            else
                            {
                                echo "<p>Disactive</p>";
                            }
                        ?></td>
                    
                    </th>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>