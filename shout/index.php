<html>
  <head>
  <?php
        include("../ip.php");
        unau_if_not_logged_in();        

          $host="localhost"; // Host name
					$username="root"; // Mysql username
					$password=""; // Mysql password
					$db_name="FS"; // Database name
					$tbl_name="details"; // Table name
					
					mysql_connect("$host", "$username", "$password")or die("cannot connect");
					mysql_select_db("$db_name")or die("cannot select DB");

     	   $ip=ip_addr();
			 	 $sql ="SELECT username FROM $tbl_name WHERE ipadd='$ip'";
					$result = mysql_query($sql);
					$count = mysql_num_rows($result);
					  // If result matched $myusername and $mypassword, table row must be 1 row
					  if($count==1){
              echo $result;
              $curUsername = $result;
            }						   
        $peopleFile = "./data/people";
    ?>
    <script type="text/javascript">
        window.setInterval(function(){
          var fr = document.getElementById('iFrame')
          var fr2 = document.getElementById('statusArea')
          fr.src=fr.src
          fr2.src=fr2.src          
        }, 2000);
        
      function shout(){
        var input = document.getElementById('shoutInput')
        var text = input.value
        var d = new Date();
        var dstring = d.getDate() + "/" + d.getMonth() + " " + d.getHours() + ":"+ d.getMinutes();
        var user = "<?= $curUsername?>"
        document.getElementById('hiddenMsg').value = "<tr><td>" 
                                                     + "[<small>"
                                                     + dstring + "</small>] "
                                                     + "<b>" + user + ":&nbsp&nbsp&nbsp"+ "</b></td>"
                                                     +"<td>" + text + "</td></tr><hr>"
        document.getElementById('hiddenForm').submit()
        input.value = ""
      }
    </script>

    <style type="text/css">
      #iFrame{
        border:1px solid;
        border-radius:10px;
        -moz-border-radius:10px; /* Firefox 3.6 and earlier */
        box-shadow: 10px 10px 5px #888888;
        width:100%;
        height:100%;
        padding:10px;
        overflow:auto;
      }
      #shout{
        position:absolute;
        left:25%;
        top:6%;
        width:50%;
        height:60%;
      }
      #shoutInput{
        margin-top:3%;
        width:80%;
        height:6%;
      }
      #statusArea{
        position:absolute;
        left:5%;
        top:90%;
        width:90%;
        height:7%;
        border-style:none;
      }
    </style>
  </head>
  <body onload="document.getElementById('shoutInput').focus()">
    <div id="shout">
      <form id="hiddenForm" action="./msgsent.php" target="shoutIFrame" method="post">
        <input id="hiddenMsg" type="hidden" name="msg" />
      </form>
      <iframe id="iFrame" name="shoutIFrame" src="./msgsent.php"></iframe>
      <div id="shoutText" align="center">
        <input id="shoutInput" type="text" onkeydown="if (event.keyCode == 13) shout()" />
        <button onclick="shout()">Send</button>
      </div>
    </div><!--end of shout div-->
    <iframe id="statusArea" src="./onlinenow.php">
    </iframe>
  </body>
</html>
