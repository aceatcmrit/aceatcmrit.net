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
      div.search{
      border:2px solid;
      border-radius:25px;
      -moz-border-radius:25px; /* Firefox 3.6 and earlier */
      }
      #box-table{
        font-family:"Lucida Sans Unicode", "Lucida Grande", Sans-Serif;
        font-size:12px;
        width:480px;
        text-align:left;
        border-collapse:collapse;
        margin:20px;
      }
    </style>
    
    <link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../css/ResultsTable.css" type="text/css" media="screen" />    
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
			<br />
			<div id="content">
        <div>
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
        ?>
        <div align="center" style="height:440px;overflow:auto;" id="table-div" width="100%">
      <table id="box-table-a">
      <thead>
        <tr width='1px'>
          <th>Title</th>
          <th>Description</th>
          <th>Rating</th>
          <th>Tags</th>
          <th>Author</th>
          <th>Uploader</th>
          <th>Link</th>
        </tr>
      </thead>
      <tbody>
        <? 
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
             print "<td>".$info['description'] ."</td> ";
             print "<td>".$info['rating'] ."</td> "; 
             print "<td>".$info['tags'] ."</td> "; 
             print "<td>".$info['author'] ."</td> "; 
             print "<td>".$info['uploader'] ."</td> "; 
             $link=$info['link']; 
             print "<td>";
             print "<a href='$link'>download</a><br>";
             print "</td></tr>";
          }
          mysql_close($db_handle);
        ?>
    </tbody>
    </table>
    </div><!--table div-->
    </div><!--    left-->
    <div id="footer" style="position:absolute;top:100%;width:100%" >
				<div>
					<p class="left">
						Copyright 2011
						<br />
						Association of Computer Engineers, CMRIT
					</p>
				</div>
    </div><!--    footer-->
    </div><!--    content-->
    </div><!--    container-->
  </body>
</html>
