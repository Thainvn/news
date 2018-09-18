<?php 
	
	require_once "../model/article.php";
	require_once "../model/Category.php";
	require_once "../model/SubCategory.php";

	class C_Article{

		private $conn;

		public function __construct($db){
			$this->conn = $db;
		}


		public function C_getArticle($id){
			$article = new Article($this->conn);
			$stmt = $article->getArticle($id);
			return $stmt;
		}

		public function C_getAllArticle(){

			$article = new Article($this->conn);
			$stmt = $article->getAllArticle();
			return $stmt;

		}


		public function C_getArticle_Cate($category_id, $from_record_num, $records_per_page){

			$article = new Article($this->conn);
			$stmt = $article->getArticle_Cate($category_id, $from_record_num, $records_per_page);
			return $stmt;
			
		}

		public function C_getArticle_sub_Cate($sub_category_id, $from_record_num, $records_per_page){

			$article = new Article($this->conn);
			$stmt = $article-> getArticle_sub_Cate($sub_category_id, $from_record_num, $records_per_page);
			return $stmt;
			
		}

		public function C_getCategory(){

			$category = new Category($this->conn);
			$stmt = $category-> getCategory();

			return $stmt;
			
		}

		public function C_getSubCategory($category_id){

			$subCategory = new SubCategory($this->conn);
			$stmt = $subCategory-> getSubCategory($category_id);

			return $stmt;
			
		}


		public function C_get_five_New_Article_Sub_Cate($sub_category_id){

			$article = new Article($this->conn);
			$stmt = $article-> get_five_New_Article_Sub_Cate($sub_category_id);

			return $stmt;
			
		}
		public function C_get_five_New_Article_Cate($category_id){

			$article = new Article($this->conn);
			$stmt = $article-> get_five_New_Article_Cate($category_id);

			return $stmt;
			
		}
		public function C_get_New_Article_Cate($category_id){
			
			$subCategory = new Article($this->conn);
			$stmt = $subCategory-> get_New_Article_Cate($category_id);

			return $stmt;
			
		}

		public function C_get_New_Article_Sub_Cate($sub_category_id){
			
			$subCategory = new Article($this->conn);
			$stmt = $subCategory-> get_New_Article_Sub_Cate($sub_category_id);

			return $stmt;
			
		}

		public function C_get_three_relative_article($id,$sub_category_id){

			$article = new Article($this->conn);
			$stmt = $article-> get_three_relative_article($id,$sub_category_id);

			return $stmt;
			
		}


		public function C_count_Article_Cate($category_id){

			$num= new Article($this->conn);

			$stmt = $num-> count_Article_Cate($category_id);

			return $stmt;
		}

		public function C_count_Article_Sub_Cate($sub_category_id){

			$num= new Article($this->conn);

			$stmt = $num-> count_Article_Sub_Cate($sub_category_id);

			return $stmt;
		}

		//get hot articles
		public function C_hot_Article(){

			$num= new Article($this->conn);

			$stmt = $num-> hotArticle();

			return $stmt;
		}


		//get impressable articles
		public function C_impressArticle(){

			$num= new Article($this->conn);

			$stmt = $num-> impressArticle();

			return $stmt;
		}

		public function C_getOneCategory($category_id){

			$num= new Category($this->conn);

			$stmt = $num-> getOneCategory($category_id);

			return $stmt;
		}

		public function C_getOneSubCategory($sub_category_id){

			$num= new Article($this->conn);

			$stmt = $num-> getOneSubCategory($sub_category_id);

			return $stmt;
		}


		


		public function C_get_New_Article(){

			$num= new Article($this->conn);

			$stmt = $num-> get_New_Article();

			return $stmt;
		}


		public function C_get_five_New_Article(){

			$num= new Article($this->conn);

			$stmt = $num-> get_five_New_Article();

			return $stmt;
		}

		public function C_get_Articles($from_record_num, $records_per_page){

			$num= new Article($this->conn);

			$stmt = $num-> get_Article($from_record_num, $records_per_page);

			return $stmt;
		}

		public function C_updateView($id){

			$num= new Article($this->conn);

			$stmt = $num-> updateView($id);

			return $stmt;
		}

		
	}

 ?>
