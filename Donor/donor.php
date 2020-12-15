<?php
include_once ('C:\xampp\htdocs\BMSfin\JBB\class.php');
include_once ('C:\xampp\htdocs\BMSfin\JBB\Login\LoginUser.php');
class Donor extends User  implements LoginUser {
    public  
      
        function login($nic, $pass) {  
            $db=new DB();
            //$pass = md5($pass);  
            $dbz=$db->getdb();
            $sql="Select * from donors where NIC_NO='".$nic."' ";
            $stmt=$dbz->prepare($sql);
            $stmt->bindValue(':NIC_NO', $nic);
            //Execute.
            $stmt->execute();
            //Fetch row.
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user==false){
                echo "incorret username or password";
            }
            else{
                $validpw=password_verify($pass, $user['Password']);
                $validpw1=stripslashes($user['Password'])==md5($pass);
                if ($validpw1){
                    $_SESSION['login'] = true;  
                    $_SESSION['id'] = $nic;  

                    return true;  
                } else {  
                    return false;  
            }  
                
        }
    }
    public function validate_age($nic){
        if (strlen($nic)==10){
            if ("19".substr($nic,0,2)<=date("Y")-18){
               
                return TRUE;
            }
        }
        else{
            if (substr($nic,0,4)<=date("Y")-18){
                return TRUE;
            }
        }
        return FALSE;
    }
    public  
      
        function register($name, $nic, $password1,$password2, $address, $mobile_no, $age, $blood_type) {  
            $db = new DB();
            $sql = "INSERT INTO donors (Name,NIC_NO,Password,Address,Mobile_No,Age,Blood_Type) VALUES (?,?,?,?,?,?,?)"; 
            $dbz=$db->getdb();
            $stmtinsert=$dbz->prepare($sql);
            if ($this->validate_age($nic)){
                    if ($password1==$password2){
                        $passworden=md5($password1);
                        $passworden1 = password_hash($password1, PASSWORD_DEFAULT);
                        try{
                            // $result=mysqli_query($db->$db1,$sql);
                           $result=$stmtinsert->execute([$name,$nic, $passworden,$address,$mobile_no,$age,$blood_type]);
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
                                return FALSE;
                            }
                        }
                }else{
                    echo '<script type="text/javascript"> alert("Confirm Password does not match")</script>';
                    return false;
                }                
                return true; 
            }
            else{
                echo '<script type="text/javascript"> alert("You are under 18.")</script>';
            }
        } 
        public function edit_profile($address,$mobile_no){
            $dbz=new DB();
            $db=$dbz->getdb();
          if ($address!=""){
              $sql1="UPDATE donors SET Address='".$address."' WHERE NIC_NO='".$_SESSION['id']."'";
              $update_address=$db->query($sql1);
              $result1=$update_address->execute();
              if ($result1){
                echo "";
              }
            }
            if ($mobile_no!=""){
              $sql2="UPDATE donors SET Mobile_No='".$mobile_no."' WHERE NIC_NO='".$_SESSION['id']."'";
              $update_mobile=$db->query($sql2);
              $result2=$update_mobile->execute();
              if ($result2){
                echo "";
              }
            }
            if ($address!="" || $mobile_no!="" || $age!=""){
              echo '<script type="text/javascript"> alert("Updated Succesfully");
              window.location.href="index.php";
              </script>';
            }
        }
  
        public function change_password($current,$new,$confirm){
          $db=new DB();
          //$pass = md5($pass);  
          $dbz=$db->getdb();
          $sql="Select * from donors where NIC_NO='".$_SESSION['id']."' ";
          $stmt=$dbz->prepare($sql);
          $stmt->bindValue(':NIC_NO', $_SESSION['id']);
          //Execute.
          $stmt->execute();
          //Fetch row.
          $user = $stmt->fetch(PDO::FETCH_ASSOC);
          if ($user==false){
              echo "incorret username or password";
          }
          else{
              if ($user['Password']==md5($current)){
                  $sql2="UPDATE donors SET Password='".md5($new)."' WHERE NIC_NO='".$_SESSION['id']."'";
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

      public function view_donation_details(){
          $db=new DB();
          $dbz=$db->getdb();
          $query="SELECT * FROM blood_donations";
          $d=$dbz->query($query);
          return $d;
      }
      public function view_blood_camp(){
        $db=new DB();
        $dbz=$db->getdb();
        $query="SELECT * FROM blood_camp ORDER BY Date DESC, Time Desc";
        $d=$dbz->query($query);
        return $d;
    }

    public function view_message(){
        $db=new DB();
        $dbz=$db->getdb();
        $query="SELECT * FROM donation_request ORDER BY Date DESC";
        $d=$dbz->query($query);
        return $d;
    }

    public function get_blood_group(){
        $db=new DB();
        $dbz=$db->getdb();
        $query="SELECT * FROM donors WHERE NIC_NO='".$_SESSION["id"]."'";
        $d=$dbz->query($query);
        foreach ($d as $data){
            $blood_type=$data["Blood_Type"];
            return $blood_type;
        }
        
    }
}

?>