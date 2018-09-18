<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 

 
		// include database and object files
		include_once '../../../../config/database.php';
		include_once '../../../../user/model/article.php';
		 
		// get database connection
		$db = new Database();
		 $db->getConnect();
		 
		// prepare product object
		$article = new Article($db->getConn());


			// get id of product to be edited
			//$data = json_decode(file_get_contents("php://input"));


	 $id = isset($_POST['id']) ? $_POST['id'] : 0;
	 $title = isset($_POST['title']) ? $_POST['title'] : "";
	 $description = isset($_POST['description']) ? $_POST['description'] : "";
	 $content = isset($_POST['content']) ? $_POST['content'] : "";
	 $url_img = isset($_POST['img_url']) ? $_POST['img_url'] : "";
	 $sub_category_id = isset($_POST['sub_category_id']) ? $_POST['sub_category_id'] : "";

			$article->setId($id);
			$article->setTitle($title);
			$article->setTitle_en($title);
			$article->setDescription($description);
			$article->setContent($content);	
			$article->setUrl_img($url_img);
			$article->setSub_Category_Id($sub_category_id);
			
			
			// update the product
			if($article->updateArticle()){

			    echo '{';
			        echo '"message": "success"';
			    echo '}';
			}
			 
			// if unable to update the product, tell the user
			else{
			    echo '{';
			        echo '"message": "Cannot update Article .Please try again"';
			    echo '}';
			}
?>