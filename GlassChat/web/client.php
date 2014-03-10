<?php
	$phrases = array();
	// Make a MySQL Connection
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
          <h1>Global Brain: Client Control Page</h1>
        </div>
        <p class="lead text-center">Help the Global Brain by being a part of the collective whole and set the dial to your desired value.</p>
        <p>
          <div class="row-fluid">
            <div class="span6">
              <div class="demo text-center">
                <h3>Your Dial</h3>
                <input class="knob collective" data-angleOffset=-125 data-angleArc=250 data-fgColor="#15DAFF" value="50">
              </div>
            </div>
            <div class="span6">
              <div class="demo text-center">
                <h3>The Collective Brain</h3>
                <input class="knob brain" data-angleOffset=-125 data-angleArc=250 data-fgColor="#1585FF" value="50" data-readOnly=true>
              </div>
            </div>
        </div>
      </p>
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
    <script src="./assets/js/jquery.knob.js"></script>
        <script>

        //   function clock() {
        //     var $s = $(".collective"),
        //         d = new Date(),
        //         s = d.getSeconds();
        //     $s.val(s).trigger("change");
        //     setTimeout("clock()", 1000);
        // }
        //clock();

      $(document).ready(function () {
          setInterval(function() {    
            $.ajax({     
              type: "POST",     
              url: "updateDial.php",  
              success: function(data){ 
                var $s = $(".brain");
                $s.val(data*100).trigger("change");
              }   
            }); 
          return false;   
        }, 300); 
      });

      $(document).ready(function () {
          setInterval(function() {    

          var knob_val = $(".collective").val();
          var dataString = 'score='+knob_val; 
            $.ajax({     
              type: "POST",     
              url: "vote.php",  
              data: dataString,     
              success: function(data){  
              }   
            }); 
          return false;   
        }, 5000); 
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
          var knob_val = $(".collective").val();
        	var dataString = 'score='+knob_val; 
            //alert(dataString);
            $.ajax({     
			  type: "POST",     
              url: "vote.php",  
              data: dataString,     
              success: function(data){  
              	//alert(data);  
              	// if (data == "@@@@****@@@@"){
              	// 	document.getElementById("console").innerHTML = String("Console: Unable to find phrase " + text);	
              	// }
              	// else{    
              	// 	document.getElementById("glassatext").innerHTML = String(data);
              	// 	document.getElementById("console").innerHTML = String("Console: ");	
              	// }
               //  $('#quote').fadeOut(1000);     
              }   
            }); 
          return false;   
        }); 
      });
      </script>
  </body>
</html>
