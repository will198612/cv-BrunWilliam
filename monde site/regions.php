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
if ($_GET["continent"]=="") {
	$regions=$bdd->query('SELECT id_region,libelle_region FROM t_regions ORDER BY libelle_region');
} else {
	$regions = $bdd->query('SELECT id_region,libelle_region FROM t_regions WHERE continent_id='.$_GET["continent"].' ORDER BY libelle_region');
}


$result=array();
while ($donnees = $regions->fetch(PDO::FETCH_ASSOC)) {
	$result[]=$donnees;
}

print json_encode($result);

?>