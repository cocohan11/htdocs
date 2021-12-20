<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<h1>회원탈퇴</h1>
<p>회원탈퇴를 하시면 회원님의 정보는 영구히 사라집니다.</p>
<form action="/php/drop_user_chk.php" method="post">
        <ul>
            <li>
                <span>현재 비밀번호 : </span>
                <input type="password" name="pw" placeholder="현재 비밀번호">
            </li>
            <li>
                <span>현재 비밀번호 확인 : </span>
                <input type="password" name="pw_chk" placeholder="현재 비밀번호 재확인">
            </li>
        </ul>
        <button type="submit" onclick="removeCheck()">탈퇴</button> <!-- 되묻기 -->
    </form>
</body>
</html>

<script>
    function removeCheck() {

        if (confirm("정말 삭제하시겠습니까??") == true){    //확인
            document.removefrm.submit();

        }else{   //취소
            return false;
        }
    }
</script>