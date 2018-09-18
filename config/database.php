<?php 
	class Database{
		private $servername = "localhost";
		private $username = "root";
		private $password = "";
		private $dbname = "tintuc";
		private $conn;

		public function getConn(){
			return $this->conn;
		}
		public function getConnect(){
			$this->conn = null;
			try {

				$this->conn = new PDO("mysql:host=$this->servername;dbname=$this->dbname;charset=UTF8",$this->username,$this->password,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

				// set the PDO error mode to exception
				$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				
			} catch (PDOException $e) {
				echo "Error: " .$e->getMessage();
			}
		}
	}
 ?>