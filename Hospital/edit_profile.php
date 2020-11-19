<?php
session_start();
include_once ('C:\xampp\htdocs\BMSnew\Login\Factory.php');
  $factory=new Factory();
  $user = $factory->getUser("hospital");
if (!$user->session()){  
  header("location:login.php");  
}  
if (isset($_POST["update"])){
    $user->edit_profile($_REQUEST['Title'],$_REQUEST['address'],$_REQUEST['mobile_no']);
}
?>



<html>

<HEAD>

    <title>hospital main page</title>
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
                <li></li>
                <li> <a href="\BMSnew/Hospital/blood_request.php"> Blood Request</a> </li>
                <li> <a href="\BMSnew/Hospital/blood_inventory.php"> View Blood Inventory</a> </li>
                <li> <a href="\BMSnew/Hospital/view_message.php">Messsages</a> </li>
                <li></li> 
                <li> <a href="?q=logout"> LOG-OUT</a> </li>
            </ul>

        </nav>

        <div class="user">
            <p>  <?php echo $_SESSION["id"]; ?></p>
            <img src="new-hospital-page-resorce/hospital.png">
        </div>

        </div>

       <div class="sidebar">
          <a href="\BMSnew/Hospital/hospitals main page/index.php"> <img src="new-hospital-page-resorce/homelogo.png"  class="homelogo"> </a>

          <a href="\BMSnew/Hospital/edit_profile.php"> <img src="new-hospital-page-resorce/update.png"  class="update"> </a>
       </div>
       
       <!-- this div for info about donor page-->

       <link rel="stylesheet" href="reg.css" type="text/css">
<style>
    body {
      background-image: url('profile change.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed; 
      background-size: cover;
    }
    </style>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change profile</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

  <form action="edit_profile.php" method="post">
  
    <h1>H-PROFILE</h1>
    
    <fieldset>
      
      
      
      
      <label for="name"> CHANGE HOSPITAL TITLE:</label>
      <input type="text" id="name" name="Title">

      <label for="email">CHANGE PHONE NUMBER:</label>
      <input type="text" id="name" name="mobile_no">

    
      
      
    <fieldset>
     
      <label for="Addres">CHANGE ADDRES:</label>
      <textarea id="Address" name="address"></textarea>
      
      

    </fieldset>

    <button type="submit" name="update">UPDATE</button>
    
    <a class="btn btn-danger btn-lg" href="pass_change.php" >Change Password</a>
  </form>
  
  
</body>
</html>
       <!--end of about-->
    </div>
</body>
</html>

-----------------------------------------------------------------------------------------------

