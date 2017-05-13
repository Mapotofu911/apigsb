<?php

    include 'config.php';
	 
	require_once 'C:\wamp64\www\News\vendor\autoload.php';

	use Symfony\Component\Security\Core\Encoder\BCryptPasswordEncoder;
	 
	 // Check whether username or password is set from android	
     if(isset($_POST['username']) && isset($_POST['password']))
     {
		  // Innitialize Variable
		  $result='';
		  $MyVisitieur='';
		 
		  $encoder = new BCryptPasswordEncoder(13);
		  
		  // Query database for row exist or not
		  
		    $username = $_POST['username'];
			$password = $_POST['password'];
			
			 $sql = "select roles from `fos_user` where username='$username'";
			 $stmt = $conn->prepare($sql);
			 $stmt->execute();
			 $roles = $stmt->fetchAll(PDO::FETCH_ASSOC);

			$sql = "select password, salt from fos_user where username='$username'"; // if you do not have salt in your table, remove it from select and leave only password
			$stmt = $conn->prepare($sql);
			$stmt->execute();

			$check = $stmt->fetch(PDO::FETCH_ASSOC);
			

			
			

			// if you do not have salt in your table, you should use returning value of $user->getSalt() method for this user. or null if you don't use salt

		  
          $sql = 'SELECT * FROM `fos_user` WHERE  username = :username';
          $stmt = $conn->prepare($sql);
          $stmt->bindParam(':username', $username, PDO::PARAM_STR);
          $stmt->execute();
		  
          if (isset($check) && $encoder->isPasswordValid($check['password'], $password, $check['salt']))
          {
			 $result="true";
			 $MyVisitieur=$stmt->fetchAll(PDO::FETCH_ASSOC);
          }  
          else
          {
			 $result="false";
          }
		 
		  $json=json_encode(array('Visiteur' => $MyVisitieur, 'result' => $result, 'Password' => $password, 'roles' => $roles));
		  echo $json;
  	}
	
?>