<?php 
	class Article{
		private $conn;
		private $id;
		private $title;
		private $title_en;
		private $description;
	
		private $sub_category_id;
		private $content;
		private $url_img;

		public function __construct($db){
			$this->conn = $db;

		}
		public function getId(){
			return $this->id;
		}
		public function setId($id){
			$this->id = $id;
		}

		public function getTitle(){
			return $this->title;
		}
		public function setTitle($title){
			$this->title = $title;
		}
		public function getTitle_en(){
			return $this->title_en;
		}
		public function setTitle_en($title_en){
			$this->title_en = $title_en;
		}


		public function getDescription(){
			return $this->description;
		}
		public function setDescription($description){
			$this->description = $description;
		}

		public function getContent(){
			return $this->content;
		}
		public function setContent($content){
			$this->content = $content;
		}




		public function getSub_Category_Id(){
			return $this->sub_category_id;
		}
		public function setSub_Category_Id($sub_category_id){
			$this->sub_category_id = $sub_category_id;
		}



		public function getUrl_img(){
			return $this->url_img;
		}
		public function setUrl_img($url_img){
			$this->url_img = $url_img;
		}

		// function to get a article from id of article
		public function getArticle($id){
			$query = "SELECT * FROM tintuc WHERE id=:id";

			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(':id',$id);

			$stmt->execute();

			if($stmt){

				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				return $row;

			}else{
				return false;
			}
		}

		public function getOneArticle(){
			$query = "SELECT * FROM tintuc LEFT JOIN loaitin ON tintuc.idloaitin = loaitin.sc_id WHERE (tintuc.idloaitin = (SELECT idLoaiTin FROM tintuc WHERE id =:id)) AND id =:id";

			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(':id',$this->id);

			$stmt->execute();

			if($stmt){

				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				return $row;

			}else{
				return false;
			}
		}


		// function to get articles from loai tin
		public function getArticle_sub_Cate($sub_category_id, $from_record_num, $records_per_page){

			$query = "SELECT * FROM tintuc LEFT JOIN loaitin ON tintuc.idloaitin = loaitin.sc_id WHERE idLoaiTin=:sub_category_id LIMIT  $from_record_num, $records_per_page";

			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(':sub_category_id',$sub_category_id);


			$stmt->execute();

			if($stmt){
			
				return $stmt;
			}else{
				return false;
			}
		}

		// function to get new article based on category
		public function get_New_Article_Cate($category_id){


			$query = "SELECT * FROM tintuc LEFT JOIN loaitin ON tintuc.idloaitin = loaitin.sc_id LEFT JOIN theloai ON loaitin.idTheLoai = theloai.c_id WHERE c_id =:category_id ORDER BY id DESC LIMIT  0,1";

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
		// function to get new article based on category
		public function get_New_Article_Sub_Cate($sub_category_id){


			$query = "SELECT * FROM tintuc LEFT JOIN loaitin ON tintuc.idloaitin = loaitin.sc_id  WHERE idLoaiTin=:sub_category_id ORDER BY id DESC LIMIT  0,1";

			$stmt = $this->conn->prepare($query);			
			$stmt->bindParam(':sub_category_id',$sub_category_id);
			$stmt->execute();


			if($stmt){
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				return $row;
			}else{
				return false;
			}

		}
		// function to get new article based on category
		public function get_five_New_Article_Cate($category_id){

			$query = "SELECT * FROM tintuc LEFT JOIN loaitin ON tintuc.idloaitin = loaitin.sc_id LEFT JOIN theloai ON loaitin.idTheLoai = theloai.c_id WHERE idTheLoai=:category_id ORDER BY id DESC LIMIT  1,5";

			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(':category_id',$category_id);

			$stmt->execute();


			if($stmt){				
				return $stmt;
			}else{
				return false;
			}
		}

			// function to get new article based on category
		public function get_five_New_Article_Sub_Cate($sub_category_id){

			$query = "SELECT * FROM tintuc LEFT JOIN loaitin ON tintuc.idloaitin = loaitin.sc_id WHERE idLoaiTin=:sub_category_id ORDER BY id DESC LIMIT  1,5";

			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(':sub_category_id',$sub_category_id);

			$stmt->execute();


			if($stmt){				
				return $stmt;
			}else{
				return false;
			}
		}


		// function to get articles from The loai
		public function getArticle_Cate($category_id, $from_record_num, $records_per_page){

			$query = "SELECT * FROM tintuc LEFT JOIN loaitin ON tintuc.idloaitin = loaitin.sc_id LEFT JOIN theloai ON loaitin.idTheLoai = theloai.c_id WHERE idTheLoai=:category_id ORDER BY id DESC LIMIT  $from_record_num, $records_per_page ";

			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(':category_id',$category_id);

			$stmt->execute();


			if($stmt){
			
				return $stmt;
			}else{
				return false;
			}
		}

		// function to get all Article 
		public function getAllArticle(){
			$query = "SELECT * FROM tintuc ORDER BY  id DESC";

			$stmt = $this->conn->prepare($query);
			
			$stmt->execute();

			if($stmt){
				$row = $stmt->rowCount();
				return $row;
			}else{
				return false;
			}
		}


		// function to count articles based on category
		public function count_Article_Cate($category_id){

			$query = "SELECT id FROM tintuc LEFT JOIN loaitin ON tintuc.idloaitin = loaitin.sc_id LEFT JOIN theloai ON loaitin.idTheLoai = theloai.c_id WHERE idTheLoai=:category_id";

			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(':category_id',$category_id);

			$stmt->execute();


			if($stmt){
				$num = $stmt->rowCount();
				return $num;
			}else{
				return false;
			}
		}


		// function to count articles based on sub category
		public function count_Article_Sub_Cate($sub_category_id){

			$query = "SELECT id FROM tintuc LEFT JOIN loaitin ON tintuc.idloaitin = loaitin.sc_id WHERE idLoaiTin=:sub_category_id";

			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(':sub_category_id',$sub_category_id);

			$stmt->execute();


			if($stmt){
				$num = $stmt->rowCount();
				return $num;
			}else{
				return false;
			}
		}
		
		

		// function to get relative article 

			public function get_three_relative_article($id,$sub_category_id){

			$query = "SELECT * FROM tintuc WHERE (sc_id<> ? AND idloaitin=:idloaitin) ORDER BY  RAND() LIMIT 0,3";

			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(1,$id);
			$stmt->bindParam('idloaitin',$sub_category_id);
			$stmt->execute();
			
			if($stmt){
			
				return $stmt;
			}else{
				return false;
			}
		}


		public function countArticles(){
			$query = "SELECT id FROM tintuc ";

			$stmt = $this->conn->prepare($query);
		

			$stmt->execute();


			if($stmt){
				$num = $stmt->rowCount();
				return $num;
			}else{
				return false;
			}


		}


		// function to count view of articles
		public function updateView($id){
			$query = "UPDATE tintuc SET SoLuotXem=:SoLuotXem+1 WHERE id=:id" ;		
			
			$stmt=$this->conn->prepare($query);
			$stmt->bindParam(':id',$id);
			
			if($stmt){
			
				return $stmt;
			}else{
				return false;
			}
		}

		// function to get hot new
		public function hotArticle(){


			$query = "SELECT * FROM tintuc WHERE SoLuotXem = 0 ORDER BY id DESC LIMIT 0,5";		
			
			$stmt = $this->conn->prepare($query);
			
			$stmt->execute();
			
			
			if($stmt){
			
				return $stmt;
			}else{
				return false;
			}
		}

		// function to get hot new
		public function impressArticle(){


			$query = "SELECT * FROM tintuc WHERE NoiBat = 1 ORDER BY id DESC LIMIT 5,7";		
			
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
		


		// function to get articles
		public function get_Articles(){

			$query = "SELECT * FROM tintuc LEFT JOIN loaitin ON tintuc.idloaitin = loaitin.sc_id ORDER BY id DESC ";

			$stmt = $this->conn->prepare($query);
		

			$stmt->execute();


			if($stmt){
			
				return $stmt;
			}else{
				return false;
			}
		}
		// function to get articles
		public function get_Article($from_record_num, $records_per_page){

			$query = "SELECT * FROM tintuc LEFT JOIN loaitin ON tintuc.idloaitin = loaitin.sc_id ORDER BY id DESC LIMIT $from_record_num, $records_per_page";

			$stmt = $this->conn->prepare($query);
		

			$stmt->execute();


			if($stmt){
			
				return $stmt;
			}else{
				return false;
			}
		}

		// function to get new article 
		public function get_New_Article(){


			$query = "SELECT * FROM tintuc LEFT JOIN loaitin ON tintuc.idloaitin = loaitin.sc_id ORDER BY id DESC LIMIT  0,1";

			$stmt = $this->conn->prepare($query);			
			
			$stmt->execute();


			if($stmt){
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				return $row;
			}else{
				return false;
			}

		}



		// function to get new article based on category
		public function get_five_New_Article(){

			$query = "SELECT * FROM tintuc LEFT JOIN loaitin ON tintuc.idloaitin = loaitin.sc_id ORDER BY id DESC LIMIT  1,5";

			$stmt = $this->conn->prepare($query);
		

			$stmt->execute();


			if($stmt){				
				return $stmt;
			}else{
				return false;
			}
		}
		// update a article 
		public function updateArticle(){

			$query = "UPDATE tintuc SET TieuDe=:TieuDe,TieuDeKhongDau=:TieuDeKhongDau,TomTat=:TomTat,NoiDung=:NoiDung,Hinh=:Hinh,idLoaiTin=:idLoaiTin,created_at=:created WHERE id=:id";

			$stmt = $this->conn->prepare($query);
			$created = date('Y-m-d H:i:s');

			$stmt->bindParam(':id',$this->id);
			$stmt->bindParam(':TieuDe',$this->title);
			$stmt->bindParam(':TieuDeKhongDau',$this->title_en);
			$stmt->bindParam(':TomTat',$this->description);
			$stmt->bindParam(':NoiDung',$this->content);
			$stmt->bindParam(':Hinh',$this->url_img);
			$stmt->bindParam(':idLoaiTin',$this->sub_category_id);
			$stmt->bindParam(':created',$created);

			$stmt->execute();


			if($row = $stmt->rowCount()>0){	

				return true;
			}else{

				return false;
			}
		}
		// create a article
		public function createArticle(){

			$query = "INSERT INTO  tintuc SET TieuDe=:TieuDe,TieuDeKhongDau=:TieuDeKhongDau,TomTat=:TomTat,NoiDung=:NoiDung,Hinh=:Hinh,idLoaiTin=:idLoaiTin,created_at=:created";

			$stmt = $this->conn->prepare($query);


			$this->title = htmlspecialchars(strip_tags($this->title));
			$this->description = htmlspecialchars(strip_tags($this->description));
			$this->content = htmlspecialchars(strip_tags($this->content));

			// new 'image' field
			$image=!empty($_FILES["url_img"]["name"])
			        ? sha1_file($_FILES['url_img']['tmp_name']) . "-" . basename($_FILES["url_img"]["name"])
			        : "";
			$image=htmlspecialchars(strip_tags($image));




			$created = date('Y-m-d H:i:s');

			$stmt->bindParam(':TieuDe',$this->title);
			$stmt->bindParam(':TieuDeKhongDau',$this->title_en);
			$stmt->bindParam(':TomTat',$this->description);
			$stmt->bindParam(':NoiDung',$this->content);
			$stmt->bindParam(':Hinh', $image);
                            
			$stmt->bindParam(':idLoaiTin',$this->sub_category_id);
			$stmt->bindParam(':created',$created);
			

		


			if(	$stmt->execute()){
				// now, if image is not empty, try to upload the image
				if($image){
				 
				    // sha1_file() function is used to make a unique file name

				    $target_directory = "../../../../libs/images/";
				    $target_file = $target_directory . $image;
				    $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
				 
				    // error message is empty
				    $file_upload_error_messages="";

				    // make sure that file is a real image
				    $check = getimagesize($_FILES["url_img"]["tmp_name"]);

				    if($check!==false){
				        // submitted file is an image
				    }else{
				        $file_upload_error_messages.="<div>Submitted file is not an image.</div>";
				    }

				    // make sure certain file types are allowed
				    $allowed_file_types=array("jpg", "jpeg", "png", "gif");
				    if(!in_array($file_type, $allowed_file_types)){
				        $file_upload_error_messages.="<div>Only JPG, JPEG, PNG, GIF files are allowed.</div>";
				    }

				    // make sure file does not exist
				    if(file_exists($target_file)){
				        $file_upload_error_messages.="<div>Image already exists. Try to change file name.</div>";
				    }

				    // make sure submitted file is not too large, can't be larger than 1 MB
				    if($_FILES['url_img']['size'] > (1024000)){
				        $file_upload_error_messages.="<div>Image must be less than 1 MB in size.</div>";
				    }
				    // make sure the 'uploads' folder exists
				    // if not, create it
				    if(!is_dir($target_directory)){
				        mkdir($target_directory, 0777, true);
				    }

				    // if $file_upload_error_messages is still empty
				    if(empty($file_upload_error_messages)){
				        // it means there are no errors, so try to upload the file
				        if(move_uploaded_file($_FILES["url_img"]["tmp_name"], $target_file)){
				            // it means photo was uploaded
				        }else{
				           return false;
				        }
				    }
				     
				    // if $file_upload_error_messages is NOT empty
				    else{
				        // it means there are some errors, so show them to user
				        return false;
				    }
				 
				}				
				return true;
			}else{
				return false;
			}
		}
		// delete a article
		public function deleteArticle(){
			  // delete query
		    $query = "DELETE FROM tintuc WHERE id = ?";
		 
		    // prepare query
		    $stmt = $this->conn->prepare($query);
		 
		    // sanitize
		    $this->id=htmlspecialchars(strip_tags($this->id));
		 
		    // bind id of record to delete
		    $stmt->bindParam(1, $this->id);
		 	$stmt->execute();
		    // execute query
		    if($num = $stmt->rowCount()>0){
		        return true;
		    }
		 
		    return false;
		}
		// search products
		function search($keywords){
		 
		    // select all query
		    $query = "SELECT * FROM tintuc LEFT JOIN loaitin ON tintuc.idLoaiTin = loaitin.sc_id WHERE TieuDeKhongDau LIKE ? OR TomTat LIKE ? OR NoiDung LIKE ? OR id LIKE ? OR Ten LIKE ? ORDER BY tintuc.created_at DESC";
		 
		    // prepare query statement
		    $stmt = $this->conn->prepare($query);
		 
		    // sanitize
		    $keywords=htmlspecialchars(strip_tags($keywords));
		    $keywords = "%{$keywords}%";
		 
		    // bind
		    $stmt->bindParam(1, $keywords);
		    $stmt->bindParam(2, $keywords);
		    $stmt->bindParam(3, $keywords);
		    $stmt->bindParam(4, $keywords);
		    $stmt->bindParam(5, $keywords);
		 
		    // execute query
		    $stmt->execute();
		 
		    return $stmt;
		}
	}

 ?>