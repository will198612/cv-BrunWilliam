<?php
    session_start();
    require_once ("functions.php");
    require_once("dao.php");
    require_once("fonctionslaurent.php");
    // require_once("fonctions_Will.php");
    
    
    //variables pour des messages d'erreur
    $passwordnotsame = false;
    $usernametaken = false;
    $wrongpassword = false;

    //deconnection
    if(isset($_GET["deconnection"])&&$_GET["deconnection"]==true){
        unset($_SESSION["user"]);
        setcookie("user", null);
        session_destroy();
        header("location:index.php?page=home");
    }
    //connection via cookie
    if(isset($_COOKIE["user"])&&!(isset($_SESSION["user"]))){
        $users = readCsv("csv/users.csv");
        $cookiefound = false;
        //cherche cookie dans le fichier users.csv
        for($i=0;$i<count($users);$i++){
            //si il trouve il connect
            if($_COOKIE["user"]==$users[$i][4]){
                $_SESSION["user"]=$users[$i][0];
                $_SESSION["usertype"]=$users[$i][3];
                $cookiefound=true;
            }
        }
        //si il trouve pas il efface le cookie
        if($cookiefound==false){
            setcookie("user", null);
        }
    }

    //login
    if (isset($_POST["login"])){
        $users = readCsv("csv/users.csv");
        for($i=0;$i<count($users);$i++){
            //cherche si le pseudo existe

            if($_POST["pseudo"]==$users[$i][0]){
                //verifie mot de passe
                if(password_verify($_POST["pwd"],$users[$i][2])){
                    $_SESSION["user"]=$_POST["pseudo"];
                    $_SESSION["usertype"]=$users[$i][3];
                    //ajout de cookie
                    if(isset($_POST["cookie"])&&$_POST["cookie"]){
                        setcookie("user",$users[$i][4],time()+3600*24*30);
                    }
                    connectionDate($_POST["pseudo"]);
                    //verifie si c'est un compte admin
                    if($_SESSION["usertype"]=="admin"){
                        header("location:index.php?page=backoffice");
                    }
                    else{
                        header("location:index.php?page=home");
                    }
                }
                else{
                    $wrongpassword = true;
                }                        
            }   

        }
    }
    //inscription
    if (isset($_POST["inscription"])){
        //verifie si le pseudo est deja pris
        for($i=0;$i<count($users);$i++){
            if($_POST["pseudo"]==$users[$i][0]){
                $usernametaken = true;
            }
        }
        if($usernametaken == false){
            //verifie les deux mot de passes
            if($_POST["mdp"]==$_POST["mdpr"]){
                //crée utilisateur
                $fichier = fopen("csv/users.csv", "a+");
                $newUser = array (
                    $_POST["pseudo"],
                    $_POST["email"],
                    password_hash($_POST["mdp"],PASSWORD_ARGON2I),
                    "user",
                    password_hash($_POST["pseudo"],PASSWORD_ARGON2I),
                    $_POST["adresse"],
                    $_POST["adresse2"],
                    $_POST["ville"],
                    $_POST["cp"],
                    $_POST["tel"],
                    $_POST["pnom"],
                    $_POST["nom"],
                    date("d/m/Y"),
                    date("d/m/Y")
                );
                fputcsv($fichier,$newUser);
                fclose($fichier);
            }
            else{
                $passwordnotsame = true;
            }
        }
    }
    
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sondages et enquêtes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <link rel = "stylesheet" href = "css/gform.css">
</head>

<body>
    <header class="container-fluid" id="header">
        <div class="row" style="height: 2vw"></div>
        <div class="row">
            <article class="col-6 position-fixe">
                <a href="index.php">
                <image src="images/banniere.jpg" class="col-4 mt-4 mb-4" style="width: 500px; box-shadow:0px 0px 38px 5px #FFFFFF">
                </a>
            </article>
            <div id="loginButton" class="col-6 position-absolute" style=" right: 0;" onclick="toggle(this,'login');"><i class="far fa-user fa-1x d-flex justify-content-end" style="color: #A3A3A3; margin-top: 25px;z-index: 10"></i>
            </div>
        </div>
    </header>

    <section class = "form border border-primary">
            <form method = "POST" id = "userform" >
                           
        </form>
    </section> 
   

</body>
