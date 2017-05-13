<?php

include_once 'config.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
	
	$region = $_POST['region'];

	$sql ='SELECT v.id, v.Nom, v.Prenom, v.Adresse, v.CodePostal, v.`Laboratoire`,v.`Secteur`,v.`email`,v.`Tel`, r.Libelle  
		FROM `fos_user` v,`region` r
		WHERE v.region_id_id = r.id
		AND r.id = :region
		GROUP BY v.id';

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':region', $region,PDO::PARAM_STR);

	$stmt->execute();

	$results=$stmt->fetchAll(PDO::FETCH_ASSOC);

	$json=json_encode(array('Visiteurs' => $results));

	echo $json;
}
else
{
	echo "die";
}

?>