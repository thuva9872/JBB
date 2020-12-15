
    <?php  
      include_once ('C:\xampp\htdocs\BMSfin\JBB\Login\Factory.php');
      $factory=new Factory();
      $user = $factory->getUser("donor");  
       
       if(isset($_POST['create'])){ 
        $register = $user->register($_REQUEST['name'], $_REQUEST['nic_no'], stripslashes($_REQUEST['password1']),stripslashes($_REQUEST['password2']), $_REQUEST['address'], $_REQUEST['mobile_no'], $_REQUEST['age'], $_REQUEST['blood_group']);  
          if($register){  
            echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Succesfully Registered')
        window.location.href='../donor/login.php';
            </SCRIPT>");
            // echo ('<script type="text/javascript"> alert("Succesfully Registered") window.location.href='../login.php';</script>'; 
          }
          
       }  
    ?>  
        <html>
<link rel="stylesheet" href="reg.css" type="text/css">
<style>
    body {
        background-image: url('Donn.jpg');
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
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up Form</title>
        <link rel="stylesheet" href="css/normalize.css">
        <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <div>
            <form action="register.php" method="post">

            <h1>Donor Sign Up</h1>

            <fieldset>
            <legend><span class="number">A</span>Your basic info</legend>
            <label for="name">Name:</label>
            <input type="text" name="name" required>

            <label for="nic">NIC-NO:</label>
            <input type="text" name="nic_no" pattern="^([0-9]{9}[x|X|v|V]|[0-9]{12})$" maxlength="12" required>

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

            <label for="password">Confirm Password:</label>
            <input type="password" name="password2" required>

            </fieldset>

            <fieldset>
            <legend><span class="number">B</span>Your profile</legend>
            <label for="Address">Address:</label>
            <textarea id="Address" name="address" required></textarea>
            <label for="mobile-no">Mobile-No:</label>
            <input type="mobile-no" name="mobile_no" onkeypress="return onlyNumberKey(event)" pattern="[0-9]{10}" maxlength="10" required> 

            <label for="AGE">AGE:</label>
            <input type="AGE" name="age" onkeypress="return onlyNumberKey(event)" maxlength="2" required>

            </fieldset>


            <fieldset>
            <label for="type">Blood-Type:</label>
            <select id="type" name="blood_group">
            <optgroup label="A">
                <option value="A+">A+</option>
                <option value="A-">A-</option>
            </optgroup>
            <optgroup label="B">
                <option value="B+">B+</option>
                <option value="B-">B-</option>
            </optgroup>
            <optgroup label="AB">
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
            </optgroup>
            <optgroup label="O">
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                
            </optgroup>
            </select>
            </fieldset>
            <input type="submit" id='register' name="create" value="SignUp" class="btn">
        </div>
    
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