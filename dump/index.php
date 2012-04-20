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
	$str = "<table id='box-table-a'><thead><tr><th>Name</th><th>Description</th></tr></thead><tbody>\n";
	foreach($files as $ind_file)
	{
		if (is_dir("$dir/$ind_file") && $ind_file!="." && $ind_file!=".." )
		{
			$str = $str."<tr><td><a href='$dir"."/".$ind_file."'>$ind_file</td><td>Its a Directory</td></tr>\n";
			copy ("./index.php", "$dir/$ind_file/index.php");
			$statFile = fopen("$dir/$ind_file/stat",'w') or die("can't create stat");
			fwrite($statFile, " ");
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
	$up = "<html>  <head>    <?php      include('/aceatcmrit.net/ip.php');      unau_if_not_logged_in();    ?>    <style type='text/css'>      label{	      color: #808080;	      font-size: big;	      border: none;      }      div.search{      border:2px solid;      border-radius:25px;      -moz-border-radius:25px; /* Firefox 3.6 and earlier */      }      #box-table{        font-family:'Lucida Sans Unicode', 'Lucida Grande', Sans-Serif;        font-size:12px;        width:480px;        text-align:left;        border-collapse:collapse;        margin:20px;      }    </style>        <link rel='stylesheet' href='/aceatcmrit.net/css/style.css' type='text/css' media='screen' />    <link rel='stylesheet' href='/aceatcmrit.net/css/ResultsTable.css' type='text/css' media='screen' />        <title>ACE-Association of Computer Engineers, CSE, CMRIT</title>  </head>  <body>  <div id='container'>						<div id='header'>				<div>					<a href='/aceatcmrit.net/logout.php' style='font-size:small;float:right'><font color='white'>Logout</font></a>									<h1><span></span></h1>					<a href='/aceatcmrit.net/index.php' class=''><img src='/aceatcmrit.net/img/ace1.png' alt='ace logo' /></a>				</div>			</div>			<br />  <div id='content' align='center'>";
	$down = "<div id='footer' align='left' style='position:absolute;top:100%;width:100%' >				<div>					<p class='left'>						Copyright 2011						<br />						Association of Computer Engineers, CMRIT					</p>				</div>    </div><!--    footer-->    </div><!--    content-->    </div><!--    container-->  </body></html>";
	fwrite($fh, $up);
	fwrite($fh, $str);
	fwrite($fh, $down);	
	fclose($fh);
	header("location:content.html");	
}
else
{
	echo "bingo";
	header("location:content.html");	
}


?>
