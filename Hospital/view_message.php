<?php
    session_start();
    include_once ('C:\xampp\htdocs\BMSfin\JBB\Login\Factory.php');
    $factory=new Factory();
    $user = $factory->getUser("hospital");
    if (!$user->session()){  
        header("location:login.php");  
     } 
    $d=$user->view_message();

?>

<?php
   
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
<html>

<HEAD>

    <title>hospital main page</title>
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

       <head>
  <link rel="stylesheet" href="table design.css">
</head>

<div class= "con" >
<table border="3" cellpadding="5" cellspacing="5" align="centre"  class="rwd-table">
<tr> 
    <th> Blood_Type</th>
    <th> Reason</th>
    <th> Unit</th>
    <th> Required Date</th>
    <th> Response </th>
</tr>
<?php foreach($d as $data){
    if ($data["Hospital_ID"]==$_SESSION["id"]){
?>
<tr>
    <td><?php echo $data["Blood_Type"]; ?></td>
    <td><?php echo $data["Reason"]; ?></td>
    <td><?php echo $data["Unit"]; ?></td>
    <td><?php echo $data["Required_date"]; ?></td>
    <td><?php echo $data["Response"]; ?></td>
</tr>
<?php
}}
?>
</table>
</div>
       <!--end of about-->
    </div>
</body>
</html>


