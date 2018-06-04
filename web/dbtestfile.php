<!DOCTYPE HTML>

<script type="text/javascript">
function GetAlert(){ 
alert("Registration complete!");
}
</script>

<?php
$servername = "localhost";
$username = "mydatabase_admin";
$password = "dbpass";
$dbname = "websitebase";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

else {
	echo "it works";
}



$user = $_POST["usrnm"];
$email = $_POST["email"];
$pass = $_POST["psw"];

$sql = "INSERT INTO users (Username, Email, Password)
VALUES ('$user', '$email', '$pass')";

if ($conn->query($sql) === TRUE) {
	$logintruth = 1;
	$registermessage ="<script language=javascript>GetAlert();</script>";
	echo $registermessage;
} else {
	$logintruth = 0;
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

<html> line of code </html>htnl>
