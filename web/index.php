<!DOCTYPE html>
<html>
<head>


<script type="text/javascript" src="register.js">
</script>

<?php
session_start();
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


if(isset($_POST["usrnm"])){
    $user = $_POST["usrnm"];
}
if(isset($_POST["email"])){
    $email = $_POST["email"];
}
if(isset($_POST["psw"])){
    $pass = $_POST["psw"];;
}

if(isset($_POST['usrnm'])){
    $tempuser = $_POST['usrnm'];

    $sql = "SELECT Username FROM users WHERE Username = '$tempuser'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        $registermessage2 = "<script language=javascript>WrongUser();</script>";
        echo $registermessage2;
    }
}

if((isset($_POST['usrnmlog'])) and (isset($_POST['pswlog']))){
    $tempus = $_POST['usrnmlog'];
    $tempass = $_POST['pswlog'];
    $newsql = "SELECT Username, Password from users where Username = '$tempus' and Password = '$tempass'";
    $results = mysqli_query($conn, $newsql);
    if(mysqli_num_rows($results) > 0){
        $registermessage2 = "<script language=javascript>LoginSuccess();</script>";
        echo $registermessage2;
        session_set_cookie_params(3600,"/");
        $_SESSION['username'] = $_POST['usrnmlog'];
        $_SESSION['saved'] = 0;
        $_SESSION['numexp'] = 0;
        $_SESSION['upload'] =  0;
        $_SESSION['load'] = 0;
        $_SESSION['month'] = null;
        header('Location: home.php');
    }else{
        $registermessage2 = "<script language=javascript>LoginFailure();</script>";
        echo $registermessage2;
    }
}

if(isset($_POST['email'])){
    $tempmail = $_POST['email'];

    $sql = "SELECT Email FROM users WHERE Email = '$tempmail'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        $registermessage3 = "<script language=javascript>WrongEmail();</script>";
        echo $registermessage3;
    }
}

if(isset($_POST["usrnm"]) and (isset($_POST["email"])) and (isset($_POST["psw"]))){
    $sql = "INSERT INTO users (Username, Email, Password)
    VALUES ('$user', '$email', '$pass')";
    if ($conn->query($sql) === TRUE) {
        $logintruth = 1;
        $registermessage = "<script language=javascript>GetAlert();</script>";
        echo $registermessage;
    } else{ 
        $logintruth = 0;
    }
}

$conn->close();
?>

<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="styles/style1.css?<?php echo time(); ?>">
    <title>Expense Manager</title>
    </head>
 <body background="space.jpg"> 

<?php 
if(isset($_SESSION['username'])){
    $user = $_SESSION['username'];
    $welcomemessage = "<h1>Welcome, $user!";
    echo $welcomemessage;
    $logoutbutton = "<button><a href='logout.php'>Log Out</a></button>";
    echo $logoutbutton;
}
?>

<div class="login-page">
    <img src="textlogo.png" alt="logo">
<div class="tab">
  <button class="tablinks" onclick="loginSignup(event, 'Login')" id="defaultOpen">Login</button>
  <button class="tablinks" onclick="loginSignup(event, 'Signup')">Signup</button>
  </div>

<div id="Login" class="tabcontent">
    <form id="login" method="post" action="tabbed.php">
                 
    <div class="input-container">
        <i class="fa fa-user icon"></i>
        <input class="input-field" type="text" placeholder="Username" name="usrnmlog" autofocus required>
    </div>
            
    <div class="input-container">
        <i class="fa fa-key icon"></i>
        <input class="input-field" type="password" name="pswlog" placeholder="Password"  required>
  </div>
        
        <button type="submit" class="btn">Login</button>
        </form>
    <br>
    <button class="trigger">Forgot your password?</button>
                <div class="modal">
                    <div class="modal-content">
                        <span class="close-button">&times;</span>
                            <form method="post" action="send_link.php">
                            <p>Your password will be sent to your email.</p>
                             <div class="input-container">
                                 <i class="fa fa-envelope icon"></i>
                                 <input class="input-field" type="email" placeholder="Email" name="email" required>
                            </div>
                                <button type="submit" class="btn">Reset</button>
                            </form>
  
                    </div>
                </div>
       
</div>

<div id="Signup" class="tabcontent">
    <form id="signup" method= "post" action="tabbed.php">
                           
    <div class="input-container">
    <i class="fa fa-user icon"></i>
    <input class="input-field" type="text" placeholder="Username" name="usrnm" required>
  </div>
    
    <div class="input-container">
    <i class="fa fa-envelope icon"></i>
    <input class="input-field" type="email" placeholder="Email" name="email" required>
  </div>
        
     <div class="input-container">
    <i class="fa fa-key icon"></i>
    <input class="input-field" type="password" name="psw" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number,one uppercase and lowercase letter, and at least 6 or more characters"   required>
  </div>
        
        <button type="submit" class="btn">Register</button>
            
     </form>
</div>
</div>


<script>
function loginSignup(evt, option) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(option).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
    
 //Modal
    var modal = document.querySelector(".modal");
    var trigger = document.querySelector(".trigger");
    var closeButton = document.querySelector(".close-button");

    function toggleModal() {
        modal.classList.toggle("show-modal");
    }

    function windowOnClick(event) {
        if (event.target === modal) {
            toggleModal();
        }
    }

    trigger.addEventListener("click", toggleModal);
    closeButton.addEventListener("click", toggleModal);
    window.addEventListener("click", windowOnClick);
</script>
     
</body>
</html> 
