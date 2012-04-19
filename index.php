<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	    <?php
        include("./ip.php");
      ?>
      <?php
					$host="localhost"; // Host name
					$username="root"; // Mysql username
					$password=""; // Mysql password
					$db_name="FS"; // Database name
					$tbl_name="details"; // Table name
					$message="";
					$msgcolor = "grey";

					$myusername=$_POST['myusername'];
					$mypassword=$_POST['mypassword'];
					$submit=$_POST['Submit'];
					mysql_connect("$host", "$username", "$password")or die("cannot connect");
					mysql_select_db("$db_name")or die("cannot select DB");
					if($submit)
					{
					  // To protect MySQL injection (more detail about MySQL injection)
					  $myusername = stripslashes($myusername);
					  $mypassword = stripslashes($mypassword);
					  $myusername = mysql_real_escape_string($myusername);
					  $mypassword = mysql_real_escape_string($mypassword);

					  $sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
					  $result=mysql_query($sql);

					  // Mysql_num_row is counting table row
					  $count=mysql_num_rows($result);
					  // If result matched $myusername and $mypassword, table row must be 1 row

					  if($count==1){
						   $ip=ip_addr();
               $sql="update details set ipadd='$ip' where username='$myusername'";
               $result=mysql_query($sql);
						   $message = "Login successful";
						   $msgcolor = "green";

            }
					  else{
						  $message = "Wrong Username or Password";
						  $msgcolor = "red";
					  }
					}
			?>
			<?php
			  $servername="localhost";
			  $username="root";
			  $pass="";
			  $name=$_POST['regname'];
			  $email=$_POST['regemail'];
			  $password=$_POST['regpass1'];
			  $password2=$_POST['regpass2'];
			  $submit=$_POST['submit'];
			  $conn=  mysql_connect($servername,$username,$pass)or die(mysql_error());
			  mysql_select_db("FS",$conn);
			  if('$name' && '$email'  && '$password' && '$password2' && $submit )
			  {
			    $sql=("SELECT * FROM details WHERE username ='$name'");
			    $result = mysql_query($sql) or die(mysql_error());
			    $count=mysql_num_rows($result);
			    if($count!=0)

				  {
				    $message = "username already exists";
				    $msgcolor = "red";
				    continue;
				  }
			    $sql=("SELECT * FROM details WHERE email= '$email'");
			    $result = mysql_query($sql) or die(mysql_error());
			    $count=mysql_num_rows($result);
			    if($count!=0)
				  {
				    $message = "email already exists";
				    $msgcolor = "red";
				    continue;
				  }
				  if($_POST["regpass1"]==$_POST["regpass2"])
				  {
				    $sql="insert into details(username,email,password)
					      values('$name','$email','$password')";
				    $result=mysql_query($sql,$conn) or die(mysql_error());        
				    $message = "Registered successfully. Please login.";	
				    $msgcolor = "green";
				  }
				  else 
				    {
				      $message = "Passwords doesnt match";
				      $msgcolor = "red";
				    }
			  }
			  if(isset($_GET['msg'])&&(strcmp($_GET['msg'],"Logged out successfully")==0))
			    {
            $message = $_GET['msg'];
		        $msgcolor = "red";
			    }			    
        else if(isset($_GET['msg'])&&!unau_if_not_logged_in()&&$message=="")
          {
            $message = $_GET['msg'];
		        $msgcolor = "red";
			    }
			?>			
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script src="./js/dojo-js/dojo/dojo.js" djConfig="parseOnLoad:true"></script>
    <script type="text/javascript">
		  dojo.require("dijit.layout.TabContainer");
      dojo.require("dijit.layout.ContentPane");
      dojo.require('dijit.form.Button');

    </script>
    <link rel="stylesheet" type="text/css" href="./css/dojo.css" />  
    <link rel="stylesheet" type="text/css" href="./css/claro.css" />
     

    <style type="text/css">
      /* bring in the claro theme */

      /* bring in the widget-specific CSS classes */
      @import "./css/ContentPane.css";
      @import "./css/TabContainer.css";

    </style>
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
    
		<!--[if IE]>
		<link href="css/ie.css" rel="stylesheet" type="text/css" />
		<![endif]-->
		<title>ACE-Association of Computer Engineers, CSE, CMRIT</title>
		
	</head>
	<body class="claro">
		<div id="container">
			<div id="header">
				<div>
  				<a href="logout.php" style="font-size:small;float:right"><font color="white">Logout</font></a>  
					<a href="index.php" class=""><img src="img/ace1.png" alt="ace logo" /></a>
				</div>
			</div>
			<div id="content">
				<div align="center" id="message" style="color:<? echo $msgcolor?>"><?echo $message?></div>			
				<div id="left">
					<div style="padding-left:10%;width:500px">
					  <table>
					  <tr>
					    <td width ="30%"><img <img width="70%" height="12%" src="./index_files/home.png"></td>
					    <td style="padding-left:30px"><a href="home.php"><p class="topic">Home</p></td>
					  </tr>
					  <tr>
					    <td><img width="70%" height="25%" src="./index_files/fo.jpg"></td>
					     <td style="padding-left:30px"><a href="forum/"><p class="topic">Forum</p></a></td>
					  </tr>
					  <tr>
					    <td><img <img width="70%" height="25%" src="./index_files/pr.png"></td>
					    <td style="padding-left:30px"><a href="ph.php"><p class="topic">Project hosting</p></td>
					  </tr>
					  <tr>
					    <td><img width="70%" height="12%" src="./index_files/fi.jpg"></td>
					    <td style="padding-left:30px"><a href="fs/"><p class="topic">File sharing</p></td>
					  </tr>
					  </table>
					</div>
					<div style="position:absolute;width:400px;height:400px;left:60%;top:200px">
						<div style="width: 100%; height: 100%">
							<div id="mainTabContainer" data-dojo-type="dijit.layout.TabContainer" style="width: 75%; height: 80%;">
								<div data-dojo-type="dijit.layout.ContentPane" title="Login" selected="true" style="padding-top:25%">
									<form name="form1" method="post" action="">
									<table align="center">
									  <tr><td>Username</td></tr>
  									<tr><td><input name="myusername" type="text" id="myusername" style="width:220px;height:25px" ></td></tr>
									  <tr><td>Password</td></tr>
  									<tr><td><input name="mypassword" type="password" id="mypassword" style="width:220px;height:25px"></td></tr>
									  <tr><td><br /><input type="submit" name="Submit" value="Login" style="width:220px;height:25px"></td></tr>
								  </table>
								  </form>
									
								</div>
								<div data-dojo-type="dijit.layout.ContentPane" title="Register" style="padding-top:10%">
									<form name="form2" method="post" action="">
									<table align="center">
									  <tr><td>Username</td></tr>
  									<tr><td><input name="regname" type="text" id="myusername" style="width:220px;height:25px" ></td></tr>
									  <tr><td>Email</td></tr>
  									<tr><td><input name="regemail" type="text" id="mypassword" style="width:220px;height:25px"></td></tr>
  									<tr><td>Password</td></tr>
  									<tr><td><input name="regpass1" type="password" id="mypassword" style="width:220px;height:25px"></td></tr>
  									<tr><td>Retype password</td></tr>
  									<tr><td><input name="regpass2" type="password" id="mypassword" style="width:220px;height:25px"></td></tr>
									  <tr><td><br /><input type="submit" name="submit" value="Register" style="width:220px;height:25px"></td></tr>
								  </table>
								  </form>
								</div>
							</div>
						</div>					  
					</div>			
				</div>
			</div>			
			<div id="footer">
				<div>
					<p class="left">
						Copyright 2011
						<br />
						Association of Computer Engineers, CMRIT
					</p>
				</div>
			</div>
		</div>
		<script type="text/javascript">
		  var msg = "<?= $message ?>";
		  if(msg=="Login successful")
		    document.getElementById('mainTabContainer').style.display="none";
		</script>
	</body>
</html>
