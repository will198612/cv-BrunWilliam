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

$continents=$bdd->query('SELECT id_continent,libelle_continent FROM t_continents ORDER BY libelle_continent');


$result=array();
while ($donnees = $continents->fetch(PDO::FETCH_ASSOC)) {
	$result[]=$donnees;
}

print json_encode($result);

?>