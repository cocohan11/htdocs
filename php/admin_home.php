<html lang="ko">                <!-- 관리자 페이지로 아무나 들어오면 안되니까 로그인해야 들어오도록 만들자 -->
<head>
    <meta charset="UTF-8">
    <title>그곳엔 향기가 있다</title>
    <link rel="stylesheet" href="/css/home.css?">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#parts_header").load("/parts/header_admin.html")});
   </script> 
</head>


<body>
    <!-- 그곳에향기가있다 상단, 카테고리.. -->
    <div id="parts_header"></div>
    <img class="홈대표사진" src="/src/홈사진1.jpg">

    <div class="홈_center">
        <h3>신상품</h3>
        <div class="img들어갈곳"><a href="/html/item_detail.html">신상품 4개가 자동 슬라이드 되기 <>버튼도 있기</a></div>
        <h3>인기상품</h3>
        <div class="img들어갈곳">인기상품 5행*2열 나열하기</div>
        <h3>디자이너 추천상품</h3>
        <div class="img들어갈곳">추천상품 5행*2열 나열하기 ( 3가지 전부 더보기 버튼있음)</div>
    </div>
    


<div style="margin-bottom: 10%;"></div>

</body>
</html>