<?php

include_once 'config.php';

 if($_SERVER['REQUEST_METHOD']=='POST'){
	 
	 $cptId = $_POST['cptId'];
	 $visiteurId = $_POST['visiteurId'];
	 
	 $sql = "DELETE FROM `CompteRendu` WHERE `CompteRendu`.`id` = $cptId AND `CompteRendu`.`visiteurs_id` = $visiteurId";
	 $stmt = $conn->prepare($sql);
	 $stmt->execute();
	 
	 echo "Compte Rendu Supprimmé.";
 }
 else
 {
	 echo "Erreur de connection.";
 }
 ?>