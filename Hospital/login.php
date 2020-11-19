<?php  
       session_start();  
       include_once ('C:\xampp\htdocs\BMSnew\Login\Factory.php');
       $factory=new Factory();
       $user = $factory->getUser("hospital"); 
       if ($user->session())  
       {  
          header("location:hospitals main page/index.php");  
       }  
      
       //$user = new Donor();  
       if (isset($_POST['login'])){  
          $login = $user->login($_REQUEST['reg_no'],$_REQUEST['Password']);  
          if($login){  
              echo "loginned";
             header("location:hospitals main page/index.php");  
          }
          else
          {  
             echo "Login Failed!";  
          }  
       }  
    ?>  
<link href='https://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="login-framecss.css" type="text/css">
<div class="login">
  <div class="login-header">
    <h1>HOSPITAL LOGIN</h1>
  </div>
  <div class="login-form">
  <form action="login.php" method="post">
    <h3>REGISTRATION NUM</h3>
    <input type="text" name="reg_no" placeholder="Username" required><br>
    <h3>Password:</h3>
    <input type="password" name="Password" placeholder="Password" required>
    <br>
    <input type="submit" name="login" value="Login" class="login-button">
    <br>
    <a class="sign-up" href="register.php">Sign Up!</a>
    <br>
  </div>
</div>
</html>