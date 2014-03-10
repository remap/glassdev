<?php 
	include_once("common.php");

    $result = mysql_query("truncate table dial") or die(mysql_error());
    
    if ($result){
        echo "Votes Cleared!";
    }else{
        echo "Votes Removed!";
    }
    mysql_close($con);
?>
