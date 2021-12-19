<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <center>

      <form name='find_id' method="POST">
        <label>
          <h2>아이디 찾기</h2>
          <p>이름 <input type='text' name='name'  placeholder='name' ><br></p>
          <p>이메일 <input type='text' name='mail_id' placeholder='email'></p>
        </label>
        <input type="submit" value="submit" onclick="javascript:form.action='/php/find_id.php';">
      </form>

      <br>

    <form name='find_pw' method="POST">
      <label>
          <h2>비밀번호 찾기</h2>
          <p>아이디    <input type='text' name='id'  placeholder='id' ><br></p>
          <p>이름  <input type='text' name='name'  placeholder='name' ><br></p>
          <p>이메일 <input type='text' name='mail_pw'  placeholder='email' ><br></p>
        </label>
        <input type='submit' value="submit" onclick="javascript:form.action='/php/find_pw.php';">
      </form>

    </center>
  </body>
</html>