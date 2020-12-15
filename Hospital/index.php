
<!DOCTYPE html>
<?php
  session_start();  
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
                <li> <a href="\BMSfin/JBB/Hospital/blood_request.php"> Blood Request</a> </li>
                <li> <a href="\BMSfin/JBB/Hospital/blood_inventory.php"> View Blood Inventory</a> </li>
                <li> <a href="\BMSfin/JBB/Hospital/view_message.php">Messsages</a> </li>
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

       <div class="msg-container">
         <div id="slider">
              <div class="msg-col">
                 <img src="new-hospital-page-resorce/bloodre.png" alt="req" width="500" height="600">

              </div>
              <br>
              <div class="msg-col">
                <img src="new-hospital-page-resorce/bloodin.png" alt="inventt" width="400" height="400">

             </div>

             <div class="msg-col">
                <img src="new-hospital-page-resorce/msg.png" alt="msg" width="400" height="400">
             </div>

         </div>

       </div>
       <!--end of about-->
    </div>
</body>
</html>
