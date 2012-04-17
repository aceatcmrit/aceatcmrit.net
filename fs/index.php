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
        tagCount++;
        var lab = document.getElementById('tag'+tagCount);
        lab.value=tagName;
       }
       function doSearch(){
          document.getElementById('searchForm').submit();
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
				</div>
			</div>
			<div id="content">
<!--    <img src="../img/black.png" style="float:left" width="1px" height="300px" />-->
  <table id="main-table" width="100%" height="60%">
    <tr>
    <td>
    <!-- Search form  -->
    <table border=1px width="300" height="100%" cellpadding="1" class="table2">
      <tbody>
        <tr><td>
          Choose tags:
        </td></tr>
        
        <tr><td>
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
      </td></tr>

      <tr align="center"><td>
        <div id="selected tags">
          <table>
            <form target="search-results" action="./displaydb.php" method="get" id="searchForm">
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

      <tr align="center"><td>
        <button style="width:100%" id="searchButton" onclick='doSearch()'>Search</button>
        <button style="width:100%" id="searchButton" onclick="window.location.replace('./index.php');">Reset</button>        
      </td></tr>      
      </tbody>
    </table>
  </td>
  
  <td>
    <!-- start of result -->
    <iframe width="100%" height="100%" name="search-results" style="float:left" src="./displaydb.php">
    </iframe>
  </td>
  </tr>
  </table>
		</div>

			<div id="footer" style="display:none">
				<div>
					<p class="left">
						Copyright 2011
						<br />
						Association of Computer Engineers, CMRIT
					</p>
				</div>
			</div>
      <!--	footer ends		-->
	</div>
  </body>
</html>
