<?php 
    // These variables define the connection information for your MySQL database 
    
    $root = $_SERVER['DOCUMENT_ROOT'];
    require($root."/gb/db.php");
    $con = mysql_connect($host, $username, $password);
    if (!$con) {
        die('Could not connect: ' . mysql_error());
    }
    mysql_select_db($database) or die("Unable to select database");
?>

