
    <?php  
    // define('HOST', 'localhost');  
    // define('USER', 'root');  
    // define('PASS', '');  
    // define('DB', 'bloodbank');  
     class DB  
      
    {  
        function __construct() {  
            $this->expire();
        } 
        public function getdb(){
            $db1=new PDO('mysql:host=localhost;dbname=bloodbank;charset=utf8','root','');
            $db1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db1;
        }

        public
        function expire(){
            $db=$this->getdb();
            $query="SELECT * FROM blood_inventory";
            $d=$db->query($query);
            foreach ($d as $data){
                $now=new DateTime();
                $diff=date_diff(date_create(date("Y-m-d")),date_create($data["Donated_Date"]));
                if ($diff->format("%R%a")>7){
                    $sql="DELETE FROM blood_inventory WHERE ID='".$data["ID"]."'";
                    $d1=$db->query($sql);
                }
            }
        }
    }  
      
     abstract class User  
      
    {  
        // var $table;
        // var $db;
        public function __construct() {  
            //   $this->notify();
          }  
      
        
      
    //     public  
      
    //     function login($nic, $pass) {  
    //         $db=new DB();
    //         //$pass = md5($pass);  
    //         $dbz=$db->getdb();
    //         $sql="Select * from '".$table."' where NIC_NO='".$nic."' ";
    //         $stmt=$dbz->prepare($sql);
    //         $stmt->bindValue(':NIC_NO', $nic);
    //         //Execute.
    //         $stmt->execute();
    //         //Fetch row.
    //         $user = $stmt->fetch(PDO::FETCH_ASSOC);
    //         if ($user==false){
    //             echo "incorret username or password";
    //         }
    //         else{
    //             if ($user['Password']==$pass){
    //                 $_SESSION['login'] = true;  
    //                 $_SESSION['id'] = $nic;  

    //                 return true;  
    //             } else {  
    //                 return false;  
    //         }  
                
    //     }
    // }
           
      
        // public  
      
        // function fullname($id) {  
        //     $result = mysql_query("Select * from users where id='$id'");  
        //     $row = mysql_fetch_array($result);  
        //     echo $row['name'];  
        // }  
        
        public  
      
        function logout() {  
            $_SESSION['login'] = false;  
            session_destroy();  
        }  

        public  
      
        function session() {  
            if (isset($_SESSION['login'])) {  
                return $_SESSION['login'];  
            }  
        }
        
        // public
        // function notify(){
        //     $count=$this->view_blood_inventory();
        //     $db=new DB();
        //     $dbz=$db->getdb();
        //     if ($count["A+"]==0){
        //         $sql="INSERT INTO sys_msg (Date,Alert) VALUES (CURDATE(),A+ BLOOD FINISHED.)";

        //     }
        //     if ($count["A-"]==0){
        //         $sql="INSERT INTO sys_msg VALUES (?,?)";
        //         $stmtinsert=$dbz->prepare($sql);
        //         $stmtinsert->execute([2012-12-12,"A- BLOOD FINISHED."]);
        //     }
        //     if ($count["B+"]==0){
        //         $sql="INSERT INTO sys_msg VALUES (CURDATE(),B+ BLOOD FINISHED.)";
        //     }
        //     if ($count["B-"]==0){
        //         $sql="INSERT INTO sys_msg VALUES (CURDATE(),B- BLOOD FINISHED.)";
        //     }
        //     if ($count["AB+"]==0){
        //         $sql="INSERT INTO sys_msg VALUES (CURDATE(),AB+ BLOOD FINISHED.)";
        //     }
        //     if ($count["AB-"]==0){
        //         $sql="INSERT INTO sys_msg VALUES (CURDATE(),AB- BLOOD FINISHED.)";
        //     }
        //     if ($count["O+"]==0){
        //         $sql="INSERT INTO sys_msg VALUES (CURDATE(),O+ BLOOD FINISHED.)";
        //     }
        //     if ($count["O-"]==0){
        //         $sql="INSERT INTO sys_msg VALUES (CURDATE(),O- BLOOD FINISHED.)";
        //     }
           

        // }


        public function view_blood_inventory(){
            $db=new DB();
            $dbz=$db->getdb();
            $query="SELECT * FROM blood_inventory";
            $d=$dbz->query($query);
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
            foreach($d as $data){
              if ($data['Blood_Type']=="A+"){
                  $count["A+"]=$count["A+"]+1;
              }
              if ($data['Blood_Type']=="A-"){
                  $count["A+"]=$count["A-"]+1;
              }
              if ($data['Blood_Type']=="B+"){
                  $count["A+"]=$count["B+"]+1;
              }
              if ($data['Blood_Type']=="B-"){
                  $count["A+"]=$count["B-"]+1;
              }
              if ($data['Blood_Type']=="AB+"){
                  $count["A+"]=$count["AB+"]+1;
              }
              if ($data['Blood_Type']=="AB-"){
                  $count["A+"]=$count["AB-"]+1;
              }
              if ($data['Blood_Type']=="O+"){
                  $count["A+"]=$count["O+"]+1;
              }
              if ($data['Blood_Type']=="O-"){
                  $count["A+"]=$count["O-"]+1;
              }
            }
            return $count;
        }
       
    //   public function edit_profile($address,$mobile_no){
    //       $dbz=new DB();
    //       $db=$dbz->getdb();
    //     if ($address!=""){
    //         $sql1="UPDATE '".$table."' SET Address='".$address."' WHERE NIC_NO='".$_SESSION['id']."'";
    //         $update_address=$db->query($sql1);
    //         $result1=$update_address->execute();
    //         if ($result1){
    //           echo "";
    //         }
    //       }
    //       if ($mobile_no!=""){
    //         $sql2="UPDATE '".$table."' SET Mobile_No='".$mobile_no."' WHERE NIC_NO='".$_SESSION['id']."'";
    //         $update_mobile=$db->query($sql2);
    //         $result2=$update_mobile->execute();
    //         if ($result2){
    //           echo "";
    //         }
    //       }
    //       if ($address!="" || $mobile_no!="" || $age!=""){
    //         echo '<script type="text/javascript"> alert("Updated Succesfully");
    //         window.location.href="index.php";
    //         </script>';
    //       }
    //   }

    //   public function change_password($current,$new,$confirm){
    //     $db=new DB();
    //     //$pass = md5($pass);  
    //     $dbz=$db->getdb();
    //     $sql="Select * from '".$table."' where NIC_NO='".$_SESSION['id']."' ";
    //     $stmt=$dbz->prepare($sql);
    //     $stmt->bindValue(':NIC_NO', $_SESSION['id']);
    //     //Execute.
    //     $stmt->execute();
    //     //Fetch row.
    //     $user = $stmt->fetch(PDO::FETCH_ASSOC);
    //     if ($user==false){
    //         echo "incorret username or password";
    //     }
    //     else{
    //         if ($user['Password']==$current){
    //             $sql2="UPDATE '".$table."' SET Password='".$new."' WHERE NIC_NO='".$_SESSION['id']."'";
    //             $pass_change=$dbz->prepare($sql2);
    //             if ($new==$confirm){
    //                 $result2=$pass_change->execute();
    //                 if ($result2){
    //                     echo '<script type="text/javascript"> alert("Password changed successfully")</script>';
    //                     $_SESSION['login'] = false;  
    //                     session_destroy(); 
    //                     header("location:login.php");
    //                 }
    //                 else{
    //                     echo '<script type="text/javascript"> alert("Password change failed. Try again later")</script>';
    //                 }
    //             }  
    //             else{
    //                 echo '<script type="text/javascript"> alert("Password does not match.")</script>';
    //             }
            
            
    //     }
    //     else{
    //         echo '<script type="text/javascript"> alert("Incorrect password")</script>';
    //     }
    //     }
    // }
}

?>