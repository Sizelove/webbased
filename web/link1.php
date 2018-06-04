<link href="style.css?<?php echo time(); ?>" rel="stylesheet" type="text/css" media="all">

<?php
session_start();
include 'saveload.php';
include 'comparison.php';
if(isset($_SESSION['username'])){
      $welcomemessage = '<li><a href="signout.php">Sign Out</a></li>';
    }else{
      $welcomemessage = '<li><a href="Tabbed.php">Log In</a></li>';
    }
?>

<nav id = "navbar"; style="box-shadow: 0px 2px 2px #999">
		<ul class = "fl_right">
			
			<li style="float:left"><a href="#">Expense Manager</a></li>
			
		  <?php echo $welcomemessage ?>
      <li><a href="contact.php">Contact Us</a></li>
      <li><a href="file.php">File Upload</a></li>
      <li><a class="active" href="link1.php">Expense Manager</a></li>
      <li ><a href="home.php">Home</a></li>
		</ul>
	</nav>

  <head>
    <meta charset = "utf-8">
    <script type="text/javascript" src="drawGraphs.js"></script>
    <script type="text/javascript" src="mainjava.js"></script>
    <title>Expense Manager: Main Frame</title>
    <style type = "text/css">
            h1.header { color: black; }
      label { width: 5em; float: left; }
      #invalid { color: red; }
      div.divclass {vertical-align:top;display:inline-block; position: relative; margin-right:10px; 
              width:300px; height: 400px;
              padding-left: 20px;}
      input {
      width: 100%;
      padding: 12px 16px;
      margin: 8px -5px;
      box-sizing: border-box;}
      
      div.fixed {
        position: fixed;
        bottom: 0;
        right: 0;
        width: 300px;
        border: 3px solid #73AD21;}
    </style>
  </head>

  <body id="thebod" onload = "savedload();">
    <h3>Insert Information</h3>
    <form method = "post" action = "testscript.php">

      <div id="big-div">
      <div class = "divclass" id="divclass1"><label id="myP">Name:</label>
      <input type = "text" name = "expname1" id="nametab1" placeholder = "e.g. 'Rent'", onchange="getTextData(this, 'nametab1');">
      <label>Amount:</label>
      <input type = "text" name = "expamo1" id="amotab1" placeholder = "e.g. '750'", onchange="getTextData(this, 'amotab1');"></div>
      </div>
      <section id = "canvas-section"></section>
      <button class="button" type="button" onclick="generateDoc();">Add Expense</button>
      <button class="button" id="bigPieButton" type="button" onclick="bigPie(this);">Total Results</button>
      <button class="button" id="popupbutton" type="button" onclick="loadPopup();">Load Info</button>
            <button class="button" type="button" onclick="bigCompar();">Comparison Chart</button> 
      <button class="button" id="finishbutton" type="button" onclick="finbutton();">Finished</button>
                
                
    </form>
                   
  </body>
<html>