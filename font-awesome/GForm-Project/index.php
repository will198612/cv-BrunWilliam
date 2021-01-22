<?php
    require_once ("pages/head.php");
    $connect = false;
    if(isset($_GET["page"])){
        print("<div class = 'container'>");
            switch($_GET["page"]){
                //  Nav client
                case "comptes";
                    printRowAndDiv_bootstrap("pages/comptes.php", "pages/comptes.php");
                    break;
                case "formulaires";
                    printRowAndDiv_bootstrap("pages/formulaires.php", "pages/formulaires.php");
                    break;
                case "analyses";
                    printRowAndDiv_bootstrap("pages/analyses.php", "pages/analyses.php");
                    break;
                case "repondre";
                    printRowAndDiv_bootstrap("pages/repondre.php", "pages/repondre.php");
                break;
            }
        print("</div>");
    }
    else{
        if(isset($_POST["user"])&&(isset($_POST["pwd"]))) {
            $dao = new DAO();
            $connect = $dao->connectUser($_POST["user"],$_POST["pwd"]);
            if ($connect){
                printRowAndDiv_bootstrap("pages/navAdmin.php", "pages/navAdmin.php"); 
            }
            else print "Erreur d'authentification";
        }
    }


    require_once ("pages/footer.php");
?>