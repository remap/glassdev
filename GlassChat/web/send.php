<?php 
    $phrases = array();
    $current = -1;
    $cnt = 1;
    $type = $_POST['type'];
    $knob = $_POST['knob'];
    $word = addslashes($_POST['phrase']); //delim: @@@@****@@@@

    include_once("common.php");

    function knob_score($cnt){
        return "score >= ".(($cnt-10)/100)." AND score < ".(($cnt+10)/100);
    }

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
    mysql_close($con);
?>
