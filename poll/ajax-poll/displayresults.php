<?php
require("db.php");
//GETTING VARIABLES START
if (isset($_POST['action'])) {
	$action 		= mysql_real_escape_string($_POST['action']);
}
if (isset($_POST['pollAnswerID'])) {
	$pollAnswerID	= mysql_real_escape_string($_POST['pollAnswerID']); 
}
//GETTING VARIABLES END


function getPoll($pollID){
	$query  = "SELECT * FROM polls LEFT JOIN pollanswers ON polls.pollID = pollanswers.pollID WHERE polls.pollID = " . $pollID . " ORDER By pollAnswerListing ASC";
	$result = mysql_query($query);
	//echo $query;jquery
	
	$pollStartHtml = '';
	$pollAnswersHtml = '';
	
	
	while($row = mysql_fetch_array($result, MYSQL_ASSOC))
	{
		$pollQuestion 		= $row['pollQuestion'];	
		$pollAnswerID 		= $row['pollAnswerID'];	
		$pollAnswerValue	= $row['pollAnswerValue'];
		
		if ($pollStartHtml == '') {
			$pollStartHtml 	= '<div ><form name="pollForm" method="post" action="./poll/ajax-poll/inc/functions.php?action=vote"><h3>' . $pollQuestion .'</h3><ul>';
			$pollEndHtml 	= '</ul><input type="submit" name="pollSubmit" id="pollSubmit"  action="./poll/ajax-poll/inc/functions.php?action=vote" value="Vote" /> <input type="submit" name="pollView" id="pollView"  action="./poll/ajax-poll/inc/functions.php?action=view" value="View" /> <span id="pollMessage"></span><img src="./img/ajaxLoader.gif" alt="Ajax Loader" id="pollAjaxLoader" /></form></div>';	
		}
		$pollAnswersHtml	= $pollAnswersHtml . '<li><input name="pollAnswerID" id="pollRadioButton' . $pollAnswerID . '" type="radio" value="' . $pollAnswerID . '" /> ' . $pollAnswerValue .'<span id="pollAnswer' . $pollAnswerID . '"></span></li>';
		$pollAnswersHtml	= $pollAnswersHtml . '<li class="pollChart pollChart' . $pollAnswerID . '"></li>';
	}
	echo $pollStartHtml . $pollAnswersHtml . $pollEndHtml;
}

function getPollID($pollAnswerID){
	$query  = "SELECT pollID FROM pollanswers WHERE pollAnswerID = ".$pollAnswerID." LIMIT 1";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	
	return $row['pollID'];	
}

function getPollResults($pollID){
	$colorArray = array(1 => "#ffcc00", "#00ff00", "#cc0000", "#0066cc", "#ff0099", "#ffcc00", "#00ff00", "#cc0000", "#0066cc", "#ff0099");
	$colorCounter = 1;
	$query  = "SELECT pollAnswerID, pollAnswerPoints FROM pollanswers WHERE pollID = ".$pollID."";
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result))
	{
		if ($pollResults == "") {
			$pollResults = $row['pollAnswerID'] . "|" . $row['pollAnswerPoints'] . "|" . $colorArray[$colorCounter];
		} else {
			$pollResults = $pollResults . "-" . $row['pollAnswerID'] . "|" . $row['pollAnswerPoints'] . "|" . $colorArray[$colorCounter];
		}
		$colorCounter = $colorCounter + 1;
	}
	$query  = "SELECT SUM(pollAnswerPoints) FROM pollanswers WHERE pollID = ".$pollID."";
	$result = mysql_query($query);
	$row = mysql_fetch_array( $result );
	$pollResults = $pollResults . "-" . $row['SUM(pollAnswerPoints)'];
	echo $pollResults;	
}


//VOTE START
if ($action == "vote"){
	
	if(isset($_COOKIE['cookie']))
 		{
			getPollResults(1);
 		} 
		 else {
		$query  = "UPDATE pollanswers SET pollAnswerPoints = pollAnswerPoints + 1 WHERE pollAnswerID = ".$pollAnswerID."";
		mysql_query($query) or die('Error, insert query failed');
		$month = 600 + time(); 
 		setcookie("cookie", '1', $month);
		getPollResults(1);
	}
}
//VOTE END

if (mysql_real_escape_string($_GET['cleanCookie']) == 1){
	setcookie("poll1", "", time()+3600, "/", ".webresourcesdepot.com");
	header('Location: http://webresourcesdepot.com/wp-content/uploads/file/ajax-poll-script/');
}
?>
