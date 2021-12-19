<?php
    session_start();
?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h1>비밀번호 변경</h1>

    <form action="/php/chg_pwd_chk.php" method="post">
        <ul>
            <li>
                <span>현재 비밀번호 : </span>
                <input type="password" name="pw_bf" placeholder="현재 비밀번호">
            </li>
            <li>
                <span>새로운 비밀번호 : </span>
                <input type="password" name="pw_af" placeholder="새로운 비밀번호">
            </li>
            <li>
                <span>새로운 비밀번호 확인 : </span>
                <input type="password" name="pw_af_chk" placeholder="새로운 비밀번호 재입력">
            </li>
        </ul>
        <button type="submit">변경</button>
    </form>
</body>
</html>

