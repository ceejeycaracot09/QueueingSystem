<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h3 class="card-title">Cashiers List</h3>
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
                    <th>#</th>
                    <th>ID NUMBER</th>
                    <th>NAME</th>
                    <th">OFFICE</th>
                    <th>WINDOWS</th>
                    <th>CAMPUS</th>
                    <th>Action</th>
                </tr>
            </thead>



<?php
                session_start();
                include './../DBConnection.php';
                $conn = OpenCon();
                $sql = mysqli_query ($conn,"SELECT * FROM user_table");
                $i = 1;
                    while($row = mysqli_fetch_array($sql)):
                ?>
                <tr>
                    <td><?php echo $row['id_num'] ?></td>
                    <td><?php echo $row['fullname'] ?></td>
                    <td><?php echo $row['office'] ?></td>
                    <td><?php echo $row['windows'] ?></td>
                    <td><?php echo $row['campus'] ?></td>
                    <td>
                        <?php
                            if($row['status']==1)
                            {
                                echo "<p>Active</p>";
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