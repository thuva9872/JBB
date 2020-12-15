 
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
<!DOCTYPE html>
<html>
  
 <head>
       <link rel="stylesheet" href="reg.css" type="text/css">
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
      .btn{
            width: 430px;
            height: 50px;
            border-radius: 20px;
            font-size: 20px;
        }
      </style>
    <body>
      

      <form action="register.php" method="post">
      
        <h1>HOSPITAL Sign Up</h1>
        
        <fieldset>
          <legend>Your basic info</legend>
          <label for="name">REGISTRATION ID:</label>
          <input type="text" id="name" name="reg_no" required>

          <label for="name">HOSPITAL NAME</label>
          <input type="text" id="name" name="name" required> 


          <label for="Addres">ADDRESS:</label>

      <textarea id="Address" name="address"></textarea>
          
          <label for="mail">MOBILE NUMBER:</label>

          <input type="number" id="name" name="mobile_no" onkeypress="return onlyNumberKey(event)" pattern="[0-9]{10}" maxlength="10" required>
          
          <label for="password">Password:</label>
          <input type="password" name="password1" id="psw" pattern="(?=.*\d)(?=.[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>

          <div id="message">
                <h3>Password must contain the following:</h3>
                <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                <p id="number" class="invalid">A <b>number</b></p>
                <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                <br><br>
            </div>

          <label for="password">Confirm the-Password:</label>
          <input type="password" id="password" name="password2" required>
          
          
       </fieldset>
        


        <input type="submit" id='register' name="create" value="SignUp" class="btn">
        <br><br><br><br><br>
      </form>
      
    </body>
    <script>
            var myInput = document.getElementById("psw");

            // When the user clicks on the password field, show the message box
            myInput.onfocus = function() {
            document.getElementById("message").style.display = "block";
            }

            // When the user clicks outside of the password field, hide the message box
            myInput.onblur = function() {
            document.getElementById("message").style.display = "none";
            }
    </script>
    <script> 
    function onlyNumberKey(evt) { 
          
        // Only ASCII charactar in that range allowed 
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode 
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57)) 
            return false; 
        return true; 
    } 
    </script> 
</html>

