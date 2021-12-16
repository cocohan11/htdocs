<?php

// echo session_id();
session_start();    // 세션 시작점을 알려줌 // 로그인할 때 식별번호 발급
session_unset();    // 세션 해제
session_destroy();    // 세션 해제로 성이안차서 디스트로이  // 로그아웃할 때 식별번호 파괴

// // 흰 배경만 보고있어서 이동해주기
echo "<script> alert('로그아웃 합니다'); </script>";
echo "<script> location.href='/php/login.php' </script>";
// exit();

?>