<?php
	$uid = $_GET['uid'];
  	include_once("common.php");
  	$phrase;
	$result = mysql_query("SELECT * FROM glass WHERE gtype = '$uid' ORDER BY gid DESC Limit 1") or die(mysql_error());  
	//f63b73e7988c018f
	// Query Every Phrase into a phrase array
	while($row = mysql_fetch_array($result))
	{
		$phrase = $row['gphrase'];
	}
	unset($_GET);

	echo stripslashes($phrase);
	//}
    mysql_close($con);
?>
