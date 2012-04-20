<html>
<head>
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
</head>
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
			print("
		<ul id='archive'>
			");
			while (false !== ($file = readdir($handle)))
				if ($file != '.' && $file != '..') {
					//echo "<a href="" target=" ">$file</a> </br> ";
					print("
			<li>
				");
					print("<a href=' ./events.php?id=$file'>$file</a>");
					print("
			</li>
			");
				}
			closedir($handle);

		}
		print("
		</ul>
		");
		?> <h3>Updates</h3>
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
		</html>
