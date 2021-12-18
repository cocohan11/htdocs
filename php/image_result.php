<?php

error_reporting(0);
echo '1입니다';
?>

<?php

$msg = ""; 
echo '2입니다';

// check if the user has clicked the button "UPLOAD" 

if (isset($_POST['uploadfile'])) {
    echo '3입니다';

    $filename = $_FILES["choosefile"]["name"];
    echo $filename.'입니다~~';

    $tempname = $_FILES["choosefile"]["tmp_name"];  
    echo $tempname.'임시저장~~';

        // $folder = "image/".$filename;   
        $path = "/usr/local/apache2.4/htdocs/Image/";       //htdocs안에만 있어야 한다. 
        // $location = $path . $_FILES['choosefile']['name'];
        echo $path.'폴더~~';
        echo "<pre>"; 
        print_r($_FILES);

    // connect with the database
    $db = mysqli_connect("127.0.0.1", "root", "rich", "work"); 

        // query to insert the submitted data
        echo '4입니다';

        // $sql = "INSERT INTO product (image) VALUES ('$filename')";
        $sql = "insert into image (image_name) values ('$filename')";
        echo $sql.'sql입니다';

        // function to execute above query
        $쿼리보내기 = mysqli_query($db, $sql);       
        if($쿼리보내기){
            echo '쿼리보내기 성공';
        } else {
            echo '쿼리보내기 실패';
        }

        // Add the image to the "image" folder"
        // if (move_uploaded_file($tempname, $location)) {     // 임시>>지정위치 이동

        //     $msg = "Image uploaded successfully";
        //     echo $msg;

        // } else{

        if (move_uploaded_file($tempname, __DIR__.$path.$filename_)) {
            echo "Image uploaded successfully"; 
        } else {
            
        $msg = "Failed to upload image";
        echo $msg;
        }

}

$result = mysqli_query($db, $sql);
// if($result) {
//     echo '성공ㅎ';
// } else {
//     echo '실패ㅡㅡ';
// }

?>