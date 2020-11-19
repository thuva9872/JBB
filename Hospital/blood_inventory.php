<?php
session_start();
include_once ('C:\xampp\htdocs\BMSnew\Login\Factory.php');
  $factory=new Factory();
  $user = $factory->getUser("hospital");
if (!$user->session()){  
    header("location:login.php");  
 }  
$count=$user->view_blood_inventory();
?>


<html>

<HEAD>

    <title>hospital blood inventory</title>
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
       <head>
  <link rel="stylesheet" href="table design.css">
</head>

<div class= "con" >

<table border="3" cellpadding="5" cellspacing="5" align="centre"  class="rwd-table">
<tr> 
    <th> Blood Typr</th>
    <th> Count</th>
</tr>

<tr>
    <td><?php echo "A+"; ?></td>
    <td><?php echo $count['A+']; ?></td>
</tr>
<tr>
    <td><?php echo "A-"; ?></td>
    <td><?php echo $count['A-']; ?></td>
</tr>
<tr>
    <td><?php echo "B+"; ?></td>
    <td><?php echo $count['B+']; ?></td>
</tr>
<tr>
    <td><?php echo "B-"; ?></td>
    <td><?php echo $count['B-']; ?></td>
</tr>
<tr>
    <td><?php echo "AB+"; ?></td>
    <td><?php echo $count['AB+']; ?></td>
</tr>
<tr>
    <td><?php echo "AB-"; ?></td>
    <td><?php echo $count['AB-']; ?></td>
</tr>
<tr>
    <td><?php echo "O+"; ?></td>
    <td><?php echo $count['O+']; ?></td>
</tr>
<tr>
    <td><?php echo "O-"; ?></td>
    <td><?php echo $count['O-']; ?></td>
</tr>
</div>
</table>
</div>
       <!--end of about-->
    </div>
</body>
</html>

