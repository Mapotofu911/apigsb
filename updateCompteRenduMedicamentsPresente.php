<?php

include_once 'config.php';

 if($_SERVER['REQUEST_METHOD']=='POST'){
	 
	 $medId = $_POST['medId'];
	 $cptId = $_POST['cptId'];
	 
	 $sql = "INSERT INTO `compte_rendu_medicaments` (`compte_rendu_id`, `medicaments_id`) VALUES ($cptId, $medId)";
	 
	 $stmt = $conn->prepare($sql);

	 $stmt->execute();
	 
	 echo "Updated";
 }
 else
 {
	 echo "die";
 }
 ?>