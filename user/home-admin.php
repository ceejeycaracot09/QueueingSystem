<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="./js/jquery-3.6.0.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/script.js"></script>
    <style>
        html, body {
            height: 100%;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Admin</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="users-admin.php">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="office-window.php">Windows List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="history-page.php">History</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <form action="../login/logout.php" method="POST" class="nav-link">
                        <button class="btn btn-primary" type="submit">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>
    
    <div class="col-12">
        <div class="col-md-12">
            <?php 
            include './../DBConnection.php';
            $conn = OpenCon();
            session_start();
            $vid = scandir('../video');
            $video = $vid[2];
            if($video):
            ?>
            <center><br><br><video src="../video/<?php echo $video ?>" autoplay muted controls id="vid_loop" class="bg-dark" loop style="height:50vh;width:60%"></video></center>
            <?php 
            endif; 
            ?>
        </div>
    </div>
</body>
</html>
