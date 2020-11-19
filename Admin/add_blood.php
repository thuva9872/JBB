<?php  
       include_once ('C:\xampp\htdocs\BMSfin\JBB\Login\Factory.php');
       include_once ('C:\xampp\htdocs\BMSfin\JBB\Blood\blood.php');
       $factory=new Factory();
       $user = $factory->getUser("admin");
    //    if (!$user->session()){  
    //     header("location:login.php");  
    //  }  
       if(isset($_POST['add'])){ 
            $blood=new Blood($_REQUEST['id'],$_REQUEST["nic"], $_REQUEST['blood_type'],new DateTime($_REQUEST['date']),NULL); 
            $user->add_blood($blood,$_REQUEST["place"]);
       }  
    ?>  

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

    
<html>

<HEAD>

    <title>Admin main page</title>
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
      background-image: url('addb.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed; 
      background-size: cover;
    }
    </style>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add blood form</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>

  <form action="add_blood.php" method="post">
  
    <h1>ADD BLOOD</h1>
    
    <fieldset>
      
      <label for="number"></label>BLOOD ID:</label>
      <input type="number" id="number" name="id">

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
      
      <label for="number"></label>DONOR NIC-NO:</label>
      <input type="text" id="number" name="nic">
      
      
      
    <fieldset>
      
      <label for="Addres">Donate place:</label>
      <textarea id="Address" name="place"></textarea>
      
      
      <label for="Date">DATE:</label>
      <input type="date" id="date" name="date">

    </fieldset>

    
    
    <button type="submit" name="add">ADD</button>
  </form>
  
</body>
</html>
       <!--end of about-->
    </div>
</body>
</html>

