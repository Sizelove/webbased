<!DOCTYPE HTML>

<html>

	<head>
		<meta charset = "utf-8">
		<title>Expense Manager: Main Frame</title>
		<style type = "text/css">
			h1.header { color: blue; }
			label { width: 5em; float: left; }
			#amobool-invalid { color: red; }
		</style>
	</head>
		<h2>Web Expense Manager</h2>
		<h3>Basic Information</h3>
		<form method = "post" action = "index.php">
		<!-- create four text boxes for user input -->
			<div><label id="myP">Name:</label>
			<input type = "text" name = "expname1" id="call" placeholder = "e.g. 'Rent'", onchange="getTextData(this, 'namebool1');"></div>
			<div><label>Amount:</label>
			<input type = "text" name = "expamo1" placeholder = "e.g. '750'", onchange="getTextData(this, 'amobool1');"></div>
			<div id="amobool-invalid"></div>
			<div id="printer"></div>
			<div id = "tag-id"></div>
			<h3 id="nameconditional1"></h3>
			<div id="nameconditional2"></div>
			<button type="button" onclick="generateDoc();">Add Expense</button>
			<div id='namecondition2'></div>
			<div id='amocondition2'></div>
			<div id='namecondition3'></div>
			<div id='amocondition3'></div>

		</form>

	<script type="text/javascript">
	var numexp = 1;
	var getTextString = "getTextData(this,)"
	var Holder = new Object();
	var myContainer = new Object();
	myContainer.namebool = null;
	myContainer.amobool = null;
	myContainer.numbool = null;

	function addExpense()
	{
		numexp++;
	}

	function populateHolder(int)
	{
		for (i = 1; i <= int; i++){
			alert("Number of Expenses is" + i)
			Holder['namebool' + 'num' + i] = myContainer['namebool' + i];
			Holder['amobool' + 'num' + i] = myContainer['amobool' + i];
		}
	}
	function generateDoc()
	{
		addExpense();
		int = numexp;
		var getTextString = "getTextData(this, \"namebool" + int + "\""
		var getTextString2 = "getTextData(this, \"amobool" + int + "\""
		alert(getTextString);
		document.getElementById("namecondition" + int).innerHTML = ("<input type = 'text' + name = 'expname" + int + "'" + " id='call'" + " placeholder = 'e.g., Rent'" + " onchange = '" + getTextString + ");'>");
		document.getElementById('amocondition' + int).innerHTML = ("<input type = 'text' + name = 'expamo" + int + "'" + " id='call'" + " placeholder = 'e.g., 750'" + " onchange = '" + getTextString2 + ");'>");
	}

    function getDropData(dropdown, string) {
    	myContainer[string] = dropdown.options[dropdown.selectedIndex].value;
	}

	function getTextData(text, string) {
		myContainer[string] = text.value;
		populateHolder(numexp);
		if (string.includes('amobool')){
			validateNum(text);
		}
		document.getElementById('printer').innerHTML = "Here is namebool1: " + myContainer['namebool1'] + " Here is amobool: " + myContainer['amobool1'] + " end.";
		if(!(myContainer['namebool1'] == null) && !(myContainer['amobool1'] == null) && !(isNaN(myContainer['amobool1']))){
			document.getElementById('nameconditional1').innerHTML = "Split Information";
			document.getElementById('nameconditional2').innerHTML = "<label>How many people do you split this cost among?</label><select name='house_model' id='model', onchange='getDropData(this);''><option value=''>Select One</option><option value='1'>Model 1</option><option value='2'>Model 2</option><option value='3'>Model 3</option></select>";
		}
		else {
			document.getElementById('nameconditional1').innerHTML = "";
			document.getElementById('nameconditional2').innerHTML = "";
		}
	}

	function validateNum(text){
		var tempval = text.value;
		if(isNaN(tempval)){
			document.getElementById('amobool-invalid').innerHTML = "Invalid: Please enter a numerical value"
		}
		else{
			document.getElementById('amobool-invalid').innerHTML = ""
		}
	}

	var tester = false;

		function alerTest() {
			alert("Hello There")
				}

		function CallFlag() {
			document.getElementById('tag-id').innerHTML = "<label>Test Field:</label><input type = 'text' name = 'examo' placeholder = 'e.g. 750'>";
		}


	</script>
	</body>
</html>