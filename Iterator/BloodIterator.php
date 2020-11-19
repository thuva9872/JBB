<?php 
include_once ("Iterator.php");
    class BloodIterator implements Iterator1{
        private $list;
        private $pos=0;

        public function __construct($list){
            $this->list=$list;

        }

        public function next(){
            $out=$this->list[$this->pos];
            $this->pos=$this->pos+1;
            return $out;
        }

        public function hasNext(){
            if ($this->pos>=count($this->list) || $this->list[$this->pos]==NULL ){
                return false;
            }
            else{
                return true;
            }
        }
    }
?>