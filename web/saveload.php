<?php
function sendExp($i, $j){
	$name = "divexp" . $i . $j;
  if(isset($_SESSION[$name])){
					  echo "'" . $_SESSION[$name] . "'";
				 	   }else{
				 		echo "null";
					    }
}

function sendInc($i, $j){
	$name = "incomecalc" . $i . $j;
  if(isset($_SESSION[$name])){
					  echo "'" . $_SESSION[$name] . "'";
				 	   }else{
				 		echo "null";
					    }
}
?>



<script>
	function savedload(){
		loader = <?php if(isset($_SESSION['saved'])){
					if($_SESSION['saved'] === 1){
						if($_SESSION['upload'] === 1){
							echo 3;
							$_SESSION['upload'] = 0;
						}else if($_SESSION['load']===1){
							echo 4;
							$_SESSION['load'] = 0;
						}else{
							echo 1;
						}
						$_SESSION['saved'] = 0;
					}else if($_SESSION['saved'] === 2){
						echo 2;
						$_SESSION['saved'] = 0;
					}else{
						echo 0;
					}
				 }else{
				 	echo 0;
				 }
				?>;
		if(loader == 1){
			alert("Save Complete!");
			setvalue();
		}else if(loader == 3){
			alert("Upload complete, see values below!");
			loader = 1;
			setvalue();
		}else if(loader ==4){
			alert("Loading complete!");
			loader =1;
			setvalue();
		}
	}

	function setvalue(){
		if(loader == 1){
			numey = <?php if(isset($_SESSION['numexp'])){ echo $_SESSION['numexp'];}else{echo 0;} ?>;
			if(numey > 0){
				for(i = 1; i < numey; i++){
					generateDoc();
				}
			}
			expval = <?php if(isset($_SESSION['expname1'])){
						echo "'" . $_SESSION['expname1'] . "'";
				 			}else{
				 				echo "null";
								 }
					  ?>;
			if(expval != null){
				expvaldiv = document.getElementById("nametab1");
				expvaldiv.setAttribute("value", expval);
			}

			expamo = <?php if(isset($_SESSION['expamo1'])){
					  echo "'" . $_SESSION['expamo1'] . "'";
				 	   }else{
				 		echo "null";
					    }
					  ?>;
			if(expamo != null){
				expamodiv = document.getElementById("amotab1");
				expamodiv.setAttribute("value", expamo);
			}
			if(expval && expamo){
				getTextData(expvaldiv, "nametab1");
				getTextData(expamodiv, "amotab1");
			}
			/* *******************2*********************** */
			expval = <?php if(isset($_SESSION['expname2'])){
				echo "'" . $_SESSION['expname2'] . "'";
				 			}else{
				 				echo "null";
								 }
					  ?>;
			if(expval != null){
				expvaldiv = document.getElementById("nametab2");
				expvaldiv.setAttribute("value", expval);
			}

			expamo = <?php if(isset($_SESSION['expamo2'])){
					  echo "'" . $_SESSION['expamo2'] . "'";
				 	   }else{
				 		echo "null";
					    }
					  ?>;
			if(expamo != null){
				expamodiv = document.getElementById("amotab2");
				expamodiv.setAttribute("value", expamo);
			}
			if(expval && expamo){
				getTextData(expvaldiv, "nametab2");
				getTextData(expamodiv, "amotab2");
			}
			/* *********************3********************* */
			expval = <?php if(isset($_SESSION['expname3'])){
				echo "'" . $_SESSION['expname3'] . "'";
				 			}else{
				 				echo "null";
								 }
					  ?>;
			if(expval != null){
				expvaldiv = document.getElementById("nametab3");
				expvaldiv.setAttribute("value", expval);
			}

			expamo = <?php if(isset($_SESSION['expamo3'])){
					  echo "'" . $_SESSION['expamo3'] . "'";
				 	   }else{
				 		echo "null";
					    }
					  ?>;
			if(expamo != null){
				expamodiv = document.getElementById("amotab3");
				expamodiv.setAttribute("value", expamo);
			}
			if(expval && expamo){
				getTextData(expvaldiv, "nametab3");
				getTextData(expamodiv, "amotab3");
			}
			/* ******************************************* */
			expval = <?php if(isset($_SESSION['expname4'])){
				echo "'" . $_SESSION['expname4'] . "'";
				 			}else{
				 				echo "null";
								 }
					  ?>;
			if(expval != null){
				expvaldiv = document.getElementById("nametab4");
				expvaldiv.setAttribute("value", expval);
			}

			expamo = <?php if(isset($_SESSION['expamo4'])){
					  echo "'" . $_SESSION['expamo4'] . "'";
				 	   }else{
				 		echo "null";
					    }
					  ?>;
			if(expamo != null){
				expamodiv = document.getElementById("amotab4");
				expamodiv.setAttribute("value", expamo);
			}
			if(expval && expamo){
				getTextData(expvaldiv, "nametab4");
				getTextData(expamodiv, "amotab4");
			}
			/* **********************5******************** */
			expval = <?php if(isset($_SESSION['expname5'])){
				echo "'" . $_SESSION['expname5'] . "'";
				 			}else{
				 				echo "null";
								 }
					  ?>;
			if(expval != null){
				expvaldiv = document.getElementById("nametab5");
				expvaldiv.setAttribute("value", expval);
			}

			expamo = <?php if(isset($_SESSION['expamo5'])){
					  echo "'" . $_SESSION['expamo5'] . "'";
				 	   }else{
				 		echo "null";
					    }
					  ?>;
			if(expamo != null){
				expamodiv = document.getElementById("amotab5");
				expamodiv.setAttribute("value", expamo);
			}
			if(expval && expamo){
				getTextData(expvaldiv, "nametab5");
				getTextData(expamodiv, "amotab5");
			}
			/* ******************************************* */
			expval = <?php if(isset($_SESSION['expname6'])){
				echo "'" . $_SESSION['expname6'] . "'";
				 			}else{
				 				echo "null";
								 }
					  ?>;
			if(expval != null){
				expvaldiv = document.getElementById("nametab6");
				expvaldiv.setAttribute("value", expval);
			}

			expamo = <?php if(isset($_SESSION['expamo6'])){
					  echo "'" . $_SESSION['expamo6'] . "'";
				 	   }else{
				 		echo "null";
					    }
					  ?>;
			if(expamo != null){
				expamodiv = document.getElementById("amotab6");
				expamodiv.setAttribute("value", expamo);
			}
			if(expval && expamo){
				getTextData(expvaldiv, "nametab6");
				getTextData(expamodiv, "amotab6");
			}
			/* ******************************************* */
			expval = <?php if(isset($_SESSION['expname7'])){
				echo "'" . $_SESSION['expname7'] . "'";
				 			}else{
				 				echo "null";
								 }
					  ?>;
			if(expval != null){
				expvaldiv = document.getElementById("nametab7");
				expvaldiv.setAttribute("value", expval);
			}

			expamo = <?php if(isset($_SESSION['expamo7'])){
					  echo "'" . $_SESSION['expamo7'] . "'";
				 	   }else{
				 		echo "null";
					    }
					  ?>;
			if(expamo != null){
				expamodiv = document.getElementById("amotab7");
				expamodiv.setAttribute("value", expamo);
			}
			if(expval && expamo){
				getTextData(expvaldiv, "nametab7");
				getTextData(expamodiv, "amotab7");
			}
			/* ******************************************* */
			expval = <?php if(isset($_SESSION['expname8'])){
				echo "'" . $_SESSION['expname2'] . "'";
				 			}else{
				 				echo "null";
								 }
					  ?>;
			if(expval != null){
				expvaldiv = document.getElementById("nametab8");
				expvaldiv.setAttribute("value", expval);
			}

			expamo = <?php if(isset($_SESSION['expamo8'])){
					  echo "'" . $_SESSION['expamo8'] . "'";
				 	   }else{
				 		echo "null";
					    }
					  ?>;
			if(expamo != null){
				expamodiv = document.getElementById("amotab8");
				expamodiv.setAttribute("value", expamo);
			}
			if(expval && expamo){
				getTextData(expvaldiv, "nametab8");
				getTextData(expamodiv, "amotab8");
			}
			/* ******************************************* */
			expval = <?php if(isset($_SESSION['expname9'])){
				echo "'" . $_SESSION['expname9'] . "'";
				 			}else{
				 				echo "null";
								 }
					  ?>;
			if(expval != null){
				expvaldiv = document.getElementById("nametab9");
				expvaldiv.setAttribute("value", expval);
			}

			expamo = <?php if(isset($_SESSION['expamo9'])){
					  echo "'" . $_SESSION['expamo9'] . "'";
				 	   }else{
				 		echo "null";
					    }
					  ?>;
			if(expamo != null){
				expamodiv = document.getElementById("amotab9");
				expamodiv.setAttribute("value", expamo);
			}
			if(expval && expamo){
				getTextData(expvaldiv, "nametab9");
				getTextData(expamodiv, "amotab9");
			}
			/******************************************************HOW MANY SELECTOR**************************************************/
			expamo = <?php if(isset($_SESSION['expselect1'])){
					  echo "'" . $_SESSION['expselect1'] . "'";
				 	   }else{
				 		echo "null";
					    }
					  ?>;
			if(expamo != null){	
				expamodiv = document.getElementById("expselect1");
				expamodiv.selectedIndex = expamo;
				getDropData(expamodiv);
			}
			expamo = <?php if(isset($_SESSION['expselect2'])){
					  echo "'" . $_SESSION['expselect2'] . "'";
				 	   }else{
				 		echo "null";
					    }
					  ?>;
			if(expamo != null){
				
				expamodiv = document.getElementById("expselect2");
				expamodiv.selectedIndex = expamo;
				getDropData(expamodiv);
			}

			expamo = <?php if(isset($_SESSION['expselect3'])){
					  echo "'" . $_SESSION['expselect3'] . "'";
				 	   }else{
				 		echo "null";
					    }
					  ?>;
			if(expamo != null){
				
				expamodiv = document.getElementById("expselect3");
				expamodiv.selectedIndex = expamo;
				getDropData(expamodiv);
			}
			expamo = <?php if(isset($_SESSION['expselect4'])){
					  echo "'" . $_SESSION['expselect4'] . "'";
				 	   }else{
				 		echo "null";
					    }
					  ?>;
			if(expamo != null){
				
				expamodiv = document.getElementById("expselect4");
				expamodiv.selectedIndex = expamo;
				getDropData(expamodiv);
			}
			expamo = <?php if(isset($_SESSION['expselect5'])){
					  echo "'" . $_SESSION['expselect5'] . "'";
				 	   }else{
				 		echo "null";
					    }
					  ?>;
			if(expamo != null){
				
				expamodiv = document.getElementById("expselect5");
				expamodiv.selectedIndex = expamo;
				getDropData(expamodiv);
			}
			expamo = <?php if(isset($_SESSION['expselect6'])){
					  echo "'" . $_SESSION['expselect6'] . "'";
				 	   }else{
				 		echo "null";
					    }
					  ?>;
			if(expamo != null){
				
				expamodiv = document.getElementById("expselect6");
				expamodiv.selectedIndex = expamo;
				getDropData(expamodiv);
			}
			expamo = <?php if(isset($_SESSION['expselect7'])){
					  echo "'" . $_SESSION['expselect7'] . "'";
				 	   }else{
				 		echo "null";
					    }
					  ?>;
			if(expamo != null){
				
				expamodiv = document.getElementById("expselect7");
				expamodiv.selectedIndex = expamo;
				getDropData(expamodiv);
			}
			expamo = <?php if(isset($_SESSION['expselect8'])){
					  echo "'" . $_SESSION['expselect8'] . "'";
				 	   }else{
				 		echo "null";
					    }
					  ?>;
			if(expamo != null){
				
				expamodiv = document.getElementById("expselect8");
				expamodiv.selectedIndex = expamo;
				getDropData(expamodiv);
			}
			expamo = <?php if(isset($_SESSION['expselect9'])){
					  echo "'" . $_SESSION['expselect9'] . "'";
				 	   }else{
				 		echo "null";
					    }
					  ?>;
			if(expamo != null){
				
				expamodiv = document.getElementById("expselect9");
				expamodiv.selectedIndex = expamo;
				getDropData(expamodiv);
			}

		/******************************************************WHAT WAY SELECTOR**************************************************/
			expamo = <?php if(isset($_SESSION['divyselect1'])){
					  echo "'" . $_SESSION['divyselect1'] . "'";
				 	   }else{
				 		echo "null";
					    }
					  ?>;
			if(expamo != null){
				if(expamo == 'Equally'){
					expamo = 1;
				}
				if(expamo == 'By Income Ratio'){
					expamo = 2;
				}
				if(expamo == 'By Use'){
					expamo = 3;
				}
				if(expamo == "Select One"){
					expamo = 0;
				}
				expamodiv = document.getElementById("divyselect1");
				expamodiv.selectedIndex = expamo;
				divyFunc(expamodiv);
			}

			expamo = <?php if(isset($_SESSION['divyselect2'])){
					  echo "'" . $_SESSION['divyselect2'] . "'";
				 	   }else{
				 		echo "null";
					    }
					  ?>;
			if(expamo != null){
				if(expamo == 'Equally'){
					expamo = 1;
				}
				if(expamo == 'By Income Ratio'){
					expamo = 2;
				}
				if(expamo == 'By Use'){
					expamo = 3;
				}
				if(expamo == "Select One"){
					expamo = 0;
				}
				expamodiv = document.getElementById("divyselect2");
				expamodiv.selectedIndex = expamo;
				divyFunc(expamodiv);
			}

			expamo = <?php if(isset($_SESSION['divyselect3'])){
					  echo "'" . $_SESSION['divyselect3'] . "'";
				 	   }else{
				 		echo "null";
					    }
					  ?>;
			if(expamo != null){
				if(expamo == 'Equally'){
					expamo = 1;
				}
				if(expamo == 'By Income Ratio'){
					expamo = 2;
				}
				if(expamo == 'By Use'){
					expamo = 3;
				}
				if(expamo == "Select One"){
					expamo = 0;
				}
				expamodiv = document.getElementById("divyselect3");
				expamodiv.selectedIndex = expamo;
				divyFunc(expamodiv);
			}

			expamo = <?php if(isset($_SESSION['divyselect4'])){
					  echo "'" . $_SESSION['divyselect4'] . "'";
				 	   }else{
				 		echo "null";
					    }
					  ?>;
			if(expamo != null){
				if(expamo == 'Equally'){
					expamo = 1;
				}
				if(expamo == 'By Income Ratio'){
					expamo = 2;
				}
				if(expamo == 'By Use'){
					expamo = 3;
				}
				if(expamo == "Select One"){
					expamo = 0;
				}
				expamodiv = document.getElementById("divyselect4");
				expamodiv.selectedIndex = expamo;
				divyFunc(expamodiv);
			}

			expamo = <?php if(isset($_SESSION['divyselect5'])){
					  echo "'" . $_SESSION['divyselect5'] . "'";
				 	   }else{
				 		echo "null";
					    }
					  ?>;
			if(expamo != null){
				if(expamo == 'Equally'){
					expamo = 1;
				}
				if(expamo == 'By Income Ratio'){
					expamo = 2;
				}
				if(expamo == 'By Use'){
					expamo = 3;
				}
				if(expamo == "Select One"){
					expamo = 0;
				}
				expamodiv = document.getElementById("divyselect5");
				expamodiv.selectedIndex = expamo;
				divyFunc(expamodiv);
			}

			expamo = <?php if(isset($_SESSION['divyselect6'])){
					  echo "'" . $_SESSION['divyselect6'] . "'";
				 	   }else{
				 		echo "null";
					    }
					  ?>;
			if(expamo != null){
				if(expamo == 'Equally'){
					expamo = 1;
				}
				if(expamo == 'By Income Ratio'){
					expamo = 2;
				}
				if(expamo == 'By Use'){
					expamo = 3;
				}
				if(expamo == "Select One"){
					expamo = 0;
				}
				expamodiv = document.getElementById("divyselect6");
				expamodiv.selectedIndex = expamo;
				divyFunc(expamodiv);
			}

			expamo = <?php if(isset($_SESSION['divyselect7'])){
					  echo "'" . $_SESSION['divyselect7'] . "'";
				 	   }else{
				 		echo "null";
					    }
					  ?>;
			if(expamo != null){
				if(expamo == 'Equally'){
					expamo = 1;
				}
				if(expamo == 'By Income Ratio'){
					expamo = 2;
				}
				if(expamo == 'By Use'){
					expamo = 3;
				}
				if(expamo == "Select One"){
					expamo = 0;
				}
				expamodiv = document.getElementById("divyselect7");
				expamodiv.selectedIndex = expamo;
				divyFunc(expamodiv);
			}

			expamo = <?php if(isset($_SESSION['divyselect8'])){
					  echo "'" . $_SESSION['divyselect8'] . "'";
				 	   }else{
				 		echo "null";
					    }
					  ?>;
			if(expamo != null){
				if(expamo == 'Equally'){
					expamo = 1;
				}
				if(expamo == 'By Income Ratio'){
					expamo = 2;
				}
				if(expamo == 'By Use'){
					expamo = 3;
				}
				if(expamo == "Select One"){
					expamo = 0;
				}
				expamodiv = document.getElementById("divyselect8");
				expamodiv.selectedIndex = expamo;
				divyFunc(expamodiv);
			}

			expamo = <?php if(isset($_SESSION['divyselect9'])){
					  echo "'" . $_SESSION['divyselect9'] . "'";
				 	   }else{
				 		echo "null";
					    }
					  ?>;
			if(expamo != null){
				if(expamo == 'Equally'){
					expamo = 1;
				}
				if(expamo == 'By Income Ratio'){
					expamo = 2;
				}
				if(expamo == 'By Use'){
					expamo = 3;
				}
				if(expamo == "Select One"){
					expamo = 0;
				}
				expamodiv = document.getElementById("divyselect9");
				expamodiv.selectedIndex = expamo;
				divyFunc(expamodiv);
			}
/////////////////////////////////*******************INCOMECALC SECTION******************************************************//////////////////
			/////////////////////////////////////////////////END DIVEXP////////////////////////////////////////////////////////////
					expamo = <?php sendInc(1, 1); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc11");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}

			expamo = <?php sendInc(1, 2); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc12");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}

			expamo = <?php sendInc(1, 3); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc13");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}

			expamo = <?php sendInc(1, 4); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc14");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}
						expamo = <?php sendInc(1, 5); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc15");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}

			expamo = <?php sendInc(1, 6); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc16");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}

			/////////////////////////////////START TWO//////////////////////////////////
			expamo = <?php sendInc(2, 1); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc21");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}

			expamo = <?php sendInc(2, 2); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc22");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}

			expamo = <?php sendInc(2, 3); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc23");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}

			expamo = <?php sendInc(2, 4); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc24");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}
						expamo = <?php sendInc(2, 5); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc25");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}

			expamo = <?php sendInc(2, 6); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc26");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}
			////////////////////////////////////////START THREE//////////////////////////////////
			expamo = <?php sendInc(3, 1); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc31");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}

			expamo = <?php sendInc(3, 2); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc32");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}

			expamo = <?php sendInc(3, 3); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc33");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}

			expamo = <?php sendInc(3, 4); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc34");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}
						expamo = <?php sendInc(3, 5); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc35");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}

			expamo = <?php sendInc(3, 6); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc36");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}
			///////////////////////////////////////////START FOUR//////////////////////////////////////////////////////////////////
			expamo = <?php sendInc(4, 1); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc41");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}

			expamo = <?php sendInc(4, 2); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc42");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}

			expamo = <?php sendInc(4, 3); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc43");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}

			expamo = <?php sendInc(4, 4); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc44");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}
						expamo = <?php sendInc(4, 5); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc45");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}

			expamo = <?php sendInc(4, 6); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc46");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}
			/////////////////////////////////////START FIVE////////////////////////////////////////
			expamo = <?php sendInc(5, 1); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc51");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}

			expamo = <?php sendInc(5, 2); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc52");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}

			expamo = <?php sendInc(5, 3); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc53");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}

			expamo = <?php sendInc(5, 4); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc54");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}
						expamo = <?php sendInc(5, 5); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc55");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}

			expamo = <?php sendInc(5, 6); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc56");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////

			expamo = <?php sendInc(6, 1); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc61");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}

			expamo = <?php sendInc(6, 2); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc62");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}

			expamo = <?php sendInc(6, 3); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc63");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}

			expamo = <?php sendInc(6, 4); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc64");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}
						expamo = <?php sendInc(6, 5); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc65");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}

			expamo = <?php sendInc(6, 6); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc66");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}
			/////////////////////////////////////////////////////////START SEVEN//////////////////////////////////////////
						expamo = <?php sendInc(7, 1); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc71");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}

			expamo = <?php sendInc(7, 2); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc72");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}

			expamo = <?php sendInc(7, 3); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc73");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}

			expamo = <?php sendInc(7, 4); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc74");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}
						expamo = <?php sendInc(7, 5); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc75");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}

			expamo = <?php sendInc(7, 6); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc76");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}
			//////////////////////////////////////////////////////////////////////////////////////////////////////
			expamo = <?php sendInc(8, 1); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc81");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}

			expamo = <?php sendInc(8, 2); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc82");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}

			expamo = <?php sendInc(8, 3); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc83");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}

			expamo = <?php sendInc(8, 4); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc84");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}
						expamo = <?php sendInc(8, 5); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc85");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}

			expamo = <?php sendInc(8, 6); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc86");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}
			//////////////////////////////////////////////////////////////////////////////
						expamo = <?php sendInc(9, 1); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc91");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}

			expamo = <?php sendInc(9, 2); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc92");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}

			expamo = <?php sendInc(9, 3); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc93");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}

			expamo = <?php sendInc(9, 4); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc94");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}
						expamo = <?php sendInc(9, 5); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc95");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}

			expamo = <?php sendInc(9, 6); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("incomecalc96");
				expamodiv.setAttribute("value", expamo); incomeRat(expamodiv);
			}
	/////////////////////////////////////////////////////////////////////////////////////////////////////////
				expamo = <?php sendExp(1, 1); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp11");
				expamodiv.setAttribute("value", expamo);
			}

			expamo = <?php sendExp(1, 2); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp12");
				expamodiv.setAttribute("value", expamo);
			}

			expamo = <?php sendExp(1, 3); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp13");
				expamodiv.setAttribute("value", expamo);
			}

			expamo = <?php sendExp(1, 4); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp14");
				expamodiv.setAttribute("value", expamo);
			}
						expamo = <?php sendExp(1, 5); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp15");
				expamodiv.setAttribute("value", expamo);
			}

			expamo = <?php sendExp(1, 6); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp16");
				expamodiv.setAttribute("value", expamo);
			}

			/////////////////////////////////START TWO//////////////////////////////////
			expamo = <?php sendExp(2, 1); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp21");
				expamodiv.setAttribute("value", expamo);
			}

			expamo = <?php sendExp(2, 2); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp22");
				expamodiv.setAttribute("value", expamo);
			}

			expamo = <?php sendExp(2, 3); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp23");
				expamodiv.setAttribute("value", expamo);
			}

			expamo = <?php sendExp(2, 4); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp24");
				expamodiv.setAttribute("value", expamo);
			}
						expamo = <?php sendExp(2, 5); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp25");
				expamodiv.setAttribute("value", expamo);
			}

			expamo = <?php sendExp(2, 6); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp26");
				expamodiv.setAttribute("value", expamo);
			}
			////////////////////////////////////////START THREE//////////////////////////////////
			expamo = <?php sendExp(3, 1); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp31");
				expamodiv.setAttribute("value", expamo);
			}

			expamo = <?php sendExp(3, 2); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp32");
				expamodiv.setAttribute("value", expamo);
			}

			expamo = <?php sendExp(3, 3); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp33");
				expamodiv.setAttribute("value", expamo);
			}

			expamo = <?php sendExp(3, 4); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp34");
				expamodiv.setAttribute("value", expamo);
			}
						expamo = <?php sendExp(3, 5); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp35");
				expamodiv.setAttribute("value", expamo);
			}

			expamo = <?php sendExp(3, 6); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp36");
				expamodiv.setAttribute("value", expamo);
			}
			///////////////////////////////////////////START FOUR//////////////////////////////////////////////////////////////////
			expamo = <?php sendExp(4, 1); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp41");
				expamodiv.setAttribute("value", expamo);
			}

			expamo = <?php sendExp(4, 2); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp42");
				expamodiv.setAttribute("value", expamo);
			}

			expamo = <?php sendExp(4, 3); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp43");
				expamodiv.setAttribute("value", expamo);
			}

			expamo = <?php sendExp(4, 4); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp44");
				expamodiv.setAttribute("value", expamo);
			}
						expamo = <?php sendExp(4, 5); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp45");
				expamodiv.setAttribute("value", expamo);
			}

			expamo = <?php sendExp(4, 6); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp46");
				expamodiv.setAttribute("value", expamo);
			}
			/////////////////////////////////////START FIVE////////////////////////////////////////
			expamo = <?php sendExp(5, 1); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp51");
				expamodiv.setAttribute("value", expamo);
			}

			expamo = <?php sendExp(5, 2); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp52");
				expamodiv.setAttribute("value", expamo);
			}

			expamo = <?php sendExp(5, 3); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp53");
				expamodiv.setAttribute("value", expamo);
			}

			expamo = <?php sendExp(5, 4); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp54");
				expamodiv.setAttribute("value", expamo);
			}
						expamo = <?php sendExp(5, 5); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp55");
				expamodiv.setAttribute("value", expamo);
			}

			expamo = <?php sendExp(5, 6); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp56");
				expamodiv.setAttribute("value", expamo);
			}
			///////////////////////////////////////////////////////////////////////////////////////////////////////////////

			expamo = <?php sendExp(6, 1); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp61");
				expamodiv.setAttribute("value", expamo);
			}

			expamo = <?php sendExp(6, 2); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp62");
				expamodiv.setAttribute("value", expamo);
			}

			expamo = <?php sendExp(6, 3); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp63");
				expamodiv.setAttribute("value", expamo);
			}

			expamo = <?php sendExp(6, 4); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp64");
				expamodiv.setAttribute("value", expamo);
			}
						expamo = <?php sendExp(6, 5); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp65");
				expamodiv.setAttribute("value", expamo);
			}

			expamo = <?php sendExp(6, 6); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp66");
				expamodiv.setAttribute("value", expamo);
			}
			/////////////////////////////////////////////////////////START SEVEN//////////////////////////////////////////
						expamo = <?php sendExp(7, 1); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp71");
				expamodiv.setAttribute("value", expamo);
			}

			expamo = <?php sendExp(7, 2); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp72");
				expamodiv.setAttribute("value", expamo);
			}

			expamo = <?php sendExp(7, 3); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp73");
				expamodiv.setAttribute("value", expamo);
			}

			expamo = <?php sendExp(7, 4); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp74");
				expamodiv.setAttribute("value", expamo);
			}
						expamo = <?php sendExp(7, 5); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp75");
				expamodiv.setAttribute("value", expamo);
			}

			expamo = <?php sendExp(7, 6); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp76");
				expamodiv.setAttribute("value", expamo);
			}
			//////////////////////////////////////////////////////////////////////////////////////////////////////
			expamo = <?php sendExp(8, 1); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp81");
				expamodiv.setAttribute("value", expamo);
			}

			expamo = <?php sendExp(8, 2); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp82");
				expamodiv.setAttribute("value", expamo);
			}

			expamo = <?php sendExp(8, 3); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp83");
				expamodiv.setAttribute("value", expamo);
			}

			expamo = <?php sendExp(8, 4); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp84");
				expamodiv.setAttribute("value", expamo);
			}
						expamo = <?php sendExp(8, 5); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp85");
				expamodiv.setAttribute("value", expamo);
			}

			expamo = <?php sendExp(8, 6); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp86");
				expamodiv.setAttribute("value", expamo);
			}
			//////////////////////////////////////////////////////////////////////////////
						expamo = <?php sendExp(9, 1); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp91");
				expamodiv.setAttribute("value", expamo);
			}

			expamo = <?php sendExp(9, 2); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp92");
				expamodiv.setAttribute("value", expamo);
			}

			expamo = <?php sendExp(9, 3); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp93");
				expamodiv.setAttribute("value", expamo);
			}

			expamo = <?php sendExp(9, 4); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp94");
				expamodiv.setAttribute("value", expamo);
			}
						expamo = <?php sendExp(9, 5); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp95");
				expamodiv.setAttribute("value", expamo);
			}

			expamo = <?php sendExp(9, 6); ?>;
			
			if(expamo != null){
				expamodiv = document.getElementById("divexp96");
				expamodiv.setAttribute("value", expamo);
			}
		}
	}
</script>