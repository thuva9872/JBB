
    <?php  
       session_start();  
       include_once ('C:\xampp\htdocs\BMSnew\Login\Factory.php');
  $factory=new Factory();
  $user = $factory->getUser("donor");    
       if ($user->session())  
       {  
          header("location:donor main page/index.php");  
       }  
      
       //$user = new Donor();  
       if (isset($_POST['login'])){  
          $login = $user->login($_REQUEST['NIC'],stripslashes($_REQUEST['Password']));  
          if($login){  
              echo "loginned";
             header("location:donor main page/index.php");  
          }
          else
          {  
             echo "Login Failed!";  
          }  
       }  
    ?>  
       <html>
<link href='https://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="login-framecss.css" type="text/css">
<style>
        .btn{
            width: 300px;
            height: 40px;
            border-radius: 20px;
            font-size: 20px;

        }
        </style>
<div class="login">
  <div class="login-header">
    <h1>DONOR LOGIN</h1>
  </div>
  <div class="login-form">
  <form action="login.php" method="post">
    <h3>NIC No:</h3>
    <input type="text" name="NIC" placeholder="Username" required><br>
    <h3>Password:</h3>
    <input type="password" name="Password" placeholder="Password" required>
    <br>
    <input type="submit" name='login' value="Login" class="btn">
    <br>
    <a class="sign-up" href="register.php">Sign Up!</a>
    <br>
    
  </div>
</div>

</html>