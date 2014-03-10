<?php
	$phrases = array();
  include_once("common.php");

	$result = mysql_query("SELECT * FROM brain") or die(mysql_error());  
    
    // Query Every Phrase into a phrase array
    while($row = mysql_fetch_array($result))
    {
        $phrases[] = $row['phrase'];
    }
    mysql_close($con);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Global Brain</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="TFT Google Glass Concept">
    <meta name="author" content="Joon-Sub Chung">

    <!-- CSS -->
    <link href="./assets/css/bootstrap.css" rel="stylesheet">
    <link href="./assets/css/bootstrap-switch.min.css" rel="stylesheet">
    <style type="text/css">

      /* Sticky footer styles
      -------------------------------------------------- */

      html,
      body {
      	font-family: 'Roboto', sans-serif;
        height: 100%;
        /* The html and body elements cannot have any padding or margin. */
      }

      /* Wrapper for page content to push down footer */
      #wrap {
        min-height: 100%;
        height: auto !important;
        height: 100%;
        /* Negative indent footer by it's height */
        margin: 0 auto -60px;
      }

      /* Set the fixed height of the footer here */
      #push,
      #footer {
        height: 60px;
      }
      #footer {
        background-color: #f5f5f5;
      }

      /* Lastly, apply responsive CSS fixes as necessary */
      @media (max-width: 767px) {
        #footer {
          margin-left: -20px;
          margin-right: -20px;
          padding-left: 20px;
          padding-right: 20px;
        }
      }



      /* Custom page CSS
      -------------------------------------------------- */
      /* Not required for template or sticky footer method. */

      .container {
        width: auto;
        max-width: 680px;
      }
      .container .credit {
        margin: 20px 0;
      }
      .main-click{
      	margin-top: 25px;
      }

    </style>
    <link href="./assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="./assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="./assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="./assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="./assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="./assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="./assets/ico/favicon.png">
  </head>

  <body>


    <!-- Part 1: Wrap all page content here -->
    <div id="wrap">

      <!-- Begin page content -->
      <div class="container">
        <div class="page-header">
          <h1>Global Brain: Admin Control Page</h1>
        </div>
        <p class="lead text-center">Select a Glass to submit a random phrase to the users screen.</p>
        <p>
          <div class="demo text-center">
            <h3>Sentiment Dial</h3>
            <input class="knob brain" data-angleOffset=-125 data-angleArc=250 data-fgColor="#1585FF" value="50">

        </div>
        <div class="row-fluid text-center">
          <div id="toggleAdmin" class="btn-group" data-toggle-name="is_private" data-toggle="buttons-radio">
            <button type="button" value="0" class="btn yes active" data-toggle="button">Admin Control</button>
            <button type="button" value="1" class="btn no" data-toggle="button">Brain Control</button>
          </div>
        </div>
        <input type="hidden" name="is_private" value="0" />
      </p>
        <div class="main-click">
	        <div class="row-fluid">
	        	<div class="span6">
					<form id="glassapush" method="post" class="text-center">
			        	<button class="btn btn-large btn-primary" type="button submit" name="submit" type="submit">Push to Ada</button><br />
			        	<small><a href="https://glass.remap.ucla.edu/gb/glass.php?uid=b8b35a24ee47885a" target="_blank">Glass.02 - b8b35a24ee47885a</a></small>
                <div class="lead text-center"><div id="glassatext" ></div></div>
			        </form>
				</div>
				<div class="span6">
					<form id="glassbpush" method="post" class="text-center">
			        	<button class="btn btn-large btn-primary" type="button submit" name="submit" type="submit">Push to Steve</button><br />
                <small><a href="https://glass.remap.ucla.edu/gb/glass.php?uid=1327e364c5115ff5" target="_blank">Glass.03 - 1327e364c5115ff5</a></small>
			        	<div class="lead text-center"><div id="glassbtext" ></div></div>
			        </form>
				</div>
	        </div>
	        <hr>
	        <div class="row-fluid">
	        	<div class="span12">
					<form id="clear" method="post" class="text-center">
						<div id="console" class="well">Console: </div>
			        	<button class="clear btn btn-danger" type="button" name="submit" type="submit">Clear Glasses</button> 
                <button class="vote btn btn-danger" type="button" name="submit" type="submit">Clear Votes</button><br />
			        </form>
              <div class="well">
                <strong>Clear Glasses:</strong> Clears both glasses of messages.<br />
                <strong>Clear Votes:</strong> Resets the sentiment dial to 50%.
              </div>
				</div>
			</div>

	        

    	</div>

      </div>
      <div id="push"></div>
    </div>

    <div id="footer">
      <div class="container">
        <p class="muted credit">Google Glass Concept: Global Brain. Programmed by <a href="http://www.2souldesign.net">Joon-Sub</a>.</p>
      </div>
    </div>


    <!-- Modal -->
	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-body">
	    <?php
	    	foreach ($phrases as $value) {
				echo "$value<br />\n";
			}
	    ?>
	  </div>
	  <div class="modal-footer">
	    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	  </div>
	</div>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="./assets/js/bootstrap.js"></script>
    <script src="./assets/js/bootstrap-switch.min.js"></script>
    <script src="./assets/js/jquery.knob.js"></script>
        <script>
        var restrict = true; //0 no - 1 yes
          $(document).ready(function () {

              setInterval(function() {    
                if (restrict == false){
                  $.ajax({     
                    type: "POST",     
                    url: "updateDial.php",  
                    success: function(data){ 
                      var $s = $(".brain");
                      $s.val(data*100).trigger("change");
                    }   
                  }); 
                }

              return false;   
            }, 300); 

          });

            $(function($) {

                $(".knob").knob({
                    change : function (value) {
                        //console.log("change : " + value);
                    },
                    release : function (value) {
                        //console.log(this.$.attr('value'));
                        console.log("release : " + value);
                    },
                    cancel : function () {
                        console.log("cancel : ", this);
                    },
                    draw : function () {

                        // "tron" case
                        if(this.$.data('skin') == 'tron') {

                            var a = this.angle(this.cv)  // Angle
                                , sa = this.startAngle          // Previous start angle
                                , sat = this.startAngle         // Start angle
                                , ea                            // Previous end angle
                                , eat = sat + a                 // End angle
                                , r = 1;

                            this.g.lineWidth = this.lineWidth;

                            this.o.cursor
                                && (sat = eat - 0.3)
                                && (eat = eat + 0.3);

                            if (this.o.displayPrevious) {
                                ea = this.startAngle + this.angle(this.v);
                                this.o.cursor
                                    && (sa = ea - 0.3)
                                    && (ea = ea + 0.3);
                                this.g.beginPath();
                                this.g.strokeStyle = this.pColor;
                                this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
                                this.g.stroke();
                            }

                            this.g.beginPath();
                            this.g.strokeStyle = r ? this.o.fgColor : this.fgColor ;
                            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
                            this.g.stroke();

                            this.g.lineWidth = 2;
                            this.g.beginPath();
                            this.g.strokeStyle = this.o.fgColor;
                            this.g.arc( this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
                            this.g.stroke();

                            return false;
                        }
                    }
                });

                // Example of infinite knob, iPod click wheel
                var v, up=0,down=0,i=0
                    ,$idir = $("div.idir")
                    ,$ival = $("div.ival")
                    ,incr = function() { i++; $idir.show().html("+").fadeOut(); $ival.html(i); }
                    ,decr = function() { i--; $idir.show().html("-").fadeOut(); $ival.html(i); };
                $("input.infinite").knob(
                                    {
                                    min : 0
                                    , max : 20
                                    , stopper : false
                                    , change : function () {
                                                    if(v > this.cv){
                                                        if(up){
                                                            decr();
                                                            up=0;
                                                        }else{up=1;down=0;}
                                                    } else {
                                                        if(v < this.cv){
                                                            if(down){
                                                                incr();
                                                                down=0;
                                                            }else{down=1;up=0;}
                                                        }
                                                    }
                                                    v = this.cv;
                                                }
                                    });
            });
        </script>
    <script type="text/javascript">
        function isBlank(str) {
	      return (!str || /^\s*$/.test(str));
	    }
      $(function() {   
        $("#glassapush .btn").click(function() {    
          var knob_val = $(".knob").val();
        	var dataString = 'type=b8b35a24ee47885a&phrase=@@@@****@@@@&knob='+knob_val; 
            //alert(dataString);
            $.ajax({     
			  type: "POST",     
              url: "send.php",  
              data: dataString,     
              success: function(data){  
              	//alert(data);  
              	if (data == "@@@@****@@@@"){
              		document.getElementById("console").innerHTML = String("Console: Unable to find phrase " + text);	
              	}
              	else{    
              		document.getElementById("glassatext").innerHTML = String(data);
              		document.getElementById("console").innerHTML = String("Console: ");	
              	}
                //$('#quote').fadeOut(1000);     
              }   
            }); 
          return false;   
        }); 
      });

      $(function() {   
        $("#glassbpush .btn").click(function() { 
          var knob_val = $(".knob").val();
          var dataString = 'type=1327e364c5115ff5&phrase=@@@@****@@@@&knob='+knob_val; 
        	//alert(dataString);
            $.ajax({     
			  type: "POST",     
              url: "send.php",  
              data: dataString,     
              success: function(data){  
              	//alert(data);     
              	if (data == "@@@@****@@@@"){
              		document.getElementById("console").innerHTML = String("Console: Unable to find phrase " + text);	
              	}
              	else{    
              		document.getElementById("glassbtext").innerHTML = String(data);
              		document.getElementById("console").innerHTML = String("Console: ");	
              	}
                //$('#quote').fadeOut(1000);     
              }
            }); 
          return false;   
        }); 
      });

      $(function() {   
        $("#clear .vote").click(function() {     
            $.ajax({     
        type: "POST",     
              url: "clearvote.php",  
              success: function(data){   
                document.getElementById("console").innerHTML = String("Votes cleared");    
              }     
            }); 
          return false;   
        }); 
      }); 

      $(function() {   
        $("#toggleAdmin .yes").click(function() {     
          restrict = true;
        //     $.ajax({     
        // type: "POST",     
        //       url: "clearvote.php",  
        //       success: function(data){   
        //         document.getElementById("console").innerHTML = String("Votes cleared");    
        //       }     
        //     }); 
        //   return false;   
        }); 
      });
      $(function() {   
        $("#toggleAdmin .no").click(function() {     
          restrict = false;
        //     $.ajax({     
        // type: "POST",     
        //       url: "clearvote.php",  
        //       success: function(data){   
        //         document.getElementById("console").innerHTML = String("Votes cleared");    
        //       }     
        //     }); 
        //   return false;   
        }); 
      });

      $(function() {   
        $("#clear .clear").click(function() {     
          	var dataString = 'type=c&phrase=@@@@****@@@@';
            //alert(dataString);
            $.ajax({     
			  type: "POST",     
              url: "send.php",  
              data: dataString,     
              success: function(data){   
              	document.getElementById("glassatext").innerHTML = String("");   
              	document.getElementById("glassbtext").innerHTML = String(""); 

              	document.getElementById("phraseA").innerHTML = String("");   
              	document.getElementById("phraseB").innerHTML = String(""); 
              	document.getElementById("console").innerHTML = String("Console: ");	   
              	//alert(data);
                //$('#quote').fadeOut(1000);     
              }     
            }); 
          return false;   
        }); 
      });
    </script>

  </body>
</html>
