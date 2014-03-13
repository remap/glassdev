<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Global Brain</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="TFT Google Glass Concept">
    <meta name="author" content="Joon-Sub Chung">

    <!-- CSS
    <link href="./assets/css/bootstrap.css" rel="stylesheet">
     -->
    <style type="text/css">

      /* Sticky footer styles
      -------------------------------------------------- */

      html,
      body {
      	font-family: 'Roboto', sans-serif;
        height: 100%;
        color: #cccccc;
        background-color:#000000

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
      	margin-top: 100px;
      }
      h1 {
        font-size:42px;
      }

    </style>
    <!--<link href="./assets/css/bootstrap-responsive.css" rel="stylesheet">-->
    <!--<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>-->

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="./assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons 
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="./assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="./assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="./assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="./assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="./assets/ico/favicon.png">
    -->
  </head>

  <body>
	<div class="container">
		<div class="row-fluid">
      <h1 id = "console"></h1>
		</div>
	</div>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>-->
    <!--<script src="./assets/js/bootstrap.js"></script>-->
    <script type="text/javascript">
      
      setInterval(function(){
      //loadXMLDoc();
      loadData();
      },500);
      function loadXMLDoc() {
          var xmlhttp;

          if (window.XMLHttpRequest) {
              // code for IE7+, Firefox, Chrome, Opera, Safari
              xmlhttp = new XMLHttpRequest();
          } else {
              // code for IE6, IE5
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
          }

          xmlhttp.onreadystatechange = function() {
              if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                  document.getElementById("console").innerHTML = xmlhttp.responseText;
              }
          }
          var dataString = 'uid='+QueryString.uid; 
          xmlhttp.open("POST", "refresh2.php?"+dataString, true);
          xmlhttp.send();
      }
var oldContent = "null";
      function loadData() {   
          var xobj = new XMLHttpRequest();
          var dataString = 'uid='+QueryString.uid;
          xobj.open('GET', 'http://glass.remap.ucla.edu/gb/refresh2.php?'+dataString, true);
            //console.log('loading data');
          xobj.onreadystatechange = function () {
              if (xobj.readyState == 4 && xobj.status == 200) {
                  if (oldContent != xobj.responseText){
                    document.getElementById("console").innerHTML = xobj.responseText;
                  }
                  //console.log(xobj.responseText);
                  //processData(jsonData);
              }
          }
          xobj.send();
      }
      </script>

    <script type="text/javascript">
    	//setTimeout("location.reload(true);", 3000);

      var QueryString = function () {
      // This function is anonymous, is executed immediately and 
      // the return value is assigned to QueryString!
      var query_string = {};
      var query = window.location.search.substring(1);
      var vars = query.split("&");
      for (var i=0;i<vars.length;i++) {
        var pair = vars[i].split("=");
          // If first entry with this name
        if (typeof query_string[pair[0]] === "undefined") {
          query_string[pair[0]] = pair[1];
          // If second entry with this name
        } else if (typeof query_string[pair[0]] === "string") {
          var arr = [ query_string[pair[0]], pair[1] ];
          query_string[pair[0]] = arr;
          // If third or later entry with this name
        } else {
          query_string[pair[0]].push(pair[1]);
        }
      } 
        return query_string;
    } ();

    
/*
      $(document).ready(function () {
          setInterval(function() {    
            var dataString = 'uid='+QueryString.uid; 
            $.ajax({     
              type: "POST",     
              url: "refresh2.php",  
              data: dataString,     
              success: function(data){  
                document.getElementById("console").innerHTML = String(data); 
              }   
            }); 
          return false;   
        }, 300); 
      });
*/
    </script>
  </body>
</html>

