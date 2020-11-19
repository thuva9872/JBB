<?php
include_once ('C:\xampp\htdocs\BMSnew\Donor\donor.php');
include_once ('C:\xampp\htdocs\BMSnew\Hospital\hospital.php');
include_once ('C:\xampp\htdocs\BMSnew\Admin\admin.php');

    class Factory{
        public function getUser($type){
            $user;
            if ($type=="donor"){
                $user=new Donor();
                return $user;
            }
            elseif ($type=="hospital"){
                $user=new Hospital();
                return $user;
            }
            else{
                $user=Admin::getinstance();
                return $user;
            }            
        }
    }
?>