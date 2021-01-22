<?php

// DAO Data Access Object for the g_form project

class DAO {
    private $dbname = 'g_form';
    private $host = 'localhost';
    private $login = 'user_lambda';
    private $pass = "pirouette";
    private $bdd;
    private $error='';

    public function __construct(){ // on peut avoir un constructeur vide et une méthode connec par exmple
        try // Connection à MySQL
        {
            $this->bdd = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname.';charset=utf8',$this->login,$this->pass);
        }
        catch(Exception $e) // En cas d'erreur, on affiche un message et on arrête tout
        {
            die($this->error=$e->getMessage());
        }
    }

    // *************** FONCTIONS GENERALES **********************************

    public function getError(){
        return $this->error;
    }


    /** ANNOTATION
        @param char $sql
        @return array
     */

    public function executeQuery($sql){ // Requêtes de type SELECT retournent Array
        $reponse=$this->bdd->query($sql);
        if (!$reponse){
            $this->error='La requête SQL ne fonctionne pas';
        }
        return ($reponse->FETCHAll(PDO::FETCH_ASSOC));
    }

    public function executeQueryIUD($sql){ // Requêtes de type Insert/Update/Delete retournent True/False
        $reponse=$this->bdd->query($sql);
        if (!$reponse){
            $this->error='La requête SQL ne fonctionne pas';
        }
        return ($reponse);
    }

    // *************** FONCTIONS SUR LA TABLE UTILISATEURS **********************************
    public function createUser($pseudo,$password,$admin,$mail){
        $password=password_hash($password,PASSWORD_ARGON2ID);
        $sql="INSERT INTO users (Pseudo,Password,Admin,Mail) VALUES ('$pseudo','$password',$admin,'$mail')";
        return $this->executeQueryIUD($sql);
    }

    public function readUser(){  // Retourne la liste de tous les utilisateurs admin ou pas
        $sql="SELECT Id_Users, Pseudo, Password, Admin, Mail FROM users";
        return $this->executeQuery($sql);
    }

    public function updateUser($pseudo,$password,$admin,$mail){ // Maj d'un utilisateur
        $sql="UPDATE users SET Pseudo='".$pseudo."',Password='".$password."',Admin=".$admin.",Mail='".$mail."' WHERE Pseudo='".$pseudo."'";
        return $this->executeQueryIUD($sql);
    }

    public function deleteUser($pseudo){
        $sql="DELETE FROM `users` WHERE Pseudo='".$pseudo."'";
        return $this->executeQueryIUD($sql);
    }

    public function userExist($pseudo){
        $sql="SELECT count(Pseudo) AS Total FROM users WHERE Pseudo='$pseudo'";
        $exist=$this->executeQuery($sql);
        $total=$exist[0]['Total'];
        if (!$exist){
            $this->error='La requête SQL ne fonctionne pas';
        }
        else {
            return ($total!=0); // 
        }
    }

    public function connectUser($pseudo,$password){
        $sql="SELECT Pseudo,Password FROM users WHERE Pseudo='$pseudo'";
        $exist=$this->executeQuery($sql);
        if (!$exist){
            $this->error='La requête SQL ne fonctionne pas';
        }
        else {
            if (password_verify($password,$exist[0]['Password']))
            {
                return true;
            }
            else return false; 
        }
    }

    // *************** FONCTIONS SUR LES FORMULAIRES **********************************

    // ENTETES DE FORMULAIRES
    public function createFormHeader($title,$description,$start_date,$end_date,$link){
        $sql="INSERT INTO formulaires (Titre,Description,Date_debut,Date_fin,Link) VALUES ('$title','$description',$start_date,'$end_date','$link')";
        return $this->executeQueryIUD($sql);
    }

    public function readFormHeader($idForm){
        if ($idForm!=""){
            $sql="SELECT Id_Formulaire, Titre, `Description`, `Date_debut`, `Date_fin`, `Link` FROM `formulaires` WHERE Id_Formulaire=".$idForm;
        }
        else
            $sql="SELECT Id_Formulaire, Titre, `Description`, `Date_debut`, `Date_fin`, `Link` FROM `formulaires`";
        return $this->executeQuery($sql);
    }

    public function updateFormHeader($idForm,$title,$description,$start_date,$end_date,$link){
        $sql="UPDATE formulaires SET Titre='".$title."',Description='".$description."',Date_debut=".$start_date.",Date_fin=".$end_date.",Link='".$link."' WHERE Id_Formulaire=".$idForm;
        return $this->executeQueryIUD($sql);
    }

    public function deleteFormHeader($IdForm){
        // DELETE DES QUESTIONS DU FORMULAIRE DE LA TABLE 'QUESTIONS'

        // DELETE DES LIENS DE LA TABLE RELATIONNEL 'CONTIENT'

        // DELETE DU FORMULAIRE DE LA TABLE 'FORMULAIRES'
        $sql="DELETE FROM `formulaires` WHERE Id_Formulaire=".$IdForm;
        return $this->executeQueryIUD($sql);
    }



}

?>