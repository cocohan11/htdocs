<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>회원가입</title>
</head>
<body>

    <!-- form 시작 -->
    <form action="resister_server.php" method="post">
        <h2>회원가입</h2>

        <label>아이디</label>
        <input type="text" placeholder="아이디" name="id">
        <label>닉네임</label>
        <input type="text" placeholder="닉네임" name="nick">
        <label>비밀번호</label>
        <input type="password" placeholder="비밀번호" name="pass1">
        <label>비밀번호확인</label>
        <input type="password" placeholder="비밀번호" name="pass2">

        <button type="submit" name="save">저장</button>
        <a href="">이미 회원이신가요? (로그인하러가기)</a>
    </form>
    
</body>
</html>