<!DOCTYPE html>

<?php
echo("hello  there");
//hello there;
/*hello there*/;
#hello there;
$servername = "localhost";
$username = "mydatabase_admin";
$password = "dbpass";
$dbname = "websitebase";

$user = $_SESSION['username'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$today = new DateTime('first day of this month');
$date = new DateTime('first day of this month');
$todaymonth = $today->format('m');
$todayyear = $today->format("Y");
$todayender = $today->format('t');

$datemonth[0] = $todaymonth;
$datender[0] = $today->format('t');

for($i = 1; $i < 12; $i ++){     
	$date->modify('-1 month');
	$datemonth[$i] = $date->format('m');
	$datender[$i] = $date->format('t');
}

for($i = 0; $i < 12; $i++){
	if($datemonth[$i] > $todaymonth){
		$dateyear[$i] = ($todayyear-1);
	}else{
		$dateyear[$i] = ($todayyear);
	}
}

for($i = 0; $i < 12; $i++){
$sqlnew = "SELECT * FROM expinfo WHERE Username = '$user' AND expinfo.Date BETWEEN '$dateyear[$i]-$datemonth[$i]-01' AND '$dateyear[$i]-$datemonth[$i]-$datender[$i]' ORDER BY expinfo.Date DESC, expinfo.Session DESC LIMIT 1";

$resultnew = $conn->query($sqlnew);

if(mysqli_num_rows($resultnew) > 0){
	while($row = $resultnew->fetch_assoc()){
	foreach($row as $cname => $cvalue){
		$key = $datemonth[$i] . $cname;
		if(($cvalue != '0') or ($cvalue != "")){
			$_SESSION[$key] = $cvalue;
		}else{
			$_SESSION[$key] = null;
		}
		}
	}
	}
}

$today = new DateTime('first day of this month');
$startmonth = $today->format('m');
$datemonth = [];

$datemonth[0] = $startmonth;

for($i = 1; $i < 12; $i ++){
	$today->modify('-1 month');
	$datemonth[$i] = $today->format('m');
	$datender[$i] = $today->format('t');
}

function getAmo($array, $i, $j){
	$name = $array[$i] . "expamo" . $j;
  if(isset($_SESSION[$name])){
					  echo "'" . $_SESSION[$name] . "'";
				 	   }else{
				 		echo "null";
					    }
}

function getExp($array, $i, $j){
	$name = $array[$i] . "expname" . $j;
  if(isset($_SESSION[$name])){
					  echo "'" . $_SESSION[$name] . "'";
				 	   }else{
				 		echo "null";
					    }
}



?>

<script>

var comparNameMat = [];
for(i = 0; i < 12; i++){
		comparNameMat[i] = [];
}
var comparAmoMat = [];
for(i = 0; i < 12; i++){
		comparAmoMat[i] = [];
}
var AmoSums = [];
var startmonth = convertMonth(<?php echo $datemonth[0]; ?>);
var Months = [];
/////////////////////////////////////////////////GET VALUES/////////////////////////////////////////////////

Months[0] = convertMonth(<?php echo $datemonth[0]; ?>);
Months[1] = convertMonth(<?php echo $datemonth[1]; ?>);
Months[2] = convertMonth(<?php echo $datemonth[2]; ?>);
Months[3] = convertMonth(<?php echo $datemonth[3]; ?>);
Months[4] = convertMonth(<?php echo $datemonth[4]; ?>);
Months[5] = convertMonth(<?php echo $datemonth[5]; ?>);
Months[6] = convertMonth(<?php echo $datemonth[6]; ?>);
Months[7] = convertMonth(<?php echo $datemonth[7]; ?>);
Months[8] = convertMonth(<?php echo $datemonth[8]; ?>);
Months[9] = convertMonth(<?php echo $datemonth[9]; ?>);
Months[10] = convertMonth(<?php echo $datemonth[10]; ?>);
Months[11] = convertMonth(<?php echo $datemonth[11]; ?>);

comparNameMat[0][1] = <?php getExp($datemonth, 0, 1); ?>;
comparNameMat[0][2] = <?php getExp($datemonth, 0, 2); ?>;
comparNameMat[0][3] = <?php getExp($datemonth, 0, 3); ?>;
comparNameMat[0][4] = <?php getExp($datemonth, 0, 4); ?>;
comparNameMat[0][5] = <?php getExp($datemonth, 0, 5); ?>;
comparNameMat[0][6] = <?php getExp($datemonth, 0, 6); ?>;
comparNameMat[0][7] = <?php getExp($datemonth, 0, 7); ?>;
comparNameMat[0][8] = <?php getExp($datemonth, 0, 8); ?>;
comparNameMat[0][9] = <?php getExp($datemonth, 0, 9); ?>;
comparNameMat[1][1] = <?php getExp($datemonth, 1, 1); ?>;
comparNameMat[1][2] = <?php getExp($datemonth, 1, 2); ?>;
comparNameMat[1][3] = <?php getExp($datemonth, 1, 3); ?>;
comparNameMat[1][4] = <?php getExp($datemonth, 1, 4); ?>;
comparNameMat[1][5] = <?php getExp($datemonth, 1, 5); ?>;
comparNameMat[1][6] = <?php getExp($datemonth, 1, 6); ?>;
comparNameMat[1][7] = <?php getExp($datemonth, 1, 7); ?>;
comparNameMat[1][8] = <?php getExp($datemonth, 1, 8); ?>;
comparNameMat[1][9] = <?php getExp($datemonth, 1, 9); ?>;
comparNameMat[2][1] = <?php getExp($datemonth, 2, 1); ?>;
comparNameMat[2][2] = <?php getExp($datemonth, 2, 2); ?>;
comparNameMat[2][3] = <?php getExp($datemonth, 2, 3); ?>;
comparNameMat[2][4] = <?php getExp($datemonth, 2, 4); ?>;
comparNameMat[2][5] = <?php getExp($datemonth, 2, 5); ?>;
comparNameMat[2][6] = <?php getExp($datemonth, 2, 6); ?>;
comparNameMat[2][7] = <?php getExp($datemonth, 2, 7); ?>;
comparNameMat[2][8] = <?php getExp($datemonth, 2, 8); ?>;
comparNameMat[2][9] = <?php getExp($datemonth, 2, 9); ?>;
comparNameMat[3][1] = <?php getExp($datemonth, 3, 1); ?>;
comparNameMat[3][2] = <?php getExp($datemonth, 3, 2); ?>;
comparNameMat[3][3] = <?php getExp($datemonth, 3, 3); ?>;
comparNameMat[3][4] = <?php getExp($datemonth, 3, 4); ?>;
comparNameMat[3][5] = <?php getExp($datemonth, 3, 5); ?>;
comparNameMat[3][6] = <?php getExp($datemonth, 3, 6); ?>;
comparNameMat[3][7] = <?php getExp($datemonth, 3, 7); ?>;
comparNameMat[3][8] = <?php getExp($datemonth, 3, 8); ?>;
comparNameMat[3][9] = <?php getExp($datemonth, 3, 9); ?>;
comparNameMat[4][1] = <?php getExp($datemonth, 4, 1); ?>;
comparNameMat[4][2] = <?php getExp($datemonth, 4, 2); ?>;
comparNameMat[4][3] = <?php getExp($datemonth, 4, 3); ?>;
comparNameMat[4][4] = <?php getExp($datemonth, 4, 4); ?>;
comparNameMat[4][5] = <?php getExp($datemonth, 4, 5); ?>;
comparNameMat[4][6] = <?php getExp($datemonth, 4, 6); ?>;
comparNameMat[4][7] = <?php getExp($datemonth, 4, 7); ?>;
comparNameMat[4][8] = <?php getExp($datemonth, 4, 8); ?>;
comparNameMat[4][9] = <?php getExp($datemonth, 4, 9); ?>;
comparNameMat[5][1] = <?php getExp($datemonth, 5, 1); ?>;
comparNameMat[5][2] = <?php getExp($datemonth, 5, 2); ?>;
comparNameMat[5][3] = <?php getExp($datemonth, 5, 3); ?>;
comparNameMat[5][4] = <?php getExp($datemonth, 5, 4); ?>;
comparNameMat[5][5] = <?php getExp($datemonth, 5, 5); ?>;
comparNameMat[5][6] = <?php getExp($datemonth, 5, 6); ?>;
comparNameMat[5][7] = <?php getExp($datemonth, 5, 7); ?>;
comparNameMat[5][8] = <?php getExp($datemonth, 5, 8); ?>;
comparNameMat[5][9] = <?php getExp($datemonth, 5, 9); ?>;
comparNameMat[6][1] = <?php getExp($datemonth, 6, 1); ?>;
comparNameMat[6][2] = <?php getExp($datemonth, 6, 2); ?>;
comparNameMat[6][3] = <?php getExp($datemonth, 6, 3); ?>;
comparNameMat[6][4] = <?php getExp($datemonth, 6, 4); ?>;
comparNameMat[6][5] = <?php getExp($datemonth, 6, 5); ?>;
comparNameMat[6][6] = <?php getExp($datemonth, 6, 6); ?>;
comparNameMat[6][7] = <?php getExp($datemonth, 6, 7); ?>;
comparNameMat[6][8] = <?php getExp($datemonth, 6, 8); ?>;
comparNameMat[6][9] = <?php getExp($datemonth, 6, 9); ?>;
comparNameMat[7][1] = <?php getExp($datemonth, 7, 1); ?>;
comparNameMat[7][2] = <?php getExp($datemonth, 7, 2); ?>;
comparNameMat[7][3] = <?php getExp($datemonth, 7, 3); ?>;
comparNameMat[7][4] = <?php getExp($datemonth, 7, 4); ?>;
comparNameMat[7][5] = <?php getExp($datemonth, 7, 5); ?>;
comparNameMat[7][6] = <?php getExp($datemonth, 7, 6); ?>;
comparNameMat[7][7] = <?php getExp($datemonth, 7, 7); ?>;
comparNameMat[7][8] = <?php getExp($datemonth, 7, 8); ?>;
comparNameMat[7][9] = <?php getExp($datemonth, 7, 9); ?>;
comparNameMat[8][1] = <?php getExp($datemonth, 8, 1); ?>;
comparNameMat[8][2] = <?php getExp($datemonth, 8, 2); ?>;
comparNameMat[8][3] = <?php getExp($datemonth, 8, 3); ?>;
comparNameMat[8][4] = <?php getExp($datemonth, 8, 4); ?>;
comparNameMat[8][5] = <?php getExp($datemonth, 8, 5); ?>;
comparNameMat[8][6] = <?php getExp($datemonth, 8, 6); ?>;
comparNameMat[8][7] = <?php getExp($datemonth, 8, 7); ?>;
comparNameMat[8][8] = <?php getExp($datemonth, 8, 8); ?>;
comparNameMat[8][9] = <?php getExp($datemonth, 8, 9); ?>;
comparNameMat[9][1] = <?php getExp($datemonth, 9, 1); ?>;
comparNameMat[9][2] = <?php getExp($datemonth, 9, 2); ?>;
comparNameMat[9][3] = <?php getExp($datemonth, 9, 3); ?>;
comparNameMat[9][4] = <?php getExp($datemonth, 9, 4); ?>;
comparNameMat[9][5] = <?php getExp($datemonth, 9, 5); ?>;
comparNameMat[9][6] = <?php getExp($datemonth, 9, 6); ?>;
comparNameMat[9][7] = <?php getExp($datemonth, 9, 7); ?>;
comparNameMat[9][8] = <?php getExp($datemonth, 9, 8); ?>;
comparNameMat[9][9] = <?php getExp($datemonth, 9, 9); ?>;
comparNameMat[10][1] = <?php getExp($datemonth, 10, 1); ?>;
comparNameMat[10][2] = <?php getExp($datemonth, 10, 2); ?>;
comparNameMat[10][3] = <?php getExp($datemonth, 10, 3); ?>;
comparNameMat[10][4] = <?php getExp($datemonth, 10, 4); ?>;
comparNameMat[10][5] = <?php getExp($datemonth, 10, 5); ?>;
comparNameMat[10][6] = <?php getExp($datemonth, 10, 6); ?>;
comparNameMat[10][7] = <?php getExp($datemonth, 10, 7); ?>;
comparNameMat[10][8] = <?php getExp($datemonth, 10, 8); ?>;
comparNameMat[10][9] = <?php getExp($datemonth, 10, 9); ?>;
comparNameMat[11][1] = <?php getExp($datemonth, 11, 1); ?>;
comparNameMat[11][2] = <?php getExp($datemonth, 11, 2); ?>;
comparNameMat[11][3] = <?php getExp($datemonth, 11, 3); ?>;
comparNameMat[11][4] = <?php getExp($datemonth, 11, 4); ?>;
comparNameMat[11][5] = <?php getExp($datemonth, 11, 5); ?>;
comparNameMat[11][6] = <?php getExp($datemonth, 11, 6); ?>;
comparNameMat[11][7] = <?php getExp($datemonth, 11, 7); ?>;
comparNameMat[11][8] = <?php getExp($datemonth, 11, 8); ?>;
comparNameMat[11][9] = <?php getExp($datemonth, 11, 9); ?>;

comparAmoMat[0][1] = <?php getAmo($datemonth, 0, 1); ?>;
comparAmoMat[0][2] = <?php getAmo($datemonth, 0, 2); ?>;
comparAmoMat[0][3] = <?php getAmo($datemonth, 0, 3); ?>;
comparAmoMat[0][4] = <?php getAmo($datemonth, 0, 4); ?>;
comparAmoMat[0][5] = <?php getAmo($datemonth, 0, 5); ?>;
comparAmoMat[0][6] = <?php getAmo($datemonth, 0, 6); ?>;
comparAmoMat[0][7] = <?php getAmo($datemonth, 0, 7); ?>;
comparAmoMat[0][8] = <?php getAmo($datemonth, 0, 8); ?>;
comparAmoMat[0][9] = <?php getAmo($datemonth, 0, 9); ?>;
comparAmoMat[1][1] = <?php getAmo($datemonth, 1, 1); ?>;
comparAmoMat[1][2] = <?php getAmo($datemonth, 1, 2); ?>;
comparAmoMat[1][3] = <?php getAmo($datemonth, 1, 3); ?>;
comparAmoMat[1][4] = <?php getAmo($datemonth, 1, 4); ?>;
comparAmoMat[1][5] = <?php getAmo($datemonth, 1, 5); ?>;
comparAmoMat[1][6] = <?php getAmo($datemonth, 1, 6); ?>;
comparAmoMat[1][7] = <?php getAmo($datemonth, 1, 7); ?>;
comparAmoMat[1][8] = <?php getAmo($datemonth, 1, 8); ?>;
comparAmoMat[1][9] = <?php getAmo($datemonth, 1, 9); ?>;
comparAmoMat[2][1] = <?php getAmo($datemonth, 2, 1); ?>;
comparAmoMat[2][2] = <?php getAmo($datemonth, 2, 2); ?>;
comparAmoMat[2][3] = <?php getAmo($datemonth, 2, 3); ?>;
comparAmoMat[2][4] = <?php getAmo($datemonth, 2, 4); ?>;
comparAmoMat[2][5] = <?php getAmo($datemonth, 2, 5); ?>;
comparAmoMat[2][6] = <?php getAmo($datemonth, 2, 6); ?>;
comparAmoMat[2][7] = <?php getAmo($datemonth, 2, 7); ?>;
comparAmoMat[2][8] = <?php getAmo($datemonth, 2, 8); ?>;
comparAmoMat[2][9] = <?php getAmo($datemonth, 2, 9); ?>;
comparAmoMat[3][1] = <?php getAmo($datemonth, 3, 1); ?>;
comparAmoMat[3][2] = <?php getAmo($datemonth, 3, 2); ?>;
comparAmoMat[3][3] = <?php getAmo($datemonth, 3, 3); ?>;
comparAmoMat[3][4] = <?php getAmo($datemonth, 3, 4); ?>;
comparAmoMat[3][5] = <?php getAmo($datemonth, 3, 5); ?>;
comparAmoMat[3][6] = <?php getAmo($datemonth, 3, 6); ?>;
comparAmoMat[3][7] = <?php getAmo($datemonth, 3, 7); ?>;
comparAmoMat[3][8] = <?php getAmo($datemonth, 3, 8); ?>;
comparAmoMat[3][9] = <?php getAmo($datemonth, 3, 9); ?>;
comparAmoMat[4][1] = <?php getAmo($datemonth, 4, 1); ?>;
comparAmoMat[4][2] = <?php getAmo($datemonth, 4, 2); ?>;
comparAmoMat[4][3] = <?php getAmo($datemonth, 4, 3); ?>;
comparAmoMat[4][4] = <?php getAmo($datemonth, 4, 4); ?>;
comparAmoMat[4][5] = <?php getAmo($datemonth, 4, 5); ?>;
comparAmoMat[4][6] = <?php getAmo($datemonth, 4, 6); ?>;
comparAmoMat[4][7] = <?php getAmo($datemonth, 4, 7); ?>;
comparAmoMat[4][8] = <?php getAmo($datemonth, 4, 8); ?>;
comparAmoMat[4][9] = <?php getAmo($datemonth, 4, 9); ?>;
comparAmoMat[5][1] = <?php getAmo($datemonth, 5, 1); ?>;
comparAmoMat[5][2] = <?php getAmo($datemonth, 5, 2); ?>;
comparAmoMat[5][3] = <?php getAmo($datemonth, 5, 3); ?>;
comparAmoMat[5][4] = <?php getAmo($datemonth, 5, 4); ?>;
comparAmoMat[5][5] = <?php getAmo($datemonth, 5, 5); ?>;
comparAmoMat[5][6] = <?php getAmo($datemonth, 5, 6); ?>;
comparAmoMat[5][7] = <?php getAmo($datemonth, 5, 7); ?>;
comparAmoMat[5][8] = <?php getAmo($datemonth, 5, 8); ?>;
comparAmoMat[5][9] = <?php getAmo($datemonth, 5, 9); ?>;
comparAmoMat[6][1] = <?php getAmo($datemonth, 6, 1); ?>;
comparAmoMat[6][2] = <?php getAmo($datemonth, 6, 2); ?>;
comparAmoMat[6][3] = <?php getAmo($datemonth, 6, 3); ?>;
comparAmoMat[6][4] = <?php getAmo($datemonth, 6, 4); ?>;
comparAmoMat[6][5] = <?php getAmo($datemonth, 6, 5); ?>;
comparAmoMat[6][6] = <?php getAmo($datemonth, 6, 6); ?>;
comparAmoMat[6][7] = <?php getAmo($datemonth, 6, 7); ?>;
comparAmoMat[6][8] = <?php getAmo($datemonth, 6, 8); ?>;
comparAmoMat[6][9] = <?php getAmo($datemonth, 6, 9); ?>;
comparAmoMat[7][1] = <?php getAmo($datemonth, 7, 1); ?>;
comparAmoMat[7][2] = <?php getAmo($datemonth, 7, 2); ?>;
comparAmoMat[7][3] = <?php getAmo($datemonth, 7, 3); ?>;
comparAmoMat[7][4] = <?php getAmo($datemonth, 7, 4); ?>;
comparAmoMat[7][5] = <?php getAmo($datemonth, 7, 5); ?>;
comparAmoMat[7][6] = <?php getAmo($datemonth, 7, 6); ?>;
comparAmoMat[7][7] = <?php getAmo($datemonth, 7, 7); ?>;
comparAmoMat[7][8] = <?php getAmo($datemonth, 7, 8); ?>;
comparAmoMat[7][9] = <?php getAmo($datemonth, 7, 9); ?>;
comparAmoMat[8][1] = <?php getAmo($datemonth, 8, 1); ?>;
comparAmoMat[8][2] = <?php getAmo($datemonth, 8, 2); ?>;
comparAmoMat[8][3] = <?php getAmo($datemonth, 8, 3); ?>;
comparAmoMat[8][4] = <?php getAmo($datemonth, 8, 4); ?>;
comparAmoMat[8][5] = <?php getAmo($datemonth, 8, 5); ?>;
comparAmoMat[8][6] = <?php getAmo($datemonth, 8, 6); ?>;
comparAmoMat[8][7] = <?php getAmo($datemonth, 8, 7); ?>;
comparAmoMat[8][8] = <?php getAmo($datemonth, 8, 8); ?>;
comparAmoMat[8][9] = <?php getAmo($datemonth, 8, 9); ?>;
comparAmoMat[9][1] = <?php getAmo($datemonth, 9, 1); ?>;
comparAmoMat[9][2] = <?php getAmo($datemonth, 9, 2); ?>;
comparAmoMat[9][3] = <?php getAmo($datemonth, 9, 3); ?>;
comparAmoMat[9][4] = <?php getAmo($datemonth, 9, 4); ?>;
comparAmoMat[9][5] = <?php getAmo($datemonth, 9, 5); ?>;
comparAmoMat[9][6] = <?php getAmo($datemonth, 9, 6); ?>;
comparAmoMat[9][7] = <?php getAmo($datemonth, 9, 7); ?>;
comparAmoMat[9][8] = <?php getAmo($datemonth, 9, 8); ?>;
comparAmoMat[9][9] = <?php getAmo($datemonth, 9, 9); ?>;
comparAmoMat[10][1] = <?php getAmo($datemonth, 10, 1); ?>;
comparAmoMat[10][2] = <?php getAmo($datemonth, 10, 2); ?>;
comparAmoMat[10][3] = <?php getAmo($datemonth, 10, 3); ?>;
comparAmoMat[10][4] = <?php getAmo($datemonth, 10, 4); ?>;
comparAmoMat[10][5] = <?php getAmo($datemonth, 10, 5); ?>;
comparAmoMat[10][6] = <?php getAmo($datemonth, 10, 6); ?>;
comparAmoMat[10][7] = <?php getAmo($datemonth, 10, 7); ?>;
comparAmoMat[10][8] = <?php getAmo($datemonth, 10, 8); ?>;
comparAmoMat[10][9] = <?php getAmo($datemonth, 10, 9); ?>;
comparAmoMat[11][1] = <?php getAmo($datemonth, 11, 1); ?>;
comparAmoMat[11][2] = <?php getAmo($datemonth, 11, 2); ?>;
comparAmoMat[11][3] = <?php getAmo($datemonth, 11, 3); ?>;
comparAmoMat[11][4] = <?php getAmo($datemonth, 11, 4); ?>;
comparAmoMat[11][5] = <?php getAmo($datemonth, 11, 5); ?>;
comparAmoMat[11][6] = <?php getAmo($datemonth, 11, 6); ?>;
comparAmoMat[11][7] = <?php getAmo($datemonth, 11, 7); ?>;
comparAmoMat[11][8] = <?php getAmo($datemonth, 11, 8); ?>;
comparAmoMat[11][9] = <?php getAmo($datemonth, 11, 9); ?>;

var SumsMax = 0;
for(i = 0; i < 12; i++){
	AmoSums[i] = 0;
	for(int = 1; int < 10; int++){
		a = parseFloat(comparAmoMat[i][int]);
		AmoSums[i] += a;
	}
	if(AmoSums[i] > SumsMax){
		SumsMax = AmoSums[i];
	}
}

function convertMonth(month){
	if(month == "01"){
		return "January";
	}
	if(month == "02"){
		return "February";
	}
	if(month == "03"){
		return "March";
	}
	if(month == "04"){
		return "April";
	}
	if(month == "05"){
		return "May";
	}
	if(month == "06"){
		return "June";
	}
	if(month == "07"){
		return "July";
	}
	if(month == "08"){
		return "August";
	}
	if(month == "09"){
		return "September";
	}
	if(month == "10"){
		return "October";
	}
	if(month == "11"){
		return "November";
	}
	if(month == "12"){
		return "December";
	}
}

function bigCompar(){
	section = document.getElementById("thebod");
	Canva = document.createElement("canvas");
	Canva.setAttribute("height", '500px')
	Canva.setAttribute("width", '1265px')
	drawCompar(Canva, SumsMax);
	section.appendChild(Canva);

}

function drawCompar(canvas, max){
	var colorarr = ['#0E6655', '#5B2C6F', '#707B7C', '#F4D03F', '#283747', '#943126', '#0E6655', '#5B2C6F', '#707B7C', '#F4D03F', '#283747', '#943126']
	ratio = max/425;
	context = canvas.getContext("2d");
	width = canvas.width;
	height = canvas.height - 50;
	drawLine(context, 35, 0, 35, height);
	drawLine(context, width - 35, 0, width - 35, height);
	var yvec = [0, 25, 50, 75, 100, 125, 150, 175, 200, 225, 250, 275, 300, 325, 350, 375, 400, 425, 450]
	var transarr = [];
	for( i = 0; i < 12; i++){
		transarr[i] = AmoSums[i]/ratio;
	}
	transarr.reverse();
	for(i = 0; i < 21; i++){
		drawLine(context, 35, yvec[i], width-35, yvec[i])
		if(i % 2 == 0){
		context.fillText(Math.round(yvec[i]*ratio), 5, height - yvec[i]);
		}
	}
	startx = 75;
	var position = [];
	Months.reverse()
	for(i = 0; i < 12; i++){
		context.fillStyle = colorarr[i];
		context.fillRect(startx + 12.5, height - transarr[i] - 10, 5, 5);
		context.fillRect(startx, height - transarr[i], 25, transarr[i]);
		position[i] = startx;
		context.font = "bold 12px Arial";
		context.fillText(Months[i], position[i], 465)
		context.fillStyle = "black";
		drawLine(context, startx + 12.5, height - transarr[i] - 10, startx + 112.5, height - transarr[i+1] - 10);
		startx += 100;
	}
	context.font = "bold 14px Arial";
	context.fillStyle = "black";
	context.fillText("Total Expenses vs. Months", 500, 495)
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////+


 function drawBar(canvas, index, number, max){
    var lettervec = "ABCDEFGHI";
    var xvec = [25, 50, 75, 100, 125, 150, 175, 200, 225, 250, 275, 300]
    var yvec = [0, 25, 50, 75, 100, 125, 150, 175, 200, 225, 250, 275, 300]

    canvas = canvas.getContext("2d");

    ratio = max/250;

    drawLine(canvas, 25, 0, 25, 300);
    drawLine(canvas, 300, 0, 300, 300);
    for(i = 0; i < 13; i++){
        drawLine(canvas, 25, yvec[i], 300, yvec[i]);
        if(yvec[i] > 0){
         canvas.font = "bold 10px Arial";
         canvas.fillText(Math.round(yvec[i]*ratio), 5, 300 - yvec[i]);
        }
    }

    var colorarr = ['#17A589', '#5B2C6F', '#707B7C', '#F4D03F', '#283747', '#943126', '#5B2C6F','#C6DDB0', '#C68490']
    var startx = 50;
    var transfervec = [];

    for(i=0; i < number; i++){
        transfervec[i] = (globalValMatrix[index-1][i]/ratio);
    }

    for(i=0; i < number; i++){
        canvas.beginPath();
        canvas.fillStyle = colorarr[i];
        canvas.lineWidth="2";
        canvas.fillRect(startx, 300 - transfervec[i], (200/number), transfervec[i]);
        canvas.font = "bold 10px Arial";
        canvas.fillText(lettervec[i], startx + ((200/number)/2), (300 - transfervec[i] - 7));
        canvas.stroke();
        startx += (200/number);
    }
}


function drawLine(canvas4, startX, startY, endX, endY){
    canvas4.beginPath();
    canvas4.moveTo(startX,startY);
    canvas4.lineTo(endX,endY);
    canvas4.stroke();
}

</script>