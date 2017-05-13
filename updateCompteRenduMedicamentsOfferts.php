<?php

include_once 'config.php';

 if($_SERVER['REQUEST_METHOD']=='POST'){
	 
	 $Quantity = $_POST['quantity'];
	 $medId = $_POST['medId'];
	 $cptId = $_POST['cptId'];
	 
	 $sql = "INSERT INTO `med_offerts` (`Quantity`, `medicaments_id`, `compte_rendus_id`) VALUES ($Quantity, $medId, $cptId)";
	 
	 $stmt = $conn->prepare($sql);

	 $stmt->execute();
	 
	 echo "Updated";
 }
 else
 {
	 echo "die";
 }
 
 ?>