	var myContainer = new Object();
	myContainer.namebool = null;
	myContainer.amobool = null;
	myContainer.numbool = null;

    function getDropData(dropdown, string) {
    	myContainer[string] = dropdown.options[dropdown.selectedIndex].value;
	}

	function getTextData(text, string) {
		myContainer[string] = text.value;
		if (string == 'amobool'){
			validateNum(text);
		}
		document.getElementById('printer').innerHTML = "Here is namebool: " + myContainer['namebool'] + " Here is amobool: " + myContainer['amobool'] + " end.";
		if(!(myContainer['namebool'] == null) && !(myContainer['amobool'] == null) && !(isNaN(myContainer['amobool']))){
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
			return(tempval);
		}
	}

	var tester = false;

		function alerTest() {
			alert("Hello There")
				}

		function CallFlag() {
			document.getElementById('tag-id').innerHTML = "<label>Test Field:</label><input type = 'text' name = 'examo' placeholder = 'e.g. 750>";
		}