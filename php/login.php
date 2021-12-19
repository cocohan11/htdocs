<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>그곳에 향기가 있다 - 로그인</title>
    <link rel="stylesheet" href="/css/login.css?">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#parts_header").load("/parts/header.html")});
   </script> 
</head>



<body>
    <!-- 그곳에향기가있다 상단, 카테고리.. -->
    <div id="parts_header"></div>
    
    <form class="login_center" action="/php/server_login.php" method="post">
        <h1 style="margin-bottom: 30px;">로그인</h1>
        <input class="IDPWD" type="text" placeholder="아이디" name="id">
        <input class="IDPWD" type="password" placeholder="비밀번호" name="pwd">
        <button class="LoginBox" type="submit">로그인</button>
        <label class="check"><input type="checkbox" name="xxx" value="yyy" checked>아이디 저장</label>
        <hr style="margin-bottom: 5px; margin-top: 15px;">
        <!-- <span>아이디찾기</span> -->
        <span><a href="/php/find.php">아이디 또는 비밀번호찾기</a></span>
        <span><a href="/php/join.php">회원가입</a></span>
        <hr>
    </form>

    
<div style="margin-bottom: 10%;"></div>
</body>
</html>
