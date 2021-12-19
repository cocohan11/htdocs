<?php

    // post메소드로 받아온 정보
    echo $_POST['옷타입'];  
    // echo $_POST['chooseFile'];
    $check_color = $_POST['색상'];  
    $check_size = $_POST['사이즈'];

    //-----------------------이미지-------------------------------

    // $_POST로 POST데이터를 가져오는 것 처럼 $_FILES로 FILE데이터를 가져온다.        
    $chooseFile = $_FILES['chooseFile'] ['name'];           // 이미지 이름
    $path = '../Image/';                                    // 이미지를 저장할 경로
    $tmp_name = $_FILES['chooseFile'] ['tmp_name'];         // 임시로 이미지가 저장되는 경로
    $error = $_FILES['chooseFile'] ['error'];               // 파일 에러코드
    // $chooseFile_type = $_FILES['chooseFile'] ['type'];      // 파일 타입
    // $chooseFile_size = $_FILES['chooseFile'] ['size'];      // 파일 사이즈

    // 임시경로에 있는 파일  --> 을 지정한 위치로 이동 후 저장
    if (move_uploaded_file($tmp_name, $path.$chooseFile)) {  
        echo "Uploaded";
    } else {
        echo "File not uploaded";
    };                
    
    //--------------------------------------------------------------
    
    

    // 체크된 값들을 배열에 저장한다.
    $array_color = array($check_color);     
    $array_size = array($check_size);        


    // 반복문. (배열명 as 값 변수) // 필수
    foreach ($array_color as $value){              
        $result_color = implode("|",$value);       // implode() : 문자열을 합치는 함수
    }
    foreach ($array_size as $value){              
        $array_size = implode("|",$value);      
    }

    // 결과값 문자열에 "검정" 이라는 문자가 포함되어 있으면 true 없으면 false
    // strpos()함수원형 : 문자열이 처음 나타나는 위치를 찾는 함수로 위치 값을 정수로 반환한다. 
    if(strpos($result_color,'검정') !== false){           
        echo "검정 있다!!<br>";     
    }else{
        echo "검정 없다...<br>";
    }


    // echo $value[0];  << 마지막에 담기는 배열의 값이 담겨있다. 콕 집어서 값을 불러오고싶은데.. 아직 안 찾아봄
    // 밸류 하나로 검색하니까 안 나오네. 하나의 긴 문자열로 만들어야 검색이 되나봄 하나로 묶는 과정이 필요하겠네 검색하려면.

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
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
    <select name="사이즈">
        <option value="">사이즈</option>
        <?php 
            if(strpos($array_size,'소') !== false) { ?>
                <option value="소">소</option>
            <?php } if(strpos($array_size,'중') !== false) { ?>
                <option value="중">중</option>
            <?php } if(strpos($array_size,'대') !== false) { ?>
                <option value="대">대</option>
            <?php } ?>
    </select>
</body>
</html>


