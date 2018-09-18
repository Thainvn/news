<?php 
	class SubCategory{
		private $conn;
			public function __construct($db){
			$this->conn = $db;

		}


		// function to get category 
		public function get_SubCategory(){

			$query = "SELECT * FROM loaitin ORDER BY  sc_id ASC";

			$stmt = $this->conn->prepare($query);
			
			$stmt->execute();

			if($stmt){
			
				return $stmt;
			}else{
				return false;
			}
		}

		public function getOneSubCategory($subcategory_id){

			$query = "SELECT Ten FROM loaitin WHERE  sc_id=:subcategory_id";

			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(':subcategory_id',$subcategory_id);
			$stmt->execute();

			if($stmt){
			
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				return $row;
			}else{
				return false;
			}
		}
		// function to get subCategory
		public function getSubCategory($category_id){
			
			$query = "SELECT * FROM loaitin WHERE idTheLoai=:idTheLoai ORDER BY  sc_id ASC";

			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(':idTheLoai',$category_id);
			$stmt->execute();
			
			if($stmt){
			
				return $stmt;
			}else{
				return false;
			}
		}
	}
 ?>