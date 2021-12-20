<?php


    $db = mysqli_connect('127.0.0.1','root','rich','work');

    // post메소드로 받아온 정보
    $name = $_POST['name'];
    $price = $_POST['price'];
    $옷타입 = $_POST['옷타입'];  
    $check_color = $_POST['색상'];  
    $check_size = $_POST['사이즈'];
    $count = $_POST['count'];
    $date = date('Y-m-d H:i:s');

    //-------------------------- 이미지 폴더에 저장 -------------------------------

    // $_POST로 POST데이터를 가져오는 것 처럼 $_FILES로 FILE데이터를 가져온다.        
    $chooseFile = $_FILES['chooseFile'] ['name'];           // 이미지 이름
    $path = '../Image/';                                    // 이미지를 저장할 경로
    $tmp_name = $_FILES['chooseFile'] ['tmp_name'];         // 임시로 이미지가 저장되는 경로
    $error = $_FILES['chooseFile'] ['error'];               // 파일 에러코드
    // $chooseFile_type = $_FILES['chooseFile'] ['type'];      // 파일 타입
    // $chooseFile_size = $_FILES['chooseFile'] ['size'];      // 파일 사이즈

    // 임시경로에 있는 파일  --> 을 지정한 위치로 이동 후 저장
    if (move_uploaded_file($tmp_name, $path.$chooseFile)) {  
        // echo "Uploaded";
    } else {
        echo "File not uploaded";
    };     


    
    //----------------------------------- 색상, 사이즈 옵션-------------------------------------------

    // 체크된 값들을 배열에 저장한다.
    $array_color = array($check_color);     
    $array_size = array($check_size);        


    // 반복문. (배열명 as 값 변수) // 필수
    foreach ($array_color as $value){              
        $result_color = implode("|",$value);       // implode() : 문자열을 합치는 함수
    }
    foreach ($array_size as $value){              
        $result_size = implode("|",$value);      
    }
    // 결과값 문자열에 "검정" 이라는 문자가 포함되어 있으면 true 없으면 false
    // strpos()함수원형 : 문자열이 처음 나타나는 위치를 찾는 함수로 위치 값을 정수로 반환한다. 
    if(strpos($result_color,'검정') !== false){           
        // echo "검정 있다!!<br>";     
    }else{
        // echo "검정 없다...<br>";
    }

    // echo $value[0];  << 마지막에 담기는 배열의 값이 담겨있다. 콕 집어서 값을 불러오고싶은데.. 아직 안 찾아봄
    // 밸류 하나로 검색하니까 안 나오네. 하나의 긴 문자열로 만들어야 검색이 되나봄 하나로 묶는 과정이 필요하겠네 검색하려면.

    //--------------------------- mysql에 주소저장 -------------------------------

    // mysql에 이미지 경로 저장
    // $sql = "insert into image_info(image_name, path) values('$chooseFile','$path.$chooseFile')";  // db에 전달할 쿼리문
    $sql = "insert into product(name, price, type, color, size, image_path, warehouse, upload_date)
     values('$name','$price','$옷타입','$result_color','$result_size','$path.$chooseFile', '$count', '$date')";  // db에 전달할 쿼리문
    $result = mysqli_query($db,$sql);  //db접속해서 위의명령전달


?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>그곳엔 향기가 있다</title>
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/item_detail.css?">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#parts_header").load("/parts/header.html")});
   </script> 
</head>
<body>

    <!-- 그곳에향기가있다 상단, 카테고리.. -->
    <div id="parts_header"></div>

    <div class="item_detail_center">
        <div class="좌사진우설명">
        <img id="메인사진" src="<?php echo $path.$chooseFile?>">
            <div class="item박스">
                <table class="item_table">
                    <thead>
                        <tr>
                            <td colspan="2"><h4><?php echo $name?></h4></td>
                            <!-- <td></td> -->
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width="80">판매가</td>
                            <td><?php echo $price?>원</td>
                        </tr>
                        <tr>
                            <td>배송비</td>
                            <td>0원</td>
                        </tr>
                        <tr>
                            <td>옷타입</td>
                            <td><?php echo $옷타입?></td>
                        </tr>
                        <tr>
                            <td>색상</td>
                            <td>
                            <select name="색상">
                                <option value="">색상</option>
                                <?php 
                                if(strpos($result_color,'검정') !== false) { ?>
                                    <option value="검정">검정</option>
                                <?php } if(strpos($result_color,'흰색') !== false) { ?>
                                    <option value="흰색">흰색</option>
                                <?php } if(strpos($result_color,'회색') !== false) { ?>
                                    <option value="회색">회색</option>
                                <?php } if(strpos($result_color,'갈색') !== false) { ?>
                                    <option value="갈색">갈색</option>
                                <?php } if(strpos($result_color,'곤색') !== false) { ?>
                                    <option value="곤색">곤색</option>
                                <?php } ?>
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td>사이즈</td>
                            <td>
                                <select name="사이즈">
                                    <option value="">사이즈</option>
                                    <?php 
                                    if(strpos($result_size,'소') !== false) { ?>
                                        <option value="소">소</option>
                                    <?php } if(strpos($result_size,'중') !== false) { ?>
                                        <option value="중">중</option>
                                    <?php } if(strpos($result_size,'대') !== false) { ?>
                                        <option value="대">대</option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="btn_주문">
                    <button style="margin-left: 4;">장바구니</button>
                    <button>찜하기</button>
                    <button>바로 구매</button>
                </div>
                
            </div>
        </div>
        <!-- 스크롤 주르르륵 내림. 전부 사진임 -->
        <h3>상세보기</h3>
        <div class="상세사진들">
            <!-- <img src="/src/코트1long.jpg"> -->
            <!-- <img src="/src/코트2.jpg"> -->
            <!-- <img src="/src/코트3long.jpg"> -->
            <!-- <img src="/src/코트4long.jpg"> -->
        </div>
        <!-- 후기 -->
        <h3>상품 후기</h3>
        <div class="btn_주문">
            <button>상품후기 전체보기</button>
            <button>상품후기 글쓰기</button>
        </div>

    </div>
    <div style="margin-bottom: 10%;"></div>      




</body>
</html>


