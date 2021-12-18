<!DOCTYPE html>
<html>
  <head>
  <head>
     <body>
        <?php
          echo $_FILES["file"]['name']."<br>";
          echo $_FILES["file"]['tmp_name']."<br>";
          echo $_FILES["file"]['size']."<br>";
          echo $_FILES['file']['error']."<br>";
        //   $path = '/usr/local/apache2.4/htdocs/Image/';
          $path = '../Image/';
        //   require "$path";


        if (move_uploaded_file($_FILES['file']['tmp_name'], $path.$_FILES["file"]['name'])) {
            echo "Uploaded";
        } else {
           echo "File not uploaded";
        }

        //   move_uploaded_file($_FILES['file']['name'], $move);
        ?>
     <body>
<html>

