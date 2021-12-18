<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <!-- join의 중복검사 버튼하면 여기에서 함수가 작동됨. -->
<?php
    $db = mysqli_connect('127.0.0.1','root','rich','work');
// echo "dfdf";
    $uid = $_GET["userid"];

    $sql_same = "SELECT * FROM consumer where id = '$uid'";     // 멤버라는 테이블에서 모든 것을 조회해
    $order = mysqli_query($db,$sql_same);   // 암기예시)카레(쿼리)집가서 주문했다
    $num_order=mysqli_num_rows($order);     // 숫자로만들어서 script에서 쓰려고
?>


<!-- <button value="닫기" onclick="window.close()">닫기</button> -->
<script>
    var num ="<?=$num_order?>";

    if(num!=0){
        parent.document.getElementById("chk_id2").value="0";
        parent.alert("이미 사용중인 아이디입니다.");

    } else {
        parent.document.getElementById("chk_id2").value="1";
        parent.alert("사용 가능합니다.");
    }
</script>
</body>
</html>

