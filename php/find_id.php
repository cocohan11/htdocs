<?php

    #DB connect
    $db = mysqli_connect('127.0.0.1','root','rich','work');

    // form태그로 받아온 데이터
    $name = $_POST['name'];
    $email = $_POST['mail_id'];

    // consumer테이블의 id컬럼을 선택한다. 특정지어 이름이 저거이고 이메일이 저거인. 
    $query ="SELECT id FROM consumer WHERE name ='$name' and email='$email'";
    $res = mysqli_query($db, $query);
    $num = mysqli_num_rows($res);

    // 일치하는 갯수가 0이면
    if($num == 0 )
    {
        echo "<script>alert('일치하는 아이디를 찾을 수 없습니다')</script>";
        mysqli_close($db);
        echo "<meta http-equiv='refresh' content='0;url=find.php'>";
    }
    // 성공
    else if($num ==1)
    {
        $arr = mysqli_fetch_array($res);
        mysqli_close($db);
        echo "<script>alert('당신의 아이디는 [   $arr[0]   ] 입니다')</script>";
        echo "<meta http-equiv='refresh' content='0;url=/php/login.php'>";
    }
    // 오류
    else
    {
        echo "<script>alert('에러');history.back();";
        mysqli_close($db);
    }


  ?>