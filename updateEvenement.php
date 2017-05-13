<?php
include_once 'config.php';

if($_SERVER['REQUEST_METHOD']=='POST'){
	
	$date = $_POST['date'];
	$content = $_POST['content'];
	$user_id = $_POST['user_id'];
	$PlaceNumber = $_POST['PlaceNumber'];
	$titre = $_POST['titre'];
	$id = $_POST['id'];

	if($id == -1)
	{
		$sql ="INSERT INTO `news` (`title`, `content`, `user_id`, `PlaceNumber`, `date`) VALUES ('$titre', '$content', '$user_id', '$PlaceNumber', '$date')";

		$stmt = $conn->prepare($sql);

		$stmt->execute();

		echo "News Created";
	}
	else
	{
		$sql ="UPDATE `news` SET `title` = '$titre', `content` = '$content', `user_id` = '$user_id', `PlaceNumber` = '$PlaceNumber', `date` = '$date' WHERE `news`.`id` = '$id'";

		$stmt = $conn->prepare($sql);

		$stmt->execute();

		echo "News Updated";
	}

}
else
{
	echo "die";
}
?>