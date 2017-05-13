<?php

include_once 'config.php';

 if($_SERVER['REQUEST_METHOD']=='POST'){
 //Getting values 
	 
	 $id = $_POST['id'];
	 
	$sql = "DELETE FROM `news` WHERE `news`.`id` = '$id'";
	
	$stmt = $conn->prepare($sql);

	$stmt->execute();
	
	echo 'Deleted';
}
else
{
	echo 'Die';
}
 ?>