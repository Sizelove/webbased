<?php
session_start();
include 'saveload.php'; 
?>


<!DOCTYPE HTML>

<html>

	<head>
		<meta charset = "utf-8">
		<script type="text/javascript" src="drawGraphs.js"></script>
		<script type="text/javascript" src="mainjava.js"></script>
		<title>Expense Manager: Main Frame</title>
		<link rel="stylesheet" href="styles/teststyle.css">
		<link rel="stylesheet" href="styles/style2.css">
		<style type = "text/css">
						h1.header { color: black; }
			label { width: 5em; float: left; }
			#invalid { color: red; }
			div.divclass {vertical-align:top;display:inline-block; position: relative; margin-right:10px; 
						  width:200px; height: 700px;
						  padding-left: 20px;}
			.button, .trigger{
			background-color: #0066ff;
			border: 1px #0066ff;
			color: white;
			padding: 10px 32px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			border-radius: 15px 0;}
            
            #btnSpace {margin-left:150px;
                        background-color: red;
            }
			
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

	<body onload = "savedload();">
		<h2>Web Expense Manager</h2>
		<h3>Basic Information</h3>
		<form method = "post" action = "testscript.php">
		<!-- create four text boxes for user input -->
			<?php
				if(isset($_SESSION['username'])){
   			 	$user = $_SESSION['username'];
    			$welcomemessage = "<h1>Welcome, $user!</h1>";
    			echo $welcomemessage;
    			$logoutbutton = "<button><a href='logout.php'>Log Out</a></button>";
    			echo $logoutbutton;
			}
			?>

			<div id="big-div">
			<div class = "divclass" id="divclass1"><label id="myP">Name:</label>
			<input type = "text" name = "expname1" id="nametab1" placeholder = "e.g. 'Rent'", onchange="getTextData(this, 'nametab1');">
			<label>Amount:</label>
			<input type = "text" name = "expamo1" id="amotab1" placeholder = "e.g. '750'", onchange="getTextData(this, 'amotab1');"></div>
			</div>
			<button class="button" type="button" onclick="generateDoc();">Add Expense</button>
			<button class="button" id="bigPieButton" type="button" onclick="bigPie(this);">BigPie</button>
			<button class="button" id="finishbutton" type="button" onclick="finbutton();">Finished</button>                
                
		</form>
         <button class="trigger">Other</button>
                <div class="modal">
                    <div class="modal-content">
                    <span class="close-button">&times;</span>
                    <p>Do you want to load information from the file?</p>
                         <button class="button">Yes</button>
                        <button id="btnSpace" class="button">No</button>
                        </div>
            </div>
                    
                   
	</body>
<html>
    <script>
        //Modal
    var modal = document.querySelector(".modal");
    var trigger = document.querySelector(".trigger");
    var closeButton = document.querySelector(".close-button");

    function toggleModal() {
        modal.classList.toggle("show-modal");
    }

    function windowOnClick(event) {
        if (event.target === modal) {
            toggleModal();
        }
    }

    trigger.addEventListener("click", toggleModal);
    closeButton.addEventListener("click", toggleModal);
    window.addEventListener("click", windowOnClick);
    </script>