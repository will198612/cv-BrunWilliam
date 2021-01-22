<?php
require_once('dao.php');
$dao = new DAO();
    $form = $dao->readFormHeader("");
    if ($dao->getError()) {
      print  $form->getError();   
    }
    else {
     print json_encode($form);     
    }

    
    //   $FormId="";
    // $dao->updateFormHeader($FormId,$title,$description,$start_date,$end_date,$link);
    // if ($dao->getError()){
    //     print $dao->getError();
    // }
    // else {
    //     print "Mise à jour du formulaire ".$FormId." réussie <br>";
    // }
    
?>
