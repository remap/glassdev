<?php 
    include_once("common.php");

    $result = mysql_query("SELECT AVG( ds ) AS score, COUNT(ds) as cnt FROM ( SELECT dialScore AS ds FROM dial WHERE dialTime > now() - INTERVAL 10 SECOND LIMIT 25) AS S") or die(mysql_error());
    $score = .5;
    $cnt = 0;
    while($row = mysql_fetch_array($result))
    {
        $score = $row['score'];
        $cnt = $row['cnt'];
    }
    // make sure there are dial entries.
    if ($cnt > 0)
    	echo $score;
	else
		echo .5;

    mysql_close($con);
?>