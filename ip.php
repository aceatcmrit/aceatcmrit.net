<?
function ip_addr()
{
  return $_SERVER['REMOTE_ADDR'];
}  

function unau_if_not_logged_in()
{
  $ip=ip_addr();
  $host="localhost"; // Host name
	$username="root"; // Mysql username
	$password=""; // Mysql password
	$db_name="FS"; // Database name
	$tbl_name="details"; // Table name
	mysql_connect("$host", "$username", "$password")or die("cannot connect");
	mysql_select_db("$db_name")or die("cannot select DB");
	$query = "select * from $tbl_name where ipadd='$ip'";
	
	$result=mysql_query($query);
  $count=mysql_num_rows($result);
  if($count==0)
    {
      $URL="/aceatcmrit.net/index.php?msg=Please login first"; 
      header ("Location: $URL"); 
      return FALSE;
    }
  return TRUE;    
}  

?>


