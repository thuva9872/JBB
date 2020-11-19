<?php
include_once ('state.php');
class Blood{
    public $id,$donor,$type,$donated_date,$expiry_date,$state;

    function __construct ($id,$donor,$type,$date,$state){
        $this->id=$id;
        $this->donor=$donor;
        $this->type=$type;
        $this->donated_date=$date;
        $d=$date;
        $this->expiry_date=$d;
        if ($state==NULL){
            $this->state=new NewB();
        }
        else{
            $this->state=$state;
        }
    }

    public function getid(){
        return $this->id;
    }

    public function getdonor(){
        return $this->donor;
    }

    public function gettype(){
        return $this->type;
    }

    public function getdonated_date(){
        return $this->donated_date->format('Y-m-d');
    }

    public function getexpiry_date(){
        return $this->expiry_date->format('Y-m-d');
    }

    public function setState($state){
        $this->state=$state;
    }

    public function getState(){
        return $this->state->getState();
    }
}
?>