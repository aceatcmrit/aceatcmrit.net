<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	    <?php
        include("./ip.php");
        unau_if_not_logged_in();        
      ?>	
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="css/style.css" type="text/css"
		media="screen" />
		<!--[if IE]>
		<link href="css/ie.css" rel="stylesheet" type="text/css" />
		<![endif]-->
		<title>ACE-Association of Computer Engineers, CSE, CMRIT</title>
		<script type="text/javascript"></script>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<div>
					<h1><span></span></h1>
					<a href="logout.php" style="font-size:small;float:right"><font color="white">Logout</font></a>
					<a href="index.php" class=""><img src="img/ace1.png" alt="ace logo" /></a>
					<ul id="mainNav">
						<li>
							<a href="index.php">Home</a>
						</li>
						<li>
							<a href="events.php">Events</a>
						</li>
						<li>
							<a href="gallery.php">Gallery</a>
						</li>
						<li>
							<a href="speakers.php">Speakers</a>
						</li>
						<li>
							<a href="forum">Forums</a>
						</li>
						<li>
							<a href="about.php">About</a>
						</li>
						<li class="on">
							<a href="members.php">Members</a>
						</li>
						<li>
							<a href="contact.php">Contact</a>
						</li>
					</ul>
				</div>
			</div>
			<div id="content">
				<div id="left">
					<div>
						<h2>ACE Members</h2>
						<div id="intro">
							<div>
								<?php
								$dir = dir("./members");
								//List files in members directory
								while (($file = $dir -> read()) !== false) {

									if ($file != '.' && $file != '..') {
										echo "<img width='730' height='400' src='./members/$file' alt=$file/><br/>";
									}
								}
								$dir -> close();
								?>
							</div>
						</div>
					</div>
				</div>
				<div id="right">
					<form id="search" action="#">
						<fieldset>
							<legend>
								Search
							</legend>
							<input type="text" name="text"
							id="text" value="Search" />
							<button type="submit" class="btn">
								Go <img src="img/bullet_magnify.png"
								alt="search image" />
							</button>
						</fieldset>
					</form>
					<h3>Events</h3>
					<?php
					if ($handle = opendir('./events')) {
						print("<ul id='archive'>");
						while (false !== ($file = readdir($handle)))
							if ($file != '.' && $file != '..') {
								//echo "<a href="" target=" ">$file</a> </br> ";
								print("<li>");
								print("<a href='./events.php?id=$file '>$file</a>");
								print("</li>");
							}
						closedir($handle);

					}
					print("</ul>");
					?>
					<h3>Updates</h3>
					<MARQUEE direction="up" height="180" scrolldelay="20"
					scrollamount="2" behavior="scroll" loop="0" class="postit"
					id="Marquee2" onMouseOver="this.stop()" onMouseOut="this.start()">
						<ul id="category">
							<?php

							$updatesFile = "./updates.txt";
							$updatesData = fopen($updatesFile, 'r');
							$count = 0;
							echo "
							<li>
								";
							while ($count < filesize($updatesFile) - 1)
							 {
									$char = fread($updatesData, 1);
								if ($char == "$")
									echo "</li><br/><li>";
								else
									echo $char;
								$count = $count + 1;
							}
							echo "
							</li>
							";
							?>
						</ul>
					</marquee>
					<div>
						&nbsp;
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
	</body>
</html>
