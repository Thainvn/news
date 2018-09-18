<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header('Content-Type: application/json');
 
		// include database and object files
		include_once '../../../../config/database.php';
		include_once '../../../../user/model/article.php';
		 
		// get database connection
		$db = new Database();
		 $db->getConnect();
		 
		// prepare product object
		$article = new Article($db->getConn());
		 
		// set ID property of product to be edited
		$id = isset($_GET['id']) ? $_GET['id'] : die("Not find id");
		$article->setId($id);


		// read the details of product to be edited
		$row = $article->getOneArticle();
		 extract($row);
		
		// create array
		$product_arr = array(
		    "id" =>  $id,
		    "title" => $TieuDe,
		    "description" => $TomTat,
		    "content" => $NoiDung,
		    "sub_category_id" => $idLoaiTin,
		    "sub_category_name" => $Ten,
		   	"Image" =>$Hinh
		 
		);
		 
		// make it json format
		print_r(json_encode($product_arr));
?>