<!-- php code donor main page-->

<!DOCTYPE html>
<?php
  session_start();  
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
    <title>DONOR</title>
    <link rel="stylesheet" href="new-donor-page/1.css">
   <style>
       h2 {text-align: center;}
   </style>
</HEAD>

   
<body>

    <div class="container">

        <div  class="navbar">
            <h2 text-align= "left">DONOR</h2>
            <div class="logo">  
                <img src="new-donor-page/logo.png">
            </div>
        
        <nav>
            <ul>

              <li> <a href="\BMSfin/JBB/Donor/donation_details.php"> Donation Details</a> </li>
              <li> <a href="\BMSfin/JBB/Donor/blood_camp.php"> Blood Camps</a> </li>
              <li> <a href="\BMSfin/JBB/Donor/view_message.php">Messages</a> </li>
                <li> <a href="?q=logout">Logout</a> </li>

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

     
</body>
</html>
