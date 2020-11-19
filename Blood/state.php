<?php
abstract class State{
    public abstract function getState();
}

class NewB extends State{
    public function accept($blood){
        $blood->setState(new Usable());        
    }

    public function reject($blood){
        $blood->setState(new Rejected());
    }

    public function getState(){
        return "New(Not checked yet.)";
    }
}

class Usable extends State{
    public function expired($blood){
        $blood->setState(new Rejected());
    }

    public function getState(){
        return "Checked. Good Condition";
    }
}

class Rejected extends State{
    public function getState(){
        return "Rejected/Expired";
    }
}
?>