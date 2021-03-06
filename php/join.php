<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>그곳에 향기가 있다 - 로그인</title>
    <link rel="stylesheet" href="/css/join.css?aa">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script> 
    <script src="/js/join_address.js"></script> 
    <script type="text/javascript">
        // 상단고정 html 불러오기
        $(document).ready(function(){
            $("#parts_header").load("/parts/header.html")});
   </script> 
   <script>
        function chid(){

        document.getElementById("chk_id2").value=0;     // false
        var id=document.getElementById("uid").value;    // 입력된 id값 
        if(id==""){
            alert("빈칸 안돼요!");
            exit;
        }
        ifrm1.location.href="/php/server_join_btn_id.php?userid="+id;   // get메소드처럼 보냄
        }
    </script>
</head>


<body>
    <!-- 그곳에향기가있다 상단, 카테고리.. -->
    <div id="parts_header"></div>

    <div class="join_index">home > 회원가입</div> 
    <hr class="hr_color">
    <div class="join_center">
        <div class="회원가입박스">
            <h2 class="회원가입">회원가입</h2>
            <div class="정보입력0102">            
                <div>
                    <span class="textColor_red">01 정보입력 > </span> 
                    <span>02 가입완료</span> 
                </div>
            </div>
            </div>
            <div class="기본정보_center">
            <div class="회원가입박스">
                <h2 class="회원가입">기본정보</h2>
                <div class="정보입력0102 textColor_red">            
                    <div>
                    <span>▪ 표시는 반드시 입력하셔야 하는 항목입니다.</span> 
                    </div>
                </div>
            </div>
            <div id="join_gide">
                <ul class="grid_left">
                    <li><span class="textColor_red">▪</span><span> 아이디<span></li>
                    <li><span class="textColor_red">▪</span><span> 비밀번호<span></li>
                    <li><span class="textColor_red">▪</span><span> 비밀번호 확인<span></li>
                    <li><span class="textColor_red">▪</span><span> 이름<span></li>
                    <li><span class="textColor_red">▪</span> 이메일</li>
                    <li class="띄어쓰기">휴대폰번호</li>
                    <li class="띄어쓰기">주소</li>
                </ul>


                <form class="grid_right" action="/php/server_join.php" method="post">
                    <input type="text" id="uid" name="id" placeholder="아이디" >
                    <input type=button id="중복검사" value="중복검사" onclick=chid()>
                    <input type=hidden id="chk_id2" name=chk_id2 value="0">
                        <script>
                            // $("#uid").on("propertychange change keyup paste input", function(){
                            //     alert("change");
                            // });
                            $("#uid").on("propertychange hange keyup paste input", function() {
                                document.getElementById("chk_id2").value=0;     // 값 바뀌면 false로 돌려놓기
                            });
                        </script>
                    <input type="password" name="pwd" placeholder="비밀번호">
                    <input type="password" name="pwdCheck" placeholder="비밀번호 확인">
                    <input type="text" name="name" placeholder="이름">
                    <input type="text" name="email" placeholder="이메일">
                    <!-- @<select id="email" ><option value="naver.com">naver.com</option>
                        <option value="nate.com">nate.com</option>
                        <option value="hanmail.com">hanmail.com</option>
                    </select> -->
                    <input type="number" maxlenght="11" name="tel" placeholder="-없이 입력하세요"><br>
                    <!-- 주소id 바꾸지않기. 라이브러리라서 주소지정 -->
                    <input type="text" id="postcode" placeholder="우편번호" name="addrCode" readonly > 
                    <input type="button" id="postcode_button" onclick="open_Postcode()"value="우편번호 찾기"><br>
                    <input type="text" id="road_address" placeholder="도로 주소" name="addr1" readonly><br>
                    <input type="text" id="address" placeholder="지번 주소" name="addr2" readonly>
                    <input type="text" id="detail_address" placeholder="상세주소" name="addr3">
                </div>
                <hr class="hr_color">
                <div style="text-align: center;">
                    <input class="btn btn_취소" type="submit" value="취소">
                    <input class="btn btn_회원가입" type="submit" value="회원가입" name="join">
                </div>
            </form>
        
            <!-- 중복체크를 위한 창 -->
            <iframe src="" id="ifrm1" scrolling=no frameborder=no width=00px height=00px name="ifrm1"></iframe>
        </div>
    </div>

    
<div style="margin-bottom: 10%;"></div>
</body>



</html>