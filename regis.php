<?php
include_once('function.php');
$userdata = new DB_con();

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $checkuser = $userdata->usernameavailable($uname);
    $num = mysqli_num_rows($checkuser);
    if($num > 0)
    {
        echo "<script>alert('ชื่อผู้ใช้ถุกใช้งานแล้ว');</script>";
        echo "<script>window.location.href='regis.php';</script>";
    }else {
        $sql = $userdata->regis($fname, $uname, $email, $password);
        echo "<script>alert('Registor Success');</script>";
        echo "<script>window.location.href='index.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/regis.css">
    <title>registerpage</title>
</head>

<body>
    <header>
        <div class="form">
            <div class="formitem">
                <h3 style="color: black;">สัมครใช้งาน</h3>
                <form method="post">
                    <input type="text" placeholder="Name" name="fname" required>
                    <input type="text" placeholder="Username" name="uname" required>
                    <span id="usernameavailable"></span>
                    <input type="email" placeholder="Email" name="email" required>
                    <input type="password" placeholder="Password" name="password" required>
                    <button type="submit" id="submit" name="submit">สัมครใช้งาน</button>
                    <div>
                        <a href="login.php">เข้าสู่ระบบ</a>
                    </div>
                </form>
            </div>
        </div>

    </header>
</body>

</html>