<script>

function savedload(){
		loader = <?php if(isset($_SESSION['saved'])){
					if($_SESSION['saved'] === 1){
						echo 1;
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
		}else if(loader == 2){
			alert("Save failed, please check your information and resubmit.")
		}
	}

	function setvalue(){
		if(loader == 1){
			alert("Set value was called");
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
			alert("Above it");
			expamo = <?php if(isset($_SESSION['expselect1'])){
					  echo "'" . $_SESSION['expselect1'] . "'";
				 	   }else{
				 		echo "null";
					    }
					  ?>;
			alert("You made it here")
			if(expamo != null){
				alert("Null list")
				expamodiv = document.getElementById("expselect1");
				expamodiv.setAttribute("value", expamo);
			}
		}
	}
</script>