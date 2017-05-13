<?php

include_once 'config.php';

 if($_SERVER['REQUEST_METHOD']=='POST'){
 //Getting values 
	 
	 $motif = $_POST['motif'];
	 $SaisieDefinitive = (int)$_POST['SaisieDefinitive'];
	 $documentation = (int)$_POST['documentation'];
	 $remplacant = (int)$_POST['remplacant'];
	 $practiciens_id = (int)$_POST['practiciens_id'];
	 $visiteurs_id = (int)$_POST['visiteurs_id'];
	 $bilan = $_POST['bilan'];
	 $cptVerif = $_POST['cptid'];
	 
	 
	if($cptVerif == "-1")
	{	
		$sql = "INSERT INTO `compterendu` (date, motif, bilan, SaisieDefinitive, documentation, remplacant, practiciens_id, visiteurs_id) VALUES (NOW(), '$motif', '$bilan', '$SaisieDefinitive', '$documentation', '$remplacant', '$practiciens_id', '$visiteurs_id')";
		
		$conn->exec($sql);

		echo $conn->lastInsertId();
	}
	else
	{
		$id = $_POST['id'];
	
		$sql = "UPDATE `compterendu` SET motif = '$motif', SaisieDefinitive = '$SaisieDefinitive', documentation = '$documentation', remplacant = '$remplacant', practiciens_id = '$practiciens_id', visiteurs_id = '$visiteurs_id', bilan = '$bilan' WHERE id = '$id'";
		
		$stmt = $conn->prepare($sql);

		$stmt->execute();
		
		echo 'CptR Updated Successfully';
	}
}
else
{
	echo 'Could Not Update or Insert CptR Try Again';
}
 ?>