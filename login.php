<?php
session_start();
include_once('function.php');

$userdata = new DB_con();

if (isset($_POST['login'])) {
    $uname = ($_POST['username']);
    $password = ($_POST['password']);

    $qr = $userdata->signin($uname, $password);
    $row = mysqli_num_rows($qr);

    if ($row == 1) {
        $rs = mysqli_fetch_assoc($qr);
        $_SESSION['id'] = $rs['u_id'];
        $_SESSION['fname'] = $rs['name'];
        $_SESSION['role'] = $rs['role'];
        if($_SESSION['role'] == 0){
            echo "<script>alert('User Login Succes');</script>";
            echo "<script>window.location.href='index.php';</script>";
        }
        if($_SESSION['role'] == 1){
            echo "<script>alert('Admin Login Succes');</script>";
            echo "<script>window.location.href='admin.php';</script>";
        }
    } else {
        echo "<script>alert('Somrthing went wrong');</script>";
        echo "<script>window.location.href='index.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>login</title>
</head>
<body>
<div class="popup">
        <div class="popup-content">
            <h3 style="color: black;">เข้าสู่ระบบ</h3>
            <form action="" method="post">
                <input type="text" placeholder="Username" name="username" required>
                <input type="password" placeholder="Password" name="password" required>
                    <button type="submit" name="login">เข้าสู่ระบบ</button>
                <div>
                    <a href="regis.php">สัมครใช้งาน</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>