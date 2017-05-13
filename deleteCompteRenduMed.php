<?php

include_once 'config.php';

 if($_SERVER['REQUEST_METHOD']=='POST'){
	 
	 $cptId = $_POST['cptId'];
	 $visiteurId = $_POST['visiteurId'];
	 
	 
	 $sql = "DELETE FROM `med_offerts` WHERE `med_offerts`.`compte_rendus_id` = $cptId";
	 $stmt = $conn->prepare($sql);
	 $stmt->execute();
	 
	 $sql = "DELETE FROM `compte_rendu_medicaments` WHERE `compte_rendu_medicaments`.`compte_rendu_id` = $cptId";
	 $stmt = $conn->prepare($sql);
	 $stmt->execute();
	 
	 echo "Deleted";
 }
 else
 {
	 echo "die";
 }
 ?>