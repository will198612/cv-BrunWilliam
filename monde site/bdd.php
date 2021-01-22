<?php
    
    try
{
 // On se connecte à MySQL
 $bdd = new PDO('mysql:host=localhost;dbname=pays;charset=utf8', 'user_pays', 'pays_2020');
}
catch(Exception $e)
{
 // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
}

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table pays
$reponse = $bdd->query('SELECT id_continent,libelle_continent FROM t_continents');
return $reponse;

	$regions = $bdd->query('SELECT id_region,libelle_region FROM t_regions WHERE continent_id');
    return $regions;

// if (isset($_GET["continent"])&&$_GET["continent"]) {
// 	$pays=$bdd->query('SELECT * FROM t_pays LEFT JOIN t_continents ON (t_pays.continent_id=t_continents.id_continent) WHERE id_continent='.$_GET["continent"]);
// }

// if (isset($_GET["region"])&&$_GET["region"]) {
// 	$pays=$bdd->query('SELECT * FROM t_pays LEFT JOIN t_regions ON (t_pays.region_id=t_regions.id_region) WHERE id_region='.$_GET["region"]);
// } 

            
             
             
             
              
             
        
         
   
      

     