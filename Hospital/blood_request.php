<?php
session_start();
include_once ('C:\xampp\htdocs\BMSfin\JBB\Login\Factory.php');
  $factory=new Factory();
  $user = $factory->getUser("hospital");
if (!$user->session()){  
  header("location:login.php");  
}  
if(isset($_POST['request'])){ 
     $user->send_request($_REQUEST['blood_type'], $_REQUEST['reason'], $_REQUEST['unit'],$_REQUEST['date'] );  
 }  
?>



<?php
  
  include_once ('C:\xampp\htdocs\BMSfin\JBB\Login\Factory.php');
  $factory=new Factory();
  $user = $factory->getUser("hospital");  
  $id = $_SESSION['id'];  
  if (!$user->session()){  
    header("location:\BMSfin\JBB\Hospital\login.php");  
  }  
  if (isset($_REQUEST['q'])){  
    $user->logout();  
    header("location:\BMSfin\JBB\Hospital\login.php");  
  }  
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>HOSPITAL</title>

    <link rel="stylesheet" href="new-hospital-page-resorce/1.css">
   <style>
       h2 {text-align: center;}
   </style>
</HEAD>



<body>

    <div class="container">

        <div  class="navbar">
            <br>
            <h2 text-align="center" >HOSPITAL</h2>
            <div class="logo">  
                <img src="new-hospital-page-resorce/logo.png">
            </div>
        
        <nav>
            <ul>
                <li> <a href="\BMSfin/JBB/Hospital/blood_request.php"> BLOOD REQUEST</a> </li>
                <li> <a href="\BMSfin/JBB/Hospital/blood_inventory.php"> VIEW BLOOD INVENTORY</a> </li>
                <li> <a href="\BMSfin/JBB/Hospital/view_message.php">MESSAGES</a> </li>
                <li> <a href="?q=logout"> LOG-OUT</a> </li>
            </ul>

        </nav>

        <div class="user">
            <p>  <?php echo $_SESSION["id"]; ?></p>
            <img src="new-hospital-page-resorce/hospital.png">
        </div>

        </div>

       <div class="sidebar">
          <a href="\BMSfin/JBB/Hospital/hospitals main page/index.php"> <img src="new-hospital-page-resorce/homelogo.png"  class="homelogo"> </a>

          <a href="\BMSfin/JBB/Hospital/edit_profile.php"> <img src="new-hospital-page-resorce/update.png"  class="update"> </a>
       </div>
       
       <!-- this div for info about donor page-->
       <link rel="stylesheet" href="reg.css" type="text/css">
<style>
    body {
      background-image: url('telemedicine.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed; 
      background-size: cover;
    }
    </style>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

  <form action="blood_request.php" method="post">
  
    <h1>BLOOD REQUEST</h1>
    
    <fieldset>
    <label for="type">Blood-Type:</label>
    <select id="type" name="blood_type">
      <optgroup label="A">
        <option value="A+">A+</option>
        <option value="A-">A-</option>
      </optgroup>
      <optgroup label="B">
        <option value="B+">B+</option>
        <option value="B-">B-</option>
      </optgroup>
      <optgroup label="AB">
        <option value="AB+">AB+</option>
        <option value="AB-">AB-</option>
      </optgroup>
      <optgroup label="O">
        <option value="O+">O+</option>
        <option value="O-">O-</option>
        
      </optgroup>
    </select>
    
     
    
    </fieldset>
    <label for="type">REASON</label>
    <select id="type" name="reason">
      <optgroup label="TIME">
        <option value="emergency">EMERGENCY </option>
        <option value="urgent">URGENT</option>
        <option value="STANDARD"> STANDARD </option>
        <option value="Group & Save"> GROUP & SAVE</option>
      </optgroup>
      
    </select>

    <label for="unit">UNIT:</label>
      <input type="UNIT" id="num" name="unit">
    

    <label for="Date">REQUIRED DATE:</label>
      <input type="date" id="date" name="date">

      <button type="submit" name="request">Request</button>
  </form>
  
</body>
</html>
      
       <!--end of about-->
    </div>
</body>
</html>

--------------------------------------------------------------------------------------------------------------------
