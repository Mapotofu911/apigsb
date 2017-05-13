<?php

include_once 'config.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
	
	$compteRendusId = $_POST['compteRendusId'];

	$sql ='SELECT * FROM `CompteRendu`,`practiciens` WHERE `CompteRendu`.`practiciens_id` = `practiciens`.`id` AND `CompteRendu`.`id` = :compteRendusId';
	

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':compteRendusId', $compteRendusId,PDO::PARAM_STR);

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