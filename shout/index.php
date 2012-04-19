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
					  if($count==1){
              $row = mysql_fetch_row($result);
              $curUsername = $row[0];
            }						   
        $peopleFile = "./data/people";
    ?>
  	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="../css/style.css" type="text/css"
		media="screen" />
		<!--[if IE]>
		<link href="css/ie.css" rel="stylesheet" type="text/css" />
		<![endif]-->
		<title>ACE-Association of Computer Engineers, CSE, CMRIT</title>
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
        position:relative;
        left:15%;
        width:50%;
        height:80%;
      }
      #shoutInput{
        margin-top:3%;
        width:80%;
        height:6%;
      }
      #statusArea{
        position:absolute;
        left:80%;
        top:170px;
        width:15%;
        height:60%;
        border-style:none;
      }
    </style>
  </head>
  <body onload="document.getElementById('shoutInput').focus()">
  		<div id="container">
			<div id="header">
				<div>
					<h1><span></span></h1>
					<a href="../logout.php" style="font-size:small;float:right"><font color="white">Logout</font></a>
					<a href="../index.php" class=""><img src="../img/ace1.png" alt="ace logo" /></a>
					<ul id="mainNav">
						<li>
							<a href="../index.php">Home</a>
						</li>
						<li>
							<a href="../events.php">Events</a>
						</li>
						<li>
							<a href="../gallery.php">Gallery</a>
						</li>
						<li>
							<a href="../speakers.php">Speakers</a>
						</li>
						<li>
							<a href="../forum">Forums</a>
						</li>
						<li>
							<a href="../about.php">About</a>
						</li>
						<li class="on">
							<a href="../members.php">Members</a>
						</li>
						<li>
							<a href="../contact.php">Contact</a>
						</li>
					</ul>
				</div>
			</div>
			<div id="content" style="height:60%">
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
      </div> <!-- end of content-->
      <div id="footer">
				<div>
					<p class="left">
						Copyright 2011
						<br />
						Association of Computer Engineers, CMRIT
					</p>
				</div>
			</div><!-- end of footer-->
    </div> <!-- end of container-->
  </body>
</html>
