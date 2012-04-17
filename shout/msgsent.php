<html>
  <body onload="window.scrollTo(0, document.body.scrollHeight);">
    <?php

      $dataFile = "./data/chat.txt";
      if(isset($_POST['msg']))
        {
          $msg = $_POST['msg'];
          file_put_contents($dataFile,$msg,FILE_APPEND | LOCK_EX );
          echo file_get_contents($dataFile);
        }
      else
#        echo "<table>";
        echo file_get_contents($dataFile);
#        echo "</table>";
    ?>
  <body>
</html>
