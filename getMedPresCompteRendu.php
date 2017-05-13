<?php

include_once 'config.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
	
	$compteRendusId = $_POST['compteRendusId'];

	$sql ='SELECT * FROM `compte_rendu_medicaments`, Medicaments WHERE `compte_rendu_medicaments`.medicaments_id = Medicaments.id AND compte_rendu_id = :compteRendusId';
	

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':compteRendusId', $compteRendusId,PDO::PARAM_STR);

	$stmt->execute();

	$results=$stmt->fetchAll(PDO::FETCH_ASSOC);

	$json=json_encode(array('med' => $results));

	echo $json;
}
else
{
	echo "die";
}

?>