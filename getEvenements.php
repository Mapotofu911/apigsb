<?php
include_once 'config.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
	
	$date = $_POST['date'];
	$id = $_POST['visiteurId'];

	$sql ="SELECT * FROM `news` WHERE user_id = '$id' AND date = '$date'";

	$stmt = $conn->prepare($sql);

	$stmt->execute();

	$results=$stmt->fetchAll(PDO::FETCH_ASSOC);

	$json=json_encode(array('Evenements' => $results));

	echo $json;
}
else
{
	echo "die";
}
?>