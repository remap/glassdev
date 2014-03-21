<?php
	$phrases = array();
  include_once("common.php");
/*
	$result = mysql_query("SELECT * FROM brain LIMIT 0,1") or die(mysql_error());  
    
    // Query Every Phrase into a phrase array
    while($row = mysql_fetch_array($result))
    {
        $phrases[] = $row['phrase'];
    }
    mysql_close($con);*/
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
        max-width: 980px;
      }
      .container .credit {
        margin: 20px 0;
      }
      .main-click{
      	margin-top: 25px;
      }



      /*Custom*/
      .onoffswitch {
          font-size: 14px;
          position: relative;
          margin-bottom: 10px;
          -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
      }
      .onoffswitch-checkbox {
          display: none;
      }
      .onoffswitch-label {
          display: block; overflow: hidden; cursor: pointer;
          /*border: 2px solid #FFFFFF; border-radius: 50px;*/
      }
      .onoffswitch-inner {
          width: 200%; margin-left: -100%;
          -moz-transition: margin 0.0s ease-in 0s; -webkit-transition: margin 0.0s ease-in 0s;
          -o-transition: margin 0.0s ease-in 0s; transition: margin 0.0s ease-in 0s;
      }
      .onoffswitch-inner:before, .onoffswitch-inner:after {
          float: left; width: 50%; height: 41px; padding: 0; line-height: 41px;
          font-size: 25px; color: white; font-family: Trebuchet, Arial, sans-serif; font-weight: bold;
          -moz-box-sizing: border-box; -webkit-box-sizing: border-box; box-sizing: border-box;
      }
      .onoffswitch-inner:before {
          content: "";
          /*padding-left: 13px;*/
          background-color: #267EC4; color: #fff;
      }
      .onoffswitch-inner:after {
          content: "";
          /*padding-right: 0px;*/
          color: #FFBEBE;
          background-color: #E22F2F; color: #fff;
      }
      .bond:before{content: "Bond";}
      .bond:after{content: "Bond";}
      .dominate:before{content: "Dominate";}
      .dominate:after{content: "Dominate";}
      .confront:before{content: "Confront";}
      .confront:after{content: "Confront";}

      .play:before{content: "Play";}
      .play:after{content: "Play";}
      .appeal:before{content: "Appeal";}
      .appeal:after{content: "Appeal";}
      .inflict:before{content: "Inflict";}
      .inflict:after{content: "Inflict";}

      .support:before{content: "Support";}
      .support:after{content: "Support";}
      .inquire:before{content: "Inquire";}
      .inquire:after{content: "Inquire";}
      .manipulate:before{content: "Manipulate";}
      .manipulate:after{content: "Manipulate";}

      .share:before{content: "Share";}
      .share:after{content: "Share";}
      .inform:before{content: "Inform";}
      .inform:after{content: "Inform";}
      .evade:before{content: "Evade";}
      .evade:after{content: "Evade";}
      /*
      .onoffswitch-switch {
          width: 38px; margin: 1.5px;
          background: #A1A1A1;
          position: absolute; top: 0; bottom: 0; right: 71px;
          -moz-transition: all 0.0s ease-in 0s; -webkit-transition: all 0.0s ease-in 0s;
          -o-transition: all 0.0s ease-in 0s; transition: all 0.0s ease-in 0s; 
      }*/
      .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
          margin-left: 0;
      }
      .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
          right: 0px; 
          background-color: #2FCCFF; 
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
                <div class="row-fluid">
                  <div class="span4 toggleSwitch">
                    <div class="onoffswitch">
                      <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="int1">
                      <label class="onoffswitch-label" for="int1">
                          <div class="onoffswitch-inner bond"></div>
                          <div class="onoffswitch-switch"></div>
                      </label>
                    </div>
                  </div>
                  <div class="span4 toggleSwitch">
                    <div class="onoffswitch">
                      <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="int2">
                      <label class="onoffswitch-label" for="int2">
                          <div class="onoffswitch-inner dominate"></div>
                          <div class="onoffswitch-switch"></div>
                      </label>
                    </div>
                  </div>
                  <div class="span4 toggleSwitch">
                    <div class="onoffswitch">
                      <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="int3">
                      <label class="onoffswitch-label" for="int3">
                          <div class="onoffswitch-inner confront"></div>
                          <div class="onoffswitch-switch"></div>
                      </label>
                    </div>
                  </div>
                </div><!--end-->
                <div class="row-fluid">
                  <div class="span4 toggleSwitch">
                    <div class="onoffswitch">
                      <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="int4">
                      <label class="onoffswitch-label" for="int4">
                          <div class="onoffswitch-inner play"></div>
                          <div class="onoffswitch-switch"></div>
                      </label>
                    </div>
                  </div>
                  <div class="span4 toggleSwitch">
                    <div class="onoffswitch">
                      <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="int5">
                      <label class="onoffswitch-label" for="int5">
                          <div class="onoffswitch-inner appeal"></div>
                          <div class="onoffswitch-switch"></div>
                      </label>
                    </div>
                  </div>
                  <div class="span4 toggleSwitch">
                    <div class="onoffswitch">
                      <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="int6">
                      <label class="onoffswitch-label" for="int6">
                          <div class="onoffswitch-inner inflict"></div>
                          <div class="onoffswitch-switch"></div>
                      </label>
                    </div>
                  </div>
                </div><!--end-->

                <div class="row-fluid">
                  <div class="span4 toggleSwitch">
                    <div class="onoffswitch">
                      <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="int7">
                      <label class="onoffswitch-label" for="int7">
                          <div class="onoffswitch-inner support"></div>
                          <div class="onoffswitch-switch"></div>
                      </label>
                    </div>
                  </div>
                  <div class="span4 toggleSwitch">
                    <div class="onoffswitch">
                      <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="int8">
                      <label class="onoffswitch-label" for="int8">
                          <div class="onoffswitch-inner inquire"></div>
                          <div class="onoffswitch-switch"></div>
                      </label>
                    </div>
                  </div>
                  <div class="span4 toggleSwitch">
                    <div class="onoffswitch">
                      <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="int9">
                      <label class="onoffswitch-label" for="int9">
                          <div class="onoffswitch-inner manipulate"></div>
                          <div class="onoffswitch-switch"></div>
                      </label>
                    </div>
                  </div>
                </div><!--end-->

                <div class="row-fluid">
                  <div class="span4 toggleSwitch">
                    <div class="onoffswitch">
                      <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="int10">
                      <label class="onoffswitch-label" for="int10">
                          <div class="onoffswitch-inner share"></div>
                          <div class="onoffswitch-switch"></div>
                      </label>
                    </div>
                  </div>
                  <div class="span4 toggleSwitch">
                    <div class="onoffswitch">
                      <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="int11">
                      <label class="onoffswitch-label" for="int11">
                          <div class="onoffswitch-inner inform"></div>
                          <div class="onoffswitch-switch"></div>
                      </label>
                    </div>
                  </div>
                  <div class="span4 toggleSwitch">
                    <div class="onoffswitch">
                      <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="int12">
                      <label class="onoffswitch-label" for="int12">
                          <div class="onoffswitch-inner evade"></div>
                          <div class="onoffswitch-switch"></div>
                      </label>
                    </div>
                  </div>
                </div><!--end-->
                <!--<input class="knob brainA" data-angleOffset=-125 data-angleArc=250 data-fgColor="#1585FF" value="50">-->
			        	<button class="btn btn-large btn-primary" type="button submit" name="submit" type="submit">Push to Ada</button><br />
			        	<small><a href="http://glass.remap.ucla.edu/gb/glass.php?uid=f63b73e7988c018f" target="_blank">Glass.02 - f63b73e7988c018f</a></small>
                <div class="lead text-center"><div id="glassatext" ></div></div>
			        </form>
				</div>
				<div class="span6">
					<form id="glassbpush" method="post" class="text-center">
            <div class="row-fluid">
                  <div class="row-fluid">
                  <div class="span4 toggleSwitch">
                    <div class="onoffswitch">
                      <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="bint1">
                      <label class="onoffswitch-label" for="bint1">
                          <div class="onoffswitch-inner bond"></div>
                          <div class="onoffswitch-switch"></div>
                      </label>
                    </div>
                  </div>
                  <div class="span4 toggleSwitch">
                    <div class="onoffswitch">
                      <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="bint2">
                      <label class="onoffswitch-label" for="bint2">
                          <div class="onoffswitch-inner dominate"></div>
                          <div class="onoffswitch-switch"></div>
                      </label>
                    </div>
                  </div>
                  <div class="span4 toggleSwitch">
                    <div class="onoffswitch">
                      <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="bint3">
                      <label class="onoffswitch-label" for="bint3">
                          <div class="onoffswitch-inner confront"></div>
                          <div class="onoffswitch-switch"></div>
                      </label>
                    </div>
                  </div>
                </div><!--end-->
                <div class="row-fluid">
                  <div class="span4 toggleSwitch">
                    <div class="onoffswitch">
                      <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="bint4">
                      <label class="onoffswitch-label" for="bint4">
                          <div class="onoffswitch-inner play"></div>
                          <div class="onoffswitch-switch"></div>
                      </label>
                    </div>
                  </div>
                  <div class="span4 toggleSwitch">
                    <div class="onoffswitch">
                      <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="bint5">
                      <label class="onoffswitch-label" for="bint5">
                          <div class="onoffswitch-inner appeal"></div>
                          <div class="onoffswitch-switch"></div>
                      </label>
                    </div>
                  </div>
                  <div class="span4 toggleSwitch">
                    <div class="onoffswitch">
                      <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="bint6">
                      <label class="onoffswitch-label" for="bint6">
                          <div class="onoffswitch-inner inflict"></div>
                          <div class="onoffswitch-switch"></div>
                      </label>
                    </div>
                  </div>
                </div><!--end-->

                <div class="row-fluid">
                  <div class="span4 toggleSwitch">
                    <div class="onoffswitch">
                      <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="bint7">
                      <label class="onoffswitch-label" for="bint7">
                          <div class="onoffswitch-inner support"></div>
                          <div class="onoffswitch-switch"></div>
                      </label>
                    </div>
                  </div>
                  <div class="span4 toggleSwitch">
                    <div class="onoffswitch">
                      <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="bint8">
                      <label class="onoffswitch-label" for="bint8">
                          <div class="onoffswitch-inner inquire"></div>
                          <div class="onoffswitch-switch"></div>
                      </label>
                    </div>
                  </div>
                  <div class="span4 toggleSwitch">
                    <div class="onoffswitch">
                      <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="bint9">
                      <label class="onoffswitch-label" for="bint9">
                          <div class="onoffswitch-inner manipulate"></div>
                          <div class="onoffswitch-switch"></div>
                      </label>
                    </div>
                  </div>
                </div><!--end-->

                <div class="row-fluid">
                  <div class="span4 toggleSwitch">
                    <div class="onoffswitch">
                      <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="bint10">
                      <label class="onoffswitch-label" for="bint10">
                          <div class="onoffswitch-inner share"></div>
                          <div class="onoffswitch-switch"></div>
                      </label>
                    </div>
                  </div>
                  <div class="span4 toggleSwitch">
                    <div class="onoffswitch">
                      <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="bint11">
                      <label class="onoffswitch-label" for="bint11">
                          <div class="onoffswitch-inner inform"></div>
                          <div class="onoffswitch-switch"></div>
                      </label>
                    </div>
                  </div>
                  <div class="span4 toggleSwitch">
                    <div class="onoffswitch">
                      <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="bint12">
                      <label class="onoffswitch-label" for="bint12">
                          <div class="onoffswitch-inner evade"></div>
                          <div class="onoffswitch-switch"></div>
                      </label>
                    </div>
                  </div>
                </div><!--end-->
			          <!--<input class="knob brainB" data-angleOffset=-125 data-angleArc=250 data-fgColor="#1585FF" value="50">-->
              	<button class="btn btn-large btn-primary" type="button submit" name="submit" type="submit">Push to Steve</button><br />
                <small><a href="http://glass.remap.ucla.edu/gb/glass.php?uid=b8b35a24ee47885a" target="_blank">Glass.03 - b8b35a24ee47885a</a></small>
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
    <!-- <script src="./assets/js/bootstrap.js"></script> -->
    <!-- <script src="./assets/js/bootstrap-switch.min.js"></script>-->
    <!-- <script src="./assets/js/jquery.knob.js"></script>-->
        <script>
        var restrict = true; //0 no - 1 yes
        /*
          $(document).ready(function () {

              setInterval(function() {    
                if (restrict == false){
                  $.ajax({     
                    type: "POST",     
                    url: "updateDial.php",  
                    success: function(data){ 
                      var $s = $(".brainB");
                      $s.val(data*100).trigger("change");
                    }   
                  }); 
                }

              return false;   
            }, 300); 

          });
          $(document).ready(function () {

              setInterval(function() {    
                if (restrict == false){
                  $.ajax({     
                    type: "POST",     
                    url: "updateDial.php",  
                    success: function(data){ 
                      var $s = $(".brainA");
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
            */
        </script>
        
    <script type="text/javascript">
        function isBlank(str) {
	      return (!str || /^\s*$/.test(str));
	    }
      $(function() {   
        $("#glassapush .btn").click(function() {    
          var knob_val = $(".knob").val();
        	var dataString = 'type=f63b73e7988c018f&phrase=@@@@****@@@@&knob='+knob_val; 
          if(document.getElementById("int1").checked) {
            dataString += "&int1=1";
          }
          if(document.getElementById("int2").checked) {
            dataString += "&int2=2";
          }
          if(document.getElementById("int3").checked) {
            dataString += "&int3=3";
          }
          if(document.getElementById("int4").checked) {
            dataString += "&int4=4";
          }
          if(document.getElementById("int5").checked) {
            dataString += "&int5=5";
          }
          if(document.getElementById("int6").checked) {
            dataString += "&int6=6";
          }
          if(document.getElementById("int7").checked) {
            dataString += "&int7=7";
          }
          if(document.getElementById("int8").checked) {
            dataString += "&int8=8";
          }
          if(document.getElementById("int9").checked) {
            dataString += "&int9=9";
          }
          if(document.getElementById("int10").checked) {
            dataString += "&int10=10";
          }
          if(document.getElementById("int11").checked) {
            dataString += "&int11=11";
          }
          if(document.getElementById("int12").checked) {
            dataString += "&int12=12";
          }
            //alert(dataString);
            $.ajax({     
			  type: "POST",     
              url: "send2.php",  
              data: dataString,     
              success: function(data){  
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
          var dataString = 'type=b8b35a24ee47885a&phrase=@@@@****@@@@&knob='+knob_val; 
          if(document.getElementById("bint1").checked) {
            dataString += "&int1=1";
          }
          if(document.getElementById("bint2").checked) {
            dataString += "&int2=2";
          }
          if(document.getElementById("bint3").checked) {
            dataString += "&int3=3";
          }
          if(document.getElementById("bint4").checked) {
            dataString += "&int4=4";
          }
          if(document.getElementById("bint5").checked) {
            dataString += "&int5=5";
          }
          if(document.getElementById("bint6").checked) {
            dataString += "&int6=6";
          }
          if(document.getElementById("bint7").checked) {
            dataString += "&int7=7";
          }
          if(document.getElementById("bint8").checked) {
            dataString += "&int8=8";
          }
          if(document.getElementById("bint9").checked) {
            dataString += "&int9=9";
          }
          if(document.getElementById("bint10").checked) {
            dataString += "&int10=10";
          }
          if(document.getElementById("bint11").checked) {
            dataString += "&int11=11";
          }
          if(document.getElementById("bint12").checked) {
            dataString += "&int12=12";
          }
        	//alert(dataString);
            $.ajax({     
			  type: "POST",     
              url: "send2.php",  
              data: dataString,     
              success: function(data){  
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
