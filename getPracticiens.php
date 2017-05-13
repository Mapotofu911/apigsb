<?php
include_once 'config.php';
 
/*function getPracticiens(){
   
    // array for json response
    $response = array();
    $response["Practiciens"] = array();
     
    // Mysql select query
    $result = mysql_query("SELECT * FROM practiciens");
     
    while($row = mysql_fetch_array($result)){
        // temporary array to create single category
        $tmp = array();
        $tmp["id"] = $row["id"];
        $tmp["Nom"] = $row["Nom"];
		$tmp["Prenom"] = $row["Prenom"];
        $tmp["Adresse"] = $row["Adresse"];
		$tmp["CodePostal"] = $row["CodePostal"];
        $tmp["CoeffNotoriete"] = $row["CoeffNotoriete"];
		$tmp["Type"] = $row["Type"];
         
        // push category to final json array
        array_push($response["categories"], $tmp);
    }
     
    // keeping response header to json
    header('Content-Type: application/json');
     
    // echoing json result
    json_encode($response);
}
 
getPracticiens();*/

if($_SERVER['REQUEST_METHOD']=='POST'){
	
	$practicienId = $_POST['practicienId'];

	$sql ='SELECT * FROM practiciens WHERE practiciens.id = :practicienId';

	$stmt = $conn->prepare($sql);
	$stmt->bindParam(':practicienId', $practicienId,PDO::PARAM_STR);

	$stmt->execute();

	$results=$stmt->fetchAll(PDO::FETCH_ASSOC);

	$json=json_encode(array('Practicien' => $results));

	echo $json;
}
else
{
	$sql ='SELECT * FROM practiciens';
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$results=$stmt->fetchAll(PDO::FETCH_ASSOC);
	$json=json_encode(array('Practiciens' => $results));
	echo $json;
}


?>