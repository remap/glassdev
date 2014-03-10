<?php 
    $score = $_POST['score']/100;

    include_once("common.php");

    $result = mysql_query("INSERT INTO dial (dialID, dialScore, dialTime) 
                            VALUES (NULL, $score, CURRENT_TIMESTAMP);") or die(mysql_error());
    mysql_close($con);
?>
