<?php
session_start();
$servername = "localhost";
$username = "mydatabase_admin";
$password = "dbpass";
$dbname = "websitebase";

$_SESSION['saved'] = 0;


$user = $_SESSION['username'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$date = date('Y/m/d',strtotime("-1 months"));
$datearr = date_parse($date);
$lastmonth  = $datearr['month'];
$user = $_SESSION['username'];

$sqlnew = "SELECT * FROM expinfo WHERE Username = '$user' ORDER BY expinfo.Date DESC, expinfo.Session DESC LIMIT 1";
$resultnew = $conn->query($sqlnew);

if(mysqli_num_rows($resultnew) > 0){
	while($row = $resultnew->fetch_assoc()){
	print_r($row);
	foreach($row as $cname => $cvalue){
		if(($cvalue != '0') and ($cvalue != "")){
			$_SESSION[$cname] = $cvalue;
		}else{
			$_SESSION[$cname] = null;
		}
		}
	}
}

$sqlnew = "SELECT * FROM otherinfo WHERE Username = '$user' ORDER BY otherinfo.Date DESC, otherinfo.Session DESC LIMIT 1";
$resultnew = $conn->query($sqlnew);

if(mysqli_num_rows($resultnew) > 0){
	while($row = $resultnew->fetch_assoc()){
	foreach($row as $cname => $cvalue){
		if(($cvalue != '0') or ($cvalue != "")){
			$_SESSION[$cname] = $cvalue;
		}else{
			$_SESSION[$cname] = null;
		}
		}
	}
}

$sqlnew = "SELECT * FROM indexpinfo WHERE Username = '$user' ORDER BY indexpinfo.Date DESC, indexpinfo.Session DESC LIMIT 1";
$resultnew = $conn->query($sqlnew);

if(mysqli_num_rows($resultnew) > 0){
while($row = $resultnew->fetch_assoc()){
	foreach($row as $cname => $cvalue){
		if(($cvalue != '0') or ($cvalue != "")){
			$_SESSION[$cname] = $cvalue;
		}else{
			$_SESSION[$cname] = null;
		}
		}
	}
}
$numexp=0;
$_SESSION['saved']=1;
$_SESSION['load']=1;
$_SESSION['upload'] = 0;
for($i = 1; $i < 9; $i++){
	if($_SESSION['expname' . $i] != ""){
		$numexp++;
	}
}
$_SESSION['numexp'] = $numexp;
header('Location: link1.php')
?>