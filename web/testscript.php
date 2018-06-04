<?php
session_start();
$servername = "localhost";
$username = "mydatabase_admin";
$password = "dbpass";
$dbname = "websitebase";

$_SESSION['saved'] = 0;

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = $_SESSION['username'];

/*
$sql31 = "SELECT * FROM expinfo WHERE Username = '$user' AND Date = CURDATE() AND Session = 2";
$result = $conn->query($sql31);

if(mysqli_num_rows($result) > 0){
	while($row = $result->fetch_assoc()){
   	 foreach($row as $cname => $cvalue){
        print "$cname: $cvalue\t";
     }
    print "\r\n";
    }
}*/

$sqlnew = "SELECT Session FROM expinfo WHERE Username = '$user' AND Date = CURDATE() ORDER BY Session DESC LIMIT 1";
$resultnew = $conn->query($sqlnew);

if(mysqli_num_rows($resultnew) > 0){
	while($row = $resultnew->fetch_assoc()){
		foreach($row as $cname => $cvalue){
			$session = ($cvalue + 1);
		}
	}
}else{
	$session = 1;
}

$namearr = array();
$expamoarr = array();
$divexparr = [[]];
$incalcarr = [[]];
$reasonarr = [];
$howmanarr = [];
date_default_timezone_set('EST');
$today = date("Y-d-m");
$date=date("Y-m-d",strtotime($today));
$bigstring = "";
$numexp = 0;

for($i = 1; $i < 10; $i++){
	$varname = 'expname' . $i;
	if(!(empty($_POST[$varname]))){
		$namearr[$i] = $_POST[$varname];
		$numexp++;
	}else{
		$namearr[$i] = null;
	}
}



////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

for($i=1;$i<10;$i++){
	for($int = 1; $int <= 6; $int++){
		$varname = 'incomecalc' . $i . $int;
		if(!(empty($_POST[$varname]))){
			$incalcarr[$i][$int] = $_POST[$varname];
		}else{
			$incalcarr[$i][$int] = null;
		}
	}
}


for($i=1;$i<=$numexp;$i++){
	$varname = 'expselect' . $i;
	if(!(empty($_POST[$varname]))){
		$howmanarr[$i] = $_POST[$varname];
	}else{
		$howmanarr[$i] = null;
	}
}

for($i=1;$i<=$numexp;$i++){
	$varname = 'divyselect' . $i;
	if(!(empty($_POST[$varname]))){
		$reasonarr[$i] = $_POST[$varname];
	}else{
		$reasonarr[$i] = null;
	}
}

///
$calcquery = "INSERT INTO otherinfo (Username, Date, Session";

for($i=1;$i < 10;$i++){
	$calcquery .= ", ";
	$calcquery .= 'expselect' . $i;
}

for($i=1;$i < 10;$i++){
	$calcquery .= ", ";
	$calcquery .= 'divyselect' . $i;
}

for($i=1;$i < 10;$i++){
	for($id = 1; $id < 7; $id++){
		$calcquery .= ", ";
		$calcquery .= 'incomecalc' . $i . $id;
	}
}

$calcquery .= ") VALUES(";
$calcquery .= "'" . $user . "', ";
$calcquery .= "CURDATE(), ";
$calcquery .= "'" . $session . "'";

for($i=1;$i < 10;$i++){
	if(isset($howmanarr[$i])){
			$value = $howmanarr[$i];
			$calcquery .= ", '" . $value . "'";
		}else{
			$calcquery .= ", NULL";
		}
}

for($i=1;$i < 10;$i++){
	if(isset($reasonarr[$i])){
			$value = $reasonarr[$i];
			$calcquery .= ", '" . $value . "'";
		}else{
			$calcquery .= ", NULL";
		}
}

for($i=1;$i < 10;$i++){
	for($id = 1; $id < 7; $id++){
		 if(isset($incalcarr[$i][$id])){
			$value = $incalcarr[$i][$id];
			$calcquery .= ", '" . $value . "'";
		}else{
			$calcquery .= ", NULL";
		}
	}
}

$calcquery .= ')';
print($calcquery);

if ($conn->query($calcquery) === TRUE) {
    $registermessage = "<script language=javascript>alert('Ita worka!!!');</script>";
    	echo $registermessage;
        	/*header*/
    	} else{
    		echo "Error:" . "<br>" . $conn->error;
        	/*header*/
      	}

///
/////////////////////////////////////////////////////////////////////////*//////////////////////////////////////////////////////////////////////////////////////
for($i=1;$i<=$numexp;$i++){
	for($int = 1; $int <= 6; $int++){
		$varname = 'divexp' . $i . $int;
		if(!(empty($_POST[$varname]))){
			$divexparr[$i][$int] = $_POST[$varname];
		}else{
			$divexparr[$i][$int] = null;
		}
	}
}


$divquery = "INSERT INTO indexpinfo (Username, Date, Session, ";

for($i=1;$i<10;$i++){
	for($int = 1; $int < 7; $int++){
		if(!( ($i == 9) && ($int === 6))){
			$varname = 'divexp' . $i . $int;
			$divquery .= $varname . ", ";
		}else{
			$divquery .= 'divexp96' . ") VALUES(";
		}
	}
}
$divquery .= "'" . $user . "', ";
$divquery .= "CURDATE(), ";
$divquery .= "'" . $session . "'";
for($i=1;$i<10;$i++){
	for($int = 1; $int < 7; $int++){
		if(isset($divexparr[$i][$int])){
			$value = $divexparr[$i][$int];
			$divquery .= ", '" . $value . "'";
		}else{
			$divquery .= ", NULL";
		}
	}
}
$divquery .= ")";

if ($conn->query($divquery) === TRUE) {
    $registermessage = "<script language=javascript>alert('It worked for new table!');</script>";
    	echo $registermessage;
        	/*header*/
    	} else{
    		echo "Error:" . "<br>" . $conn->error;
        	/*header*/
      	}




//////////////////////////////////////*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////


$_SESSION['numexp'] = $numexp;

for($i = 1; $i < 10; $i++){
	$varname = 'expamo' . $i;
	if(!(empty($_POST[$varname]))){
		$expamoarr[$i] = $_POST[$varname];
	}else{
		$expamoarr[$i] = null;
	}
}
if( !(empty($namearr[1])) && !(empty($expamoarr[1]))){
$sqlinsert = "INSERT INTO expinfo (Username, Date, Session, expname1, expamo1, expname2, expamo2, expname3, expamo3, expname4, expamo4, expname5, expamo5, expname6, expamo6, expname7, expamo7, expname8, expamo8, expname9, expamo9) VALUES('$user', CURDATE(), '$session', '$namearr[1]', '$expamoarr[1]', '$namearr[2]', '$expamoarr[2]', '$namearr[3]', '$expamoarr[3]', '$namearr[4]', '$expamoarr[4]', '$namearr[5]', '$expamoarr[5]', '$namearr[6]', '$expamoarr[6]', '$namearr[7]', '$expamoarr[7]', '$namearr[8]', '$expamoarr[8]', '$namearr[9]', '$expamoarr[9]')";
	if ($conn->query($sqlinsert) === TRUE) {
        $registermessage = "<script language=javascript>alert('It worked!');</script>";
        	echo $registermessage;
        	$_SESSION['saved'] = 1;
    	} else{ 
        	$_SESSION['saved'] = 2;
      	}
}else{
	$_SESSION['saved'] = 2;
}

if($_SESSION['saved'] === 1){
	$_SESSION['date'] = $today;
	for($i = 1; $i < 10;$i++){
		$_SESSION['expname' . $i] = $namearr[$i];
		$_SESSION['expamo' . $i] = $expamoarr[$i];
		if(isset($howmanarr[$i])){ $_SESSION['expselect' . $i] = $howmanarr[$i];}else{$_SESSION['expselect' . $i] = null;}
		if(isset($reasonarr[$i])){ $_SESSION['divyselect' . $i] = $reasonarr[$i];}else{$_SESSION['divyselect' . $i] = null;}
		for($int = 1; $int < 7; $int++){
			if(isset($divexparr[$i][$int])){
				$_SESSION['incomecalc' . $i . $int] = $incalcarr[$i][$int];
			}else{$_SESSION['incomecalc' . $i . $int] = null;}
			if(isset($divexparr[$i][$int])){
				$_SESSION['divexp' . $i . $int] = $divexparr[$i][$int];
			}else{$_SESSION['divexp' . $i . $int] = null;}
		}
	}
}

$_SESSION['saved'] = 1;
$_SESSION['upload'] = 0;
$_SESSION['load'] =  0;
header('Location: link1.php');
?>
</body>
</html>