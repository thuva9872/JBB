<?php
session_start();
include_once ('C:\xampp\htdocs\BMSfin\JBB\Login\Factory.php');
$factory=new Factory();
$user = $factory->getUser("admin");
if (!$user->session()){  
  header("location:login.php");  
} 
if (isset($_POST["change"])){
  $user->change_password($_REQUEST['old_password'],$_REQUEST['new_password'],$_REQUEST['confirm_password']);
}
?>

<?php  
        
       include_once ('C:\xampp\htdocs\BMSfin\JBB\Login\Factory.php');
       $factory=new Factory();
       $user = $factory->getUser("admin");
       $id = $_SESSION['id'];  
       if (!$user->session()){  
          header("location:login.php");  
       }  
       if (isset($_REQUEST['q'])){  
          $user->logout();  
          header("location:login.php");  
       }  
    
    ?>  





<html>

<HEAD>

    <title>pass change</title>
    <link rel="stylesheet" href="new-donor-page/1.css">
   <style>
       h2 {text-align: center;}
   </style>
</HEAD>

<body>

    <div class="container">

        <div  class="navbar">
            <br>
            <h2 text-align="center" style="font-display: #ccc;">ADMIN</h2>
           
        
        <nav>
            <ul>
                <li></li>
                <li> <a href="request_donation.php">REQUST-BLOOD</a> </li>
                <li> <a href="manage_hospital.php" >MANNAGE-HOSPITALS</a> </li>
                <li> <a href="manage_donor.php" >MANNAGE-DONORS</a> </li>
                <li> <a href="view_request.php" >VIEW-REQUES</a> </li>
                <li> <a href="blood_camp.php"  >ADD-BLOOD-CAMP</a> </li>
                <li> <a href="add_blood.php" >ADD-BLOOD</a> </li>
                <li> <a href="blood_inventory.php" >BLOOD-INVENTORY</a> </li>
                <li></li> <li></li>
               <li> <a href="?q=logout"  > LOG-OUT</a> </li>
            </ul>

        </nav>

        <div class="user">
           
            <img src="new-donor-page/logo.png">
        </div>

        </div>

       <div class="sidebar">
        <a href="index.php"> <img src="new-donor-page/homelogo.png"  class="homelogo"> </a>
        <a href="pass_change.php"> <img src="new-donor-page/up.png"  class="update"> </a>
         
         
       </div>
       
       <!-- this div for info about donor page-->

       <link href='https://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="pass change-framecss.css" type="text/css">
<style>
  body {
    background-image: url('profile change.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed; 
    background-size: cover;
  }
  </style>
<div class="login">
  <div class="login-header">
    <h2>Change Password</h2>
  </div>
  <div class="login-form">
    <form action="pass_change.php" method="post">
    <h3>OLD-Password:</h3>
    <input type="password" name="old_password" placeholder="Password"/>
    <br>
    <h3>New-Password:</h3>
    <input type="password" name="new_password" placeholder="Password" id="psw" pattern="(?=.*\d)(?=.[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required />

    <div id="message">
                <h3>Password must contain the following:</h3>
                <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                <p id="number" class="invalid">A <b>number</b></p>
                <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                <br><br>
    </div>
    
    <br>
    <h3>Conform-Password:</h3>
    <input type="password" name="confirm_password" placeholder="Password"/>
    <br>
    <input type="submit" name="change" value="Change" class="change-button"/>
    <br>
    
    
  </div>
</div>

       <!--end of about-->
    </div>
</body>
<script>
            var myInput = document.getElementById("psw");

            // When the user clicks on the password field, show the message box
            myInput.onfocus = function() {
            document.getElementById("message").style.display = "block";
            }

            // When the user clicks outside of the password field, hide the message box
            myInput.onblur = function() {
            document.getElementById("message").style.display = "none";
            }
    </script>
</html>
