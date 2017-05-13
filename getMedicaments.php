<?php
include_once 'config.php';

$sql ='SELECT * FROM Medicaments';
$stmt = $conn->prepare($sql);
$stmt->execute();
$results=$stmt->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode(array('Medicaments' => $results));
echo $json;
?>