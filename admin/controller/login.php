<?php 
	require_once '../../config/database.php';
	require_once '../model/object/user.php';	
	session_start();

	$db = new Database();
	$db->getConnect();

	// create a new user
	$user = new User($db->getConn());

	
		// get data
		$username = isset($_POST['username']) ? $_POST['username'] : "";
		$password = isset($_POST['password']) ? $_POST['password'] : "";
	
		$usernameEr  = "";
		$passErr = "";

		// check validate data
		if(empty($username)){

			 $GLOBALS['usernameEr'] = "Username is required";
			

		}
		else if(!preg_match("/^[a-zA-Z ]*$/",$username)){

			 $GLOBALS['usernameEr'] = "Only letters and white space allowed";

		}else{

		}


		if(empty($password)){

			 $GLOBALS['passErr']  = "Password is required";
			
		}
		
		
		if(empty($usernameEr) && empty($passErr)){
			$stmt = $user->getUser($username,$password);
			
			if($stmt){

				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				// if ok ,save user
				$_SESSION['valid_user'] = $username;
				$_SESSION['admin'] = $row['role'];

				if($_SESSION['admin'] == 1){

					echo "admin";

				}else{

					echo "user";
				}
				

			

			}else{

				$error_com =  "Username or Password is incorrect .Please enter again";
				$error_item = array(
					"errora"=>$error_com
				);
			
				echo json_encode($error_item);
				
			}

		}else{

			$error_item = array(
				"usernameErr"=> $GLOBALS['usernameEr'],
				"passErr"=> $GLOBALS['passErr']
			);
			
			echo json_encode($error_item);
			

		}


		
	
 ?>