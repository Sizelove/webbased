
<?php
session_start();
if(isset($_SESSION['username'])){
      $welcomemessage = '<li><a href="signout.php">Sign Out</a></li>';
    }else{
      $welcomemessage = '<li><a href="Tabbed.php">Log In</a></li>';
    }
?>

<nav id = "navbar"; style="box-shadow: 0px 2px 2px #999">
        <ul class = "fl_right">
            
            <li style="float:left"><a href="#">Expense Manager</a></li>
            
          <?php echo $welcomemessage ?>
      <li><a href="contact.php">Contact Us</a></li>
      <li><a href="file.php">File Upload</a></li>
      <li><a href="link1.php">Expense Manager</a></li>
      <li ><a class="active" href="home.php">Home</a></li>
        </ul>
    </nav>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link rel="stylesheet" href="style.css">
</head>
    
<body class="background">
<br>
<div class="homepage">
     <img src="welcome1.png" alt="welcome">
<div class="features">
    <h3>Overview:</h3>
<ul>
    <li>Share an account in the household to keep track of expenses.</li>
    <li>Enter your expenses or submit it from the file. </li>
    <li>Piechart to give you more insight about your expenses. </li>
</ul>
  </div>
    
    <br>
    <br>
    
  <div class="ffeatures" >
    <h3>Upcoming Features:</h3>
<ul>
    <li>Every person in the household can have their own account to upload the expenses. </li>
    <li>Payment solution incorporated within the website. </li>
    <li>Depending on the expenses by a person, each person will know how much they owe to each other. </li>
    
</ul>
    </div>
    </div>

    </body>
</html>