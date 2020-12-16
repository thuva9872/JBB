<?php  
       session_start();  
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

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN | main page</title>
    <link rel="stylesheet" href="new-donor-page/1.css">
   <style>
       h2 {text-align: center;}
   </style>
</HEAD>
<body>

    <div class="container">

        <div  class="navbar">
            <br>
            <h2 text-align="left" style="font-display: #ccc;">ADMIN</h2>
           
        
        <nav>
            <ul>

                <li> <a href="request_donation.php">Request Blood</a> </li>
                <li> <a href="manage_hospital.php" >Manage Hospital</a> </li>
                <li> <a href="manage_donor.php" >Manage Donors</a> </li>
                <li> <a href="view_request.php" >View Request</a> </li>
                <li> <a href="blood_camp.php"  >Add BloodCamp</a> </li>
                <li> <a href="add_blood.php" >Add Blood</a> </li>
                <li> <a href="blood_inventory.php" >Blood Inventory</a> </li>
               <li> <a href="?q=logout"  > LOG-OUT</a> </li>
            </ul>

        </nav>

        
        </div>

       <div class="sidebar">
        <a href="index.php"> <img src="new-donor-page/homelogo.png"  class="homelogo"> </a>
        <a href="pass_change.php"> <img src="new-donor-page/up.png"  class="update"> </a>
         
         
       </div>
       
       <!-- this div for info about donor page-->

       <div class="msg-container">
         <div id="slider">
              <div class="msg-col">
                 
                 <img src="new-donor-page/ad.png"alt="add" width="800" height="600">

              </div>
             

         </div>

       </div>
       <!--end of about-->
    </div>
</body>
</html>
