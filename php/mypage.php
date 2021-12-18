<?php
    // 세션 전역변수를 사용하겠다
    session_start();
?>

<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>그곳엔 향기가 있다</title>
    <link rel="stylesheet" href="/css/mypage.css?">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#parts_header").load("/parts/header.html")});
   </script> 
</head>


<body>
    <!-- 그곳에향기가있다 상단, 카테고리.. -->
    <div id="parts_header"></div>

    <div class="mypage_color_gray">home > mypage</div>
    <div class="mypage_center">
        <h2>마이 쇼핑</h2>
        <div class="등급box">
            <span class="member등급">FAMILY</span>
            <span class="등급오른쪽">저희 쇼핑몰을 이용해 주셔서 감사합니다.<br>
            <?php echo $_SESSION['id']; ?>님은 [FAMILY] 회원이십니다.</span>
            <form action="/php/logout.php" method="post">
                <button>로그아웃</button>
            </form>
        </div>

        <div class="나의주문처리현황box">
            <h4>나의 주문처리 현황</h4>
            <div class="나의주문처리현환5칸">
                <span class="span1칸씩">
                    <div class="span1칸씩_텍스트">입금전</div>
                    <div class="span1칸씩_숫자">0</div>
                </span>
                <span class="span1칸씩">
                    <div class="span1칸씩_텍스트">배송준비중</div>
                    <div class="span1칸씩_숫자">0</div>
                </span>
                <span  class="span1칸씩">
                    <div  class="span1칸씩_텍스트">배송중</div>
                    <div class="span1칸씩_숫자">0</div>
                </span>
                <span  class="span1칸씩">
                    <div  class="span1칸씩_텍스트">배송완료</div>
                    <div class="span1칸씩_숫자">0</div>
                </span>
                <span  class="span1칸씩" style="border: 1px solid white;">
                    <div>
                        <span>▫ 취소 : </span>
                        <span>0</span>
                    </div>
                    <div>
                        <span>▫ 교환 : </span>
                        <span>0</span>
                    </div>
                    <div>
                        <span>▫ 반품 : </span>
                        <span>0</span>
                    </div>
                </span>
            </div>
        </div>

        <div class="기타서비스box">
            <div class="기타서비스">
                <div class="span1칸씩_텍스트">주문내역 조회</div>
                <div>고객님께서 주문하신 상품의 주문내역을 확인하실 수 있습니다.<br> 비회원의 경우, 주문서의 주문번호와 비밀번호로 주문조회가 가능합니다.</div>
            </div>
            <div class="기타서비스">
                <div class="span1칸씩_텍스트">회원 정보</div>
                <div>회원이신 고객님의 개인정보를 관리하는 공간입니다.<br>개인정보를 최신 정보로 유지하시면 보다 간편히 쇼핑을 즐기실 수 있습니다.</div>
            </div>
            <div class="기타서비스">
                <div class="span1칸씩_텍스트">관심 상품</div>
                <div>관심상품으로 등록하신 상품의 목록을 보여드립니다.</div>
            </div>
            <div class="기타서비스">
                <div class="span1칸씩_텍스트">적립금</div>
                <div>적립금은 상품 구매 시 사용하실 수 있습니다.<br>적립된 금액은 현금으로 환불되지 않습니다.</div>
            </div>
            <div class="기타서비스">
                <div class="span1칸씩_텍스트">쿠폰</div>
                <div>고객님이 보유하고 계신 쿠폰내역을 보여드립니다.</div>
            </div>
            <div class="기타서비스">
                <div class="span1칸씩_텍스트">게시글 관리</div>
                <div>고객님께서 작성하신 게시물을 관리하는 공간입니다.<br>고객님께서 작성하신 글을 한눈에 관리하실 수 있습니다.</div>
            </div>
            <div class="기타서비스">
                <div class="span1칸씩_텍스트">배송 주소록 관리</div>
                <div>자주 사용하는 배송지를 등록하고 관리하실 수 있습니다.</div>
            </div>
        </div>
      
    </div>





<div style="margin-bottom: 10%;"></div>

</body>
</html>