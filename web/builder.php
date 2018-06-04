<?php
session_start();
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

for($i = 0; $i < 11; $i ++){
	$date->modify('-1 month');
	$datemonth[$i] = $date->format('m');
	$datender[$i] = $date->format('t');
}

for($i = 0; $i < 11; $i++){
	if($datemonth[$i] > $todaymonth){
		$dateyear[$i] = ($todayyear-1);
	}else{
		$dateyear[$i] = ($todayyear);
	}
}

for($i = 0; $i < 11; $i++){
$sqlnew = "SELECT * FROM expinfo WHERE Username = '$user' AND expinfo.Date BETWEEN '$dateyear[$i]-$datemonth[$i]-01' AND '$dateyear[$i]-$datemonth[$i]-$datender[$i]' ORDER BY expinfo.Date DESC, expinfo.Session DESC LIMIT 1";

echo $sqlnew;
$resultnew = $conn->query($sqlnew);

if(mysqli_num_rows($resultnew) > 0){
	while($row = $resultnew->fetch_assoc()){
	foreach($row as $cname => $cvalue){
		$key = $datemonth[$i] . $cname;
		echo $key;
		if(($cvalue != '0') or ($cvalue != "")){
			$_SESSION[$key] = $cvalue;
		}else{
			$_SESSION[$key] = null;
		}
		}
	}
	}
}
echo "This was executed";
header('Location: comparison.php');

?>