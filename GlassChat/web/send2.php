<?php 
    $phrases = array();
    $current = -1;
    $cnt = 1;
    $type = $_POST['type'];
    $knob = $_POST['knob'];
    $word = addslashes($_POST['phrase']); //delim: @@@@****@@@@
    $sqlID;
    $sqlPhrase;
    $intent = array();

    // insert all the intentions into an arary
    if (!empty($_POST['int1']) && $_POST['int1'] == "1")
        array_push($intent, 1);
    if (!empty($_POST['int2']) && $_POST['int2'] == "2")
        array_push($intent, 2);
    if (!empty($_POST['int3']) && $_POST['int3'] == "3")
        array_push($intent, 3);
    if (!empty($_POST['int4']) && $_POST['int4'] == "4")
        array_push($intent, 4);
    if (!empty($_POST['int5']) && $_POST['int5'] == "5")
        array_push($intent, 5);
    if (!empty($_POST['int6']) && $_POST['int6'] == "6")
        array_push($intent, 6);
    if (!empty($_POST['int7']) && $_POST['int7'] == "7")
        array_push($intent, 7);
    if (!empty($_POST['int8']) && $_POST['int8'] == "8")
        array_push($intent, 8);
    if (!empty($_POST['int9']) && $_POST['int9'] == "9")
        array_push($intent, 9);
    if (!empty($_POST['int10']) && $_POST['int10'] == "10")
        array_push($intent, 10);
    if (!empty($_POST['int11']) && $_POST['int11'] == "11")
        array_push($intent, 11);
    if (!empty($_POST['int12']) && $_POST['int12'] == "12")
        array_push($intent, 12);

    // choose one of the intentions
    $rand = rand ( 0, count($intent)-1);

    // connect to database
    include_once("common.php");

    // retrieves sql
    $result = random_row('brain_classified_tweets', 'id', $intent[$rand]);
   
    // pull id and phrase
    while($row = mysql_fetch_array($result))
    {
        $sqlID = $row['id'];
        $sqlPhrase = $row['phrase'];
    }   
    
    // print phrase to admin page
    echo $sqlPhrase;

    // code that will cut the time to find a random row to const time.
    function random_row($table, $column, $intent) {
      $max_sql = "SELECT max(" . $column . ") 
                  AS max_id
                  FROM " . $table;
      $max_row = mysql_fetch_array(mysql_query($max_sql));
      $random_number = mt_rand(1, $max_row['max_id']);
      $random_sql = "SELECT * FROM " . $table . "
                     WHERE " . $column . " >= " . $random_number . " 
                     AND intentionID = " . $intent . " 
                     ORDER BY " . $column . " ASC
                     LIMIT 1";
      $random_row = mysql_fetch_row(mysql_query($random_sql));

      if (!is_array($random_row)) {
          $random_sql = "SELECT * FROM " . $table . "
                         WHERE " . $column . " < " . $random_number . " 
                         AND intentionID = " . $intent . " 
                         ORDER BY " . $column . " DESC
                         LIMIT 1";
        //$random_row = (mysql_query($random_sql));
        return mysql_query($random_sql);
      }
      return mysql_query($random_sql);
   }

    function random_0_1()
    {   // auxiliary function
        // returns random number with flat distribution from 0 to 1
        return (float)rand()/(float)getrandmax();
    }
	$safe = addslashes ( $sqlPhrase);
	$q = "INSERT INTO glass(gid, gphrase, gtype, gtime) VALUES (NULL,'$safe' , '$type', NULL);";
	error_log("query is ".$q);
    $result = mysql_query($q);
    error_log("inserted ok ?".$result);
    
    if (!$result){
    	 echo("failed to update glass");
    	 } else { echo $sqlPhrase;}
    
    mysql_close($con);
?>
