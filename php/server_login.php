<?php

session_start();
// include('php/db.php');   include가 작동안함
$db = mysqli_connect('127.0.0.1','root','rich','work');

// echo $_POST['id'];
// echo $_POST['pwd'];


// 로그인 정보 확인하기
if (isset($_POST['id']) && isset($_POST['pwd'])) {
    // 보안을 더욱 강화 (시큐어코딩, 보안코딩)
    $id = mysqli_real_escape_string($db, $_POST['id']);
    $pwd = mysqli_real_escape_string($db, $_POST['pwd']);



    // 에러를 체크
    if(empty($id)) {
        echo "<script> alert('아이디가 비어있어요.');  history.back(); </script>";
        exit();
    } else if (empty($pwd)){
        echo "<script> alert('비밀번호가 비어있어요.');  history.back(); </script>";
        exit();
    } else {
    // 아이디 비밀번호로 로그인 확인 과정

        // 아이디 중복체크 
        // sql언어 --> 편집기에서 서버에 저장되어있는 db를 불러오는 것
        $sql_same = "SELECT * FROM consumer where id = '$id'";     // 멤버라는 테이블에서 모든 것을 조회해
        // mysqli_query(db접속해, 명령을 수행해)
        $result = mysqli_query($db,$sql_same);   // 암기예시)카레(쿼리)집가서 주문했다
        // 로그인을 시켜
        if(mysqli_num_rows($result) === 1) {   // 중복된 가로열이 1개 있다면 실행한다
            
            // 1. 해당열을 가져왔다.
            // 2. 가져올 때 배열의 형태로 가져오는구나
            // 3. print_r 배열을 출력하는구나
            // 4. echo는 쪼개서 가져올 수 있구나
            $row = mysqli_fetch_assoc($result);   // fetch : 가져와라 associate:관계된 --> db와 관련된 모든것을 가져와라
            // print_r($row);  // 출력함수, 배열 출력 => echo 배열을 출력하지 못해요
            // echo '<br>';
            // echo '<br>';
            // var_dump($row);
            // echo '<br>';
            // echo $row['no'].$row[id].$row[name].$row[pwd];
            if($id === 'admin') {
                echo "<script> alert('🌴 관리자님 반갑습니다. 🌴'); </script>";
                echo "<script> location.href='/php/admin_home.php' </script>";  // 새로운 페이지 만들어서 띄워주기
                exit();
            }

            // password_hash와 password_verity는 단짝이다. 
            $hash = $row['pwd'];
            if(password_verify($pwd, $hash)) {
                // 로그인하면 로그인하는 동안 전역변수로 사용하기
                $_SESSION['no'] = $row['no'];
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['phone'] = $row['phone'];
                $_SESSION['addr1'] = $row['addr1'];
                $_SESSION['addr2'] = $row['addr2'];
                $_SESSION['addr3'] = $row['addr3'];
                $_SESSION['addrCode'] = $row['addrCode'];
                echo "<script> alert('🌻  '+'{$id}'+'님 반갑습니다. 🌻'); </script>";
                echo "<script> location.href='/php/mypage.php' </script>";
                // header("location: /php/mypage.php?success=$id");
                exit();
            } else {
                echo "<script> alert('로그인에 실패하였습니다.'); history.back();</script>";
                // header("location: /php/login.php?error=로그인에 실패하였습니다.");
                exit(); 
            }


        } else {
            // 로그인 실패
            echo "<script> alert('다시 입력해주세요.');  history.back(); </script>";
            // header("location: /php/login.php?error=다시 입력해주세요");
            exit();
        }
    }
} 
else {
    //에러메세지
    header("location: /php/login.php?error=알 수 없는 오류가 발생하였습니다.");
    exit();
}

?>