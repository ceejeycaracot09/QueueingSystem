<?php
include './../DBConnection.php';
$conn = OpenCon();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Users</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/script.js"></script>
    <style>
        html, body{
            height:100%;
        }
    </style>
</head>
<body class="bg-dark bg-gradient">
    <form action="get-users-add.php" method="post">
    <div class="h-100 d-flex jsutify-content-center align-items-center">
       <div class='w-100'>
        <h3 class="py-5 text-center text-light">Add User</h3>
        <div class="card my-3 col-md-4 offset-md-4">
            <div class="card-body">
                <form action="" id="login-form">
                    <div class="form-group">
                        <label for="id_num" class="control-label">ID No.</label>
                        <input type="text" id="id_num" autofocus name="id_num" class="form-control form-control-sm rounded-0" required>
                    </div>
                    <div class="form-group">
                        <label for="password" class="control-label">Password</label>
                        <input type="text" id="password" name="password" class="form-control form-control-sm rounded-0" required>
                    </div>
                    <div class="form-group">
                        <label for="fullname" class="control-label">FullName</label>
                        <input type="text" id="fullname" name="fullname" class="form-control form-control-sm rounded-0" required>
                    </div>
                    <div class="form-group">
                        <label for="office" class="control-label">Office Department</label>
                        <input type="text" id="office" name="office" class="form-control form-control-sm rounded-0" required>
                    </div>
                    <div class="form-group">
                        <label for="windows" class="control-label">Window</label>
                        <input type="text" id="windows" name="windows" class="form-control form-control-sm rounded-0" required>
                    </div>
                    <div class="form-group">
                        <label for="campus" class="control-label">Campus</label>
                        <input type="text" id="campus" name="campus" class="form-control form-control-sm rounded-0" required>
                    </div>
                <div class="form-group d-flex w-100 justify-content-between align-items-center">
                    <form action="users-admin.php" method="POST">  
                        <input class="btn btn-sm btn-primary rounded-0 my-1" value = 'Add' type="submit"/>  
                    </form>
                    <form action="users-admin.php" method="POST">  
                        <input class="btn btn-sm btn-primary rounded-0 my-1" value = 'Back' type="submit"/> 
                </div>
            </form>
    </form>
    </div>
    </div>
</body>