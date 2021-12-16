<?php

    $check = $_POST['색상'];        // post메소드로 한 요청 중 '색상'에 대한 값을 변수에 대입한다. 
    $array = array($check);         // 체크된 값들을 새로운 배열에 저장한다. 
    

    foreach ($array as $value){              // 반복문이다. (배열명 as 값 변수)

        // echo "<pre>";
        // var_dump($value);
        // echo "<pre>";
        $result = implode("|",$value);       // 문자열을 합치는 함수
        // 배열 값들을 "|" 로 나누어서 한 문자열로 저장
 
        echo "<pre>";
        var_dump($result);
        echo "</pre>";
    }

    // 결과값 문자열에 "딸기" 라는 문자가 포함되어 있으면 true 없으면 false
    if(strpos($result,'검정') !== false){           // strpos()함수원형 : 문자열이 처음 나타나는 위치를 찾는 함수로 위치 값을 정수로 반환한다. 
        echo "검정 있다!!<br>";     
    }else{
        echo "검정 없다...<br>";
    }


    echo $_POST['옷타입'];
    // echo $_POST['색상'];
    // echo "<pre>";
    // var_dump($value);
    echo $value[0];
    // echo "<pre>";

// 밸류 하나로 검색하니까 안 나오네. 하나의 긴 문자열로 만들어야 검색이 되나봄 하나로 묶는 과정이 필요하겠네 검색하려면.
// if(strpos($value,'검정') !== false) {
//     echo "검정 있슈<br>";
// } else {
//     echo "검정 없당께<br>";
// }
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
            if(strpos($result,'검정') !== false) { ?>
                <option value="검정">검정</option>
            <?php } if(strpos($result,'흰색') !== false) { ?>
                <option value="흰색">흰색</option>
            <?php } if(strpos($result,'회색') !== false) { ?>
                <option value="회색">회색</option>
            <?php } ?>
            
        
    </select>
</body>
</html>


