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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN | Blood Request</title>
    <link rel="stylesheet" href="new-donor-page/1.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="reg.css" type="text/css">
   <style>
       h2 {text-align: center;}
       body {
      background-image: url('telemedicine.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed; 
      background-size: cover;
    }
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




