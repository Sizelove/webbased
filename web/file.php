
<link href="style.css" rel="stylesheet" type="text/css" media="all">
<link href="modal.css" rel="stylesheet" type="text/css" media="all">

<?php
session_start();
if(isset($_SESSION['username'])){
   		$welcomemessage = '<li><a href="signout.php">Sign Out</a></li>';
    }else{
    	$welcomemessage = '<li><a href="Tabbed.php">Log In</a></li>';
    }
?>


<!DOCTYPE html>
<html>
<body>

<nav id = "navbar"; style="box-shadow: 0px 2px 2px #999">
    <ul class = "fl_right">
      
      <li style="float:left"><a href="#">Expense Manager</a></li>
      
      <?php echo $welcomemessage ?>
      <li><a href="contact.php">Contact Us</a></li>
      <li><a class="active" href="file.php">File Upload</a></li>
      <li><a href="link1.php">Expense Manager</a></li>
      <li ><a href="home.php">Home</a></li>
    </ul>
  </nav>



<p>To upload a file, use the format shown below, make sure you save in .csv!</p>
	<button id="myBtn" class="button">Show File</button>

<p>Alternatively, download our template below and fill in your information:</p>
<button class="button" onclick="downloadnav();">Download File</button>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <p>Select file:
    <input type="file" name="fileToUpload" id="fileToUpload"></p>
    <input type="submit" value="Upload File" name="submit">
</form>

<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    <h4>Format your file exactly as below:</h4>
    <img src="examplefile.png", height="500", width="800"></img>
  </div>

</div>
<script type="text/javascript">
var modal = document.getElementById('myModal');
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
    modal.style.display = "block";
}

span.onclick = function() {
    modal.style.display = "none";
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

function downloadnav(){
	window.location.href = 'downloadfilephp.php';
}
</script>
</body>
</html>