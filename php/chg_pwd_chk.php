<?php
session_start();

$db = mysqli_connect('127.0.0.1','root','rich','work');

$pw_bf = $_POST['pw_bf'];
$pw_af = $_POST['pw_af'];
$pw_af_chk = $_POST['pw_af_chk'];

$id = $_SESSION['id'];  // 전역변수
$time = date('Y-m-d H:i:s');    // 변경된 날짜 기록하기

// echo $pw_bf;
// echo $pw_af;
// echo $pw_af_chk;

// 입력란 존재 확인
if(!isset($pw_af) || !isset($pw_bf) || !isset($pw_af_chk))
{
  echo "<script>alert('입력란이 제대로 구성되어있지 않습니다');history.back()</script>";
}
else
{
    // 모두 기입하라
    if(empty($pw_bf)||empty($pw_af)||empty($pw_af_chk)) {
        echo "<script>alert('모든 칸을 기입해 주세요');history.back()</script>";
    }



    // 비밀번호 해싱해서 테이블에서 찾아내기
    // $pwbf_hash = password_hash($pw_bf, PASSWORD_DEFAULT);
    $query = "SELECT * FROM consumer WHERE id='$id'";
    $res=mysqli_query($db,$query);
    $num =mysqli_num_rows($res);
    $row = mysqli_fetch_assoc($res);        // 저 쿼리와 관련된 row를 가져와라
    $hash = $row['pwd'];

    // 현재 비밀번호 일치하면 통과
    if(password_verify($pw_bf, $hash)) {    // 입력값, 테이블값
        // echo '현재 비밀번호 일치한다';

        // 새로운 비밀번호 2개 동일한지 확인
        if($pw_af === $pw_af_chk)
        {
            // 비밀번호 해싱해서 테이블을 수정하기
            $pwaf_hash = password_hash($pw_af, PASSWORD_DEFAULT);
            // consumer테이블에 비밀번호를 변경한다. 콕찝어 id가 ㅇㅇ인걸. 
            $query1 = "UPDATE consumer set pwd ='$pwaf_hash' WHERE id='$id'";
            $query2 = "UPDATE consumer set date_pwd='$time' WHERE id='$id'";
            $res1 = mysqli_query($db, $query1);
            $res2 = mysqli_query($db, $query2);

            // 에러난다면
            if(mysqli_error($db) || mysqli_error($db))
            {
                mysqli_close($db);
                echo "<script>alert('에러');history.back()</script>";
            }
            // 에러안나고 최종적으로 실행한다면
            else {
                mysqli_close($db);
                echo "<script>alert('비밀번호가 변경 성공! 다시 로그인하세요.')</script>";
                echo "<meta http-equiv='refresh' content='0;url=logout.php'>";
            }
        }
        else {
        mysqli_close($db);
        echo "<script>alert('새로운 비밀번호가 일치하지 않습니다. 다시 확인해주세요');history.back()</script>";

        }
    }

    echo $pwbf_hash;

   
}
 ?>