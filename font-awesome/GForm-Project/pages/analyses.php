<?php

// J'utilise ce fichier en test pour le DAO

$dao = new DAO(); // Nouvelle instanciation d'un DAO

// ************* EXEMPLES D'UTILISATION DU DAO POUR LES FORMULAIRES (ENTETES) CRUD

// Initialisation des variables
$title="Exemple de formulaire";
$description="Description du formulaire";

$start_date=date('Y/m/d');
$end_date='0000/00/00';
$link="token-aexvcd";


// (C) - CREATION D'UN ENTETE
$dao->createFormHeader($title,$description,$start_date,$end_date,$link);


// (R) - LECTURE D'UN ENTETE
// $FormId="";
// $form = $dao->readFormHeader($FormId);
// if ($dao->getError()){
//     // print $form->getError();
// }
// else {
//     for ($i=0; $i<count($form);$i++){
//         print $form[$i]['Id_Formulaire'].' - '.$form[$i]['Titre'].' - '.$form[$i]['Description']." - ".$form[$i]['Date_debut']."<br>";
//     }
// }

// (U) - UPDATE D'UN ENTETE
/*
$FormId="8";
$dao->updateFormHeader($FormId,$title,$description,$start_date,$end_date,$link);
if ($dao->getError()){
    print $dao->getError();
}
else {
    print "Mise à jour du formulaire ".$FormId." réussie <br>";
}
*/
// ************* EXEMPLES D'UTILISATION DU DAO POUR LA GESTION UTILISATEURS CRUD


/*
// (C) CREATION D'UN UTILISATEUR
$pseudo="moka";
$password=$pseudo;
$admin=true;
$user=array();
$mail="test@test.fr";
if ($dao->userExist($pseudo)) {
    print "Utilisateur ".$pseudo." existant <br>";
}
else {
    $dao->createUser($pseudo,$password,$admin,"m.kherouf@hotmail.fr"); // Création de l'utilisateur
    print "Création de l'utilisateur ".$pseudo." réussie <br>";
}
if ($dao->getError()){
    print $dao->getError()[2];
}
*/

/*
// (R) AFFICHAGE d'UN OU PLUSIEURS UTILISATEURS 

$users=$dao->readUser();
if ($dao->getError()){
    print $dao->getError();
}
else {
    for ($i=0; $i<count($users);$i++){
        print $users[$i]['Pseudo'].' - '.$users[$i]['Admin']." - ".$users[$i]['Mail']."<br>";
    }
}
*/

/*
// (U) MISE A JOUR D'UN UTILISATEUR

$dao->updateUser($pseudo,$password,$admin,$mail); 
if ($dao->getError()){
    print $dao->getError();
}
else {
    print "Mise à jour de l'utilisateur ".$pseudo." réussie <br>";
}

if ($dao->connectUser($pseudo,$password)){
    print "connection réussie"."<br>";
}
else print "Erreur d'authentification";
*/

/*
// (D) DELETE D'UN UTILISATEUR

$dao->deleteUser($pseudo); // Suppression de l'utilisateur

if ($dao->getError()){
    print $dao->getError()[2];
}
else print "Suppression de l'utilisateur ".$pseudo." réussie";
*/

?>