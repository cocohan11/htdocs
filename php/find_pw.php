<?php
    #DB connect
    $db = mysqli_connect('127.0.0.1','root','rich','work');

    $id = $_POST['id'];
    $mail = $_POST['mail_pw'];
    $name = $_POST['name'];

    // echo $id;
    // echo $mail;
    // echo $name;

    #check idowner
    // consumer테이블의 모든 컬럼에서 id,email,name이 저거인 row를 불러온다. 
    $query1 = "SELECT * FROM consumer WHERE id='$id'and email='$mail'and name='$name'";
    $res = mysqli_query($db,$query1);
    $num = mysqli_num_rows($res);
    #null value checker


    // 찾은 row가 1개가 아니라면 back
    if($num != 1)
    {
        echo "<script>alert('잘못된 정보입니다.');history.back();</script>";
    }
    // 찾은 row가 1개라면 비밀번호 랜덤으로 부여
    else if ($num==1)
    {
        // sbustr(문자열,시작지점,길이) // sha256:해싱할 알고리즘명
        $new_pw = substr(hash("sha256",mt_rand()),1,6);         
        // $new_pw_hash = hash("sha256",$new_pw);
        // 비밀번호가 맞지않아서 회원가입할 때 사용했던 패스워드 해시를 동일하게 적용함 ok
        $new_pw_hash = password_hash($new_pw, PASSWORD_DEFAULT);  // 단방향 암호

        
        // consumer테이블의 pwd를 저거로 업데이트한다. 특정지어 id가 저거인. 
        $query2 = "UPDATE consumer SET pwd='$new_pw_hash' WHERE id='$id'";
        $res2 = mysqli_query($db,$query2);
        mysqli_close($db);

        #send tmp pw
        echo "<script>alert('등록된 이메일로 새로운 비밀번호를 보냈습니다.')</script>";
        echo $new_pw_hash;
    }

    echo "<form method=post action='/mail/mail.php' name='frm'>";
    echo "<input type='hidden' name='email' value=$mail>";
    echo "<input type='hidden' name='new_pw' value=$new_pw>";
    echo"<input type='hidden' name='name' value=$name>";
    echo"</form>";

    echo"<script language='javascript'>";
    echo"document.frm.submit();</script>";



  ?>