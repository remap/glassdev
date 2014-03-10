<?php
	$uid = $_POST['uid'];

  	include_once("common.php");

	if ($uid == "b8b35a24ee47885a")
		$result = mysql_query("SELECT * FROM brain WHERE blank ='1'") or die(mysql_error());  
	else
		$result = mysql_query("SELECT * FROM brain WHERE blank ='2'") or die(mysql_error());  

	// Query Every Phrase into a phrase array
	while($row = mysql_fetch_array($result))
	{
		$phrase = $row['phrase'];
	}

	unset($_POST);
	//}
	echo $phrase;
    mysql_close($con);
?>