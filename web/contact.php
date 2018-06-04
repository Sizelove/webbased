
<?php
session_start();
include 'saveload.php';
include 'comparison.php';
if(isset($_SESSION['username'])){
      $welcomemessage = '<li><a href="signout.php">Sign Out</a></li>';
    }else{
      $welcomemessage = '<li><a href="Tabbed.php">Log In</a></li>';
    }
?>

<html>
<nav id = "navbar"; style="box-shadow: 0px 2px 2px #999">
    <ul class = "fl_right">
      
      <li style="float:left"><a href="#">Expense Manager</a></li>
      
      <?php echo $welcomemessage ?>
      <li><a class="active" href="contact.php">Contact Us</a></li>
      <li><a href="file.php">File Upload</a></li>
      <li><a href="link1.php">Expense Manager</a></li>
      <li ><a href="home.php">Home</a></li>
    </ul>
  </nav>
  <head>
    <style>
#contactform {position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: dodgerblue;
        padding: 16px 24px;
        width: 300px;
        border-radius: 12px;}


 body {font-family: Arial, Helvetica, sans-serif;
background-color: #42a1f4;}
* {box-sizing: border-box;}

.background { 
    /* The image used */
    background-image: url("expense.jpg");
    /* Full height */
    height: 100%; 
    background-size: cover;
}

 .login-page {
       
   position: absolute;
  width: 300px;
  height: 400x;
  z-index: 5;
  top: 50%;
  left: 50%;
  margin: -100px 0 0 -150px;
  background: none;
  border: solid;
  border-radius: 10px;
     border-color: dodgerblue;
    } 
    
/* Style the tab */
.tab {
    overflow: hidden;
    background-color: #0099ff;
    border: none;
    border-radius: 10px;
   
}

 .tabcontent, .homepage {
    animation: fadeEffect 1s; 
}

/*Show the contents in tab with fading effect. */
@keyframes fadeEffect {
    from {opacity: 0;}
    to {opacity: 1;}
}

.tab button {
    background-color: #0099ff;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 15px 17px;
    transition: 0.3s;
    font-size: 15px;
}


.tab button:hover {
    background-color: #ccffff;
}

.tab button.active {
    background-color: #ccc;
}


.tabcontent {
   
    padding: 10px;
    border: none;
   
}
   
.input-container {
    display: inline-flex;
    width: 100%;
    margin-bottom: 11px;
}

.icon {
    padding: 10px;
    background: dodgerblue;
    color: white;
    min-width: 50px;
    text-align: center;
}

.input-field {
    width: 100%;
    padding: 10px;
    outline: none;
}

.input-field:focus {
    border: 2px solid dodgerblue;
}


.bttn {
    background-color: dodgerblue;
     opacity: 0.9;
     border: none;
    border-radius: 10px;
    padding: 15px 20px;
    cursor: pointer;
    width: 100%;

   
}
.linkme{ 
    position:relative;
    left: 55%;
    
  
}


.bttn:hover {
    opacity: 1;
    background-color: #ccffff;
    color:black;
}

.modal {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        opacity: 0;
        visibility: hidden;
        transform: scale(1.1);
        transition: visibility 0s linear 0.25s, opacity 0.25s 0s, transform 0.25s;
    }
    .modal-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: white;
        padding: 16px 24px;
        width: 400px;
        border-radius: 8px;
    }
    .close-button {
        float: right;
        width: 24px;
        line-height: 24px;
        text-align: center;
        cursor: pointer;
        border-radius: 5px;
        background-color: lightgray;
    }
    .close-button:hover {
        background-color: lightcoral;
        color:red;
    }
    .show-modal {
        opacity: 1;
        visibility: visible;
        transform: scale(1.0);
        transition: visibility 0s linear 0s, opacity 0.25s 0s, transform 0.25s;
    }


.ffeatures , .features {
    padding: 10px;
    border: solid;
    border-collapse: dodgerblue;
    border-radius: 10px;
     font-size: 14px;
    background-color: dodgerblue;
    display: inline-block;
    width: 500px;
    
   
}
   .homepage{
       
   position: absolute;
  width: 300px;
  height: 350px;
  z-index: 5;
  top: 40%;
  left: 40%;
  margin: -100px 0 0 -150px;
  background: none;
  border: none;
  border-radius: 10px;
  padding: 10px;
      } 
    

}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style.css">
</head>
    
<body>

<!-- Form fillup. -->
 <div id="contactform" >
     <h3>Contact Form</h3>
   <form action="https://docs.google.com/forms/d/e/1FAIpQLSeNJE1ZzeXJIngZzO_dEZCucVX3uauwGBjKLhm3P1J7MMuGug/formResponse">
    
    <div class="input-container">
      <label> Name:
        <input  class="input-field" name="entry.1857275930" type="text" placeholder="Name"  autofocus  />
      </label>
    </div>
       
        <div class="input-container">
      <label> Email:
        <input  class="input-field" name="emailAddress" type="email" placeholder="email@domail.com"   />
      </label>
    </div>
   
    
  <div class="input-container">
    <label> Feedback:
      <textarea  class="input-field" name="entry.2090356773" rows=10 cols=18 placeholder="Please let us know if there are any bugs or you want certain feature to be added." required></textarea>
        </label> 
    </div>
     
     
   
      <button type="submit" class="btn">Submit</button>
       <button type="reset" class="btn">Clear</button>
    
   
  
     </form>
    </div>
  </body>
</html>
  
