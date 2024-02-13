<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h3 class="card-title">Users List</h3>
        <div class="card-tools align-middle">
            <form action = 'users-add.php' method = "POST">
            <button class="btn btn-dark btn-sm py-1 rounded-0" type="submit" id="create_new">Add New</button>
</form>
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
                    <th class="text-center p-0">#</th>
                    <th class="text-center p-0">ID NUMBER</th>
                    <th class="text-center p-0">FULLNAME</th>
                    <th class="text-center p-0">OFFICE DEPARTMENT</th>
                    <th class="text-center p-0">WINDOWS</th>
                    <th class="text-center p-0">CAMPUS</th>
                    <th class="text-center p-0">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                session_start();
                include './../DBConnection.php';
                $conn = OpenCon();
                $sql = mysqli_query ($conn,"SELECT * FROM user_table");
                $i = 1;
                    while($row = mysqli_fetch_array($sql)):
                ?>
                <tr>
                    
                    <td class="text-center p-0"><?php echo $i++; ?></td>
                    <td class="py-0 px-1"><?php echo $row['id_num'] ?></td>
                    <td class="py-0 px-1"><?php echo $row['fullname'] ?></td>
                    <td class="py-0 px-1"><?php echo $row['office'] ?></td>
                    <td class="py-0 px-1"><?php echo $row['windows'] ?></td>
                    <td class="py-0 px-1"><?php echo $row['campus'] ?></td>
                    <th class="text-center py-0 px-1">
                        <div class="btn-group" role="group">
                            <li><a href="users-delete.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></li>
                            </ul>
                        </div>
                    </th>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
<script>