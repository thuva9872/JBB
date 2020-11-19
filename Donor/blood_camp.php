<?php
// $pdo=new PDO('mysql:host=localhost;dbname=bloodbank;charset=utf8','root','');
// $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// $query="SELECT * FROM blood_camp";
// $d=$pdo->query($query);



include_once ('C:\xampp\htdocs\BMSfin\JBB\Login\Factory.php');
  $factory=new Factory();
  $user = $factory->getUser("donor");  
$d=$user->view_blood_camp();
?>


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



<html>


<html>

<HEAD>

    <title>donor_blood camp view</title>
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
                <li> <a href="\BMSfin/JBB/Donor/view_message.php">MEsssages</a> </li>
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
        <table border="3" cellpadding="5" cellspacing="5" align="middle"  class="rwd-table">
        <tr> 
            <th> Title</th>
            <th> Venue</th>
            <th> Date</th>
            <th> Time</th>
        </tr>
        <?php foreach($d as $data){
        
        ?>
        <tr>
            <td><?php echo $data['Title']; ?></td>
            <td><?php echo $data['Venue']; ?></td>
            <td><?php echo $data['Date']; ?></td>
            <td><?php echo $data['Time']; ?></td>
        </tr>
        <?php
        }
        ?>
        </table>
        
        
        </div>
       <!--end of about-->
    </div>
</body>
</html>
