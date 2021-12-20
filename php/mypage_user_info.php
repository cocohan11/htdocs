<?php

session_start();
$id = $_SESSION['id'];
$name = $_SESSION['name'];
$email = $_SESSION['email'];
$phone = $_SESSION['phone'];
$addr1 = $_SESSION['addr1'];
$addr3 = $_SESSION['addr3'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        li {
            display: inline;
        }
    </style>

</head>
<body>
    <h1>회원 정보</h1>
    <ul>
        <li>아이디 : </li><span><?php echo $id ?></span><br>
        <li>이름 : </li><?php echo $name ?></span><br>
        <li>이메일 : </li><?php echo $email ?></span><br>
        <li>핸드폰번호 : </li><?php echo $phone ?></span><br>
        <li>주소 : </li><?php echo $addr1; echo $addr3; ?></span><br>
    </ul>
    <button><a href="/php/chg_pwd.php">비밀번호 변경</a></button>
    <button><a href="/php/drop_user.php">회원탈퇴</a></button>
</body>
</html>