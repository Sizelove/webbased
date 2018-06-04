	var numexp = 1;
	var globalValMatrix = [];
    for(i = 0; i < 10; i++){
		globalValMatrix[i] = [null, null, null, null, null, null, null, null, null];
	}
	var truthContainer = [false, false, false, false, false, false, false, false];
	var createdContainer = [false, false, false, false, false, false, false, false, false];
	var selectContainer = [false, false, false, false, false, false, false, false, false];
	var Holder = new Object();
	var myContainer = new Object();
	myContainer.namebool = null;
	myContainer.amobool = null;
	myContainer.numbool = null;
	var initialheight = 400;
	var maxheight = 400;
	b =  initialheight;

	function finbutton(){
			button = document.getElementById("finishbutton");
			form = button.parentNode;
			form.removeChild(button);
			newbutton = document.createElement("button");
			newbutton.setAttribute("type", "submit");
			newbutton.innerHTML = "Save Info";
			newbutton.setAttribute("id", "submitbutt");
			newbutton.setAttribute("class", "button");
			form.appendChild(newbutton);
	}

	function addExpense(){
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
    		element.setAttribute("name", "expname" + int);
    		element.setAttribute("id", "nametab" + int)
    		element.setAttribute("onchange", "getTextData(this, 'nametab" + int + "');");
    		element.setAttribute("placeholder", "e.g., 'Electric'");
    		var element2 = document.createElement("input")
    		var lab2 = document.createElement("label");
			lab2.innerHTML = "Amount"
    		element2.setAttribute("type", "text");
    		element2.setAttribute("name", "expamo" + int);
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
					linebreak = document.createElement("h1");
					newplace.appendChild(linebreak);
					linebreak.innerHTML = ""

					tempele = document.createElement("label");
					tempele.setAttribute("id", "condilab" + i);
					tempele.setAttribute("class", "select")
					tempele.innerHTML = "How many split this cost?";
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
				
					for(int = 1; int <= 6; int++){
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

	function divyFunc(dropdown){
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
			document.getElementById('divclass' + i).setAttribute("style","height:" + b + "px");
			a = document.getElementById('divclass' + i).clientHeight;
			for(int = 1; int <= val1; int++){
				a += 75;
				texty = document.createElement("input")
				texty.setAttribute("type", "text")
				texty.setAttribute("value", val)
				texty.setAttribute("id", "divexp" + i + int);
				texty.setAttribute("name", "divexp" + i + int)
				texty.setAttribute("onchange", "setVal(" + i + "," + int + ");")
				globalValMatrix[i - 1][(int - 1)] = parseFloat(val);
				newdiv.appendChild(texty);
			}
			if(a > maxheight){
				document.getElementById('divclass' + i).setAttribute("style","height:" + a + "px");
				maxheight =  a;
			}else{
				document.getElementById('divclass' + i).setAttribute("style","height:" + maxheight + "px");
			}
			priorbuttondiv = document.getElementById("buttondiv" + i);
			if(priorbuttondiv){
				priorbuttondiv.parentNode.removeChild(priorbuttondiv);
			}
			buttondiv = document.createElement("span");
			buttondiv.setAttribute("id", "buttondiv" + i);
			newdiv = document.getElementById("divclass" + i)
			newdiv.appendChild(buttondiv);
			buttondiv.innerHTML = ('<h3>Select Expense '+ i+' Graphs:</h3><label><input onclick="drawerPie(this);" id="piecheck' +
			 i + '" type="checkbox"/>Pie Chart</label><label><input onclick="drawerBar(this);" id="barcheck' + i + '" type="checkbox"/>Bar Chart</label>')
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
			document.getElementById('divclass' + i).setAttribute("style","height:" + b + "px");
			a = document.getElementById('divclass' + i).clientHeight;
			for(int = 1; int <= val1; int++){
				a += 75;
				texty = document.createElement("input")
				texty.setAttribute("type", "text")
				texty.setAttribute("value", 0)
				texty.setAttribute("name", "incomecalc" + i + int)
				texty.setAttribute("id", "incomecalc" + i + int)
				newdiv.appendChild(texty);
				}
			if(a > maxheight){
				document.getElementById('divclass' + i).setAttribute("style","height:" + a + "px");
				maxheight =  a;
			}else{
				document.getElementById('divclass' + i).setAttribute("style","height:" + maxheight + "px");
			}document.getElementById('divclass' + i).setAttribute("style","height:" + a + "px");
			priorbuttondiv = document.getElementById("buttondiv" + i);
			if(priorbuttondiv){
				priorbuttondiv.parentNode.removeChild(priorbuttondiv);
			}

			newbut = document.createElement("button")
			newbut.setAttribute("onclick", "incomeRat(this);")
			newbut.setAttribute("type", "button")
			newbut.innerHTML = "Calculate"
			newdiv.appendChild(newbut);
		}

		if(myContainer[string] == "By Use"){
			newdiv = document.createElement("div")
			newdiv.setAttribute("id", "pricediv" + i)
			olddiv = document.getElementById("divclass" + i)
			olddiv.appendChild(newdiv);

			newpar = document.createElement("label")
			newpar.innerHTML = "Custom Values"
			newdiv.appendChild(newpar)

			selector1 = document.getElementById("expselect" + i);
			val1 = selector1.value
			document.getElementById('divclass' + i).setAttribute("style","height:" + b + "px");
			a = document.getElementById('divclass' + i).clientHeight;
			for(int = 1; int <= val1; int++){
				a += 75;
				texty = document.createElement("input")
				texty.setAttribute("type", "text")
				texty.setAttribute("value", 0)
				texty.setAttribute("onchange", "setVal(" + i + "," + int + ");")
				texty.setAttribute("id", "divexp" + i + int)
				texty.setAttribute("name", "divexp" + i + int);
				newdiv.appendChild(texty);
				}
			if(a > maxheight){
				document.getElementById('divclass' + i).setAttribute("style","height:" + a + "px");
				maxheight =  a;
			}else{
				document.getElementById('divclass' + i).setAttribute("style","height:" + maxheight + "px");
			}
			priorbuttondiv = document.getElementById("buttondiv" + i);
			if(priorbuttondiv){
				priorbuttondiv.parentNode.removeChild(priorbuttondiv);
			}
			buttondiv = document.createElement("span");
			buttondiv.setAttribute("id", "buttondiv" + i);
			newdiv = document.getElementById("divclass" + i)
			newdiv.appendChild(buttondiv);
			buttondiv.innerHTML = ('<h3>Select Expense '+ i+' Graphs:</h3><label><input onclick="drawerPie(this);" id="piecheck' +
			 i + '" type="checkbox"/>Pie Chart</label><label><input onclick="drawerBar(this);" id="barcheck' + i + '" type="checkbox"/>Bar Chart</label>')

		}
	}

	function drawerPie(ider){
		i = ider.id[8]
		priorchart = document.getElementById("piecanvas" + i)
		if(priorchart){
			priorchart.parentNode.removeChild(priorchart)
				a = document.getElementById('divclass' + i).clientHeight;
				a -= 300;
				document.getElementById('divclass' + i).setAttribute("style","height:" + a + "px");
		}
		if(ider.checked == true){
			newdivers = document.createElement("canvas")
			newdivers.setAttribute("id", "piecanvas" + i)
			newdivers.width = 300;
			newdivers.height = 300;
			ider.parentNode.parentNode.appendChild(newdivers);
			a = document.getElementById('divclass' + i).clientHeight;
			a += 300;
			document.getElementById('divclass' + i).setAttribute("style","height:" + a + "px");
			sum = 0;
			num = 0;
			for(int = 0; int < 9; int++){
				if(globalValMatrix[i-1][int] != null){
					globalValMatrix[i-1][int] = parseFloat(globalValMatrix[i-1][int]);
					sum += globalValMatrix[i-1][int]
					num++
				}
				else{break};
			}
			drawPie(newdivers, i, num, sum)
		}
	}

	function drawerBar(ider){
		i = ider.id[8];
		priorchart = document.getElementById("barcanvas" + i);
		if(priorchart){
			priorchart.parentNode.removeChild(priorchart)
			a = document.getElementById('divclass' + i).clientHeight;
			a -= 300;
			document.getElementById('divclass' + i).setAttribute("style","height:" + a + "px");
		}
		if(ider.checked == true){
			newdiv = document.createElement("canvas")
			newdiv.setAttribute("id", "barcanvas" + i);
			newdiv.width = 300;
			newdiv.height = 300;
			ider.parentNode.parentNode.appendChild(newdiv);
			a = document.getElementById("divclass" + i).clientHeight;
			a += 300;
			document.getElementById("divclass" + i).setAttribute("style", "height:" + a + "px");
			min = 0;
			max = 0;
			number = 0;
			for(int = 0; int < 9; int++){
				if(globalValMatrix[i-1][int] != null){
					number++
					if(globalValMatrix[i-1][int] < min){
						min = globalValMatrix[i-1][int];
					}
					if(globalValMatrix[i-1][int] > max){
						max = globalValMatrix[i-1][int];
					}
				}	
			}
		}
		drawBar(newdiv, i, number, max);
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

		selector1 = document.getElementById("expselect" + i);
		var valtainer = [];
		val1 = selector1.value;
		for(int = 1; int <= val1; int++){
			temper = document.getElementById("incomecalc" + i + int);
			valtainer.push(temper.value)
		}

		var sum = 0
		for(int = 0; int < val1; int++){
			valtainer[int] = parseFloat(valtainer[int])
			sum += valtainer[int];
		}
		var finalvar = []
		elector2 = document.getElementById("amotab" + i);
		cost = selector2.value
		for (int = 0; int < val1; int++){
			finalvar[int] = ((valtainer[int]/sum)*cost);
			finalvar[int] = finalvar[int].toFixed(2);
			globalValMatrix[i - 1][int] = finalvar[int];
		}
		a = document.getElementById('divclass' + i).clientHeight;
		for(int = 0; int < val1; int++){
			a += 65;
			texty = document.createElement("input")
			texty.setAttribute("type", "text")
			texty.setAttribute("value", finalvar[int])
			index = int + 1
			texty.setAttribute("name", "divexp" + i + index);
			texty.setAttribute("id", "divexp" + i + index);
			resultsdiv.appendChild(texty);
		}
		if(a > maxheight){
			document.getElementById('divclass' + i).setAttribute("style","height:" + a + "px");
			maxheight =  a;
		}else{
			document.getElementById('divclass' + i).setAttribute("style","height:" + maxheight + "px");
			}
		priceydiv.appendChild(resultsdiv);

		priorbuttondiv = document.getElementById("buttondiv" + i);
			if(priorbuttondiv){
				priorbuttondiv.parentNode.removeChild(priorbuttondiv);
			}
			buttondiv = document.createElement("span");
			buttondiv.setAttribute("id", "buttondiv" + i);
			newdiv = document.getElementById("divclass" + i)
			newdiv.appendChild(buttondiv);
			buttondiv.innerHTML = ('<h3>Select Expense '+ i+' Graphs:</h3><label><input onclick="drawerPie(this);" id="piecheck' +
			 i + '" type="checkbox"/>Pie Chart</label><label><input onclick="drawerBar(this);" id="barcheck' + i + '" type="checkbox"/>Bar Chart</label>')

	}

	function setVal(index, integer){
		resetValHolder(index, integer);
		selector = document.getElementById("divexp" + index + integer);
		globalValMatrix[index - 1][integer - 1] = parseFloat(selector.value);
	}

	function resetValHolder(index, integer){
		for(i = integer; i < 10; i++){
			globalValMatrix[i][integer] = null;
		}
	}

	function loadPopup(){
		if(confirm("Are you sure you would like to load? You current information will be lost unless you save first.")){
			window.location.href = 'loadscript.php'
		}
	}

    function toggleModal() {
    	alert("This was called");
        modal.classList.toggle("show-modal");
    }

    function windowOnClick(event) {
        if (event.target === modal) {
            toggleModal();
        }
    }