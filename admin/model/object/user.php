<?php 
	class User{
		private $conn;
		private $id;	
		private $email;
		private $username;		
		private $password;
	

		// constructor
		public function __construct($db){
			$this->conn = $db;
		}
		public function getId(){
			return $this->id;

		}
		public function setaId($id){
			$this->id = $id;
		}


		public function getUsername(){
			return $this->username;

		}
		public function setUsername($username){
			$this->username = $username;
		}
		
		


		// function to login user
		public function getUser($username,$password){

			$query = "SELECT * FROM users WHERE (name=:username AND password=:password)";

			$stmt = $this->conn->prepare($query);

			$username = htmlspecialchars(strip_tags($username));
			$password = htmlspecialchars(strip_tags($password));
			$password = md5($password);

			$stmt->bindParam(':username',$username);
			$stmt->bindParam(':password',$password);
			
			$stmt->execute();

			if($stmt->rowCount()>0){

				return $stmt;
			}else{
				return false;

			}
		}

		public function createUser($username,$email,$password){
			// function to create a user
			$query = "INSERT INTO users SET name=:username,email=:email,password=:password,created_at=:created";

			$stmt = $this->conn->prepare($query);

			$username = htmlspecialchars(strip_tags($username));
			$email = htmlspecialchars(strip_tags($email));
			$password = htmlspecialchars(strip_tags($password));


			$password = md5($password);
			$created = date('Y-m-d H:i:s');


			$stmt->bindParam(':username',$username);
			$stmt->bindParam(':email', $email);
			$stmt->bindParam(':password',$password);
			$stmt->bindParam(':created',$created);
			
			$stmt->execute();

			if($stmt->rowCount()>0){

				return true;

			}else{
				return false;

			}

		}

		// function to change password
		public function changePassword($username,$password){

			$query = "UPDATE  users SET password=:password WHERE name=:username";
			$stmt = $this->conn->prepare($query);

			$username = htmlspecialchars(strip_tags($username));
			$password = htmlspecialchars(strip_tags($password));
			$password = md5($password);

			$stmt->bindParam(':username',$username);
			$stmt->bindParam(':password',$password);
			
			$stmt->execute();

			if($stmt->rowCount()>0){

				return true;
			}else{
				return false;

			}
		}
		public function checkEmail($email){

			$query = "SELECT * FROM users WHERE email=:email ";

			$stmt = $this->conn->prepare($query);

			$username = htmlspecialchars(strip_tags($email));
		

			$stmt->bindParam(':email',$email);
			
			
			$stmt->execute();

			if($stmt->rowCount()>0){

				return $stmt;
			}else{
				return false;

			}
		}

		public function checkUsername($username){

			$query = "SELECT * FROM users WHERE name=:username ";

			$stmt = $this->conn->prepare($query);

			$username = htmlspecialchars(strip_tags($username));
		

			$stmt->bindParam(':username',$username);
			
			
			$stmt->execute();

			if($stmt->rowCount()>0){

				return $stmt;
			}else{
				return false;

			}
		}
	}
 ?>