<?php 
session_start();
$servername = "localhost";
$username = "mydatabase_admin";
$password = "dbpass";
$dbname = "websitebase";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = $_SESSION['username'];
$sql31 = "SELECT * FROM users WHERE Username = '$user'";
$result = $conn->query($sql31);

if(mysqli_num_rows($result) > 0){
while($row = $result->fetch_assoc()){
    foreach($row as $cname => $cvalue){
        print "$cname: $cvalue\t";
    }
    print "\r\n";
}
}


?>