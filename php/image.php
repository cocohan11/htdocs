<!DOCTYPE html>

<html>

<head>

    <title>Image Upload in PHP</title>

    <! link the css file to style the form >

    <link rel="stylesheet" type="text/css" href="style.css" />

</head>

<body>

    <div id="wrapper">

        <!-- specify the encoding type of the form using the 

                enctype attribute -->

        <form method="POST" action="/php/image_result.php" enctype="multipart/form-data">        

            <input type="file" name="choosefile" value="" />

            <div>

                <button type="submit" name="uploadfile">

                UPLOAD

                </button>

            </div>

        </form>

    </div>

</body>

</html>

