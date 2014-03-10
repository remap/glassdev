<?php 
    $phrases = array();
    $current = -1;
    $cnt = 1;
    $type = $_POST['type'];
    $knob = $_POST['knob'];
    $word = addslashes($_POST['phrase']); //delim: @@@@****@@@@
    $sqlID;
    $sqlPhrase;

    include_once("common.php");
    $score = knob_score($knob);
/*
    if (!empty($_POST["int1"]) && $_POST["int1"] > 0) {
        $result = mysql_query("SELECT * FROM brain_intention, brain WHERE biIntentionID = 1 AND biID = id AND $score ORDER BY RAND() Limit 1") or die(mysql_error());  
    }
    if (!empty($_POST["int2"]) && $_POST["int2"] > 0) {
       $result = mysql_query("SELECT * FROM brain_intention, brain WHERE biIntentionID = 2 AND biID = id AND $score ORDER BY RAND() Limit 1") or die(mysql_error());  
    }
    if (!empty($_POST["int3"]) && $_POST["int3"] > 0) {
       $result = mysql_query("SELECT * FROM brain_intention, brain WHERE biIntentionID = 3 AND biID = id AND $score ORDER BY RAND() Limit 1") or die(mysql_error());  
    }
    if (!empty($_POST["int4"]) && $_POST["int4"] > 0) {
       $result = mysql_query("SELECT * FROM brain_intention, brain WHERE biIntentionID = 4 AND biID = id AND $score ORDER BY RAND() Limit 1") or die(mysql_error());  
    }
    if (!empty($_POST["int5"]) && $_POST["int5"] > 0) {
       $result = mysql_query("SELECT * FROM brain_intention, brain WHERE biIntentionID = 5 AND biID = id AND $score ORDER BY RAND() Limit 1") or die(mysql_error());  
    }
    if (!empty($_POST["int6"]) && $_POST["int6"] > 0) {
       $result = mysql_query("SELECT * FROM brain_intention, brain WHERE biIntentionID = 6 AND biID = id AND $score ORDER BY RAND() Limit 1") or die(mysql_error());  
    }
    if (!empty($_POST["int7"]) && $_POST["int7"] > 0) {
       $result = mysql_query("SELECT * FROM brain_intention, brain WHERE biIntentionID = 7 AND biID = id AND $score ORDER BY RAND() Limit 1") or die(mysql_error());  
    }
    if (!empty($_POST["int8"]) && $_POST["int8"] > 0) {
       $result = mysql_query("SELECT * FROM brain_intention, brain WHERE biIntentionID = 8 AND biID = id AND $score ORDER BY RAND() Limit 1") or die(mysql_error());  
    }
    if (!empty($_POST["int9"]) && $_POST["int9"] > 0) {
       $result = mysql_query("SELECT * FROM brain_intention, brain WHERE biIntentionID = 9 AND biID = id AND $score ORDER BY RAND() Limit 1") or die(mysql_error());  
    }
    if (!empty($_POST["int10"]) && $_POST["int10"] > 0) {
       $result = mysql_query("SELECT * FROM brain_intention, brain WHERE biIntentionID = 10 AND biID = id AND $score ORDER BY RAND() Limit 1") or die(mysql_error());  
    }
    if (!empty($_POST["int11"]) && $_POST["int11"] > 0) {
       $result = mysql_query("SELECT * FROM brain_intention, brain WHERE biIntentionID = 11 AND biID = id AND $score ORDER BY RAND() Limit 1") or die(mysql_error());  
    }
    if (!empty($_POST["int12"]) && $_POST["int12"] > 0) {
        $result = mysql_query("SELECT * FROM brain_intention, brain WHERE biIntentionID = 12 AND biID = id AND $score ORDER BY RAND() Limit 1") or die(mysql_error());  
    }
*/
    $rand = rand ( 1, 1000000);
    $result = mysql_query("SELECT * FROM brain WHERE id = $rand Limit 1") or die(mysql_error()); 

    while($row = mysql_fetch_array($result))
    {
        $sqlID = $row['id'];
        $sqlPhrase = $row['phrase'];
    }   

    echo $sqlPhrase;

    


    function knob_score($cnt){
        return "score >= ".(($cnt-10)/100)." AND score < ".(($cnt+10)/100);
    }

    function random_0_1()
    {   // auxiliary function
        // returns random number with flat distribution from 0 to 1
        return (float)rand()/(float)getrandmax();
    }

    $result = mysql_query("INSERT INTO glass(gid, gphrase, gtype, gtime) VALUES (NULL, '$sqlPhrase', '$type', NULL);");
        //$result = mysql_query("INSERT INTO log (logID, phraseID, glassID, brainScore, logTime) VALUES (NULL, '$loc', '$type', '$pushScore', CURRENT_TIMESTAMP);") or die(mysql_error());

    /*

    

    // clear!
    if ($type == "c"){
        $result = mysql_query("SELECT * FROM brain WHERE blank > '0'") or die(mysql_error());  
        while($row = mysql_fetch_array($result))
        {
            $phrases[] = $row['id'];

            
        }
        //echo $phrases;
        
        foreach ($phrases as $value) {
            $result = mysql_query("UPDATE brain SET blank='0' WHERE id='$value'") or die(mysql_error());  
        }
    }
    else{ // carry on!...
        $score = knob_score($knob);
        //$score = "score < 1";
        $result = mysql_query("SELECT * FROM brain WHERE $score") or die(mysql_error());  
        // Query Every Phrase into a phrase array
        $idhold = array();
        $match = -1;
        while($row = mysql_fetch_array($result))
        {
            $phrases[] = $row['phrase'];
            $idhold[] = $row['id'];
            $match = 1;
        }
        if ($match > 0){
            $loc = rand(0,count($phrases)-1);


            $result = mysql_query("SELECT * FROM brain") or die(mysql_error());  

            // Query Every Phrase into a phrase array
            while($row = mysql_fetch_array($result))
            {

                $phrases[] = $row['phrase'];
                if ($type == "b8b35a24ee47885a"){
                    if ($row['blank'] == 1)
                        $current = $cnt;
                }else{
                    if ($row['blank'] == 2)
                        $current = $cnt;
                }
                $cnt += 1;
            }

            // Query Every Phrase into a phrase array
            echo  $phrases[$loc];

            //echo knob_score($knob);
            
            $loc = $idhold[$loc]; //We want the integrity of the id

            if ($type == "b8b35a24ee47885a"){
                $result = mysql_query("UPDATE brain SET blank='0' WHERE id='$current'") or die(mysql_error());  
                $result = mysql_query("UPDATE brain SET blank='1' WHERE id='$loc'") or die(mysql_error());  

            }else{
                $result = mysql_query("UPDATE brain SET blank='0' WHERE id='$current'") or die(mysql_error());  
                $result = mysql_query("UPDATE brain SET blank='2' WHERE id='$loc'") or die(mysql_error());  
            }
            $pushScore= $knob/100;

            // we want to log
            $result = mysql_query("INSERT INTO log (logID, phraseID, glassID, brainScore, logTime) VALUES (NULL, '$loc', '$type', '$pushScore', CURRENT_TIMESTAMP);") or die(mysql_error());

        }else{
            echo "@@@@****@@@@";
        }

        // Query Every Phrase into a phrase array
        // echo  $phrases[$loc-1];
    }
    */
    mysql_close($con);
?>
