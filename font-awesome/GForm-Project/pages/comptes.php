<?php

    // Mourad KHEROUF - Maj du 5 Nov 2020 - Version 1

    // CHARGEMENT DU FICHIER DES UTILISATEURS
    $users = new DAO();

    $users = $users->readUser();
    for ($i=0; $i<count($users);$i++){
        print $users[$i]['Pseudo'].' - '.$users[$i]['Admin']." - ".$users[$i]['Mail']."<br>";
    }
    
    /*
    //$users = readCsv("csv/users.csv");
    $passwordconfirmed=false;
    $pseudoexist=false;

    function passconfirmed($pass1,$pass2){
        if($pass1==$pass2){
            return true;}
        else {?>
            <div class="alert alert-danger alert-dismissible">
                <strong>ATTENTION</strong> Les mots de passe ne correspondent pas.
            </div><?php
            return false;}
    }

    //* SUPPRESSION D'UN COMPTE UTLISATEUR SAUF SI C'EST LE SEUL ADMIN DU FICHIER
    if(isset($_POST["delete"])){
        $nbadmin=0; // on compte le nombre de comptes de type admin
        for($j=0;$j<count($users);$j++){
            if($users[$j][3]=="admin"){$nbadmin=$nbadmin+1;}
        }
        for($i=0;$i<count($users);$i++){
            if(($users[$i][0]==$_POST["delete"]) and ($users[$i][3]=="admin") and ($nbadmin>1)){               
                unset($users[$i]);
            } // RAJOUTER UN ELSE POUR AFFICHER MSG D'ERREUR IMPOSSIBLE DE SUPPRIMER LE SEUL ADMIN
        }
        // On sauvegarde le nouveau tableau
        $fusers=fopen("csv/users.csv","w");
        foreach($users as $data){
            fputcsv($fusers,$data);
        }
        fclose($fusers);
    }
    
    // SAUVEGARDE DES DONNEES 
    if(isset($_POST["enregistrer"]) and passconfirmed($_POST["pwd"],$_POST["pwd2"])){
        if(isset($_POST["change"]) and $_POST["change"]){ // Il s'agit d'un modification d'un user existant
            for($i=0;$i<count($users);$i++){ // on recherche le pseudo
                if($_POST["pseudo"]==$users[$i][0]){
                    $users[$i][0]=$_POST["pseudo"];
                    $users[$i][1]=$_POST["email"];
                    $users[$i][2]=password_hash($_POST["pwd"],PASSWORD_ARGON2I);
                    $users[$i][3]=$_POST["typecompte"];
                    $users[$i][4]=password_hash($_POST["pseudo"],PASSWORD_ARGON2I);
                    $users[$i][5]=$_POST["adresse"];
                    $users[$i][6]=$_POST["adresse2"];
                    $users[$i][8]=$_POST["cp"];
                    $users[$i][7]=$_POST["ville"];
                    $users[$i][9]=$_POST["tel"];
                    $users[$i][10]=$_POST["pnom"];
                    $users[$i][11]=$_POST["nom"];
                    $users[$i][12]=$_POST["dateinscription"];
                    $users[$i][13]=date("d/m/Y");
                }
            }
        }
        else { // Il s'agit de la création d'un utilisateur
            $i=count($users);
            $users[$i][0]=$_POST["pseudo"];
            $users[$i][1]=$_POST["email"];
            $users[$i][2]=password_hash($_POST["pwd"],PASSWORD_ARGON2I);
            $users[$i][3]=$_POST["typecompte"];
            $users[$i][4]=password_hash($_POST["pseudo"],PASSWORD_ARGON2I);
            $users[$i][5]=$_POST["adresse"];
            $users[$i][6]=$_POST["adresse2"];
            $users[$i][8]=$_POST["cp"];
            $users[$i][7]=$_POST["ville"];
            $users[$i][9]=$_POST["tel"];
            $users[$i][10]=$_POST["pnom"];
            $users[$i][11]=$_POST["nom"];
            $users[$i][12]=$_POST["dateinscription"];
            $users[$i][13]=date("d/m/Y");
        }

        $fusers=fopen("csv/users.csv","w"); // on écrase l'ancien fichier avec les nouvelles valeurs
        foreach($users as $data){        
            fputcsv($fusers,$data);
            }
        fclose($fusers);
    } // FIN DAUVEGARDE DES DONNEES

    // CREATION OU MODIFICATION D'UN COMPTE

    if(isset($_POST["change"]) or isset($_POST["create"])){ 
        // on charge les données avec ...
        if(isset($_POST["change"])){ // ... celles de l'utilisateur actuel ...        
            
            for($i=0;$i<count($users);$i++){
                if($users[$i][0]==$_POST["change"]){ // C'est le bon pseudo
                    $pseudo=$users[$i][0];
                    $pnom=$users[$i][10];
                    $nom=$users[$i][11];
                    $type=$users[$i][3];
                    $adresse=$users[$i][5];
                    $adresse2=$users[$i][6];
                    $cp=$users[$i][8];
                    $ville=$users[$i][7];
                    $tel=$users[$i][9];
                    $mail=$users[$i][1];
                    $dateinscription=$users[$i][12];
                }
            }
        }    
        else { // ... ou des valeurs vides pour le nouvel utilisateur
            $pseudo="";
            $pnom="";
            $nom="";
            $type="";
            $adresse="";
            $adresse2="";
            $cp="";
            $ville="";
            $tel="";
            $mail="";
            $dateinscription=date("d/m/Y");
            $pwd="";
            $pwd2="";
        }
        
        if(isset($_POST["change"])){ ?>
            <h2>MODIFICATION D'UN COMPTE UTILISATEUR</h2>
            <?php }
        else { ?>
            <h2>CREATION D'UN COMPTE UTILISATEUR</h2>
            <?php
        } ?>       

        <section class = "form">
            <form method = "post" id = "userform">
                <div>
                    <?php
                    if(isset($_POST["change"])){?> <!-- En modification d'un user pas de changement de pseudo autorisé -->
                        Pseudo
                        <input readonly type = "text" name = "pseudo" value = "<?php print $pseudo?>"><?php
                    }
                    else {?>
                        Pseudo
                        <input type = "text" name = "pseudo" value = "<?php print $pseudo?>"><?php
                    }?>
                    Prenom
                    <input type = "text" name = "pnom" value = "<?php print $pnom?>">
                    Nom
                    <input type = "text" name = "nom" value = "<?php print $nom?>">
                    Type <!-------------------- LA IL ME FAUT AFFINER AVEC UNE VALEUR PAR DEFAUT --------------------------------->
                    <select type = "text" name = "typecompte">
                        <option value = "admin">Admin</option>
                        <option value = "client">Client</option>
                        <option value = "adherent">Adhérent</option>
                    </select>
                </div>
                <div>
                    Adresse
                    <input type = "text" name = "adresse" value="<?php print $adresse?>">
                    Adresse 2
                    <input type = "text" name = "adresse2" value = "<?php print $adresse2?>">
                    Code Postal
                    <input type = "text" name = "cp" value = "<?php print $cp?>">
                    Ville
                    <input type = "text" name = "ville" value = "<?php print $ville?>">
                </div>
                <div>
                    Téléphone
                    <input type = "tel" name = "tel" value = "<?php print $tel?>">
                    Email
                    <input type = "email" name = "email" value = "<?php print $mail?>">
                    date d'inscription                                
                    <input type = "text" name = "dateinscription" value = "<?php print $dateinscription?>">
                </div>
                <div>
                    Mot de passe
                    <input type = "password" name = "pwd" value = "">
                    Confirmez le mot de passe
                    <input type = "password" name = "pwd2" value = "">                    
                </div>
                <button type = "submit" name = "enregistrer">Enregistrer</button>
                <button type = "submit" name = "delete" value = "<?php print $pseudo ?>">Supprimer Compte</button>
            </form>
        </section>
        <?php
    }
    else {  // AFFICHAGE DES COMPTES AMINISTRATEURS PUIS AUTRES

        ?>
        <section class="container">
            <div class="row"> <!-- COMPTES ADMINISTRATEURS -->
                <form method="POST">
                <div>
                    <h2>
                        Comptes Admin
                        <button type = "submit" name = "create" class="btn btn-info" value = "create">NOUVEAU</button>
                    </h2>
                <div>
                </form>
                <table class="table table-hover">
                    <form method = "post" class="form-inline">
                        <thead>
                            <th>Pseudo</th>
                            <th>Email</th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Adresse</th>
                            <th>Précision d'Adresse</th>
                            <th>Code Postal</th>
                            <th>Ville</th>
                            <th>Téléphone</th>
                            <th>Date d'inscription</th>
                            <th>Date de Dernière Connection</th>
                        </thead>
                        <tbody><?php
                            foreach($users as $user){
                                if($user[3]=="admin"){?>
                                    <tr>
                                        <td><?php print $user[0]; ?></td>
                                        <td><?php print $user[1]; ?></td>
                                        <td><?php print $user[10]; ?></td>
                                        <td><?php print $user[11]; ?></td>
                                        <td><?php print $user[5]; ?></td>
                                        <td><?php print $user[6]; ?></td>
                                        <td><?php print $user[8]; ?></td>
                                        <td><?php print $user[7]; ?></td>
                                        <td><?php print $user[9]; ?></td>
                                        <td><?php print $user[12]; ?></td>
                                        <td><?php print $user[13]; ?></td>
                                        <td><button class="btn btn-info" type = "submit" name = "change" value = "<?php print $user[0] ?>">Modifier</button></td>
                                    </tr><?php
                                }
                            }?>
                        </tbody>
                    </form>
                </table>
                <table class="table table-hover">
                    <form method = "post">
                        <thead>
                            <th>Pseudo</th>
                            <th>Email</th>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Adresse</th>
                            <th>Précision d'Adresse</th>
                            <th>Code Postal</th>
                            <th>Ville</th>
                            <th>Téléphone</th>
                            <th>Date d'inscription</th>
                            <th>Date de Dernière Connection</th>
                            <th>Supprimer</span>
                        </thead>
                        <?php

                        foreach($users as $user){
                            if($user[3]=="user"){
                                ?>
                                <tr>
                                    <td><?php print $user[0]; ?></td>
                                    <td><?php print $user[1]; ?></td>
                                    <td><?php print $user[10]; ?></td>
                                    <td><?php print $user[11]; ?></td>
                                    <td><?php print $user[5]; ?></td>
                                    <td><?php print $user[6]; ?></td>
                                    <td><?php print $user[8]; ?></td>
                                    <td><?php print $user[7]; ?></td>
                                    <td><?php print $user[9]; ?></td>
                                    <td><?php print $user[12]; ?></td>
                                    <td><?php print $user[13]; ?></td>
                                    <td><button class="btn btn-danger" type = "submit" name = "delete" value = "<?php print $user[0] ?>">Supprimer</button></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </form>
                </table>
            </div>
        </section><?php
    } // FIN AFFICHAGE DES COMPTES*/
?>