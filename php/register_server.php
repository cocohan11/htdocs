<?php

// include('php/db.php');   include가 작동안함
$db = mysqli_connect('127.0.0.1','root','rich','work');


// 4가지가 다 null이 아니어야함. (주의 아무것도 입력안할걸 보내면 빈값으로 받아와지는데 null이라고 착각x)
if (isset($_POST['user_id']) && isset($_POST['user_nick']) && isset($_POST['user_pass1']) && isset($_POST['user_pass2'])) {
    // 보안을 더욱 강화 (시큐어코딩, 보안코딩)
    $user_id = mysqli_real_escape_string($db, $_POST['user_id']);
    $user_nick = mysqli_real_escape_string($db, $_POST['user_nick']);
    $user_pass1 = mysqli_real_escape_string($db, $_POST['user_pass1']);
    $user_pass2 = mysqli_real_escape_string($db, $_POST['user_pass2']);


    // 로그찍어보기 
    // include가 작동 안해서 $user_id같은 변수들이 로그로 안 찍혔음
    echo $_POST['user_id'];
    echo $_POST['user_nick'];
    echo $_POST['user_pass1'];
    echo $_POST['user_pass2'];

    echo $user_id;
    echo $user_nick;
    echo $user_pass1;
    echo $user_pass2;



    //에러를 체크
    if(empty($user_id)) {
        header("location: register_view.php?error=아이디ff가 비어있어요.");
        exit();
    } else if (empty($user_nick)) {
        header("location: register_view.php?error=닉네ff임이 비어있어요.");
        exit();
    } else if (empty($user_pass1)){
        header("location: register_view.php?error=비밀aa번호가 비어있어요.");
        exit();
    } else if (empty($user_pass2)){
        header("location: register_view.php?error=비밀aa번호 확인이 비어있어요.");
        exit();
    } else if ($user_pass1 != $user_pass2){
        header("location: register_view.php?error=비ff밀번호가 일치하지 않습니다.");
        exit();
    } else {
    // 저장시키는 코딩
        // 암호화
        $pass1 = password_hash($user_pass1, PASSWORD_DEFAULT);  // 단방향 암호

        // 아이디 또는 닉네임, 또는 아이디와 동시에 닉네임 중복체크 
        // sql언어 --> 편집기에서 서버에 저장되어있는 db를 불러오는 것
        $sql_same = "SELECT * FROM member where mb_id = '$user_id' and  mb_nick = '$user_nick'";     // 멤버라는 테이블에서 모든 것을 조회해
        // mysqli_query(db접속해, 명령을 수행해)
        $order = mysqli_query($db,$sql_same);   // 암기예시)카레(쿼리)집가서 주문했다

        if(mysqli_num_rows($order) > 0) {   // 중복된 가로열이 있다면 실행한다
            header("location: register_view.php?error=아aa이디 또는 닉네임이 이미 있어요");
            exit();
        } else {
            // 에러가 없다면 insert into 삽입 시켜줘
            $sql_save = "insert into member(mb_id, mb_nick,password) values('$user_id','$user_nick', '$pass1')";
            $result = mysqli_query($db,$sql_save);  //db접속해서 위의명령전달

            if($result) {   // 가입성공
                header("location: register_view.php?success=성ff공적으로 가입되었습니다.");
                exit();
            } else {    // 가입실패
                header("location: register_view.php?error=가aa입에 실패하였습니다.");
                exit();
            }

        }

        // 저장시킨다고 합니다(?)

    }


} 
else {
    //에러메세지
    header("location: register_view.php?error=알 수 없는 오류가 발생하였습니다.");
    exit();
}

?>