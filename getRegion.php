<?php
include_once 'config.php';

$sql ='SELECT * FROM region';
$stmt = $conn->prepare($sql);
$stmt->execute();
$results=$stmt->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode(array('Regions' => $results));
echo $json;
?>