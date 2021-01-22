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

if (isset($_GET["region"])&&$_GET["region"]) {
		$pays = $bdd->query('SELECT `libelle_pays`, `population_pays`, `taux_natalite_pays`, `taux_mortalite_pays`, `esperance_vie_pays`, `taux_mortalite_infantile_pays`, `nombre_enfants_par_femme_pays`, `taux_croissance_pays`, `population_plus_65_pays` FROM t_pays WHERE region_id='.$_GET["region"]." ORDER BY libelle_pays ");
		
		$totaux=$bdd->query('SELECT \'*TOTAL\' AS libelle_pays,SUM(t_pays.population_pays) AS population_pays, ROUND(AVG(t_pays.taux_natalite_pays), 1) AS taux_natalite_pays, ROUND(AVG(t_pays.taux_mortalite_pays), 1) AS taux_mortalite_pays, ROUND(AVG(t_pays.esperance_vie_pays), 1) AS esperance_vie_pays, ROUND(AVG(t_pays.taux_mortalite_infantile_pays), 1) AS taux_mortalite_infantile_pays, ROUND(AVG(t_pays.nombre_enfants_par_femme_pays), 1) AS nombre_enfants_par_femme_pays, ROUND(AVG(t_pays.taux_croissance_pays), 1) AS taux_croissance_pays, SUM(t_pays.population_plus_65_pays) AS population_plus_65_pays FROM `t_pays` WHERE region_id='.$_GET["region"]);
	
} else {
	if ($_GET["continent"]) {
		$pays = $bdd->query('SELECT `libelle_pays`, `population_pays`, `taux_natalite_pays`, `taux_mortalite_pays`, `esperance_vie_pays`, `taux_mortalite_infantile_pays`, `nombre_enfants_par_femme_pays`, `taux_croissance_pays`, `population_plus_65_pays` FROM t_pays WHERE continent_id='.$_GET["continent"]." ORDER BY libelle_pays ");
		
		$totaux=$bdd->query('SELECT \'*TOTAL\' AS libelle_pays,SUM(t_pays.population_pays) AS population_pays, ROUND(AVG(t_pays.taux_natalite_pays), 1) AS taux_natalite_pays, ROUND(AVG(t_pays.taux_mortalite_pays), 1) AS taux_mortalite_pays, ROUND(AVG(t_pays.esperance_vie_pays), 1) AS esperance_vie_pays, ROUND(AVG(t_pays.taux_mortalite_infantile_pays), 1) AS taux_mortalite_infantile_pays, ROUND(AVG(t_pays.nombre_enfants_par_femme_pays), 1) AS nombre_enfants_par_femme_pays, ROUND(AVG(t_pays.taux_croissance_pays), 1) AS taux_croissance_pays, SUM(t_pays.population_plus_65_pays) AS population_plus_65_pays FROM `t_pays` WHERE continent_id='.$_GET["continent"]);
		
	} else {
		$pays = $bdd->query('SELECT `libelle_pays`, `population_pays`, `taux_natalite_pays`, `taux_mortalite_pays`, `esperance_vie_pays`, `taux_mortalite_infantile_pays`, `nombre_enfants_par_femme_pays`, `taux_croissance_pays`, `population_plus_65_pays` FROM `t_pays` ORDER BY libelle_pays');
		
		$totaux=$bdd->query('SELECT \'*TOTAL\' AS libelle_pays,SUM(t_pays.population_pays) AS population_pays, ROUND(AVG(t_pays.taux_natalite_pays), 1) AS taux_natalite_pays, ROUND(AVG(t_pays.taux_mortalite_pays), 1) AS taux_mortalite_pays, ROUND(AVG(t_pays.esperance_vie_pays), 1) AS esperance_vie_pays, ROUND(AVG(t_pays.taux_mortalite_infantile_pays), 1) AS taux_mortalite_infantile_pays, ROUND(AVG(t_pays.nombre_enfants_par_femme_pays), 1) AS nombre_enfants_par_femme_pays, ROUND(AVG(t_pays.taux_croissance_pays), 1) AS taux_croissance_pays, SUM(t_pays.population_plus_65_pays) AS population_plus_65_pays FROM `t_pays`');
	}
	
}



$result=array();

while ($donnees = $pays->fetch(PDO::FETCH_ASSOC)) {
	$result[]=$donnees;
}

$donnees = $totaux->fetch(PDO::FETCH_ASSOC);
$result[]=$donnees;


print json_encode($result);

?>