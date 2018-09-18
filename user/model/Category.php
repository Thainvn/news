<?php 
	class Category{


		private $conn;
		// constructor
		public function __construct($db){
			$this->conn = $db;

		}
		// function to get category 
		public function getCategory(){

			$query = "SELECT * FROM theloai ORDER BY  c_id ASC";

			$stmt = $this->conn->prepare($query);
			
			$stmt->execute();

			if($stmt){
			
				return $stmt;
			}else{
				return false;
			}
		}
		public function getOneCategory($category_id){

			$query = "SELECT Ten FROM theloai WHERE  c_id=:category_id";

			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(':category_id',$category_id);
			$stmt->execute();

			if($stmt){
			
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				return $row;
			}else{
				return false;
			}
		}

	}
 ?>