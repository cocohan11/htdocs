<?php

// include('php/db.php');   include가 작동안함
$db = mysqli_connect('127.0.0.1','root','rich','work');


// 필수4개는 null이 아니어야함
if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['pwd']) && isset($_POST['pwdCheck'])) {
    // 4가지가 다 null이 아니어야함. (주의 아무것도 입력안할걸 보내면 빈값으로 받아와지는데 null이라고 착각x)
    // if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['pwd']) && isset($_POST['pwdCheck'])) {
    // 보안을 더욱 강화 (시큐어코딩, 보안코딩)
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $pwd = mysqli_real_escape_string($db, $_POST['pwd']);
    $pwdCheck = mysqli_real_escape_string($db, $_POST['pwdCheck']);
    $chk_id2 = mysqli_real_escape_string($db, $_POST['chk_id2']);
    // null이어도 되는 값
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $tel = mysqli_real_escape_string($db, $_POST['tel']);
    $addr1 = mysqli_real_escape_string($db, $_POST['addr1']);  //주소가 4개나 따로 저장해야되나?
    $addr2 = mysqli_real_escape_string($db, $_POST['addr2']);
    $addr3 = mysqli_real_escape_string($db, $_POST['addr3']);
    $addrCode = mysqli_real_escape_string($db, $_POST['addrCode']);
    $date = date('Y-m-d H:i:s');
// echo"가"; 
// echo $id;
// echo $name;
// echo $pwd;
// echo $pwdCheck;
// echo $_POST['id'];

    // 중복확인을 안했다면/ 했다면
    if($chk_id2 == "0") {
        echo"<script> alert('아이디 중복검사를 해주세ㅔㅔ요'); history.back(); </script>";
        exit();
        echo "나"; 

    } else if($chk_id2 != "0") {
        // 1이면 실행
        echo "다";

        if(empty($id)||empty($name)||empty($pwd)||empty($pwdCheck)) {
            // 하나라도 빈 칸 있으면 되돌아가기
            // echo"<script>alert('필수정보를 꼭 기입해 주세요.'); history.back(); </script>";
            echo "라";
        } else {
            // 중복확인, 빈칸확인됐으니까 회원가입 db에 저장
            echo "마";

            $OKpwd = password_hash($pwd, PASSWORD_DEFAULT);  // 단방향 암호
            $sql_save = "insert into consumer(id, name, pwd, email, phone, addr1, addr2, addr3, addrCode) 
            values('$id','$name', '$OKpwd', '$email', '$tel', '$addr1','$addr2', '$addr3','$addrCode')";  // db에 저장할 쿼리문
            $result = mysqli_query($db,$sql_save);  //db접속해서 위의명령전달

            // 제대로 전달됐으면 성공메세지, 실패면 실패메시지
            if($result) {
                echo "바";
                echo "<script> alert('성공적으로 가입되었습니다.'); </script>";
                echo "<script> location.href='/php/login.php' </script>";
                exit();
            } else {
                echo "사".$sql_save;
                // echo "<script> alert('가입에 실패하였습니다.'); </script>";
                // echo "<script> location.href='/php/login.php' </script>";
                // header("location: /php/join.php?error=가입에 실패하였습니다.".$sql_save);
                exit();
            }
        }
    }


} else {
    // 에러
    echo "<script> alert('알 수 없는 오류가 발생하였습니다.'); </script>";
    header("location: /php/join.php?error=알 수 없는 오류가 발생하였습니다.");
    exit();
}




?>