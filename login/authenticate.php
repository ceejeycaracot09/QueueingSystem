<?php      
    session_start();
    include '../DBConnection.php';
    $conn = OpenCon();
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $username = stripcslashes($username);
    $password = stripcslashes($password);
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    
    $sql = "select * from admin where username = '$username' and password = '$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);
    
    if ($count == 1) {
        $_SESSION['id'] = $row['admin_id']; // Assuming 'admin_id' is the correct column name for admin id
        $_SESSION['username'] = $row['username'];
        $_SESSION['password'] = $row['password'];
        session_regenerate_id(true);
        header("LOCATION: ../user/home-admin.php");
    } else {
        $sql = "select * from user_table where id_num = '$username' and password = '$password'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
    
        if ($count == 1) {
            $_SESSION['id'] = $row['id']; // Assuming 'id' is the correct column name for user id
            $_SESSION['username'] = $row['username'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['office'] = $row['office'];
            $_SESSION['windows'] = $row['windows'];
            session_regenerate_id(true);
            header("LOCATION: ../queue/home-desk.php");
            exit();  // Don't forget to exit after header redirection
        } else {
            header("LOCATION: login-page.php?error=Incorrect credentials");
            exit();
        }
    }
    
?>