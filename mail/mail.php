<?php


// find_pw.php에서 받아온 값
$email = $_POST['email'];
$new_pw = $_POST['new_pw'];
$name = $_POST['name'];
$쇼핑몰메일 = 'rlagksdl96@naver.com';
$쇼핑몰이름 = '그곳엔 향기가 있다';

include "PHPMailer.php";
include "SMTP.php";

//Create a new PHPMailer instance
$mail = new PHPMailer();

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
//SMTP::DEBUG_OFF = off (for production use)
//SMTP::DEBUG_CLIENT = client messages
//SMTP::DEBUG_SERVER = client and server messages
$mail->SMTPDebug = SMTP::DEBUG_SERVER;

//Set the hostname of the mail server
$mail->Host = 'smtp.naver.com';
//Use `$mail->Host = gethostbyname('smtp.gmail.com');`
//if your network does not support SMTP over IPv6,
//though this may cause issues with TLS

//Set the SMTP port number:
// - 465 for SMTP with implicit TLS, a.k.a. RFC8314 SMTPS or
// - 587 for SMTP+STARTTLS
$mail->Port = 465;

//Set the encryption mechanism to use:
// - SMTPS (implicit TLS on port 465) or
// - STARTTLS (explicit TLS on port 587)
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = 'rlagksdl96';

//Password to use for SMTP authentication
$mail->Password = '1XEVYGM2DTCK';
$mail->CharSet = 'UTF-8';

// 보내는 사람
$mail->setFrom($쇼핑몰메일, $쇼핑몰이름);

// 답장받을 사람
$mail->addReplyTo($쇼핑몰메일, $쇼핑몰이름);

// 받을 사람
$mail->addAddress($email, $name);

// 메일 제목
$mail->Subject = '[ '.$쇼핑몰이름.' ]에서 새로운 비밀번호를 보냅니다.';

// $mail->msgHTML(file_get_contents('contents.html'), __DIR__);
// 메일 제목
$mail->msgHTML("안녕하세요".$name."님 요청하신 임시 비밀번호 입니다.<br>
                임시 비밀번호 : ".$new_pw."<br> 
                마이페이지에서 원하시는 비밀번호로 변경하여 사용하시기 바랍니다.");

//Replace the plain text body with one created manually
// 제대로 안 갔을 때 뜨는 문구
$mail->AltBody = '동해물과 백두산이';

//Attach an image file
// $mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message sent!';
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}

// echo "<script>alert('로그인페이지로 이동합니다. ');history.back()</script>";
echo "<script>alert('등록된 이메일로 새로운 비밀번호를 보냈습니다.')</script>";
echo "<script> location.href='/php/login.php' </script>";


