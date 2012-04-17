<?PHP

$user_name = "root";
$password = "";
$database = "FS";
$server = "localhost";

$db_handle = mysql_connect($server, $user_name, $password);
$db_found = mysql_select_db($database, $db_handle);
if(isset($_GET['tag1']))
  $searchTag1 = $_GET['tag1'];
else
    $searchTag1 = "";
if(isset($_GET['tag2']))
  $searchTag2 = $_GET['tag2'];
else
    $searchTag2 = "";
if(isset($_GET['tag3']))
  $searchTag3 = $_GET['tag3'];
else
    $searchTag3 = "";



if(isset($_GET['title']))
  $title = $_GET['title'];
else
    $title = "";
if(isset($_GET['author']))
  $author = $_GET['author'];
else
    $author = "";
if(isset($_GET['uploader']))
  $uploader = $_GET['uploader'];
else
    $uploader = "";

if (!$db_found) {
  print "Database NOT Found "."</br>";
}
$query = "select * from content";
$data=mysql_query($query);
echo "<table class='table2' border='1'>";
echo '<link rel="stylesheet" type="text/css" href="../css/tablestyle.css"> ';
print "<thead><tr width='1px'><th>Title</th><th>Author</th><th>Uploader</th><th>Tags</th><th>Link</th></tr></thead><tbody>";
while($info = mysql_fetch_array( $data )) 
 { 
  $tagsOfFile = $info['tags'];
  $tiOfFile = $info['title'];    
  $auOfFile = $info['author'];
  $upOfFile = $info['uploader'];      
  if(!((stristr($tagsOfFile,$searchTag1)||$searchTag1=='') &&
      (stristr($tagsOfFile,$searchTag2)||$searchTag2=='') &&
      (stristr($tagsOfFile,$searchTag3)||$searchTag3=='') &&
      (stristr($tiOfFile,$title)||$title=='') &&
      (stristr($auOfFile,$author)||$author=='') &&
      (stristr($upOfFile,$uploader)||$uploader=='')))
    continue;
   print "<tr>";
   print "<td>".$info['title'] ."</td> ";
   print "<td>".$info['author'] ."</td> "; 
   print "<td>".$info['uploader'] ."</td> "; 
   print "<td>".$info['tags'] ."</td> "; 
   $link=$info['link']; 
   print "<td>";
   print "<a href='$link'>download</a><br>";
   print "</td></tr>";
}

echo "</tbody></table>";
mysql_close($db_handle);

?>


