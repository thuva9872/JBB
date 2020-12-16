<?php
include_once ('C:\xampp\htdocs\BMSfin\JBB\class.php');
include_once ('C:\xampp\htdocs\BMSfin\JBB\Login\LoginUser.php');
include_once ('C:\xampp\htdocs\BMSfin\JBB\Iterator\BloodRepository.php');

class Hospital extends User implements LoginUser{
    public  
      
        function login($reg_id, $pass) {  
            $db=new DB();
            //$pass = md5($pass);  
            $dbz=$db->getdb();
            $sql="Select * from hospital where Registration_ID='".$reg_id."' ";
            $stmt=$dbz->prepare($sql);
            $stmt->bindValue(':Registration_ID', $reg_id);
            //Execute.
            $stmt->execute();
            //Fetch row.
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user==false){
                echo "incorret username or password";
            }
            else{
                if ($user['Password']==md5($pass)){
                    $_SESSION['login'] = true;  
                    $_SESSION['id'] = $reg_id;  

                    return true;  
                } else {  
                    return false;  
            }  
                
        }
    }
    public  
      
        function register($reg_no, $name, $password1,$password2,$mobile_no, $address) {  
            $db = new DB();
            $sql = "INSERT INTO hospital (Registration_ID,Name,Password,Mobile_No,Address) VALUES (?,?,?,?,?)"; 
            $dbz=$db->getdb();
            $stmtinsert=$dbz->prepare($sql);
                    if ($password1==$password2){
                        $passworden=md5($password1);
                        try{
                            // $result=mysqli_query($db->$db1,$sql);
                           $result=$stmtinsert->execute([$reg_no,$name,$passworden,$mobile_no,$address]);
                           if ($result){
                            // if(mysqli_num_rows($result)==1){
                            echo 'success';
                            }else{
                            echo 'failed';
                            }
                        }
                        catch (PDOException $e){
                            if ($e->errorInfo[1]=1062){
                                echo '<script type="text/javascript"> alert("User Name already exists")</script>';
                                return false;
                            }
                        }
                }else{
                    echo '<script type="text/javascript"> alert("Confirm Password does not match")</script>';
                    return false;
                }                
                  
            
            return true; 
        }  
        public function edit_profile($title,$address,$mobile_no){
            $dbz=new DB();
            $db=$dbz->getdb();
            if ($title!=""){
                $sql1="UPDATE hospital SET Name='".$title."' WHERE Registration_ID='".$_SESSION['id']."'";
                $update_address=$db->query($sql1);
                $result1=$update_address->execute();
                if ($result1){
                  echo "";
                }
              }
          if ($address!=""){
              $sql1="UPDATE hospital SET Address='".$address."' WHERE Registration_ID='".$_SESSION['id']."'";
              $update_address=$db->query($sql1);
              $result1=$update_address->execute();
              if ($result1){
                echo "";
              }
            }
            if ($mobile_no!=""){
              $sql2="UPDATE hospital SET Mobile_No='".$mobile_no."' WHERE Registration_ID='".$_SESSION['id']."'";
              $update_mobile=$db->query($sql2);
              $result2=$update_mobile->execute();
              if ($result2){
                echo "";
              }
            }
            if ($address!="" || $mobile_no!="" || $title!=""){
              echo '<script type="text/javascript"> alert("Updated Succesfully");
              window.location.href="index.php";
              </script>';
            }
        
        }
  
        public function change_password($current,$new,$confirm){
          $db=new DB();
          //$pass = md5($pass);  
          $dbz=$db->getdb();
          $sql="Select * from hospital where Registration_ID='".$_SESSION['id']."' ";
          $stmt=$dbz->prepare($sql);
          $stmt->bindValue(':Registration_ID', $_SESSION['id']);
          //Execute.
          $stmt->execute();
          //Fetch row.
          $user = $stmt->fetch(PDO::FETCH_ASSOC);
          if ($user==false){
              echo "incorret username or password";
          }
          else{
              if ($user['Password']==md5($current)){
                  $sql2="UPDATE hospital SET Password='".md5($new)."' WHERE Registration_ID='".$_SESSION['id']."'";
                  $pass_change=$dbz->prepare($sql2);
                  if ($new==$confirm){
                      $result2=$pass_change->execute();
                      if ($result2){
                          echo '<script type="text/javascript"> alert("Password changed successfully")</script>';
                          $_SESSION['login'] = false;  
                          session_destroy(); 
                          header("location:login.php");
                      }
                      else{
                          echo '<script type="text/javascript"> alert("Password change failed. Try again later")</script>';
                      }
                  }  
                  else{
                      echo '<script type="text/javascript"> alert("Password does not match.")</script>';
                  }
              
              
          }
          else{
              echo '<script type="text/javascript"> alert("Incorrect password")</script>';
          }
          }
      }

      
      
      public function send_request($blood_type,$reason,$unit,$date){
        $db = new DB();
        $sql = "INSERT INTO blood_request (Hospital_ID,Blood_Type,Reason,Unit,Required_date) VALUES (?,?,?,?,?)"; 
        $dbz=$db->getdb();
        $stmtinsert=$dbz->prepare($sql);
        $result=$stmtinsert->execute([$_SESSION["id"],$blood_type,$reason,$unit,$date]);
        if ($result){
            echo '<script type="text/javascript"> alert("Request Sent")</script>';
        }else{
            echo '<script type="text/javascript"> alert("Request Sent Faile. Try Again.")</script>';
        }
      }

      public function view_blood_inventory(){
        $count=array(
            "A+"=>0,
            "A-"=>0,
            "B+"=>0,
            "B-"=>0,
            "AB+"=>0,
            "AB-"=>0,
            "O+"=>0,
            "O-"=>0
        );
        $rep=new BloodRepository();
        $it=$rep->getIterator();
        while ($it->hasNext()){
            $data=$it->next();
            if ($data['Blood_Type']=="A+"){
                $count["A+"]=$count["A+"]+1;
            }
            if ($data['Blood_Type']=="A-"){
                $count["A-"]=$count["A-"]+1;
            }
            if ($data['Blood_Type']=="B+"){
                $count["B+"]=$count["B+"]+1;
            }
            if ($data['Blood_Type']=="B-"){
                $count["B-"]=$count["B-"]+1;
            }
            if ($data['Blood_Type']=="AB+"){
                $count["AB+"]=$count["AB+"]+1;
            }
            if ($data['Blood_Type']=="AB-"){
                $count["AB-"]=$count["AB-"]+1;
            }
            if ($data['Blood_Type']=="O+"){
                $count["O+"]=$count["O+"]+1;
            }
            if ($data['Blood_Type']=="O-"){
                $count["O-"]=$count["O-"]+1;
            }
        }
        return $count;
    }
      public function view_message(){
        $db=new DB();
        $dbz=$db->getdb();
        $query="SELECT * FROM blood_request ORDER BY Request_ID DESC";
        $d=$dbz->query($query);
        return $d;
      }
}
?>