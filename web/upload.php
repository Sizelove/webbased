<?php
session_start();
$user = $_SESSION['username'];
$today = date("Y-d-m");
$_SESSION['date'] = $today;

session_start();
$servername = "localhost";
$username = "mydatabase_admin";
$password = "dbpass";
$dbname = "websitebase";

$conn = new mysqli($servername, $username, $password, $dbname);

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}else{
	echo "File is working";
}

if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "csv") {
    echo "Sorry, only csv files are permitted for upload.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$row = 0;
$namearr = [];
$valarr = [];
$expselect = [];
$divyselect = [];

if (($handle = fopen($target_file, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        echo "<p> $num fields in line $row: <br /></p>\n";
        print_r($data);
        if($row === 0){
        	$month = $data[1];
        }else if($row > 2 && (($row % 2) === 1)){
        	$rownew = ($row/2);
        	$namearr[$rownew] = $data[2];
        	$valarr[$rownew] = $data[3];
        	$expselect[$rownew] = $data[4];
        	$divyselect[$rownew] = $data[5];
        }
        $row++;
    }
    fclose($handle);
}

print_r($namearr);

        /*$num = count($data);
        echo "<p> $num fields in line $row: <br /></p>\n";
        $row++;
        print_r($data);
        for ($c=0; $c < $num; $c++) {
            echo $data[$c] . "<br />\n";
        }*/

unlink($target_file);

$_SESSION['saved'] = 1;
$_SESSION['month'] = $month;

for($i = 1; $i < 10; $i++){
	for($int = 1; $int < 10; $int++){
		$name = "divexp" . $i . $int;
		unset($_SESSION[$name]);
		$name = "incomecalc" . $i . $int;
		unset($_SESSION[$name]);
	}
}
for($i = 1; $i < 10; $i++){
$_SESSION['expname' . $i] = $namearr[$i];
$_SESSION['expamo' . $i] = $valarr[$i];
$_SESSION['expselect' . $i] = $expselect[$i];
$_SESSION['divyselect' . $i] = $divyselect[$i];
}

$numexp = 0;
for($i = 1; $i < 10; $i++){
	if($_SESSION['expname' . $i] !== ""){
		$numexp++;
	}
}

for($i = ($numexp+1); $i < 10; $i++){
	unset($_SESSION['expname' . $i]);
	unset($_SESSION['expamo' . $i]);
	unset($_SESSION['expselect' . $i]);
	unset($_SESSION['divyselect' . $i]);
}

$_SESSION['numexp'] = $numexp;
$_SESSION['upload'] = 1;

    if($_SESSION['month'] === 'January'){
        $_SESSION['month'] = '01';
    }if($_SESSION['month'] === 'February'){
        $_SESSION['month'] = '02';
    }if($_SESSION['month'] === 'March'){
        $_SESSION['month'] = '03';
    }if($_SESSION['month'] === 'April'){
        $_SESSION['month'] = '04';
    }if($_SESSION['month'] === 'May'){
        $_SESSION['month'] = '05';
    }if($_SESSION['month'] === 'June'){
        $_SESSION['month'] = '06';
    }if($_SESSION['month'] === 'July'){
        $_SESSION['month'] = '07';
    }if($_SESSION['month'] === 'August'){
        $_SESSION['month'] = '08';
    }if($_SESSION['month'] === 'September'){
        $_SESSION['month'] = '09';
    }if($_SESSION['month'] === 'October'){
        $_SESSION['month'] = '10';
    }if($_SESSION['month'] === 'November'){
        $_SESSION['month'] = '11';
    }if($_SESSION['month'] === 'December'){
        $_SESSION['month'] = '12';
    }

$today = new DateTime('first day of this month');
$todaymonth = $today->format('m');
$todayyear = $today->format("Y");
$dater = "CURDATE()";
$monthfile = $_SESSION['month'];

if(isset($_SESSION['month'])){
    if($_SESSION['month'] > $todaymonth){
        $year = ($todayyear-1);
    }else{
        $year = $todayyear;
    }
    $d = new DateTime('01-'.$monthfile.'-'.$year);
    $todayender = $d->format('t');
    $dater = $year.'-'.$monthfile.'-'.$todayender;
}
echo "Here is date $dater";

$sqlnew = "SELECT Session FROM expinfo WHERE Username = '$user' AND Date = '$dater' ORDER BY Session DESC LIMIT 1";
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


$sqlinsert = "INSERT INTO expinfo (Username, Date, Session, expname1, expamo1, expname2, expamo2, expname3, expamo3, expname4, expamo4, expname5, expamo5, expname6, expamo6, expname7, expamo7, expname8, expamo8, expname9, expamo9) VALUES('$user', '$dater', '$session', '$namearr[1]', '$valarr[1]', '$namearr[2]', '$valarr[2]', '$namearr[3]', '$valarr[3]', '$namearr[4]', '$valarr[4]', '$namearr[5]', '$valarr[5]', '$namearr[6]', '$valarr[6]', '$namearr[7]', '$valarr[7]', '$namearr[8]', '$valarr[8]', '$namearr[9]', '$valarr[9]')";
$resultnew = $conn->query($sqlinsert);
if ($conn->query($resultnew) === TRUE) {
    $registermessage = "<script language=javascript>alert('It worked for new table!');</script>";
        echo $registermessage;
            /*header*/
        } else{
            echo "Error:" . "<br>" . $conn->error;
            /*header*/
        }

echo $sqlinsert;
header('Location: link1.php')
?>