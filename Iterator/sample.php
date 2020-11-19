<?php
    //include_once ('BloodIterator.php');
    include_once ('BloodRepository.php');
    $rep=new BloodRepository();
    $it=$rep->getIterator();
    while ($it->hasNext()){
        $o=$it->next();
        echo $o["ID"];
    }
?>