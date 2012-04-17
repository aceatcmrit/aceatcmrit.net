<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US"> 
<head> 
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
	<title>CMR-Code-Club</title> 
	<link rel="stylesheet" href="style.css" /> 
	<script type="text/javascript">
		function change(src){
			document.getElementById("ifr").src=src;
		}
	</script>
	<link rel="icon" type="image/png" href="./img/favicon.png">
</head> 
<body> 
<div align="center" class="title-area">
	<h1>The CMR Codeclub</h1>
</div>

<!-- Menu Start --> 
<div id="jQ-menu" class="dir-tree"> 
 
<?php
	$path = "./docs/";
	function createDir($path = '.')
	{	
		$queue[]=null;
		if ($handle = opendir($path)) 
		{
			echo "<ul>";
			
			while (false !== ($file = readdir($handle))) 
			{
				if (is_dir($path.$file) && $file != '.' && $file !='..')
					printSubDir($file, $path, $queue);
				else if ($file != '.' && $file !='..')
					$queue[] = $file;
			}
			
			printQueue($queue, $path);
			echo "</ul>";
		}
	}
	
	function printQueue($queue, $path)
	{
		foreach ($queue as $file) 
		{
			printFile($file, $path);
		} 
	}
	
	function printFile($file, $path)
	{
		echo "<li><a onclick='change(\"$path$file\")'>$file</a></li>";
	}
	
	function printSubDir($dir, $path)
	{
		echo "<li><span class=\"toggle\">$dir</span>";
		createDir($path.$dir."/");
		echo "</li>";
	}
	
	createDir($path);
?>

<a style="position:absolute;bottom:0%;left:5%;"href="upload-form.php">>Upload file</a>
</div> 


<iframe src= "./docs/welcome" class="content-area" id="ifr">
</iframe>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script> 
<script type="text/javascript" src="jquery.color.js"></script> 
<script type="text/javascript" src="jMenu.js"></script> 
 
</body> 
</html> 
