<?php
    
    $dao = new DAO();

    

    // (R) - LECTURE D'UN ENTETE
    $FormId="";
    $form = $dao->readFormHeader("");
    if ($dao->getError()){
        // print $form->getError();   
    }
    else {
        for ($i=0; $i<count($form);$i++){ 
            json_encode($form); 
            
      }
    }

?>