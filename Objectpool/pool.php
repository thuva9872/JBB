<?php
    abstract class ObjectPool{
        private $expiration_time;
        private $locked=array();
        private $unlocked=array();

        public function __construct(){
            $this->expiration_time=30000;
        }

        protected abstract function create();

        public abstract function boolean validate($o);

        public abstract function expire($o);

        public function checkOut(){
            $now=microtime();
            $t;
            if (count($this->unlocked)>0){
                
            }
        }
    }
?>