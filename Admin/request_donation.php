<?php
session_start();
include_once ('C:\xampp\htdocs\BMSfin\JBB\Login\Factory.php');
$factory=new Factory();
$user = $factory->getUser("admin");
if (!$user->session()){  
  header("location:login.php");  
}  
if(isset($_POST['request'])){ 
     $user->send_request($_REQUEST['blood_type'], $_REQUEST['message'],$_REQUEST['date'] );  
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

    <title>Admin main page-blood requst</title>
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

  <form action="request_donation.php" method="post">
  
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
    <label for="type">Message:</label>
    <input type="textarea" id="type" name="message">
    
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




