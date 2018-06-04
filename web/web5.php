<!DOCTYPE HTML>

<html>

	<head>
		<meta charset = "utf-8">
		<title>Expense Manager: Main Frame</title>
		<style type = "text/css">
			h1.header { color: blue; }
			label { width: 5em; float: left; }
			#invalid { color: red; }
			#divclass1, #divclass2, #divclass3, #divclass4, #divclass5, #divclass6 {display:inline-block;margin-right:10px; width:200px;}  
		</style>
	</head>
		<h2>Web Expense Manager</h2>
		<h3>Basic Information</h3>
		<form method = "post" action = "index.php">
		<!-- create four text boxes for user input -->
			<div id="big-div">
			<div id="divclass1"><label id="myP">Name:</label>
			<input type = "text" name = "expname1" id="call" placeholder = "e.g. 'Rent'", onchange="getTextData(this, 'nametab1');">
			<label>Amount:</label>
			<input type = "text" name = "expamo1" placeholder = "e.g. '750'", onchange="getTextData(this, 'amotab1');"></div>
			</div>
			<button type="button" onclick="generateDoc();">Add Expense</button>
		</form>

	<script type="text/javascript">
	var numexp = 1;
	var truthContainer = [false, false, false, false, false, false, false, false];
	var createdContainer = [false, false, false, false, false, false, false, false, false];
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
			Holder['nametab' + i] = myContainer['nametab' + i];
			Holder['amotab' + i] = myContainer['amotab' + i];
		}
	}
	function generateDoc()
	{
		addExpense();
		int = numexp;
		if (createdContainer[int] == false){
			var div = document.createElement("div")
			div.setAttribute("id", "divclass" + int)
			var getTextString = "getTextData(this, \"namebool" + int + "\""
			var getTextString2 = "getTextData(this, \"amobool" + int + "\""
			var bar = document.getElementById("big-div");
			var element = document.createElement("input");
			var lab1 = document.createElement("label");
			lab1.innerHTML = "Name"
			element.setAttribute("type", "text");
    		element.setAttribute("name", "nametab" + int);
    		element.setAttribute("id", "nametab" + int)
    		element.setAttribute("onchange", "getTextData(this, 'nametab" + int + "');");
    		element.setAttribute("placeholder", "e.g., 'Electric'");
    		var element2 = document.createElement("input")
    		var lab2 = document.createElement("label");
			lab2.innerHTML = "Amount"
    		element2.setAttribute("type", "text");
    		element2.setAttribute("name", "amotab" + int);
    		element2.setAttribute("id", "amotab" + int)
    		element2.setAttribute("onchange", "getTextData(this, 'amotab" + int + "');")
    		element2.setAttribute("placeholder", "e.g., '235'")

    		bar.appendChild(div);
    		div.appendChild(lab1);
    		div.appendChild(element);
    		div.innerHTML += "<br>";
    		div.appendChild(lab2);
    		div.appendChild(element2);
    		div.innerHTML += "<br>";
			createdContainer[int] = true;
		}
	}

    function getDropData(dropdown, string) {
    	myContainer[string] = dropdown.options[dropdown.selectedIndex].value;
    	alert(myContainer[string]);
	}

	function getTextData(text, string) {
		myContainer[string] = text.value;
		populateHolder(numexp);
		alert("Here is string" + string[6])
		if (string.includes('amotab')){
				validateNum(string[6]);
		}
		for(i=1; i <= numexp; i++){
			if(!(myContainer['nametab' + i] == null) && !(myContainer['amotab' + i] == null) && !(isNaN(myContainer['amotab' + i]))){
				if(truthContainer[i] == false){
					newplace = document.getElementById('divclass' + i);
					tempele = document.createElement("label");
					tempele.setAttribute("id", "condilab" + i);
					tempele.innerHTML = "How many people do you split this cost with?";
					newplace.appendChild(tempele);

					tempele = document.createElement("select");
					tempele.setAttribute("name", "expselect" + i)
					tempele.setAttribute("id", "expselect" + i)
					tempele.setAttribute("onchange", "getDropData(this)")
					newplace.appendChild(tempele);

					optionhold = document.createElement("option");
					optionhold.setAttribute("id", "optionselect" + i);
					optionhold.innerHTML = "Select One";
					optionhold.setAttribute("value", 0);
					tempele.appendChild(optionhold);
				
					for(int = 1; int <= 9; int++){
						optionhold = document.createElement("option");
						optionhold.setAttribute("id", "option" + i + int);
						optionhold.setAttribute("value", int);
						optionhold.innerHTML = int;
						tempele.appendChild(optionhold);
					}	
					truthContainer[i] = true;
				}
			}
			else{
			truthContainer[i] = false;
			document.getElementById('condilab' + i).innerHTML = "";
			document.getElementById('condiselect' + i).innerHTML = "";
			}
		}
	}

	function validateNum(int){
		var tempval = Holder['amotab' + int]
		if(isNaN(tempval)){
			place = document.getElementById('divclass' + int);
			while((place.getElementsByClassName('invalid')[0])){
				alert(place.getElementsByClassName('invalid')[0]);
				place.removeChild(place.getElementsByClassName('invalid')[0]);
			}
			statement = document.createElement("p")
			statement.setAttribute("id", "invalid")
			statement.setAttribute("class", "invalid")
			statement.innerHTML = "Invalid Entry, please enter a number"
			place.appendChild(statement);
		}
		else{
			place = document.getElementById('divclass' + int);
			while((place.getElementsByClassName('invalid')[0])){
				place.removeChild(place.getElementsByClassName('invalid')[0]);
			}
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