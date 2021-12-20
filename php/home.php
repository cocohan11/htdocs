<?php

    $db = mysqli_connect('127.0.0.1','root','rich','work');

    // $query = "SELECT * FROM consumer WHERE id='$id'";
    // $res=mysqli_query($db,$query);
    // $num =mysqli_num_rows($res);
    // $row = mysqli_fetch_assoc($res);        // 저 쿼리와 관련된 row를 가져와라
    // $hash = $row['pwd'];




    $path = '../Image/';

    // $query1 = "SELECT MAX(no) FROM product";       // 제일 높은 값 (제일 최근 값)
    // $result1 = mysqli_query($db, $query1);
    // $num =mysqli_num_rows($res);
    // $row = mysqli_fetch_assoc($result1);        // 저 쿼리와 관련된 row를 가져와라
    // $no = $row['image_path'];

    // echo $num;
    // echo $no;
    // var_dump($num);
    // var_dump($no);


    $query2 = "SELECT * FROM product where no = '4'";
    $res = mysqli_query($db, $query2);
    $row = mysqli_fetch_assoc($res);
    $image_path = $row['image_path'];
    echo $image_path;

?>

<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>그곳엔 향기가 있다</title>
    <link rel="stylesheet" href="/css/home.css?">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#parts_header").load("/parts/header.html")});
   </script> 
   <style>
       .img들어갈곳 img {
           width : 200px;
       }
   </style>
</head>


<body>
    <!-- 그곳에향기가있다 상단, 카테고리.. -->
    <div id="parts_header"></div>
    
    <img class="홈대표사진" src="/src/홈사진1.jpg">

    <div class="홈_center">
        <h3>신상품</h3>
        <div class="img들어갈곳">
            <a href="/php/server_product_show.php"><img src="<?php echo $image_path?>"></a>
            <img src="" alt="">
            <img src="" alt="">
            <img src="" alt="">
            <!-- <a href="/html/item_detail.html">신상품 4개가 자동 슬라이드 되기 <>버튼도 있기</a> -->
        </div>
        <h3>인기상품</h3>
        <div class="img들어갈곳">인기상품 5행*2열 나열하기</div>
        <h3>디자이너 추천상품</h3>
        <div class="img들어갈곳">추천상품 5행*2열 나열하기 ( 3가지 전부 더보기 버튼있음)</div>
    </div>
    



<div style="margin-bottom: 10%;"></div>

</body>
</html>