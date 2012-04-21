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
		<?php
		$dir = dir("./events");
		//List files in events directory
		while (($file = $dir -> read()) !== false) {
			if ($file != '.' && $file != '..') {
				$file1 = $_GET["id"];				
				$imgArray[] = "<a href='gallery.php?id=" . $file . "'><img src='./events/" . $file . "/img.jpg' border=1 height=100 width=100 ></a>";
			}
		}
		$dir -> close();
		?>
	</head>
	<body>
		<div id="container">
			<div id="header">
				<div>
					<a href="logout.php" style="font-size:small;float:right"><font color="white">Logout</font></a>
					<h1><span></span></h1>
					<a href="index.php" class=""><img src="img/ace1.png" alt="ace logo" /></a>
					<ul id="mainNav">
						<li>
							<a href="index.php">Home</a>
						</li>
						<li>
							<a href="events.php">Events</a>
						</li>
						<li class="on">
							<a href="gallery.php">Gallery</a>
						</li>
						<li>
							<a href="speakers.php">Speakers</a>
						</li>
						<li>
							<a href="shout">Shout</a>
						</li>
						<li>
							<a href="about.php">About</a>
						</li>
						<li>
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
						<h2>Gallery</h2>
						<div>
							<div>
								<!--script------------------------------------------------------------------------------------------------------->
								<script type="text/javascript">
																		/***********************************************
									* Conveyor belt slideshow script- © Dynamic Drive DHTML code library (www.dynamicdrive.com)
									* This notice MUST stay intact for legal use
									* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
									***********************************************/

									//Specify the slider's width (in pixels)
									var sliderwidth="820px"
									//Specify the slider's height
									var sliderheight="110px"
									//Specify the slider's slide speed (larger is faster 1-10)
									var slidespeed=1
									//configure background color:
									slidebgcolor="#EAEAEA"

									//Specify the slider's images
									var leftrightslide=new Array();
									var finalslide='';
									//get thumbs from events folders
									leftrightslide=["<?php echo join("\", \"", $imgArray);?>
										"];
										//Specify gap between each image (use HTML):
										var imagegap = " "

										//Specify pixels gap between each slideshow rotation (use integer):
										var slideshowgap = 5

										////NO NEED TO EDIT BELOW THIS LINE////////////

										var copyspeed = slidespeed
										leftrightslide = '<nobr>' + leftrightslide.join(imagegap) + '</nobr>'
										var iedom = document.all || document.getElementById
										if(iedom)
											document.write('<span id="temp" style="visibility:hidden;position:absolute;top:-100px;left:-9000px">' + leftrightslide + '</span>')
										var actualwidth = ''
										var cross_slide, ns_slide

										function fillup() {
											if(iedom) {
												cross_slide = document.getElementById ? document.getElementById("test2") : document.all.test2
												cross_slide2 = document.getElementById ? document.getElementById("test3") : document.all.test3
												cross_slide.innerHTML = cross_slide2.innerHTML = leftrightslide
												actualwidth = document.all ? cross_slide.offsetWidth : document.getElementById("temp").offsetWidth
												cross_slide2.style.left = actualwidth + slideshowgap + "px"
											} else if(document.layers) {
												ns_slide = document.ns_slidemenu.document.ns_slidemenu2
												ns_slide2 = document.ns_slidemenu.document.ns_slidemenu3
												ns_slide.document.write(leftrightslide)
												ns_slide.document.close()
												actualwidth = ns_slide.document.width
												ns_slide2.left = actualwidth + slideshowgap
												ns_slide2.document.write(leftrightslide)
												ns_slide2.document.close()
											}
											lefttime = setInterval("slideleft()", 30)
										}


										window.onload = fillup

										function slideleft() {
											if(iedom) {
												if(parseInt(cross_slide.style.left) > (actualwidth * (-1) + 8))
													cross_slide.style.left = parseInt(cross_slide.style.left) - copyspeed + "px"
												else
													cross_slide.style.left = parseInt(cross_slide2.style.left) + actualwidth + slideshowgap + "px"
												if(parseInt(cross_slide2.style.left) > (actualwidth * (-1) + 8))
													cross_slide2.style.left = parseInt(cross_slide2.style.left) - copyspeed + "px"
												else
													cross_slide2.style.left = parseInt(cross_slide.style.left) + actualwidth + slideshowgap + "px"
											} else if(document.layers) {
												if(ns_slide.left > (actualwidth * (-1) + 8))
													ns_slide.left -= copyspeed
												else
													ns_slide.left = ns_slide2.left + actualwidth + slideshowgap
												if(ns_slide2.left > (actualwidth * (-1) + 8))
													ns_slide2.left -= copyspeed
												else
													ns_slide2.left = ns_slide.left + actualwidth + slideshowgap
											}
										}

										if(iedom || document.layers) {
											with(document) {
												document.write('<table border="0" cellspacing="0" cellpadding="0"><td>')
												if(iedom) {
													write('<div style="position:relative;width:' + sliderwidth + ';height:' + sliderheight + ';overflow:hidden">')
													write('<div style="position:absolute;width:' + sliderwidth + ';height:' + sliderheight + ';background-color:' + slidebgcolor + '" onMouseover="copyspeed=0" onMouseout="copyspeed=slidespeed">')
													write('<div id="test2" style="position:absolute;left:0px;top:0px"></div>')
													write('<div id="test3" style="position:absolute;left:-1000px;top:0px"></div>')
													write('</div></div>')
												} else if(document.layers) {
													write('<ilayer width=' + sliderwidth + ' height=' + sliderheight + ' name="ns_slidemenu" bgColor=' + slidebgcolor + '>')
													write('<layer name="ns_slidemenu2" left=0 top=0 onMouseover="copyspeed=0" onMouseout="copyspeed=slidespeed"></layer>')
													write('<layer name="ns_slidemenu3" left=0 top=0 onMouseover="copyspeed=0" onMouseout="copyspeed=slidespeed"></layer>')
													write('</ilayer>')
												}
												document.write('</td></table>')
											}
										}
								</script>
								<!------------------------------------------------------------------------------------------------------------------------->
								<?php
								$file1 = $_GET["id"];
		
								if($file1==null)
								{
									$file1='FOSS philosophy';
								}
								$imagepath = "./events/" . $file1 . "/img.jpg";
								printf("<img src='$imagepath' width='200' height='200' />");
								?>
								<embed type="application/x-shockwave-flash"
								src="https://picasaweb.google.com/s/c/bin/slideshow.swf" width="288"
								height="192"
								flashvars="
								<?php

								$slideshowFile = "./events/" . $file1 . "/flashvars.txt";
								$slideshowData = fopen($slideshowFile, 'r');
								$flashvars = fread($slideshowData, filesize($slideshowFile) - 1);
								echo $flashvars;
								?>
								"
								pluginspage="http://www.macromedia.com/go/getflashplayer"></embed>
							</div>
						</div>
					</div>
				</div>
				<iframe style="overflow-y:hidden;position:absolute;right:0%;border-style:none" src="./right.php" name="rightiFrame" width="450px" height="800px">
				</iframe>
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
