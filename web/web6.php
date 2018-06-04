<!DOCTYPE HTML>
<link href="style.css" rel="stylesheet" type="text/css" media="all">

<html>

	<head>
		<meta charset = "utf-8">
		<title>Expense Manager: Main Frame</title>
		<style type = "text/css">
			h1.header { color: black; }
			label { width: 5em; float: left; }
			#invalid { color: red; }
			div.divclass {vertical-align:top;display:inline-block; position: relative; margin-right:10px; 
						  width:200px; height: 1000px;
						  padding-left: 20px;}
			.button {
			background-color: #0066ff;
			border: 1px #0066ff;
			color: white;
			padding: 10px 32px;
			text-align: center;
			text-decoration: none;
			display: inline-block;
			font-size: 16px;
			border-radius: 15px 0;}
			
			input {
			width: 100%;
			padding: 12px 16px;
			margin: 8px -5px;
			box-sizing: border-box;
			
			div.fixed {
    position: fixed;
    bottom: 0;
    right: 0;
    width: 300px;
    border: 3px solid #73AD21;
}
}
} 
}
			
		</style>
	</head>

	<body>
		<h2>Web Expense Manager</h2>
		<h3>Basic Information</h3>
		<button id = "addexpense" class="button" type="button" onclick="generateDoc();">Add Expense</button>
		<br>
		<form style = "padding-top: 50px" method = "post" action = "index.php">
		<!-- create four text boxes for user input -->
			<div id="big-div"">
			<div class = "divclass" id="divclass1"><label id="myP">Name:</label>
			<input type = "text" name = "expname1" id="call" placeholder = "e.g. 'Rent'", onchange="getTextData(this, 'nametab1');">
			<label>Amount:</label>
			<input type = "text" name = "expamo1" id="amotab1" placeholder = "e.g. '750'", onchange="getTextData(this, 'amotab1');"><br></div>
			</div>
			
		</form>
	</body>

<script type="text/javascript">
	var numexp = 1;
	var truthContainer = [false, false, false, false, false, false, false, false];
	var createdContainer = [false, false, false, false, false, false, false, false, false];
	var selectContainer = [false, false, false, false, false, false, false, false, false];
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
			div.setAttribute("class", "divclass")
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

    function getDropData(dropdown) {
    	string = dropdown.id;
    	i = dropdown.id[9]
    	myContainer[string] = dropdown.options[dropdown.selectedIndex].value;
    	checkdiv = document.getElementById("divyselector" + i)
    	pridiv = document.getElementById("pricediv" + i)
    	if(pridiv){
    		while(pridiv.childNodes[0]){
    			pridiv.removeChild(pridiv.childNodes[0])
    		}
    	}
    	if(checkdiv){
    		while(checkdiv.childNodes[0]){
    			checkdiv.removeChild(checkdiv.childNodes[0])
    		}
    	}
    	if(myContainer[string] != 0){
    		i = dropdown.id[9]
    		place = document.getElementById('divclass' + i);
    		newplace = document.createElement("div");
    		newplace.setAttribute("id", "divyselector" + i)
			place.appendChild(newplace);

			tempele = document.createElement("label");
			tempele.setAttribute("id", "divylab" + i);
			tempele.setAttribute("class", "divylab")
			tempele.innerHTML = "How do you divide this cost?";
			newplace.appendChild(tempele);

			tempele = document.createElement("select");
			tempele.setAttribute("name", "divyselect" + i)
			tempele.setAttribute("id", "divyselect" + i)
			tempele.setAttribute("class", "divyselect" + i)
			tempele.setAttribute("onchange", "divyFunc(this)")
			newplace.appendChild(tempele);

			optionhold = document.createElement("option");
			optionhold.setAttribute("id", "optionselect" + i);
			optionhold.innerHTML = "Select One";
			optionhold.setAttribute("value", 0);
			tempele.appendChild(optionhold);

			var placehold = ['Equally', 'By Income Ratio', 'By Use']
			for(int = 0; int < 3; int++)
			{
				optionhold = document.createElement("option");
				optionhold.setAttribute("id", "divyoption" + i + int);
				optionhold.setAttribute("value", placehold[int]);
				optionhold.innerHTML = placehold[int];
				tempele.appendChild(optionhold);
			}
    	}
	}

	function getTextData(text, string) {
		myContainer[string] = text.value;
		populateHolder(numexp);
		if (string.includes('amotab')){
				validateNum(string[6]);
		}
		for(i=1; i <= numexp; i++){
			if(!(myContainer['nametab' + i] == null) && !(myContainer['amotab' + i] == null) && !(isNaN(myContainer['amotab' + i]))){
				if(truthContainer[i] == false){
					newplace = document.getElementById('divclass' + i);
					linebreak = document.createElement("br");
					newplace.appendChild(linebreak);

					tempele = document.createElement("label");
					tempele.setAttribute("id", "condilab" + i);
					tempele.setAttribute("class", "select")
					tempele.innerHTML = "How many pay this cost?";
					newplace.appendChild(tempele);

					tempele = document.createElement("select");
					tempele.setAttribute("name", "expselect" + i)
					tempele.setAttribute("id", "expselect" + i)
					tempele.setAttribute("class", "select" + i)
					string = "getDropData(this, 'expselect" + i + "')";
					tempele.setAttribute("onchange", "getDropData(this);");
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
				place = document.getElementById('divclass' + i);
				while((place.getElementsByClassName('select' + i)[0])){
					place.removeChild(place.getElementsByClassName('select'+ i)[0]);
				}
			}
		}
	}

	function validateNum(int){
		var tempval = Holder['amotab' + int]
		if(isNaN(tempval)){
			place = document.getElementById('divclass' + int);
			while((place.getElementsByClassName('invalid')[0])){
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

	function divyFunc(dropdown, string){
		string = dropdown.id;
		i = string[10]
		myContainer[string] = dropdown.options[dropdown.selectedIndex].value;
		pricer = document.getElementById("pricediv" + i)
		if(pricer){
		pricer.parentNode.removeChild(pricer);
		}
		if(myContainer[string] == "Equally"){
			newdiv = document.createElement("div")
			newdiv.setAttribute("id", "pricediv" + i)
			newdiv.setAttribute("class", "priceclass");
			olddiv = document.getElementById("divclass" + i);
			olddiv.appendChild(newdiv);
			selector1 = document.getElementById("expselect" + i);
			val1 = selector1.value
			selector2 = document.getElementById("amotab" + i);
			val2 = selector2.value
			val = (val2 / val1)
			val = val.toFixed(2);

			for(int = 1; int <= val1; int++){
				texty = document.createElement("input")
				texty.setAttribute("type", "text")
				texty.setAttribute("value", val)
				texty.setAttribute("id", "valtext" + i)
				newdiv.appendChild(texty);

			}
		}

		if(myContainer[string] == "By Income Ratio"){
			newdiv = document.createElement("div")
			newdiv.setAttribute("id", "pricediv" + i)
			newdiv.setAttribute("class", "priceclass");
			olddiv = document.getElementById("divclass" + i);
			olddiv.appendChild(newdiv);
			selector1 = document.getElementById("expselect" + i);
			val1 = selector1.value
			selector2 = document.getElementById("amotab" + i);
			val2 = selector2.value
			val = (val2 / val1)
			val = val.toFixed(2);
			newlab = document.createElement("label")
			newlab.innerHTML = "Enter the incomes"
			newdiv.appendChild(newlab);

			for(int = 1; int <= val1; int++){
				texty = document.createElement("input")
				texty.setAttribute("type", "text")
				texty.setAttribute("value", 0)
				texty.setAttribute("id", "valtext" + i)
				newdiv.appendChild(texty);
				}

			newbut = document.createElement("button")
			newbut.setAttribute("onclick", "incomeRat(this);")
			newbut.setAttribute("type", "button")
			newbut.innerHTML = "Calculate"
			newdiv.appendChild(newbut);
		}

		if(myContainer[string] == "By Use"){
			alert("by Amount");
		}
	}

	function incomeRat(ider){
		i = ider.parentNode.id[8]
		priordiv = document.getElementById("incomeratdiv" + i)
		if(priordiv){
			priordiv.parentNode.removeChild(priordiv);
		}
		priceydiv = document.getElementById(ider.parentNode.id);
		resultsdiv = document.createElement("div")
		resultsdiv.setAttribute("id", "incomeratdiv" + i)


		tempcontain
		for(i = 1; int <= val1; int++){

		}





		for(int = 1; int <= val1; int++){
			texty = document.createElement("input")
			texty.setAttribute("type", "text")
			texty.setAttribute("value", 0)
			texty.setAttribute("id", "valresults" + i)
			resultsdiv.appendChild(texty);
		}
		priceydiv.appendChild(resultsdiv);

	}

</script>
</html>