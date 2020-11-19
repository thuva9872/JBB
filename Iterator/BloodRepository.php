<?php
include_once ("Container.php");
include_once ('BloodIterator.php');
include_once ('C:\xampp\htdocs\BMSfin\JBB\class.php');
    class BloodRepository implements Container{
        //private $blood=array();
        private $total=0;
        private $list=array();
        public function __construct(){
            $db=new DB();
            $dbz=$db->getdb();
            $query="SELECT * FROM blood_inventory";
            $d=$dbz->query($query);
            while ($i=$d->fetch()){
                array_push($this->list,$i);
            }
        }

        public function getIterator(){
            return new BloodIterator($this->list);
        }

    }
?>