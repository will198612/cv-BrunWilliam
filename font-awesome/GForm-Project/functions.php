<?php // Function file for the Gform project

// function readCsv($filename) {
//    $datas=array();
//    //on ouvre le fichier en lecture
//    if (($handle = fopen($filename, "r")) !== FALSE) {
      
//       //on lit le fichier ligne par ligne
//       while (($data = fgetcsv($handle, 10000, ",")) !== FALSE) {
                     
//          //on ajoute la ligne à un tableau php
         
         
//          $datas[]=$data;
         
//       }
//       fclose($handle);
//    }
//    return $datas;
// }


   // function d'affichages
   function printSection($link) {
    print("<section class='col-xs-12 col-sm-12 col-md-12 col-lg-12 sectionMain'>");
       require_once $link;
    print("</section>");
 }
 
 function printRowAndDiv_bootstrap($link, $link2){
    print("<div class='row'>");
       print("<div class='col-xs-12 col-sm-12 col-md-12 col-lg-12 '>");
          require_once $link;
          printSection($link2);
       print("<div>");
   print("</div>");

 }


?>