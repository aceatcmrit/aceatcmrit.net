
<?php
$dir = '.';
$files = scandir($dir);
$size = sizeof($files);
$myStat = "stat";
$fs = fopen($myStat, 'r') or die("can't open stat");
$size_val = fread($fh, filesize($fs));
fclose($fs);
if($size != $size_val)
{
	$fs = fopen($myStat, 'w') or die("can't write to stat");	
	fwrite($fs, $size);
	fclose($fs);
	$myFile = "content.html";
	$fh = fopen($myFile, 'w') or die("can't open content.html");	
	$str = "<link rel='/'>";
	$str = $str."<table id='#box-table-a' border='1'><thead><tr><th>Name</th><th>Description</th></tr></thead><tbody>\n";
	foreach($files as $ind_file)
	{
		if (is_dir("$dir/$ind_file") && $ind_file!="." && $ind_file!=".." )
		{
			$str = $str."<tr><td><a href='$dir"."/".$ind_file."'>$ind_file</td><td>Its a Directory</td></tr>\n";
			copy ("./index.php", "$dir/$ind_file/index.php");
			$statFile = fopen("$dir/$ind_file/stat",'w') or die("can't create stat");
			fwrite($statFile, " ");
#			chmod("$dir/$ind_file/$myStat", 777);
			fclose($statFile);
		}
	}
	foreach($files as $ind_file)
	{
		if (!is_dir("$dir/$ind_file"))
		{
			$str = $str."<tr><td><a href='$dir"."/".$ind_file."'>$ind_file</td><td>Its a File</td></tr>\n";
		}
	}
	$str = $str."</tbody></table>";
	fwrite($fh, $str);
	fclose($fh);
	header("location:content.html");	
}
else
{
	echo "bingo";
	header("location:content.html");	
}


?>
