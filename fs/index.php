<html>
  <head>
    <?php
      include("../ip.php");
      unau_if_not_logged_in();
    ?>
    <style type="text/css">
      label{
	      color: #808080;
	      font-size: big;
	      border: none;
      }
      div.search
      {
      border:2px solid;
      border-radius:25px;
      -moz-border-radius:25px; /* Firefox 3.6 and earlier */
      }
    </style>
    
    <link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="../css/tablestyle.css"> 
    <script src="./js/tagcanvas.js" type="text/javascript"></script>
    <script type="text/javascript">
    
    var tagCount=0;
    window.onload = function() {
        TagCanvas.textColour = '#000000';
        TagCanvas.outlineColour = '#ff9999';
        TagCanvas.freezeActive = true;
        try {
          TagCanvas.Start('myCanvas');
         } catch(e) {
          document.getElementById('myCanvasContainer').style.display = 'none';
         }
       };
       
       function tagClicked(tagName){
        tagCount=(tagCount+1)%4;
        if(tagCount==0)
        {
        tagCount++;
        }
        var lab = document.getElementById('tag'+tagCount);
        lab.value=tagName;
       }
       
       function doSearch(){
          document.getElementById('searchForm').submit();
       }
      function validate()
      {
        if( !document.getElementById('up').value ||
            !document.getElementById('ti').value ||
            !document.getElementById('na').value ||
            !document.getElementById('ud').value ||
            !document.getElementById('ta').value
        )
          {
            alert('Please enter all data...');
            return;
          }
        else
          document.getElementById('upload-form').submit();
      }
     </script>   
       
    <title>ACE-Association of Computer Engineers, CSE, CMRIT</title>
  </head>  
  <body>
  <div id="container">
			
			<div id="header">
				<div>
					<a href="../logout.php" style="font-size:small;float:right"><font color="white">Logout</font></a>				
					<h1><span></span></h1>
					<a href="../index.php" class=""><img src="../img/ace1.png" alt="ace logo" /></a>
					<ul id="mainNav">
						<li>
							<a href="../index.php">Home</a>
						</li>
						<li>
							<a href="../shout">Shout</a>
						</li>
						<li>
							<a href="../dump">FileDump</a>
						</li>
				 </ul>
				</div>
			</div>   <br /> <br />
			
			<div id="content" style="align:down">
        <div id="left">
			    <form id="upload-form" action="upload.php" enctype="multipart/form-data" method="post">
			        <table width="60%" align="center" style="background-color:#eee" >
               	 <tr>
               	   <td align="right"><label>File:</label></td><td><input id="up" name="uploaded" type="file" /></td>
                   <td align="right"><label>Title:</label></td><td><input id="ti" name="title" type="text" /></td>
                   <td align="right"><label>Author:</label></td><td><input id="na" name="author" type="text" /></td>
                   <td rowspan="2" ><button style="width:100%" onclick="validate()"><img src="./img/upload-icon.png"  Opacity="0.0" height="60" width="60" align="center"></button></td>
                 </tr>
                 <tr>
                   <td align="right"><label>Uploader:</label></td><td><input id="ud" name="uploader" type="text" /></td>
                   <td align="right"><label>Tags:</label></td><td><input id="ta" name="tags" type="text" /></td>
                   <td align="right"><label>Description:</label></td><td><input id="ta" name="tags" type="text" /></td>
                 </tr>
              </table>
           </form>
       </div>
       
      
       <table border=1px width="66%" height="100%" cellpadding="1" class="table2" align="center">
       <tbody>
        <tr>
           <td width="40%">
            <div id="myCanvasContainer">
              <canvas id="myCanvas" width="250" height="250">
              <ul>
                <?php
                    $con = mysql_connect("localhost","root","");
                    if (!$con)
                      {
                        die('Could not connect: ' . mysql_error());
                      }
                    else
                      echo "connected";
                    mysql_select_db("FS", $con);
                    $result = mysql_query("SELECT * FROM tags");
                    if (!$result)
                      {
                        die('Could not get result: ' . mysql_error());
                      }
                    while($row = mysql_fetch_array($result))
                    {
                      echo $row['Name']; 
                      echo "<li><a onclick=\"tagClicked('" . $row['Name'] . "')\">" . $row['Name'] . "</a></li>";
                    }
                    mysql_close($con);
                ?>
                </ul>
           </canvas>
         </div>
      </td>
      
      <td align="center" width="40%">
         <div id="selected tags">
          <table width="80%">
            <form action="./results.php" method="get" id="searchForm">
              <tr><td><label>Tag 1:</label></td><td><input style="float:right" type="text" id="tag1" name="tag1" /></td></tr>
              <tr><td><label>Tag 2:</label></td><td><input style="float:right" type="text" id="tag2" name="tag2" /></td></tr>
              <tr><td><label>Tag 3:</label></td><td><input style="float:right" type="text" id="tag3" name="tag3" /></td></tr>
              <tr><td><label>Title:</label></td><td><input style="float:right" type="text" name="title" /></td></tr>
              <tr><td><label>Author:</label></td><td><input style="float:right" type="text" name="author" /></td></tr> 
              <tr><td><label>Uploader:</label></td><td><input style="float:right" type="text" name="uploader" /></td></tr>
            </form>
           </table>
         </div>
      </td> 
      
      <td>
        <button style="width:80%" id="searchButton" onclick='doSearch()'><img src="./img/search.png" height="80" width="80"></button><br />
        <button style="width:80%" id="searchButton" onclick="window.location.replace('./index.php');"><img src="./img/reset.png" height="80" width="80"></button>        
      </td>      
      
      </tbody>
    </table>
    </div>
   <div id="footer" style="position:absolute;top:100%;width:100%" >
				<div>
					<p class="left">
						Copyright 2011
						<br />
						Association of Computer Engineers, CMRIT
					</p>
				</div>
	 	</div>

    </div> <!--end of container -->
	</body>
</html>

