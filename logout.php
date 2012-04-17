<?php
  include("./ip.php");
  $ip=ip_addr();
  $host="localhost"; // Host name
	$username="root"; // Mysql username
	$password=""; // Mysql password
	$db_name="FS"; // Database name
	$tbl_name="details"; // Table name
	mysql_connect("$host", "$username", "$password")or die("cannot connect");
	mysql_select_db("$db_name")or die("cannot select DB");
	$query = "update details set ipadd=NULL where ipadd='$ip'";
	$result=mysql_query($query);
  $URL="/ace/index.php?msg=Logged out successfully"; 
  header ("Location: $URL"); 
  ?>
