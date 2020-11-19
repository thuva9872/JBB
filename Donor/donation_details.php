<?php
    session_start();
    include_once ('C:\xampp\htdocs\BMSfin\JBB\Login\Factory.php');
  $factory=new Factory();
  $user = $factory->getUser("donor");  
    if (!$user->session()){  
        header("location:login.php");  
     } 
    $d=$user->view_donation_details();

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


<html>

<HEAD>

    <title>Donor_donat details</title>
    <link rel="stylesheet" href="new-donor-page/1.css">
    <link rel="stylesheet" href="table design.css">

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
                <li></li>
                <li> <a href="\BMSfin/JBB/Donor/donation_details.php"> Donation Details</a> </li>
                <li> <a href="\BMSfin/JBB/Donor/blood_camp.php"> Blood camps</a> </li>
                <li> <a href="\BMSfin/JBB/Donor/view_message.php">Messsages</a> </li>
                <li></li>  
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

       <div class= "con" >
        <table border="3" cellpadding="5" cellspacing="5" align="middle" class="rwd-table">
        <tr> 
            <th> Donated Date</th>
            <th> Donated Place</th>
        </tr>
        <?php foreach($d as $data){
            if ($data["Donor_ID"]==$_SESSION["id"]){
        ?>
        <tr>
            <td><?php echo $data["Donated_date"]; ?></td>
            <td><?php echo $data["Donated_place"]; ?></td>
        </tr>
        <?php
        }}
        ?>
        
        </div>
        </table>
    </div>
       <!--end of about-->
    </div>
</body>
</html>
