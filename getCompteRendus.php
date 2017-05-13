<?php

include_once 'config.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
	
	$visiteursId = $_POST['visiteursId'];

	$sql ='SELECT `CompteRendu`.`id`, `date`, `motif`, `SaisieDefinitive`, `bilan`, `documentation`, `remplacant`, `practiciens_id`, `visiteurs_id`, `practiciens`.`Nom` AS NomPract FROM `CompteRendu`, `practiciens` WHERE `practiciens`.`id` = `CompteRendu`.`practiciens_id` AND `visiteurs_id` = :visiteursId ORDER BY `CompteRendu`.`date` DESC';
	

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':visiteursId', $visiteursId,PDO::PARAM_STR);

	$stmt->execute();

	$results=$stmt->fetchAll(PDO::FETCH_ASSOC);

	$json=json_encode(array('compte_rendus' => $results));

	echo $json;
}
else
{
	echo "die";
}

?>