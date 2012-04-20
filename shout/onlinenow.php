<?php 
  echo "Online now:<hr />";
  $host="localhost"; // Host name
	$username="root"; // Mysql username
	$password=""; // Mysql password
	$db_name="FS"; // Database name
	$tbl_name="details"; // Table name
  
	$con = mysql_connect("$host", "$username", "$password")or die("cannot connect");
	mysql_select_db("$db_name")or die("cannot select DB");

  $sql="SELECT * FROM $tbl_name WHERE ipadd !='NULL'";
  $result=mysql_query($sql);
  $users = "";
  while($row = mysql_fetch_array($result)){
    $users = $users.$row['username']." <br /> ";
  }
  mysql_close($con);
  echo $users;
?>

