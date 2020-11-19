<?php
    session_start();
    include_once ('C:\xampp\htdocs\BMSfin\JBB\Login\Factory.php');
    $factory=new Factory();
    $user = $factory->getUser("admin");
    if (!$user->session()){  
        header("location:login.php");  
     } 
    $d=$user->view_request();
    if (isset($_REQUEST["reply"])){
         $id=$_REQUEST["id"];
         $response=$_REQUEST["response"];
         $result=$user->reply_request($id,$response);
         if($result==true){
             $d=$user->view_request();
         }
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

<html>

<HEAD>
<style> 
input[type=button], input[type=submit], input[type=reset] {
  background-color: #4CAF50;;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
</style>

    <title>Admin main page-view request</title>
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
       <html>
<head>
<link rel="stylesheet" href="table design.css">  

</head>


<div class="con">
<table border="3" cellpadding="5" cellspacing="5" align="centre"  class="rwd-table">
<tr> 
    <th> Hospital ID</th>
    <th> Blood Type</th>
    
    <th> Reason</th>
    <th> Unit</th>
    <th> Required date</th>
    <th> Response</th>
</tr>
<?php foreach($d as $data){
?>
<tr>
    <td><?php echo $data["Hospital_ID"]; ?></td>
    <td><?php echo $data["Blood_Type"]; ?></td>
    <td><?php echo $data["Reason"]; ?></td>
    <td><?php echo $data["Unit"]; ?></td>
    <td><?php echo $data["Required_date"]; ?></td>
    <td><?php echo $data["Response"]; ?><br><form action="" method="POST"><input type="hidden" name="id" value=<?php echo $data["Request_ID"]; ?>> <input type="textarea" name="response" ><input type="submit" name="reply" value="reply" onclick="return confirm('Do you want to send this reply?');"></form></td>
</tr>
<?php
}
?>
</table>


       <!--end of about-->
    </div>
</body>
</html>

