<?php
    session_start();
    include_once ('C:\xampp\htdocs\BMSfin\JBB\Login\Factory.php');
  $factory=new Factory();
  $user = $factory->getUser("donor");  
    if (!$user->session()){  
        header("location:login.php");  
     } 
    $d=$user->view_message();
    $blood_type=$user->get_blood_group();

?>




<html>

<HEAD>

    <title>Donor_view message</title>
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
                <li></li>  <li></li>  <li></li>
                
            </ul></nav>
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
        <table border="3" cellpadding="5" cellspacing="5" align="centre"  class="rwd-table">
        <tr> 
            <th> Message</th>
            <th> Required Date</th>
        
        </tr>
        <?php foreach($d as $data){
            if ($data["Blood_Type"]==$blood_type){
        ?>
        <tr>
            <td><?php echo $data["Message"]; ?></td>
            <td><?php echo $data["Date"]; ?></td>
            
        </tr>
        <?php
        }}
        ?>
        </div>
        </table>
       <!--end of about-->
    </div>
</body>
</html>
