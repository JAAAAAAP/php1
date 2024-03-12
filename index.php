<?php
session_start();
include_once('function.php');
$userdata = new DB_con;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>booking</title>
</head>

<body>
    <header>
        <nav>
            <div class="logo">
                <img src="img/convenience-store (1).png" alt="">
            </div>
            <ul>
                <li><a href="#">หน้าแรก</a></li>
                <li><a href="#">รายการอาหารและเครื่องดื่ม</a></li>
                <li><a href="#">โปรโมชั่น</a></li>
                <?php 
                if (isset($_SESSION['id'])) {
                    $id = $_SESSION['id'];
                    $qr = $userdata->fecth($id);
                    $rs = mysqli_fetch_array($qr);
                ?>
                    <li><a href="profile.php" id="button"><?=$_SESSION['fname'];?></a></li>
                <?php
                }else{
                    ?>
                    <li><a href="login.php" id="button">เข้าสู่ระบบ</a></li>
                <?php
                }
                ?>
            </ul>
        </nav>
    </header>
</body>

</html>