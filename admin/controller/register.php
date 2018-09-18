<?php 
	

	require_once '../../config/database.php';
	require_once '../model/object/user.php';
	
	// start a session 
	session_start();
	

	$db = new Database();
	$db->getConnect();

	$user = new User($db->getConn());
	
	
		
		
		 $username = isset($_POST['username']) ? $_POST['username'] : "";
		 $email = isset($_POST['email']) ? $_POST['email'] : "";
		 $password = isset($_POST['password']) ? $_POST['password'] : "";
		
		
		$usernameErr = "";
		$emailErr = "";
		$passErr = "";

			
		

		if(empty($username)){
			
			 $GLOBALS['usernameErr'] = "Username is required";

		}elseif(!preg_match("/^[a-zA-Z ]*$/",$username)){

				 $GLOBALS['usernameErr'] = "Only letters and white space allowed";
			//
		}elseif($user->checkUsername($username)){

			 $GLOBALS['usernameErr'] = "Username is exist.Please choose another one";
		}


		if(empty($email)){

			 $GLOBALS['emailErr'] = "Email is required";

		}
		elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      		
      		 $GLOBALS['emailErr'] = "Invalid email format";
    	}
		
		elseif($user->checkEmail($email)){
			 $GLOBALS['emailErr'] = "Email is exist.Please choose another one";
		}

		
		if(empty($password)){
			 $GLOBALS['passErr'] = "Password is required";

		}else if(!preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])[0-9A-Za-z!@#$%]{8,}$/',$password)){

				 $GLOBALS['passErr'] = "Password have least 8 chars,least uppercase,lowercase,one number";
		}else{

		}

		
		if(empty($usernameErr) && empty($emailErr)  && empty($passErr)){


			if($user->createUser($username,$email,$password)){

				// if ok ,save user
				$_SESSION['valid_user'] = $username;
			

				
					echo "true";
				

			}else{
				$error =  "Could not register.Please try again";
				$error_item = array(
					"error"=>$error
				);
				
				echo json_encode($error_item);
			}
		}else{

			$error_item = array(
				
				"usernameErr"=> $GLOBALS['usernameErr'],
				"emailErr"=> $GLOBALS['emailErr'],
				"passErr"=> $GLOBALS['passErr']
			);
			
			echo json_encode($error_item);
	}
	
 ?>
