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

    $monde = $bdd->query('SELECT `libelle_pays`,`population_pays`,`taux_natalite_pays`,`taux_mortalite_pays`,`esperance_vie_pays`,`taux_mortalite_infantile_pays`,`nombre_enfants_par_femme_pays`,`taux_croissance_pays`,`population_plus_65_pays` FROM `t_pays` order BY`libelle_pays`');
	

$result=array();
while ($donnees = $monde->fetch(PDO::FETCH_ASSOC)) {
	$result[]=$donnees;
}

print json_encode($result);

?>