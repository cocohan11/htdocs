<?php

// include('php/db.php');   include가 작동안함
$db = mysqli_connect('127.0.0.1','root','rich','work');


// 4가지가 다 null이 아니어야함. (주의 아무것도 입력안할걸 보내면 빈값으로 받아와지는데 null이라고 착각x)
if (isset($_POST['id']) && isset($_POST['name']) && isset($_POST['pwd']) && isset($_POST['pwdCheck'])) {
    // 보안을 더욱 강화 (시큐어코딩, 보안코딩)
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $pwd = mysqli_real_escape_string($db, $_POST['pwd']);
    $pwdCheck = mysqli_real_escape_string($db, $_POST['pwdCheck']);
    // null이어도 되는 값
    // $email = mysqli_real_escape_string($db, $_POST['email']);
    // $tel = mysqli_real_escape_string($db, $_POST['tel']);
    // $email = mysqli_real_escape_string($db, $_POST['address']); 주소가 4개나 따로 저장해야되나?


    // 로그찍어보기 
    // include가 작동 안해서 $id같은 변수들이 로그로 안 찍혔음
    echo $_POST['id'];
    echo $_POST['name'];
    echo $_POST['pwd'];
    echo $_POST['pwdCheck'];

    echo $id;
    echo $name;
    echo $pwd;
    echo $pwdCheck;



    //에러를 체크
    if(empty($id)) {
        header("location: /php/join.php?error=아이디가 비어있어요.");
        exit();
    } else if (empty($name)) {
        header("location: /php/join.php?error=이름이 비어있어요.");
        exit();
    } else if (empty($pwd)){
        header("location: /php/join.php?error=비밀번호가 비어있어요.");
        exit();
    } else if (empty($pwdCheck)){
        header("location: /php/join.php?error=비밀번호 확인이 비어있어요.");
        exit();
    } else if ($pwd != $pwdCheck){
        header("location: /php/join.php?error=비밀번호가 일치하지 않습니다.");
        exit();
    } else {
    // 저장시키는 코딩
        // 암호화
        $OKpwd = password_hash($pwd, PASSWORD_DEFAULT);  // 단방향 암호

        // 아이디 또는 닉네임, 또는 아이디와 동시에 닉네임 중복체크 
        // sql언어 --> 편집기에서 서버에 저장되어있는 db를 불러오는 것
        $sql_same = "SELECT * FROM consumer where id = '$id'";     // 멤버라는 테이블에서 모든 것을 조회해
        // mysqli_query(db접속해, 명령을 수행해)
        $order = mysqli_query($db,$sql_same);   // 암기예시)카레(쿼리)집가서 주문했다

        if(mysqli_num_rows($order) > 0) {   // 중복된 가로열이 있다면 실행한다
            header("location: /php/join.php?error=아이디 또는 닉네임이 이미 있어요");
            exit();
        } else {
            // 에러가 없다면 insert into 삽입 시켜줘
            $sql_save = "insert into consumer(id, name, pwd) values('$id','$name', '$OKpwd')";
            // echo $sql_save;
            $result = mysqli_query($db,$sql_save);  //db접속해서 위의명령전달

            if($result) {   // 가입성공
                // header("location: /php/join.php?success=성공적으로 가입되었습니다.");
                echo "<script>alert('성공적으로 가입되었습니다.');</script>";
                echo "<script>location.href='/html/login.html'</script>";
                // header("location: /html/login.html");
                
                exit();
            } else {    // 가입실패
                // header("location: /php/join.php?error=가입에 실패하였습니다.");
                header("location: /php/join.php?error=가입에 실패하였습니다.".$sql_save);
                exit();
            }
        }
    }
} 
else {
    //에러메세지
    header("location: /php/join.php?error=알 수 없는 오류가 발생하였습니다.");
    exit();
}

?>