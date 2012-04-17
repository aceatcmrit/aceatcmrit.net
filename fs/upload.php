<?php
    $target = "./docs/"; 
     $target = $target . basename( $_FILES['uploaded']['name']);
     if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
       {
         echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded";
       }
     else
       {
         echo "Sorry, there was a problem uploading your file.";
       }       

     $con = mysql_connect("localhost","root","");
     if (!$con)
       {
         die('Could not connect: ' . mysql_error());
       }
      mysql_select_db("FS", $con);
      $tmpTitle = $_POST['title'];
      $tmpAuthor = $_POST['author'];
      $tmpUploader = $_POST['uploader'];
      $tmpTags = $_POST['tags'];
      mysql_query("insert into content (title, author, uploader, tags)
      values ('$tmpTitle','$tmpAuthor','$tmpUploader','$tmpTags')");

      mysql_close($con);
?>
