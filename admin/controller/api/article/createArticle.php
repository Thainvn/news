<?php 
	
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

	require_once '../../../../config/database.php';
	require_once '../../../../user/model/article.php';

	$db = new Database();
	$db->getConnect();

	$article = new Article($db->getConn());
	// get posted data
	//$data = json_decode(file_get_contents("php://input"));
	
	$title = isset($_POST['title']) ? $_POST['title'] : "";
	$description = isset($_POST['description']) ? $_POST['description'] : "";
	$content = isset($_POST['content']) ? $_POST['content'] : "";
	$url_img = isset($_POST['url_img']) ? $_POST['url_img'] : "";
	$sub_category_id = isset($_POST['sub_category_id']) ? $_POST['sub_category_id'] : "";

	if(!empty($title) && !empty($description) && !empty($content) && !empty($url_img) &&  !empty($sub_category_id) ){
	
		// set new property values
		$article->setTitle($title);
		$article->setTitle_en($article->getTitle());
		$article->setDescription($description);
		$article->setContent($content);
		
		$article->setUrl_img($url_img);
		$article->setSub_Category_Id($sub_category_id);

		if($article->createArticle()){

			echo '{';
		        echo '"message": "success"';
		    echo '}';
		}
		 
		// if unable to create the product
		else{
		    echo '{';
		        echo '"message": "fail"';
		    echo '}';
		}
	}else{

		echo '{';
		    echo '"message": "The fields is required"';
		echo '}';

	}
	
	
	
	

 ?>