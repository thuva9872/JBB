<?PHP
session_start();
include_once ('C:\xampp\htdocs\BMSfin\JBB\Login\Factory.php');
  $factory=new Factory();
  $user = $factory->getUser("donor");  

if (isset($_POST["update"])){
    $user->edit_profile($_REQUEST['address'],$_REQUEST['mobile-no']);
}
?>

<?php

  include_once ('C:\xampp\htdocs\BMSfin\JBB\Login\Factory.php');
  $factory=new Factory();
  $user = $factory->getUser("donor");  
  $id = $_SESSION['id'];  
  if (!$user->session()){  
    header("location:\BMSfin\JBB\Donor\login.php");  
  }  
  if (isset($_REQUEST['q'])){  
    $user->logout();  
    header("location:\BMSfin\JBB\Donor\login.php");  
  }  
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DONOR_UpdateProfile</title>
    <link rel="stylesheet" href="new-donor-page/1.css">
    
   <style>
       h2 {text-align: center;}
   </style>
</HEAD>


<body>

    <div class="container">

        <div  class="navbar">
            <br>
            <h2 text-align="center" >DONOR</h2>
            <div class="logo">  
                <img src="new-donor-page/logo.png">
            </div>
        
        <nav>
            <ul>
             
                <li> <a href="\BMSfin/JBB/Donor/donation_details.php"> Donation Details</a> </li>
                <li> <a href="\BMSfin/JBB/Donor/blood_camp.php"> Blood camps</a> </li>

                <li> <a href="\BMSfin/JBB/Donor/view_message.php">Messsages</a> </li>

                 
                <li> <a href="?q=logout"> LOG-OUT</a> </li>
            </ul>

        </nav>

        <div class="user">
            <p> <b>DONOR NIC -<b> <?php echo $_SESSION["id"]; ?></p>
            <img src="new-donor-page/user.png">
        </div>

        </div>

       <div class="sidebar">
          <a href="\BMSfin/JBB/Donor/donor main page/index.php"> <img src="new-donor-page/homelogo.png"  class="homelogo"> </a>

          <a href="\BMSfin/JBB/Donor/edit_profile.php"> <img src="new-donor-page/update.png"  class="update"> </a>
       </div>
       
       <!-- this div for info about donor page-->

       <link rel="stylesheet" href="reg.css" type="text/css">
<style>
    body {
      background-image: url('back.png');
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
<head>

<style>
button {
  background-color: gray; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
</style>
<body>


  <form action="" method="post" style="background-color:white">
  
    <h1>D-profile</h1>
    
    <fieldset>

      <label for="email"> Change Email:</label>
      <input type="text" id="name" name="email" style="background-color:gray">
      <label for="Addres">Change Addres:</label>
      <textarea id="Address" name="address" style="background-color:gray"></textarea>
      
      <label for="mobile-no">Change Mobile-No:</label>
      <input type="mobile-no" id="num" name="mobile-no" onkeypress="return onlyNumberKey(event)" pattern="[0-9]{10}" maxlength="10" style="background-color:gray">
      
      
    </fieldset>
    <button type="submit" name="update" >UPDATE</button>
    
    
    <a class="btn btn-danger btn-lg" href="pass_change.php" >Change Password</a>
  </form>
  
  
</body>
<script> 
    function onlyNumberKey(evt) { 
          
        // Only ASCII charactar in that range allowed 
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
            return false; 
        return true; 
    } 
    </script> 
       <!--end of about-->
    </div>
</body>
</html>


----------------------------------------------------------------------------------------------------------------------------------------------
