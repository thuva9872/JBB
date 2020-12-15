 
 <?php  
    include_once ('C:\xampp\htdocs\BMSfin\JBB\Login\Factory.php');
    $factory=new Factory();
    $user = $factory->getUser("hospital");
       
       if(isset($_POST['create'])){ 
        $register = $user->register($_REQUEST['reg_no'], $_REQUEST['name'], $_REQUEST['password1'],$_REQUEST['password2'],$_REQUEST['mobile_no'], $_REQUEST['address'] );  
          if($register){  
             echo "Registration Successful!";  
          }
          else
          {  
             echo "Entered email already exist!";  
          }  
       }  
    ?>  
 <link rel="stylesheet" href="reg.css" type="text/css">
 <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HOSPITAL-Sign Up Form</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <style>
      body {
        background-image: url('hos.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed; 
        background-size: cover;
      }
      </style>
    <body>
      

      <form action="register.php" method="post">
      
        <h1>HOSPITAL Sign Up</h1>
        
        <fieldset>
          <legend>Your basic info</legend>
          <label for="name">REGISTRATION ID:</label>
          <input type="text" id="name" name="reg_no">

          <label for="name">HOSPITAL NAME</label>
          <input type="text" id="name" name="name">

          <label for="Addres">Address:</label>
      <textarea id="Address" name="address"></textarea>
          
          <label for="mail">MOBILE NUMBER:</label>
          <input type="number" id="name" name="mobile_no">
          
          <label for="password">Password:</label>
          <input type="password" id="password" name="password1">

          <label for="password">Confirm the-Password:</label>
          <input type="password" id="password" name="password2">
          
          
        </fieldset>
        
        
        
        
         
        
        
        <input type="submit" id='register' name="create" value="SignUp" class="btn">
      </form>
      
    </body>
</html>