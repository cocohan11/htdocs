<?php
session_start();

$db = mysqli_connect('127.0.0.1','root','rich','work');

$pw = $_POST['pw'];             // 현재비번
$pw_chk = $_POST['pw_chk'];     // 현재비번 재확인

$id = $_SESSION['id'];  // 전역변수
// $time = date('Y-m-d H:i:s');    // 변경된 날짜 기록하기

// echo $pw_bf;
// echo $pw_af;
// echo $pw_af_chk;

// 입력란 존재 확인
if(!isset($pw) || !isset($pw_chk))
{
  echo "<script>alert('입력란이 제대로 구성되어있지 않습니다');history.back()</script>";
}
else
{
    // 모두 기입하라
    if(empty($pw_chk)||empty($pw)) {
        echo "<script>alert('모든 칸을 기입해 주세요');history.back()</script>";
    }



    // 비밀번호 해싱해서 테이블에서 찾아내기
    // $pwbf_hash = password_hash($pw_chk, PASSWORD_DEFAULT);
    $query = "SELECT * FROM consumer WHERE id='$id'";
    $res=mysqli_query($db,$query);
    $num =mysqli_num_rows($res);
    $row = mysqli_fetch_assoc($res);        // 저 쿼리와 관련된 row를 가져와라
    $hash = $row['pwd'];

    // 현재 비밀번호 일치하면 통과
    if(password_verify($pw, $hash)) {    // 입력값, 테이블값
        // echo '현재 비밀번호 일치한다';

        // 비밀번호 2개 동일한지 확인
        if($pw === $pw_chk)
        {

            // 정말 탈퇴하시겠습니까? 되묻기. alert말고 취소 확인 버튼 누를 수 있게하기
            

            // 해당 row(회원정보) 삭제한다
            $query = "DELETE FROM consumer WHERE id='$id'";
            $res1 = mysqli_query($db, $query);

            // 에러난다면
            if(mysqli_error($db))
            {
                mysqli_close($db);
                echo "<script>alert('에러');history.back()</script>";
            }
            // 에러안나고 최종적으로 실행한다면
            else {
                mysqli_close($db);
                echo "<script>alert('탈퇴되었습니다.')</script>";
                echo "<script> location.href='/html/home.html' </script>";
                session_unset();      // 로그아웃
                session_destroy();    // 세션 해제로 성이안차서 디스트로이  // 로그아웃할 때 식별번호 파괴

            }
        }
        else {
        mysqli_close($db);
        echo "<script>alert('비밀번호가 일치하지 않습니다. 다시 확인해주세요');history.back()</script>";

        }
    // 비밀번호 불일치
    } else {
        echo "<script>alert('비밀번호가 일치하지 않습니다. 다시 확인해주세요');history.back()</script>";
    }


   
}
 ?>